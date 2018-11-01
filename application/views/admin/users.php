<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {    
	$('#users-table').DataTable({
		"pageLength" : 5,
        "ajax": {
            url : "<?php echo base_url(); ?>admin/users/get_users",
            type : 'GET'
        },
    });
});
</script>
<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Manage Users</h4>
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
		<div class="panel-heading">							
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

		<table class="table datatable-ajax" id="users-table" >
			<thead>
				<tr>
				<th>User Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				</tr>
			</thead>
		</table>
	</div>
	<!-- /ajax sourced data -->
