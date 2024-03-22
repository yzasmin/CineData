import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error, r2_score
import json


data = pd.read_excel('modelederegression.xlsx', engine='openpyxl')

# Convertir les colonnes en numérique, en remplaçant les virgules par des points et en gérant les erreurs
data['budget'] = pd.to_numeric(data['budget'].astype(str).str.replace(',', '.'), errors='coerce')
data['popularity'] = pd.to_numeric(data['popularity'].astype(str).str.replace(',', '.'), errors='coerce')

# Nettoyer les données en supprimant les lignes avec des valeurs NaN dans 'popularity'
data_clean = data.dropna(subset=['popularity'])


# Charger le DataFrame
df_movies = pd.read_excel('modeleregression.xlsx')

# Fonction pour extraire les noms de genres
def extract_genres(genres_str):
    genres_str = genres_str.replace("'", "\"")
    try:
        genres_json = json.loads(genres_str)
        return [g['name'] for g in genres_json]
    except Exception as e:
        return []

# Appliquer la fonction pour extraire les genres
df_movies['genres_list'] = df_movies['genres'].apply(extract_genres)

# Exploser la liste des genres pour préparer à l'encodage one-hot
df_exploded = df_movies.explode('genres_list')

# Appliquer l'encodage one-hot aux genres
df_one_hot_genres = pd.get_dummies(df_exploded['genres_list'], prefix='genre')

# Regrouper les résultats one-hot par index de film original pour réagréger les genres encodés
df_one_hot_genres_aggregated = df_one_hot_genres.groupby(df_one_hot_genres.index).sum()

# Fonction pour extraire les codes de pays de production
def extract_production_countries(countries_str):
    try:
        countries_json = json.loads(countries_str.replace("'", "\""))
        return [country['iso_3166_1'] for country in countries_json]
    except Exception as e:
        return []

# Appliquer la fonction pour extraire les codes des pays de production
df_movies['production_countries_list'] = df_movies['production_countries'].apply(extract_production_countries)

# Exploser la liste des codes de pays pour préparer à l'encodage one-hot
df_exploded_countries = df_movies.explode('production_countries_list')

# Appliquer l'encodage one-hot aux codes de pays de production
df_one_hot_countries = pd.get_dummies(df_exploded_countries['production_countries_list'], prefix='country')

# Regrouper les résultats one-hot par index de film original pour réagréger les pays encodés
df_one_hot_countries_aggregated = df_one_hot_countries.groupby(df_exploded_countries.index).sum()

# Fusionner le DataFrame original avec les données encodées one-hot des genres et des pays de production
df_movies_with_features = pd.concat([df_movies, df_one_hot_genres_aggregated, df_one_hot_countries_aggregated], axis=1)


def calculate_nuanced_success_score(row):
    # Score initial basé sur la note moyenne
    score_average = max(0, (row['vote_average'] / 6.8) * 75) if row['vote_average'] < 6.8 else 75
    # Score initial basé sur le nombre de votes
    score_count = max(0, (row['vote_count'] / 642) * 75) if row['vote_count'] < 642 else 75
    
    # Combinaison des deux scores
    if row['vote_average'] > 6.8 and row['vote_count'] > 642:
        # Pour les films qui satisfont aux critères, augmentez le score jusqu'à 100 en fonction de leur excédent
        extra_for_average = min(25, (row['vote_average'] - 6.8) / (10 - 6.8) * 25)
        extra_for_count = min(25, (row['vote_count'] - 642) / (df_movies_with_features['vote_count'].max() - 642) * 25)
        return 75 + extra_for_average + extra_for_count
    else:
        # Moyenne des scores pour les films ne répondant pas aux critères
        return (score_average + score_count) / 2

# Appliquer la fonction
df_movies_with_features['nuanced_success_score'] = df_movies_with_features.apply(calculate_nuanced_success_score, axis=1)

# Afficher les résultats
print(df_movies_with_features[['vote_average', 'vote_count', 'nuanced_success_score']].head())


df_movies_with_features = df_movies_with_features.dropna(subset=['runtime'] + [col for col in df_movies_with_features if 'genre_' in col or 'country_' in col])

# Préparer les caractéristiques et la cible
X = df_movies_with_features[['budget', 'runtime'] + [col for col in df_movies_with_features if col.startswith('genre_') or col.startswith('country_')]]
y = df_movies_with_features['nuanced_success_score']

# Séparer les données en ensembles d'entraînement et de test
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Créer et entraîner le modèle de régression linéaire
model = LinearRegression()
model.fit(X_train, y_train)

# Prédire les scores de succès sur l'ensemble de test
y_pred = model.predict(X_test)

# Calculer et afficher les métriques de performance
print('RMSE:', mean_squared_error(y_test, y_pred, squared=False))
print('R^2:', r2_score(y_test, y_pred))
