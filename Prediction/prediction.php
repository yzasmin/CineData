<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Prediction</title>
</head>
<style>
body {
  margin: 0;
  background-image: url('fondpre.png'); /* Ajoutez le chemin de votre image de fond */
  background-size: cover; /* Fait en sorte que l'image de fond couvre entièrement la zone de fond */
  background-repeat: no-repeat; /* Empêche la répétition de l'image de fond */
  font-family: Arial, sans-serif;
  background-color: white;
  color: black;
}



.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  color: black;
}

.logo img {
  width: 50px; /* Taille de votre logo */
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: inline;
}

nav ul li a {
  display: inline-block;
  padding: 10px;
  text-decoration: none;
  color: #8B8B8B;
}

.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Utiliser toute la hauteur de la vue */
}

.logo img {
  width: 70px; /* Taille de votre logo */
}

.title {
  font-family: "Poppins";
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.description {
  font-family: "Poppins";
  text-align: center;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 20px;
}

.select-container {
  margin-top: 20px; /* Espacement du haut */
}

.select-container select {
  width: 200px; /* Largeur du bouton déroulant */
  height: 40px; /* Hauteur du bouton déroulant */
  margin-bottom: 10px; /* Espacement entre les boutons déroulants */
}
</style>
<body>
  <nav class="part1">
    <div class="header">
      <div class="logo">
        <img src="Logob.png" alt="Logo" width: 100px;>
      </div>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Film</a></li>
        <li><a href="#">Comparison</a></li>
        <li><a href="#">Prédiction</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="title">Prédictions</div>
    <div class="description">Choisissez les critères pour savoir si votre film a des chances d’être <br>un succès au box-office</div>
    <div class="select-container">
      <select>
        <option value="default">Filtre 1</option>
      </select>
    </div>
    <div class="select-container">
      <select>
        <option value="default">Filtre 2</option>
      </select>
    </div>
    <div class="select-container">
      <select>
        <option value="default">Filtre 3</option>
      </select>
    </div>
    <div class="select-container">
      <select>
        <option value="default">Filtre 4</option>
      </select>
    </div>
  </div>
  <button>Valider</button>

</body>
</html>
