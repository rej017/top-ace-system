<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<script src="js/jo-emptyfabform.js">      
</script>
<!-- JO Empty Form Modal -->
<div class="modal fade" id="fabModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Fabrication Order</h4>
            </div>
            <div class="fabEmpty modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/newfaborder.php" 
                                id="fabForm">
                                <h4 class="modal-title text-center" id="emptyformlabel">Fabrication Form</h4>
                                <hr>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Client Name:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="client" name="client" required>
                                            <option value="" disabled selected>Select client</option>
                                            <?php
                                                $sql = "SELECT * from clients ORDER BY cllastname ASC";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['clientid'] . '">' . 
                                                            $resultRow['cllastname'] . ", " . $resultRow['clfirstname'] . " " .  $resultRow['clmidinitial'] . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>

                                        </select> 
                                    </div>
                                     <button onclick="myFunction2()" type="button" id="newclientbtn" class="btn btn-info" data-toggle="modal"
                                        href="#clientfabricationModal"><i class="fa fa-plus fa-fw"></i> New Client </button>
                                    <button style= "Display: none;" type="button" id="hidebtn2" class="btn btn-info" data-dismiss="modal">
                                        <i class="fa fa-plus fa-fw"></i> HIDE </button>
                                </div>
                                <hr>
                                <div class="control-group form-group" style="margin-bottom: -10px;">
                                    <label class="control-label col-md-3">Order/s</label>
                                    <div class="controls col-md-4">
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                            <br>
                                            <div class="control-group form-group">
                                                <label class="control-label col-md-3">Item Description:</label>
                                                    <div class="controls col-md-4">
                                                        <input type="text" class="form-control" id="item" name="item[]" 
                                                            placeholder="Item name" required>
                                                    </div>
                                            </div>
                                            <div class="control-group form-group">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="controls col-md-4">
                                                        <select class="form-control" id="metal" name="metal[]" required>
                                                            <option value="" disabled selected>Select metal</option>
                                                            <?php
                                                                $sql = "SELECT * from inventoryfabrication order by itemname";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($resultRow = $result->fetch_assoc()){
                                                                        $option = '<option value="' . $resultRow['itemid'] . '">' . 
                                                                            $resultRow['itemname'] .'</option>';
                                                                        echo ($option);
                                                                    }
                                                                }
                                                            ?>
                                                        </select> 
                                                    </div>
                                                    <div class="controls col-md-4">
                                                        <select class="form-control" id="metaldiameter" name="metaldiameter[]" required>
                                                            <option value="" disabled selected>Select diameter size</option>
                                                            <?php
                                                                $sql = "SELECT * from precutmetal order by precutitemdiamconverted;";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($resultRow = $result->fetch_assoc()){
                                                                        $option = '<option value="' . $resultRow['precutmetalid'] . '">' . 
                                                                            $resultRow['precutitemdiam'] . " " . $resultRow['precutitemdiamul'] .'</option>';
                                                                        echo ($option);
                                                                    }
                                                                }
                                                            ?>
                                                        </select> 
                                                    </div>
                                            </div>
                                            <div class="control-group form-group">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="controls col-md-4">
                                                    <input type="text" class="form-control" id="metallength" name="metallength[]" 
                                                                placeholder="Input length" required>   
                                                        
                                                    </div>
                                                    <div class="controls col-md-4">
                                                    <select class="form-control" id="metallengthul" name="metallengthul[]" required>
                                                                    <option value="" disabled selected>Unit of length</option>
                                                                    <?php
                                                                        $sql = "SELECT DISTINCT precutmetalid, precutitemlengthul from precutmetal where precutitemlengthul != '' group by 2";
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $option = '<option value="' . $resultRow['precutmetalid'] . '">' . 
                                                                                    $resultRow['precutitemlengthul'] .'</option>';
                                                                                echo ($option);
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                    </div>
                                            </div>
                                            <div class="control-group form-group">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="controls col-md-4">
                                                    <input type="text" class="form-control" id="price" name="price[]" 
                                                            placeholder="Price" required>
                                                    </div>
                                            </div>
