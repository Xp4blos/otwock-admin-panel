<?php
 header("Access-Control-Allow-Origin: *");
if(isset($_GET['r']))
{
$req = $_GET['r'];

if($req == 1)
$conn = new mysqli("127.0.0.1:3306", "root", "", "otwock");
$stmt = $conn->prepare("SELECT events.name, events.des, kategorie.nazwa FROM events INNER JOIN kategorie ON kategorie.id = events.kategoria_id WHERE events.status = 1");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
}
?>