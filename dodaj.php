<div class="containerA">
    <h1 class="h1A">Formularz</h1>
    <form action="przetwarzanie_formularza.php" method="post">
      <label class="labelA" for="kategoria">Kategoria:</label>
      <select class="inputens" id="kategoria" name="kategoria">
        <?php
         require_once "connect.php";

         $conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Pobranie opcji z bazy danych
        
        $result = mysqli_query($conn,"SELECT * FROM kategorie;");
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
            }
        

        $conn->close();
        ?>
      </select>

      <label class="labelA" for="nazwa">Nazwa:</label>
      <input class="inputens" type="text" id="nazwa" name="nazwa" required>

      <label class="labelA" for="opis">Opis:</label>
      <input class="inputens" type="text" id="opis" name="opis" required>

      <input class="submit" type="submit" value="Wyślij">
    </form>
  </div>