<!--                                                     <div class="controls col-md-2">
                                                        <button type="button" class="add-field btn btn-default" 
                                                            id="addfield"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="remove-field btn btn-default" 
                                                            id="removefield"><i class="fa fa-minus"></i></button>
                                                    </div> -->
                                        

                                            <div class="col-md-1 col-md-offset-3" style="margin: 0 0 0 143px"></div> 
                                            <button type="button" class="pull-left add-field btn btn-default addButtonFab" >
                                                <i class="fa fa-plus"></i>
                                             </button>
                                            <!-- <button type="button" class="remove-field btn btn-default" 
                                                id="removefield"><i class="fa fa-minus"></i></button> -->


                                            <!-- <div class="control-group form-group">
                                                <label class="control-label col-md-3">Length</label>
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="control-label col-md-3">Price</label>
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="control-label col-md-3"></label>
                                            </div> -->
                              
                                </div>

                                <div class="control-group form-group hide" id="optionTemplatefab">
                                            <br>
                                            <div class="control-group form-group">
                                                <label class="control-label col-md-3">Item Description:</label>
                                                    <div class="controls col-md-4">
                                                        <input type="text" class="form-control" id="item" name="item[]" 
                                                            placeholder="Item name">
                                                    </div>
                                            </div>
                                            <div class="control-group form-group">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="controls col-md-4">
                                                        <select class="form-control" id="metal" name="metal[]">
                                                            <option value="" disabled selected>Select metal</option>
                                                            <?php
                                                                $sql = "SELECT * from inventoryfabrication order by itemname";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($resultRow = $result->fetch_assoc()){
                                                                        $option = '<option value="' . $resultRow['itemid'] . '">' . 
                                                                            $resultRow['itemname'] .'</option>';
                                                                        echo ($option);
                                                                    }
                                                                }
                                                            ?>
                                                        </select> 
                                                    </div>
                                                    <div class="controls col-md-4">
                                                        <select class="form-control" id="metaldiameter" name="metaldiameter[]">
                                                            <option value="" disabled selected>Select diameter size</option>
                                                            <?php
                                                                $sql = "SELECT * from precutmetal order by precutitemdiamconverted;";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($resultRow = $result->fetch_assoc()){
                                                                        $option = '<option value="' . $resultRow['precutmetalid'] . '">' . 
                                                                            $resultRow['precutitemdiam'] . " " . $resultRow['precutitemdiamul'] .'</option>';
                                                                        echo ($option);
                                                                    }
                                                                }
                                                            ?>
                                                        </select> 
                                                    </div>
                                            </div>
                                            <div class="control-group form-group">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="controls col-md-4">
                                                    <input type="text" class="form-control" id="metallength" name="metallength[]" 
                                                                placeholder="Input length">   
                                                        
                                                    </div>
                                                    <div class="controls col-md-4">
                                                    <select class="form-control" id="metallengthul" name="metallengthul[]">
                                                                    <option value="" disabled selected>Unit of length</option>
                                                                    <?php
                                                                        $sql = "SELECT DISTINCT precutmetalid, precutitemlengthul from precutmetal where precutitemlengthul != '' group by 2";
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $option = '<option value="' . $resultRow['precutmetalid'] . '">' . 
                                                                                    $resultRow['precutitemlengthul'] .'</option>';
                                                                                echo ($option);
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                    </div>
                                            </div>
                                            <div class="control-group form-group">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="controls col-md-4">
                                                    <input type="text" class="form-control" id="price" name="price[]" 
                                                            placeholder="Price">
                                                    </div>
                                            </div>
<!--                                                     <div class="controls col-md-2">
                                                        <button type="button" class="add-field btn btn-default" 
                                                            id="addfield"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="remove-field btn btn-default" 
                                                            id="removefield"><i class="fa fa-minus"></i></button>
                                                    </div> -->
                                        

                                            <div class="col-md-1 col-md-offset-3" style="margin: 0 0 0 143px"></div> 
                                            <button type="button" class="pull-left remove-field btn btn-default removeButtonFab">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <!-- <button type="button" class="remove-field btn btn-default" 
                                                id="removefield"><i class="fa fa-minus"></i></button> -->


                                            <!-- <div class="control-group form-group">
                                                <label class="control-label col-md-3">Length</label>
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="control-label col-md-3">Price</label>
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="control-label col-md-3"></label>
                                            </div> -->
                              
                                </div>
                                <hr>
                                <div class="control-group form-group">
                                            <br>
                                            <div class="control-group form-group">
                                                <label class="control-label col-md-3">Machinist:</label>
                                                <div class="controls col-md-5">
                                                    <select class="form-control" id="machinist" name="machinist[]" required>
                                                        <option value="" disabled selected>Choose Machinist:</option>
                                                        <?php
                                                            $sql = "SELECT * from employees where emptype = 'Machinist' AND empstatus = 'Active' order by emplastname";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while($resultRow = $result->fetch_assoc()){
                                                                    $option = '<option value="' . $resultRow['employeeid'] . '">' . 
                                                                        $resultRow['emplastname'] . " " . $resultRow['empfirstname'] . '</option>';
                                                                    echo ($option);
                                                                }
                                                            }
                                                        ?>

                                                    </select> 
                                                </div>
