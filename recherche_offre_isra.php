<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Tinkièt'</title>
        <link rel="shortcut icon" href="Image/logo.png"/>
  <link rel="stylesheet" href="assets/recherche_offre_isra.css">
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
      <img src="th.jpg" alt="Logo 1" class="logo">
      <h2>Engie</h2>
      <div class="test">
        <button class="btn" id="moreBtn">...</button>
        <div class="dropdown" id="dropdown">
            <button onclick="modifier()">Modifier</button>
            <button onclick="supprimer()">Supprimer</button>
            <button onclick="statistiques()">Statistiques</button>
        </div>
    </div>
    </div>
    <div class="grid">
      <img src="th.jpg" alt="Logo 2" class="logo">
      <h2>Engie</h2>
      <button class="btn">...</button>
    </div>
    <div class="grid">
      <img src="th.jpg" alt="Logo 3" class="logo">
      <h2>Engie</h2>
      <button class="btn">...</button>
    </div>

    <div class="grid">
      <img src="th.jpg" alt="Logo 2" class="logo">
      <h2>Engie</h2>
      <button class="btn">...</button>
    </div>

    <div class="grid">
      <img src="th.jpg" alt="Logo 2" class="logo">
      <h2>Engie</h2>
      <button class="btn">...</button>
    </div>

    <div class="grid">
      <img src="th.jpg" alt="Logo 4" class="logo">
      <h2>Engie</h2>
      <button class="btn">...</button>
    </div>
  </div>              
</div>
</div>
</div>
  </div>
  <?php include "footer.php"; ?>
</body>

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