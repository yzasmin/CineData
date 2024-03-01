<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
       body {
            margin: 0;
            padding: 0;
            background-image: url('background.png'); /* Ajoutez le chemin de votre image de fond */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Ajuste la hauteur pour couvrir toute la fenêtre */
        }

      .form-container {
        position: absolute;
        top: 50%;
        right: 10%;
        transform: translate(0%, -50%);
    
        padding: 20px;
        border-radius: 10px;
      }

      

      .form-field {
        display: block;
        margin-bottom: 10px;
      }

      .form-field label {
        display: block;
        margin-bottom: 5px;
      }

      .form-field input[type="text"],
      .form-field input[type="email"] {
        width: 200px;
        padding: 8px;
        border: 1px solid #ccc;
      }

      .logo {
        position: absolute;
        top: 10px;
        left: 10px;
        width: 100px;
        height: auto;
      }
      .form-message textarea {
            width: 213px; /* Remplissez la largeur du conteneur parent */
            height: 150px; /* Hauteur du champ de texte */
            resize: none; /* Empêcher le redimensionnement du texte */
        }


        body {
  margin: 0;
  font-family: Poppins, sans-serif;
  background-color: #0a1939
;
  color: white;
}       


.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  color: white;

}


.logo img {
  width: 70px; /* Taille de votre logo */
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
  color: white;
}

.part1 {
    display: flex;
    justify-content: flex-end;
}
      
    </style>
</head>
<body>
  <title>CONTACT </title>
  <div class="part1">
        <div class="header">
          <div class="logo">
            <img src="LogoW.png" alt="Logo">
          </div>
          <nav>
           <ul>
             <li><a href="#">Home</a></li>
             <li><a href="#">Film</a></li>
             <li><a href="#">Comparison</a></li>
             <li><a href="#">Prédiction</a></li>
             <li><a href="#">About Us</a></li>
             <li><a href="#">Contact Us</a></li>
           </ul>
          </nav>

         </div>
        

  
  <div class="form-container">
    <form action="#" method="post">
      <div class="form-field">
        <label for="prenom"> </label>
        <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
      </div>
      <div class="form-field">
        <label for="email"> </label>
        <input type="email" id="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-message">
        <label for="message"></label>
        <textarea id="message" name="message" placeholder="Écrivez votre message ici..." required></textarea>
      </div>
      <button type="submit">Envoyer</button>
    </form>

  </div>
</body>
</html>