<!--                                                  <div class="controls col-md-2">
                                                    <button type="button" class="add-field btn btn-default" 
                                                        id="addfield"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="remove-field btn btn-default" 
                                                        id="removefield"><i class="fa fa-minus"></i></button>
                                                </div> -->
                                            </div> 
                                            <div class="col-md-1 col-md-offset-3" style="margin: 0 0 0 143px"></div>
                                             <button type="button" class="pull-left add-field btn btn-default addButtonFabMach" >
                                                <i class="fa fa-plus"></i>
                                          <!--   <button type="button" class="remove-field btn btn-default" 
                                                id="removefield"><i class="fa fa-minus"></i></button> -->
                                </div>

                                <div class="control-group form-group hide" id="optionTemplateFabMachinist">
                                            <br>
                                            <div class="control-group form-group">
                                                <div class="control-label col-md-3"></div>
                                                <div class="controls col-md-5">
                                                    <select class="form-control" id="machinist" name="machinist[]">
                                                        <option value="" disabled selected>Choose Machinist:</option>
                                                        <?php
                                                            $sql = "SELECT * from employees where emptype = 'Machinist' AND empstatus = 'Active' order by emplastname";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while($resultRow = $result->fetch_assoc()){
                                                                    $option = '<option value="' . $resultRow['employeeid'] . '">' . 
                                                                        $resultRow['emplastname'] . " " . $resultRow['empfirstname'] . '</option>';
                                                                    echo ($option);
                                                                }
                                                            }
                                                        ?>

                                                    </select> 
                                                </div>
<!--                                                  <div class="controls col-md-2">
                                                    <button type="button" class="add-field btn btn-default" 
                                                        id="addfield"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="remove-field btn btn-default" 
                                                        id="removefield"><i class="fa fa-minus"></i></button>
                                                </div> -->
                                            </div> 
                                            <div class="col-md-1 col-md-offset-3" style="margin: 0 0 0 143px"></div>
                                            <button type="button" class="pull-left remove-field btn btn-default removeButtonFabMach">
                                            <i class="fa fa-minus"></i>
                                          <!--   <button type="button" class="remove-field btn btn-default" 
                                                id="removefield"><i class="fa fa-minus"></i></button> -->
                                </div>

                                <hr>
                                <div class="form-group">
                                   <label class="control-label col-md-3">Date Ordered:</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" id="dateOrdered" 
                                            name="dateOrdered" required>
                                   </div>
                                </div>
                                <div class="control-group form-group">
                                                <label class="control-label col-md-3">Downpayment:</label>
                                                <div class="controls col-md-4">
                                                    <input type="text" class="form-control" id="downpayment" name="downpayment" 
                                                            placeholder="Downpayment" required>
                                                </div>
                                </div>
                                <hr>
                                <div class="control-group form-group">
                                <label class="control-label col-md-3">Received by:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="salesperson" 
                                            name="salesperson" required>
                                            <option value="" disabled selected>Select personnel</option>
                                            <?php
                                                $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS frontdesk from employees where emptype = 'Front Desk Personnel' AND empstatus = 'Active' order by 2"; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['frontdesk'] . '">' . 
                                                            $resultRow['frontdesk'] . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Confirmed by:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="supervisor" 
                                            name="supervisor" required>
                                            <option value="" disabled selected>Select supervisor</option>
                                            <?php
                                                $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS manager from employees where emptype = 'Manager' AND empstatus = 'Active' order by 2"; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['manager'] . '">' . 
                                                            $resultRow['manager']. '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>  
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-3">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>  
                                        <button type="submit" name="submit" class="btn btn-success" form="fabForm" value="submit">
                                            <span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>
                                    </div> 
                                </div>                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" 
                    onclick="clearForm()">Clear All</button>  
            </div>
        </div>
    </div>
</div> 

<!-- JO Empty Form Modal -->

<?php 
    include 'modal-client-fabrication.php';
?>