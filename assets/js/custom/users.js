/*Display menu page*/
//-- display records in datatable
$(document).ready(function () {
    var table = $('.datatable-basic').dataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;'},
            emptyTable: 'No data currently available.',
        },
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        order: [[1, "asc"]],
        pageLength: 50,
		ajax: 'http://task-management.com/admin/users/get_users',
        columns: [
            {
                data: "sr_no",
                visible: true,
                sortable: false,
            },
            {
                data: "username",
                visible: true,
                sortable: true
            },
            {
                data: "first_name",
                visible: true,
            },
            {
                data: "last_name",
                visible: true,
			},
			{
                data: "email",
                visible: true,
            },
            {
                data: "phone",
                visible: true,
            },
            {
                data: "action",
                visible: true,
                render: function (data, type, full, meta) {
					action = '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="admin/user/edit"><i class="icon-file-pdf"></i> View</a></li><li><a href="#"><i class="icon-file-excel"></i>Edit</a></li><li><a href="#"><i class="icon-file-word"></i> Delete</a></li></ul></li></ul>';
                    return action;
                },
                sortable: false,
            },
        ],
        "fnDrawCallback": function () {
            var info = document.querySelectorAll('.switchery-info');
            $(info).each(function () {
                var switchery = new Switchery(this, {color: '#95e0eb'});
            });
        }
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
	$('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');

});