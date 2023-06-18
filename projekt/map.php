
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Otwock Alert</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="../img/herb.png" type="image/x-icon">
</head>
<body>
  <header class="map-header">
    <img src="../img/herb.png" alt="" class="logo">
    <p>Wybierz lokalizacje</p>
  </header>
  <div id="map"></div>
  <button id="deleteButton" class='map-submit'>Usuń ostatni marker</button>
  <div class="ukrywanie">
  <?php 
   // Sprawdzenie czy wszystkie pola formularza są wypełnione
   if (isset($_POST['kategoria'], $_POST['nazwa'], $_POST['opis']) && !empty($_POST['kategoria']) && !empty($_POST['nazwa']) && !empty($_POST['opis'])) {
       $kategoria = $_POST['kategoria'];
       $nazwa = $_POST['nazwa'];
       $opis = $_POST['opis'];
   
       require_once "..\connect.php";
   
       $conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);
   
       // Sprawdzenie połączenia
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
   
       // Wstawienie danych do tabeli events
      //  $sql = "INSERT INTO events VALUES (NULL,'$nazwa','$opis',$kategoria,1)";
       include "..\mielenie.php";

       
      echo "<br>";
      echo "Kategoria: <p class='kat'>".$kategoria."</p>";
      echo "Nazwa: <p class='nazwa'>".$nazwa."</p>";
      echo "Opis: <p class='opis'>".$opis."</p>";
    }
   ?>
   </div>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
  <script src="js.js"></script>
</body>
</html>
