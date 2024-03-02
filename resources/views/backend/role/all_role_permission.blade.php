@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                @if(\Illuminate\Support\Facades\Auth::user()->can('role.add.permission'))
                    <a href="{{route('role.add.permission')}}" class="btn btn-inverse-info">Add Role In Permission</a>
                @endif
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Role Permission</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Role Name</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key=>$row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$row->name }}</td>
                                        <td>
                                            @foreach($row->permissions as $perm)
                                                <span class="badge bg-danger">{{ $perm->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('edit.role.permission'))
                                                <a href="{{ route('edit.role.permission',$row->id) }}"
                                                   class="btn btn-inverse-warning"><i data-feather="edit"></i></a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('destroy.role.permission'))
                                                <a href="{{ route('destroy.role.permission',$row->id )}}"
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