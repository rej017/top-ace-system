<!-- ADD Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/addemployee.php" id="addemployeeform">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Last Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="lastname" name="lastname" 
                                                required placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">First Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="firstname" name="firstname" 
                                                required placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Gender:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="" disabled selected>Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Cellphone No.:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="celno" name="celno" 
                                                required placeholder="Cellphone No.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Address:</label>
                                        <div class="col-xs-7">
                                            <textarea rows="2" cols="100" class="form-control" id="address" name="address"
                                            maxlength="150" style="resize:none" placeholder="Address" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Email Address:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="emailad" name="emailad" 
                                                required placeholder="Email Address">
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary" form="addemployeeform" value="submit" 
                    id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- ADD Employee Modal -->


<!-- UPDATE Employee Modal -->
<div class="modal fade" id="updateEmployeeModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Employee Information</h4>
            </div>
            <div class="empUpdate modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/updateemployee.php" id="updateemployeeform">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Last Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="lastname" name="lastname" 
                                                required placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">First Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="firstname" name="firstname" 
                                                required placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Gender:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Cellphone No.:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="celno" name="celno" 
                                                required placeholder="Cellphone No.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Address:</label>
                                        <div class="col-xs-7">
                                            <textarea rows="2" cols="100" class="form-control" id="address" name="address"
                                            maxlength="150" style="resize:none" placeholder="Address" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Email Address:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="emailad" name="emailad" 
                                                required placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Status:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="Active">Active</option>
                                                <option value="On leave">On leave</option>
                                                <option value="Resigned">Resigned</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Number of Jobs:</label>
                                        <div class="col-xs-4">
                                            <input type="number" class="form-control" id="numofjob" name="numofjob" 
                                                required placeholder="">
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary" form="updateemployeeform" value="submit" 
                    id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- UPDATE Employee Modal