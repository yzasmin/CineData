import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error, r2_score

# Exemple de chargement de données
data = pd.read_excel('movie.xlsx', engine='openpyxl')

# Convertir les colonnes en numérique, en remplaçant les virgules par des points et en gérant les erreurs
data['budget'] = pd.to_numeric(data['budget'].astype(str).str.replace(',', '.'), errors='coerce')
data['popularity'] = pd.to_numeric(data['popularity'].astype(str).str.replace(',', '.'), errors='coerce')

# Nettoyer les données en supprimant les lignes avec des valeurs NaN dans 'popularity'
data_clean = data.dropna(subset=['popularity'])

# Affichez les premières lignes pour vérifier
#print(data_clean.head())
"""
# Analyser la corrélation
correlation = data_clean[['budget', 'popularity']].corr()
print(correlation)

# Division en Ensembles d'Entraînement et de Test

# Assurez-vous d'utiliser 'data_clean' pour 'X' et 'y'
X = data_clean[['budget']]  # Caractéristiques
y = data_clean['popularity']  # Cible

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Modélisation et Prédiction

model = LinearRegression()
model.fit(X_train, y_train)

# Prédiction sur l'ensemble de test
predictions = model.predict(X_test)

# Évaluation du Modèle 

mse = mean_squared_error(y_test, predictions)
r2 = r2_score(y_test, predictions)

print(f"MSE: {mse}")
print(f"R²: {r2}")

# Trouver la valeur minimale de 'popularity'
min_popularity = data['popularity'].min()

# Trouver la valeur maximale de 'popularity'
max_popularity = data['popularity'].max()

print(f"La plage de valeurs de 'popularity' va de {min_popularity} à {max_popularity}.")
"""
print(data['popularity'].describe())

# Identifier et afficher les valeurs aberrantes
print(data[data['popularity'] > 10]['popularity'])