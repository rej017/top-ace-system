<?php
    include '../header.php';
    // Job Order Data
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$_SESSION['joNumber'] = $_POST['selectedID'];
	$num = $_SESSION['joNumber'];

    $sql="SELECT * from itemlogs join inventory using(inventoryid) join models using(modelid) where joborderid = $num";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $results_array=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $row=json_encode( $results_array );

    echo $row;
?>