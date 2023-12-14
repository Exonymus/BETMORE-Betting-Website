@extends('voyager::master')

@section('content')
    <div class="page-content browse container-fluid">
        <div class="alerts">
        </div>
        <div class="row">
            <div class="col-md-12" >
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="dataTable" class="table table-hover dataTable no-footer" role="grid" aria-describedby="dataTable_info">
                                            <thead>
                                            <tr role="row">
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
                                                    Current Balance
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Avatar
                                                                                    : activate to sort column ascending" style="width: 227.685px;">
                                                    Avatar
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Role
                                                                                    : activate to sort column ascending" style="width: 108.75px;">
                                                    Created At
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Roles
                                                                                    : activate to sort column ascending" style="width: 78.9062px;">
                                                    Coins
                                                </th><th class="actions text-right dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 162.997px;">Actions</th></tr>
                                            </thead>
                                            <tbody>
                                            @foreach($withdrawRequests as $withdrawRequest)
                                            <tr role="row" class="odd">
                                                <td>
                                                    <a href="{{route('home.profile', ['id' => $withdrawRequest->user->id])}}">{{$withdrawRequest->user->name}}</a>
                                                </td>
                                                <td>
                                                    <div>{{$withdrawRequest->user->email}}</div>
                                                </td>
                                                <td>
                                                    {{$withdrawRequest->user->coins}}
                                                </td>
                                                <td>
                                                    <img src={{asset('storage/'.$withdrawRequest->user->avatar)}} style="width:100px">
                                                </td>
                                                <td>
                                                    <p>{{$withdrawRequest->created_at}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$withdrawRequest->amount}}</p>
                                                </td>
                                                <td class="no-sort no-click bread-actions">
                                                    <form method="POST" action="{{ route('withdraw.approve.id', ['id' => $withdrawRequest->id]) }}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="voyager-edit"></i> Approve
                                                        </button>
                                                    </form>

                                                    <form method="POST" action="{{ route('withdraw.decline.id', ['id' => $withdrawRequest->id]) }}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="voyager-trash"></i> Decline
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
