<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Add New User</h4>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="dashboard"><i class="icon-home2 position-left"></i> Home</a></li>			
            <li class="active">Add New User</li>
		</ul>
	</div>
</div>
<!-- /page header -->

<!-- Content area -->
				<div class="content">

					<!-- Form validation -->
					<div class="panel panel-flat">
						<div class="panel-body">
                            <?php if ($this->session->flashdata('success_msg')) { ?>
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('success_msg'); ?>
                            </div>
                            <?php } ?>
                            <form class="form-horizontal form-validate-jquery" method="post">
									<div class="form-group">
										<label class="control-label col-lg-3">User Name <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="username" id="username" class="form-control" required="required" placeholder="E.g. hdanarola">
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-3">First Name <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="first_name" id="first_name" class="form-control" required="required" placeholder="John">
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-3">Last Name <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="last_name" id="last_name" class="form-control" required="required" placeholder="Smith">
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-3">Email <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="email" name="email" id="email" class="form-control" id="email" required="required" placeholder="Enter a valid email address">
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-3">Phone No. <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="9898989898">
										</div>
									</div>
                                    <div class="text-right">
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo base_url();?>admin/users'"> <i class="icon-arrow-left13 position-left"></i> Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                            </form>
						</div>
					</div>
					<!-- /form validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/add_user.js"></script>