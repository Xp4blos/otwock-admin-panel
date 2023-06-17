<!DOCTYPE html>
<html>
<head>
  <title>Wyświetlanie danych</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-top: 50px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    .status-image {
      max-width: 20px;
      max-height: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Lista danych</h1>
    <table>
      <tr>
        <th>Kategoria</th>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Status</th>
        <th></th>
      </tr>
      <?php
      // Połączenie z bazą danych
      require_once "connect.php";

      $conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);


      // Sprawdzenie połączenia
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Pobranie danych z bazy danych
      $sql = "SELECT events.name, events.des, kategorie.nazwa, events.status, events.id FROM events INNER JOIN kategorie ON kategorie.id = events.kategoria_id ORDER BY status;";
      $result = $conn->query($sql);

      if ($result !== false && $result->num_rows > 0) {
          while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row[2] . "</td>";
              echo "<td>" . $row[0] . "</td>";
              echo "<td>" . $row[1] . "</td>";
              echo "<td>";
              if ($row[3] == 1) {
                  echo '<img class="status-image" src="./img/green.png" alt="Obraz 1">';
              } elseif ($row[3] == 2) {
                  echo '<img class="status-image" src="./img/red.png" alt="Obraz 2">';
              }
              
              echo "</td>";
              echo "<td>";
              echo "<a class='status-edit' href='status_update.php?id=".$row[4]."&status=".$row[3]."'>edit<a/>";
              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4'>Brak danych do wyświetlenia.</td></tr>";
      }

      $conn->close();
      ?>
    </table>
  </div>
</body>
</html>
