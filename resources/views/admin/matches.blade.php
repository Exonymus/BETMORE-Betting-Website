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
                                                    Game
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Email
                                                                                    : activate to sort column ascending" style="width: 186.051px;">
                                                    Tournament
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Created At
                                                                                    : activate to sort column ascending" style="width: 170.241px;">
                                                    Team1
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Avatar
                                                                                    : activate to sort column ascending" style="width: 227.685px;">
                                                    Team2
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Role
                                                                                    : activate to sort column ascending" style="width: 108.75px;">
                                                    Date
                                                </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Roles
                                                                                    : activate to sort column ascending" style="width: 78.9062px;">
                                                    Results
                                                </th><th class="actions text-right dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 162.997px;">Actions</th></tr>
                                            </thead>
                                            <tbody>
                                            @foreach($matches as $match)
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <div>{{$match->team1->game->name}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{$match->tournament}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{$match->team1->name.' (x'.$match->team1_cef.')'}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{$match->team2->name.' (x'.$match->team2_cef.')'}}</div>
                                                    </td>
                                                    <td>
                                                        <p>{{$match->date.'\n'.$match->time}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{$match->results}}</p>
                                                    </td>
                                                    <td class="no-sort no-click bread-actions">
                                                        <form method="POST" action="{{ route('matches.team1', ['id' => $match->id]) }}" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="voyager-edit"></i> Team1
                                                            </button>
                                                        </form>

                                                        <form method="POST" action="{{ route('matches.team2', ['id' => $match->id]) }}" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="voyager-trash"></i> Team2
                                                            </button>
                                                        </form>

                                                        <form method="POST" action="{{ route('matches.load.id', ['id' => $match->id]) }}" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                                <i class="voyager-trash"></i> Load
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
