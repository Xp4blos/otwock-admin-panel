<?php
function przemial($id){
require_once "connect.php";
    global $db_adress;
    global $db_user;
    global $db_passwd;
    global $db_name;
$conn = new mysqli( $db_adress, $db_user, $db_passwd, $db_name);
$qrr = mysqli_query($conn,"SELECT nazwa FROM kategorie WHERE id=".$id.";");
while($res = mysqli_fetch_array($qrr))
{
    return $res[0];
}
}
?>