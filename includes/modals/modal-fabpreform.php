<!-- JO Pre Form Modal --> 
<div class="modal fade" id="fabPreFormModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:755px;">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Job Order Form</h4>
            </div>
            <div class="fabPreForm modal-body" id="fabPreFormPrint">
                <div class="row"  id="a">
                    <div class="print col-md-12">
                        <form method="post" action="includes/newjoborder.php" id="preForm">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p>TOP ACE Motor Works Corp., Inc.</p>
                                    <p>369 Magsaysay Avenue, Baguio City * Tel. Nos.: 445-4848; 442-2805</p>
                                    <p>VAT Reg. TIN 000-279-654-000</p>
                                    <p>TEMPORARY JOB ORDER</p>
                                </div>
                            </div>
                            <table id="fabformtable1" class="table table-borderless">
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="2" id="faborderidform">Receipt No.&nbsp;<span id="notBold">___________________</span></td>
                                </tr>
                                <tr>
                                    <td colspan="4" id="fabclnameform">To:&nbsp;<span id="notBold">______________________________________________________________________</span></td>
                                    <td colspan="2" id="fabdatebroughtform">Date:&nbsp;<span id="notBold">_________________________</span></td>
                                </tr>
                                <tr>
                                    <td colspan="6" id="fabcladdressform">Address:&nbsp;<span id="notBold">_______________________________________________________________________________________</span></td>
                                </tr>
                                <tr>
                                    <td colspan="4" id="fabclcontactinfo">Contact number:&nbsp;<span id="notBold">_______________________________________________</span></td>
                                </tr>
                            </table>
                            <table id="fabformtable2" class="table table-bordered">
                                <tr>
                                    <td colspan="9">Fabrication Description</td>
                                    <td colspan="1">Fabrication Price</td> 
                                </tr>

                                <tr id="fabs">
                                    <td colspan="9" id="fabricationorderedname" ></td>
                                    <td colspan="1" id="fabricationorderedprice" ></td>
                                </tr>

                               
                                
                                
                            </table>
                            <div id="tfc" style="border:1px solid white;text-align:right;margin:20px 20px 20px 10px;"></div>
                            <div id="fabadjustments" style="border:1px solid white;text-align:right;margin:20px 20px 20px 10px;"></div>
                            <div id="fabgrandtotal" style="border:1px solid white;text-align:right;margin:20px 20px 20px 10px;"></div>
                            <div id="fabdpayment" style="border:1px solid white;text-align:right;margin:20px 20px 20px 10px;"></div>
                            <div id="fabjobalance" style="border:1px solid white;text-align:right;margin:20px 20px 20px 10px;"></div>

                            <!-- 
                                    <tr>
                                        <td colspan="9" id="srcanditemcost" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="adjustments" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="grandtotal" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="dpayment" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="jobalance" style="border:1px solid white;text-align:right;"></td>
                                    </tr> -->
                                  
              

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="notBold">NOTE:&nbsp;FOR QUOTATION OF JOB ORDER ONLY</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id=""><span id="notBold">(All items not claimed within 30 days after accomplishment shall be forfeited in favor of TOP-ACE MOTOR WORKS CORP., INC)</span></p>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Machinist: <br><br>
                                        <span id="notBold"><p id="fabmachinistform"></p></span>
                                    </td>
                                    <td>Confirmed by: <br><br>
                                        <span id="notBold"><p id="fabconfirmedbyform"></p></span>
                                    </td>
                                    <td>Received by:<br><br>
                                        <span id="notBold"><p id="fabreceivedbyform"></p></span>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="cancelbtn" type="button" data-toggle="modal" class="btn btn-primary" 
                    data-dismiss="modal" onclick="reload();"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>             
                <button type="button" data-toggle="modal" form="joForm" 
                    onclick="printForm('fabPreFormPrint')" class="btn btn-success">
                    <i class="fa fa-print fa-fw"></i> Print</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Pre Form Modal