<style type="text/css">
    .label{
        color: #333;
    }
</style>
<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 10-Dec-16
 * Time: 2:17 AM
 */
/*print '<pre>';
print_r($allpersonals);die;*/
?>




<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">



<div class="content-wrapper">
    
    

    <section class="content-header">
        <h1>
            <i class="fa fa-tasks"></i>  <?php if(!empty($page_title)){ echo $page_title;} else {}?>
            
        </h1>

    </section>
    <section class="content">
        <?php if(!empty($this->session->flashdata('message'))){?>
            <div class="col-lg-12 msg-hide">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('message'); ?></strong>
                </div>
            </div>
        <?php } ?>
        <?php  $this->session->unset_userdata('message'); ?>
        <?php if(!empty($this->session->flashdata('error'))){?>
            <div class="col-lg-12 msg-hide">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            </div>
        <?php } ?>
        <?php  $this->session->unset_userdata('error'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">List of All Projects</h3>
                    </div>
                    <div class="box-body">
                        <?php if(empty($allprojects)){

                            ?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data;}else{}?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Project Name';?></th>

                                        <th class="numeric"><?php echo 'Borrower Name';?></th>

                                        <th class="numeric"><?php echo 'Amount Needed';?></th>
                                        <?php if(!empty($p_statusID)){?>
                                        <th class="numeric"><?php echo 'Amount Collected';?></th>
                                         <th class="numeric"><?php echo 'Amount Funded By';?></th>


                                        <th class="numeric"><?php echo 'Status';?></th>
                                    <?php }?>
                                        <?php if(!empty($hide)){

                                        }
                                        else{  ?>


                                        <?php if($allprojects[0]->statusID == 4){?>
                                            <th class="numeric"><?php echo 'Repayment Schedule';?></th>
                                        <?php } else{ ?>
                                        <th class="numeric"><?php echo 'View';?></th>
                                        <?php } } ?>

                                        <th class="numeric"><?php echo 'Edit';?></th>
                                        <?php if(!empty($p_statusID)){?>
                                        <th class="numeric"><?php echo 'Change Status';?></th>
                                        <?php }?>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($allprojects)) {
                                        $i = 1;
                                        foreach ($allprojects as $row) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Project Name'; ?>"
                                                    class="numeric"><?php echo $row->name; ?></td>
                                                <td data-title="<?php echo 'Borrower Name'; ?>"
                                                    class="numeric"><span><?php echo "Borrower Name"; ?></span></td>
                                                <td data-title="<?php echo 'Amount Needed'; ?>"
                                                    class="numeric"><span>$<?php echo $row->neededAmount; ?></span></td>
                                            <?php if(!empty($p_statusID)){?>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    class="numeric"><span>$<?php echo "0.00"; ?></span></td>
                                                <td data-title="<?php echo 'Amount Funded By'; ?>"
                                                    class="numeric"><span><?php echo "Name of founder"; ?></span></td>
                                                <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><span class="label"><?php if(!empty($row->statusID)){ echo getStatusById($row->statusID);}else{ echo 'New';} ?></span></td>
                                            <?php }?>
                                            <?php if(!empty($hide)){

                                            }
                                            else { ?>

                                                <?php if ($allprojects[0]->statusID == 4) { ?>
                                                    <td data-title="<?php echo 'Schedule'; ?>" class="numeric">
                                                        <?php if (!empty($row->repaymentScheduleID)) { ?>
                                                            <a class="btn btn-block btn-primary"
                                                               href="<?php echo base_url('project/Project/paymentschedule/view/' . $row->projectID); ?>">
                                                                View </a>
                                                        <?php } else {
                                                            {
                                                                ?>
                                                                <a class="btn btn-block btn-warning"
                                                                   href="<?php echo base_url('project/Project/paymentschedule/' . $row->projectID); ?>">
                                                                    Create </a>

                                                            <?php }
                                                        } ?>


                                                    </td>
                                                <?php } else { ?>
                                                    <td data-title="<?php echo 'View'; ?>" class="numeric">
                                                        <a class="btn btn-block btn-primary"
                                                           href="<?php echo base_url('project/Project/detail/' . $row->projectID); ?>">
                                                            View </a>
                                                    </td>
                                                <?php }

                                            }?>

                                                <td data-title="<?php echo 'Edit'; ?>" class="numeric">
                                                    <a class="btn btn-block btn-success" href="<?php echo base_url('project/Project/edit/' . $row->projectID); ?>" > Edit </a>
                                                </td>
                                            <?php if(!empty($p_statusID)){?>
                                                <td data-title="<?php echo 'Change Status'; ?>" class="numeric">
                                                    <a class="changeStatus btn btn-block btn-dropbox" data-toggle="modal" href="#myModal" data-id="<?php echo $row->projectID; ?>">Change Status</a> 
                                                </td>
                                            <?php }?>
                                            </tr>
                                            <?php $i++;
                                        }
                                    }else{
                                        echo 'No data Found';
                                    }
