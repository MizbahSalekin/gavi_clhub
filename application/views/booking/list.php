<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-circle-o" aria-hidden="true"></i> Patient Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>booking/add"><i class="fa fa-plus"></i> Add New Patient</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Patient List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>booking/bookingListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Zilla</th>
                        <th>Upazilla</th>
                        <th>Union</th>
                        <th>Ward No.</th>
                        <th>SC Type</th>
                        <th>SP Designation</th>
                        <th>Interview Date</th>
                        <th>SP Name</th>
                        <th>Child Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Description</th>
                        <th>Created On</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($records))
                    {
                        foreach($records as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->zil_Name ?></td>
                        <td><?php echo $record->upz_Name ?></td>
                        <td><?php echo $record->uni_Name ?></td>
                        <td><?php echo $record->war_Name ?></td>
                        <td><?php echo $record->sc_Type ?></td>
                        <td><?php echo $record->sp_d ?></td>
                        <td><?php echo date("d-m-Y", strtotime($record->int_dt)) ?></td>
                        <td><?php echo $record->sp_Name ?></td>
                        <td><?php echo $record->pName ?></td>
                        <td><?php echo $record->fName ?></td>
                        <td><?php echo $record->mName ?></td>
                        <td><?php echo $record->description ?></td>
                        <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'booking/edit/'.$record->pId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger deleteBooking" href="#" data-pId="<?php echo $record->pId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <th>Zilla</th>
                        <th>Upazilla</th>
                        <th>Union</th>
                        <th>Ward</th>
                        <th>SC Type</th>
                        <th>SP Designation</th>
                        <th>Interview Date</th>
                        <th>SP Name</th>
                        <th>Child Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Description</th>
                        <th>Created On</th>
                        <th class="text-center">Actions</th>
                    </tr>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- <h3>Modules <span style="color:red"> "Booking" </span> & <span style="color:red"> "Tasks" </span> created to demonstrate Roles Access.</h3> -->
        </div>
      </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "booking/bookingListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
