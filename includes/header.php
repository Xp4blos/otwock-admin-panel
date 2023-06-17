<header class='header'>
<div class="logo">
      <img src="./img/herb.png" alt="Logo Otwock Alert">
    </div>
    <div class="username">
      <?php
      // Wyświetlenie nazwy użytkownika z sesji
      // Połączenie z bazą danych
    require_once "connect.php";

    $conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);
    $login = $_SESSION['login'];
    $zap = mysqli_query($conn,"SELECT name FROM users WHERE login='$login';");
    while($res = mysqli_fetch_array($zap)){
        $_SESSION['username'] = $res[0];
    }

      echo $_SESSION['username'];
      ?>
    </div>
    <nav class="nav-links">
      <a href="main.php?status=1">Podgląd zdarzeń</a>
      <a href="main.php?status=2">Dodaj zdarzenie</a>
      <a href="logout.php" class="logout">Wyloguj</a>
    </nav>
</header>