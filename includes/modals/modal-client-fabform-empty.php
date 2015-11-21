<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<script>
    function addOrder(){
    $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', 
                $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });

}
</script>
<!-- JO Empty Form Modal -->
<div class="modal fade" id="clientfabModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
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
                                <h4 class="modal-title" id="emptyformlabel">Fabrication Form</h4>
                                <hr>
                               
                                <div class="control-group form-group">
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Client Name:</label>
                                                <div class="controls col-xs-8">
                                                    <select style= "Display: none;" class="form-control" id="client" name="client" required>
                                                        <?php
                                                            $sql = "SELECT * from clients where clientid = (SELECT MAX(clientid) as latest from clients)"; 
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while($resultRow = $result->fetch_assoc()){
                                                                    $option = '<option value="' . $resultRow['clientid'] . '">' . 
                                                                        $resultRow['cllastname'] . ", " . $resultRow['clfirstname'] . " " .  $resultRow['clmidinitial'] . '</option>';
                                                                    echo ($option);
                                                                     $option = '<input type="text" class="form-control" id="dateBrought" 
                                                                        name="dateBrought" readonly value="' . $resultRow['cllastname'] . ", " . $resultRow['clfirstname'] . " " .  $resultRow['clmidinitial'] . '">' 
                                                                    . '</input>';
                                                                echo ($option);
                                                                }
                                                            }
                                                        ?>
                                          
                                                    </select> 
                                                </div>
                                    </div>
                                    <hr>
                                    <label class="control-label col-xs-3">Order/s</label><br><br>
                                    <div class="multi-field-wrapper">
                                        <div class="multi-fields">
                                            <div class="multi-field">
                                                <div class="control-group form-group">
                                                    <label class="control-label col-xs-3">Item Description:</label>
                                                        <div class="controls col-xs-8">
                                                            <input type="text" class="form-control" id="item" name="item[]" 
                                                                placeholder="Item name" required>
                                                        </div>
                                                
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label col-xs-3">Length</label>
                                                    <div class="controls col-xs-5">
                                                        <input type="number" id="length" name="length[]" min="1" max="1000" placeholder="in meter">
                                                    </div>
                                                </div>

                                                <div class="control-group form-group">
                                                    <label class="control-label col-xs-3">Price</label>
                                                    <div class="controls col-xs-3">
                                                        <input type="text" class="form-control" id="price" name="price[]" 
                                                                placeholder="Price" required>
                                                    </div>
                                                </div>

                                               
                                                
                                                <button type="button" class="add-field btn btn-default" 
                                                    id="addfield"><i class="fa fa-plus"></i>Add More...</button>
                                                <button type="button" class="remove-field btn btn-default" 
                                                    id="removefield"><i class="fa fa-minus"></i>Remove Field</button>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="multi-field-wrapper">
                                        <div class="multi-fields">
                                            <div class="multi-field">
                                                <div class="control-group form-group">
                                                    <label class="control-label col-xs-3">Machinist:</label>
                                                            <div class="controls col-xs-8">
                                                                <select class="form-control" id="machinist" name="machinist[]" required>
                                                                    <option value="" disabled selected>Choose Machinist:</option>
                                                                    <?php
                                                                        $sql = "SELECT * from employees where emptype = 'Machinist'";
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $option = '<option value="' . $resultRow['employeeid'] . '">' . 
                                                                                    $resultRow['empfirstname'] . " " . $resultRow['emplastname'] . '</option>';
                                                                                echo ($option);
                                                                            }
                                                                        }
                                                                    ?>

                                                                </select> 
                                                            </div>
                                                </div>
                                                <button type="button" class="add-field btn btn-default" 
                                                    id="addfield"><i class="fa fa-plus"></i>Add More...</button>
                                                <button type="button" class="remove-field btn btn-default" 
                                                    id="removefield"><i class="fa fa-minus"></i>Remove Field</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                       <label class="control-label col-xs-3">Date Ordered:</label>
                                        <div class="col-xs-5">
                                            <input type="date" class="form-control" id="dateOrdered" 
                                                name="dateOrdered" required>
                                       </div>
                                    </div>

                                    <div class="control-group form-group">
                                                    <label class="control-label col-xs-3">Downpayment:</label>
                                                    <div class="controls col-xs-5">
                                                        <input type="text" class="form-control" id="downpayment" name="downpayment" 
                                                                placeholder="Downpayment" required>
                                                    </div>
                                    </div>

                                    <div class="control-group form-group">
                                    <label class="control-label col-md-3">Received by:</label>
                                        <div class="controls col-md-4">
                                            <select class="form-control" id="salesperson" 
                                                name="salesperson" required>
                                                <option value="" disabled selected>Select personnel</option>
                                                <?php
                                                    $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS frontdesk from employees where emptype = 'Front Desk Personnel' "; 
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
                                                    $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS manager from employees where emptype = 'Manager' "; 
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

                                </div>
                                                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" 
                    onclick="clearForm()">Clear All</button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>  
                <button type="submit" name="submit" class="btn btn-success" form="fabForm" value="submit">
                    <span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>
            </div>
        </div>
    </div>
</div> 

<!-- JO Empty Form Modal -->