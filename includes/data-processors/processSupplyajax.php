<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

	$_SESSION['supNumber'] = $_POST['selectedItem'];
	$supNum = $_SESSION['supNumber'];

	$sql = "SELECT * FROM inventory JOIN models USING (modelid) WHERE inventoryid ='$supNum'";

    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();

    echo json_encode($row);
?>