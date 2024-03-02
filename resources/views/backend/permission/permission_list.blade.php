@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                @if(\Illuminate\Support\Facades\Auth::user()->can('permission.permission_add'))
                <a href="{{route('permission.permission_add')}}" class="btn btn-inverse-info">Add Permission</a>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->can('permission.import'))    &nbsp;
                <a href="{{route('permission.import')}}" class="btn btn-inverse-warning">Import</a>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->can('permission.export'))
                <a href="{{route('permission.export')}}" class="btn btn-inverse-danger">Export</a>
                @endif
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Permission List</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Permission Name</th>
                                    <th>Group Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permision as $key=>$row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$row->name }}</td>
                                        <td>{{$row->group_name  }}</td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('permission.edit'))
                                            <a href="{{ route('permission.edit',$row->id) }}"
                                               class="btn btn-inverse-warning"><i data-feather="edit"></i></a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('permission.destroy'))
                                            <a href="{{ route('permission.destroy',$row->id )}}"
                                               class="btn btn-inverse-danger" id="delete"><i data-feather="trash-2"></i></a>
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