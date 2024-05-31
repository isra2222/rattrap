<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Tinkièt'</title>
        <link rel="shortcut icon" href="Image/logo.png"/>
  <link rel="stylesheet" href="assets/recherche_pilote_isra.css">
</head>
<body>
  <header>
    <?php include "header.php"; ?>
  </header>
<div class="content">
  
    <div class="testF">
    <button class="btn" id="moreBtnF">Filtres  </button>
    <div class="dropdownF" id="dropdownF">
        <button onclick="modifier()">Modifier</button>
        <button onclick="supprimer()">Supprimer</button>
        <button onclick="statistiques()">Statistiques</button>
        </div>
        </div>
        <div class="container">
    <div class="grid">
      <img src="th.jpg" alt="photo 1" class="photo">
      <h2>Nom_Prenom</h2>
      <h3>telephone</h3>
      <div class="test">ui
        <button class="btn" id="moreBtn">...</button>
        <div class="dropdown" id="dropdown">
            <button onclick="modifier()">Modifier</button>
            <button onclick="supprimer()">Supprimer</button>
        </div>
    </div>
    </div>
    <div class="grid">
      <img src="th.jpg" alt="photo 2" class="photo">
      <h2>Nom_Prenom</h2>
      <h3>telephone</h3>
      <button class="btn">...</button>
    </div>
    <div class="grid">
      <img src="th.jpg" alt="photo 3" class="photo">
      <h2>Nom_Prenom</h2>
      <h3>telephone</h3>
      <button class="btn">...</button>
    </div>

    <div class="grid">
      <img src="th.jpg" alt="photo 2" class="photo">
      <h2>Nom_Prenom</h2>
      <h3>telephone</h3>
      <button class="btn">...</button>
    </div>

    <div class="grid">
      <img src="th.jpg" alt="photo 2" class="photo">
      <h2>Nom_Prenom</h2>
      <h3>telephone</h3>
      <button class="btn">...</button>
    </div>

    <div class="grid">
      <img src="th.jpg" alt="photo 4" class="photo">
      <h2>Nom_Prenom</h2>
      <h3>telephone</h3>
      <button class="btn">...</button>
    </div>
  </div>              
</div>
</div>
</div>
  </div>
    <script>
      if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
          navigator.serviceWorker
            .register('/sw.js')
            .then(registration => {
              console.log(
                `Service Worker enregistré ! Ressource: ${registration.scope}`
              );
            })
            .catch(err => {
              console.log(
                `Echec de l'enregistrement du Service Worker: ${err}`
              );
            });
        });
      }
    </script>

</body>
<?php include "footer.php"; ?>
</html>

<script>
  function modifier() {
      alert("Action Modifier");
  }
  
  function supprimer() {
      alert("Action Supprimer");
  }
  
  function statistiques() {
      alert("Action Statistiques");
  }
  
  document.getElementById("moreBtn").addEventListener("click", function() {
      var dropdown = document.getElementById("dropdown");
      if (dropdown.style.display === "none") {
          dropdown.style.display = "block";
      } else {
          dropdown.style.display = "none";
      }
  });

  document.getElementById("moreBtnF").addEventListener("click", function() {
      var dropdown = document.getElementById("dropdownF");
      if (dropdown.style.display === "none") {
          dropdown.style.display = "block";
      } else {
          dropdown.style.display = "none";
      }
  });

  </script>