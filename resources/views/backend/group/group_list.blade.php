@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                @if(\Illuminate\Support\Facades\Auth::user()->can('group.group_add'))
                    <a href="{{route('group.group_add')}}" class="btn btn-inverse-info">Add Group</a>
                @endif
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Group List</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Group Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($group as $key=>$row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $row->group_name }}</td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('group.edit'))
                                                <a href="{{ route('group.edit',$row->id) }}" class="btn btn-inverse-warning"><i data-feather="edit"></i></a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('group.destroy'))
                                            <a href="{{ route('group.destroy',$row->id )}}" class="btn btn-inverse-danger" id="delete"><i data-feather="trash-2"></i></a>
                                            @endif
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
@endsection