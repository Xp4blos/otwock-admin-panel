<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $kat = $_POST['kat'];
    $opis = $_POST['opis'];
    $cordx = $_POST['cordx'];
    $cordy = $_POST['cordy'];
    $street = $_POST['ulic'];

    echo $name."<br>";
    echo $kat."<br>";
    echo $opis."<br>";
    echo $cordx."<br>";
    echo $cordy."<br>";
    echo $street."<br>";

    require_once "..\connect.php";

    $conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);

    $qrr = mysqli_query($conn,"INSERT INTO events VALUES(NULL, '$name','$opis','$kat',1,'$street','$cordx','$cordy') ;");
    $conn -> close();




}
?>
<script type="text/javascript">
    window.location = "../main.php?status=1"
    </script>
