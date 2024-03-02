@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                @if(\Illuminate\Support\Facades\Auth::user()->can('role.role_add'))
                    <a href="{{route('role.role_add')}}" class="btn btn-inverse-info">Add Role</a>&nbsp;&nbsp;&nbsp;
                @endif
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Role List</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role as $key=>$row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$row->name }}</td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('role.edit'))
                                                <a href="{{ route('role.edit',$row->id) }}"
                                                   class="btn btn-inverse-warning"><i data-feather="edit"></i></a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('role.destroy'))
                                                <a href="{{ route('role.destroy',$row->id )}}"
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