<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>


<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Manage Users</h4>
		</div>
		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="admin/users/add" class="btn btn-link btn-float has-text"><i class=" icon-plus22 text-primary"></i><span>Add New User</span></a>
			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
			<li class="active">Manage Users</li>
		</ul>
	</div>
</div>
<!-- /page header -->
<div class="content">
<!-- Ajax sourced dat	a -->
<div class="panel panel-flat">
	<table class="table datatable-basic">
		<thead>
			<tr>
				<th style="width:4%">#</th>
				<th>User Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
		</thead>
	</table>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/users.js"></script>
<!-- /ajax sourced data -->
	