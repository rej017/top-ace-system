<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
    // Job Order Data
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$_SESSION['joNumber'] = $_POST['selectedID'];
	$num = $_SESSION['joNumber'];
	$sql = "SELECT joborderid,
                fabricationid,
                fabricationdesc, 
                fabricationquantity, 
                datestarted as dateordered, 
                cllastname,
                clfirstname,
                clmidinitial,
                downpayment,
                fabricationprice,
                joprice,
                fabricationstatus from joborders join fabrications using (joborderid) join clients using (clientid) where joborderid = $num";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $results_array=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $row=json_encode( $results_array );

    echo $row;

    // $rs = $conn->query($sql);
    // while($row = $rs->fetch_assoc()){
    //     echo json_encode($row); 
    // }
    // $stmt=$conn->prepare($sql);
    // $stmt->execute();
    // $results_array=$stmt->fetchAll(PDO::FETCH_ASSOC);

    // $row=json_encode( $results_array );

    // echo $row;
    // while ($row = mysql_fetch_assoc($sql)) {
    //             echo "Name:". $row["name"];
    //             echo "Other Data:". $row["otherdata"];
    //             echo "<br>";
    //     }
?>