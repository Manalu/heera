
<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">

<form id="myForm"  method="post"  action="#">
    <div id="foo"></div><?php //print_r($repaymentData);?>
    <input type="hidden" value="<?php echo $repaymentData[0]->projectID; ?>" name="projectsID">
    <input type="hidden" value="<?php echo $repaymentData[0]->borrowerId; ?>" name="borrower_ID">
    <input type="hidden" value="<?php echo $repaymentData[0]->repaymentScheduleID; ?>" name="repaymentScheduleID">
    <input type="hidden" value="<?php echo ($repaymentData[0]->dueAmount != null && $repaymentData[0]->dueAmount != '0.00')?$repaymentData[0]->dueAmount : $repaymentData[0]->repaidAmount;  ?>" name="repaidAmount">

    <div class="row">
        <div class="col-md-12">
            <div class="box-body box-profile no-padding">
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="list-group list-group-unbordered">

                        <li class="list-group-item">
                            <b>Project Name : </b><?php echo $repaymentData[0]->name; ?>

                        </li>
                        <li class="list-group-item">
                            <b>Total Repaid Amount : </b><?php echo ($repaymentData[0]->dueAmount != null && $repaymentData[0]->dueAmount != '0.00')?$repaymentData[0]->dueAmount : $repaymentData[0]->repaidAmount; ?>
                        </li>

                        <li class="list-group-item">
                            <b>Repaid Amount : <input type="number" class="" name="actualRepaidAmount">
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

        </div>
    </div>

    <!--<div class="row">
        <div class="col-md-12">
            <div class="box-body box-profile no-padding">
                <?php /*if(count($alllandersdata)<=0){*/?>
                    <div class="alert alert-info">No Data Found</div>
                <?php /*}else{*/?>
                        <table style="background: #fff;" class="table table-striped table-bordered dataTable bgwhite no-footer" id="js_personal_table">
                            <thead>
                            <tr>
                                <th class="numeric"><?php /*echo 'Lender Name';*/?></th>

                                <th class="numeric"><?php /*echo 'Repaid Amount';*/?></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php /*if(!empty($alllandersdata)) {

                                foreach ($alllandersdata as $row) {
                                    */?>

                                    <input type="hidden" name="lenderID[]" value="<?php /*echo  $row->id; */?>">
                                    <input type="hidden" name="amount[]" value="<?php /*echo  $row->individualRepaidAmount; */?>">
                                    <input type="hidden" name="currentCreditAmount[]" value="<?php /*echo $row->currentCreditAmount; */?>" >
                                    <tr>

                                        <td data-title="<?php /*echo 'Transaction Reason'; */?>"
                                            class="numeric"><?php /*echo $row->first_name; */?></td>

                                        <td data-title="<?php /*echo 'Amount in'; */?>"
                                            class="numeric">$<?php /*echo $row->individualRepaidAmount; */?></td>



                                    </tr>
                                    <?php
/*                                }
                            }*/?>
                            </tbody>
                        </table>

                <?php /*}*/?>
            </div>
        </div>
    </div>-->

    <div class="modal-footer">
        <div class="row">
            <div class="col-md-6">
                <button data-dismiss="modal" class="btn btn-danger btn-lg pull-left" type="button">
                    <i class="fa fa-undo"></i> &nbsp; &nbsp; Cancel</button>
            </div>
            <div class="col-md-6">
                <button id="getrepayment"   class="btn  btn-success  btn-lg" id="submitbutton" name="loginStatus" type="submit">
                    <i class="fa fa-check"></i> &nbsp; Repaid Now</button>

            </div>
        </div>

    </div>
</form>



<script>
    $(function(){
        $("#getrepayment").click(function(e){
            var base_url = '<?php echo base_url() ?>';


            $.ajax({
                url:base_url + "repaymentprocess/finalrepayment/",
                type: 'POST',
                data: $("#myForm").serialize(),
                success: function (msg) {

                    if(msg == 'success') {
                        // show success meessage
                        var msg = "<div class='alert alert-success'>Your Repaid Successfully.  </div>";
                        $('#foo').html(msg);
                    }
                    else if(msg == 'condition'){
                        var conmsg = "<div class='alert alert-warning'>Actual Repaid amonut shuld be equal or less then calculated repaid amount</div>";
                        $('#foo').html(conmsg);

                    }
                    else {
                        var errmsg = "<div class='alert alert-danger'>Repayment Error  </div>";
                        $('#foo').html(errmsg);
                    }
                },

            });
            e.preventDefault();
        });
    });
</script>
