<?php
// Inicjalizacja sesji
session_start();

// Zniszczenie sesji
session_unset();
session_destroy();

// Przekierowanie do strony logowania lub innej strony docelowej po wylogowaniu
header("Location: index.php");
exit();
?>
