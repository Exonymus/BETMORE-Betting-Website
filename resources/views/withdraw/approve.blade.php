@extends('layouts.app')

@section('content')
    <div class="page-content browse container-fluid">
        <div class="alerts">
        </div>
        <div class="row">
            <div class="col-md-12" >
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6" ><div class="dataTables_length" id="dataTable_length" ><label>Show <select name="dataTable_length" aria-controls="dataTable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="dataTable" class="table table-hover dataTable no-footer" role="grid" aria-describedby="dataTable_info">
                                            <thead>
                                            <tr role="row"><th class="dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="

                                            " style="width: 30.8239px;">
                                                    <input type="checkbox" class="select_all">
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Name
                                                                                    : activate to sort column ascending" style="width: 79.6023px;">
                                                    Name
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Email
                                                                                    : activate to sort column ascending" style="width: 186.051px;">
                                                    Email
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Created At
                                                                                    : activate to sort column ascending" style="width: 170.241px;">
                                                    Created At
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Avatar
                                                                                    : activate to sort column ascending" style="width: 127.685px;">
                                                    Avatar
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Role
                                                                                    : activate to sort column ascending" style="width: 108.75px;">
                                                    Role
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Roles
                                                                                    : activate to sort column ascending" style="width: 78.9062px;">
                                                    Roles
                                                </th><th class="actions text-right dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 262.997px;">Actions</th></tr>
                                            </thead>
                                            <tbody>

                                            <tr role="row" class="odd">
                                                <td>
                                                    <input type="checkbox" name="row_id" id="checkbox_1" value="1">
                                                </td>
                                                <td>
                                                    <div>Exonymus</div>
                                                </td>
                                                <td>
                                                    <div>sharignat9@gmail.com</div>
                                                </td>
                                                <td>
                                                    2023-10-11 14:56:49
                                                </td>
                                                <td>
                                                    <img src="http://localhost:8000/storage/users/mUy7gVvSLb2be24Ej3NDz1efEKBQTH7jAvn1Wul7.jpg" style="width:100px">
                                                </td>
                                                <td>
                                                    <p>Administrator</p>




                                                </td>
                                                <td>
                                                    <p>No results</p>




                                                </td>
                                                <td class="no-sort no-click bread-actions">
                                                    <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="1" id="delete-1">
                                                        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Delete</span>
                                                    </a>
                                                    <a href="http://127.0.0.1:8000/admin/users/1/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
                                                        <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Edit</span>
                                                    </a>
                                                    <a href="http://127.0.0.1:8000/admin/users/1" title="View" class="btn btn-sm btn-warning pull-right view">
                                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">View</span>
                                                    </a>
                                                </td>
                                            </tr></tbody>
                                        </table></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="dataTable" tabindex="0" id="dataTable_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dataTable" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="dataTable" tabindex="0" id="dataTable_next"><a href="#">Next</a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
