<!DOCTYPE html>
<html>
<head>
  <title>Otwock Alert - Logowanie</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
    }

    h1 {
      text-align: center;
    }

    img {
      display: block;
      margin: 0 auto;
      width: 100px;
      height: 100px;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 95%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #FFD700;
      border: none;
      color: black ;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #ccac00;
    }

    .error-message {
      color: red;
      margin-bottom: 10px;
      text-align:center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Otwock Alert</h1>
    <img src="./img/logo.svg" alt="Logo Otwock Alert">
    <form action="./index.php" method="post">
      <input type="text" name="login" placeholder="Login" required>
      <input type="password" name="password" placeholder="Hasło" required>
      <div class="error-message" id="error-message"></div>
      <input type="submit" name='submit' value="Zaloguj się">
    </form>
    <?php
if(isset($_POST['submit']))
{

// Połączenie z bazą danych
require_once "connect.php";

$conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pobranie danych z formularza
$login = $_POST['login'];
$password = $_POST['password'];
// Zabezpieczenie przed atakami typu SQL injection
$login = mysqli_real_escape_string($conn, $login);
$password = mysqli_real_escape_string($conn, $password);

// Pobranie hasła z bazy danych dla podanego loginu
$sql = "SELECT password FROM users WHERE login='$login'";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPasswordHash = $row['password'];

    // Porównanie hasła z bazą danych
    if (password_verify($password, $storedPasswordHash)) {
        // Poprawne logowanie
        session_start();
        $_SESSION['login'] = $login;
        header("Location: main.php");
        exit();
    } else {
        // Nieprawidłowe hasło
        echo " <p class='error-message'>Nieprawidłowe hasło. </p>";
    }
} else {
    // Nieprawidłowy login
    echo "<p class='error-message'>Nieprawidłowy login.</p>";
}

$conn->close();
}
?>

  </div>
</body>
</html>