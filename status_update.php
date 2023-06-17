<?php
if(isset($_GET['id'])){

    require_once "connect.php";

    $conn = new mysqli($db_adress, $db_user, $db_passwd, $db_name);


    $idStatus = $_GET['id'];

    $status = $_GET['status'];

    echo "event id: ".$idStatus;

    if($status == 1){
        $qrr = mysqli_query($conn,"UPDATE events SET status= 2 WHERE id = ".$idStatus.";");
        echo"<br> From 1 to 2";
    }

    if($status == 2){
        $qrr = mysqli_query($conn,"UPDATE events SET status= 1 WHERE id = ".$idStatus.";");
        echo"<br> From 2 to 1";
    }
    $conn->close();
}

?>
<script type="text/javascript">
    window.location = "main.php?status=1"
    </script>