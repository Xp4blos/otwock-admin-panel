<div class="containerA">
    <h1 class="h1A">Formularz</h1>
    <form action="./projekt/index.html" method="post">
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
    <?php
// Sprawdzenie czy wszystkie pola formularza są wypełnione
if (isset($_POST['kategoria'], $_POST['nazwa'], $_POST['opis']) && !empty($_POST['kategoria']) && !empty($_POST['nazwa']) && !empty($_POST['opis'])) {
    $kategoria = $_POST['kategoria'];
    $nazwa = $_POST['nazwa'];
    $opis = $_POST['opis'];
    
    setcookie("kategoria",$kategoria,time() + 3600 * 8);

    require_once "connect.php";

    $conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Wstawienie danych do tabeli events
    $sql = "INSERT INTO events VALUES (NULL,'$nazwa','$opis',$kategoria,1)";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='error-message' >Dane zostały zapisane w bazie danych.<p>";
    } else {
        echo "<p class='error-message' >Błąd podczas zapisu danych: <p>" . $conn->error;
    }

    $conn->close();
} else {
    echo "<p class='error-message' >Wszystkie pola formularza muszą być wypełnione.<p>";
}

?>

  </div>