?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }?>
                    </div>
                    
                </div>
                
            </div>
        </div>

    </section>
</div>

<div id="lodingState">
    
</div>

<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
     
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-tasks"></i> &nbsp; Update Project Status</h4>
            </div>
            

            <form role="form" name="update_status_frm" method="post" id="update_status_frm" enctype="multipart/form-data" action="#">

                <div class="modal-body">
                    <div class="col-md-12 no-padding" >
                        <section class="panel">
                            <div class="panel-body">
                    <input name="projectID" id="projectID" value="" type="hidden" class="form-control">
                    <input name="statusID" id="statusID" value="" type="hidden" class="form-control">

                        <div class="form-group">
                            <label>Project Name<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <p id="pojectID">
                               
                            </p>
                                
                        </div>

                    

                        <div class="form-group">
                            <label>Status<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <select name="status" id="statusID" class="form-control">
                                <option value="">Status Select</option>
                                <?php
                                    if (is_array($project_status)) {
                                        foreach ($project_status as $project_status) {
                                            $sel = ($project_status->statusID == set_value('statusID'))?'selected="selected"':'';
                                            ?>
                                <option class="stat" data-statas="<?php echo $project_status->statusID; ?>" value="<?php echo $project_status->statusID; ?>" <?php echo $sel;?> ><?php echo $project_status->statusTitle; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>  
                        </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button data-dismiss="modal" class="btn btn-danger btn-lg pull-left" type="button">
                                <i class="fa fa-undo"></i> &nbsp; &nbsp; Cancel</button>
                        </div>
                        <div class="col-md-6">
                            <?php $id = $this->uri->segment('4');?>
                            <button class="btn  btn-success  btn-lg" data-stat="<?php echo $id; ?>" id="loadingStaate" name="loginStatus" type="submit">
                                <i class="fa fa-check"></i> &nbsp; &nbsp; Update</button>

                        </div>
                    </div>

                </div>
                
            </form>
        </div>
    </div>
   
</div>



<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        //var personaltable = document.getElementById("js_personal_table");
        $('#js_personal_table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<script type="text/javascript">
$('.changeStatus').click(function(){
    
    var base_url = '<?php echo base_url() ?>';
   
    var id=$(this).data('id');
    
    $.ajax({
        type: 'POST',
        url: base_url + "project/Project/getStatus/"+id,
        data: id,
        datatype: "json",
        success: function(rsp){
            var repData = JSON.parse(rsp);
            console.log(repData);
            $('#pojectID').html(repData['name']);
            $('#statusID').val(repData['status']);
            $('#projectID').val(repData['projectID']);            
        }
    });       
});

$("#update_status_frm").submit(function(e){
    
    e.preventDefault();
    var $form = $(this);
    var base_url = '<?php echo base_url() ?>';
   
    //var id=$('.stat').data('statas');
    var id = $("#statusID").val();    
    var data = $("#update_status_frm").serialize();
    var statusID = $("#statusID").val();
    // check if the input is valid
    if(! $form.valid()) return false;
    $.ajax({
        type: 'POST',
        url: base_url + "project/Project/updateStatus/",
        data: data,
        //datatype: "json",
        success: function(msg){  console.log(msg);          
            if(msg == 'success'){               
                // show success meessage
                //$('#myModal').attr('aria-hidden', 'true');     
                //$('.close-modal').;  
               
                window.location.href=base_url + "project/Project/all/"+statusID;
                
                
            }else{
                // show error meessage
                window.location.href=base_url + "project/Project/all/";
                 
            }
            //console.log(msg);
//            var repData = JSON.parse(rsp);
//            $('#pojectID').html(repData['name']);
//            $('#statusID').val(repData['status']);
//            $('#projectID').val(repData['projectID']); 
        }
    });  
    
});




</script>

<script type="application/javascript">
    $('#update_status_frm').validate({
        rules: {
            status: {
                required:true,
            }
        },
        messages:{
            status: {
                required: "Status is Required",
            }
        }
    });


</script>

<script type="application/javascript">

setTimeout(function(){$('.msg-hide').fadeOut('slow');}, 3000);

</script>


