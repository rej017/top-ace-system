<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
     <script src="js/jo-emptyjoform.js"></script>
    
    <title>Clients</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="pagecontainer">
    <br>
    <div class="container" id="clients">          
        <div class="actionBtns">
            <button type="button" id="newclientbtn" class="btn btn-info" data-toggle="modal" 
                href="#clientModal"><i class="fa fa-plus fa-fw"></i> New Client </button>
            <button style= "Display: none;" type="button" id="addorderbtn" class="btn btn-info" data-toggle="modal" href="#clientjoModal">
                                            <i class="fa fa-plus fa-fw"></i> ADD JOB ORDER </button>
        </div>
        <!-- ClientsTable -->
        <div>
            <table  id="clientsTable" class="table table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="clientid" data-visible="false" data-identifier="true">
                            Client ID</th>
                        <th data-column-id="cllastname">
                            Lastname</th>
                        <th data-column-id="clfirstname">
                            Firstname</th>
                        <th data-column-id="clmidinitial">
                            M.I.</th>
                        <th data-column-id="clgender">
                            Gender</th>
                        <th data-column-id="clcelno">
                            Contact No.</th>
                        <th data-column-id="claddress" data-width="30%">
                            Address</th>
                        <th data-column-id="clsince">
                            Client Since</th>
                    </tr>
                </thead>  
            </table>
        </div>
        <?php include 'includes/modals/modal-client.php'; ?>
        <?php include 'includes/footer.php'; ?>
        <?php 
    include 'includes/modals/modal-client-joform-empty.php';
        ?>
    </div>  
</div>
</body>
    <script>
        window.onload = function(){
            document.getElementById("addorderbtn").click();
        }
    </script>
</html>