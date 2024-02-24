@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('admin.add')}}" class="btn btn-inverse-info">Add Admin User</a>&nbsp;&nbsp;&nbsp;
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Admin User</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allAdmin as $key=>$row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img src="{{ (!empty($row->photo)) ? url($row->photo) : url('upload/no_image.jpg') }}"
                                                 alt="" style="width: 70px; height: 40px;">
                                        </td>
                                        <td>{{$row->name }}</td>
                                        <td>{{$row->email }}</td>
                                        <td>{{$row->phone }}</td>
                                        <td>
                                            @foreach($row->roles as $role)
                                                <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit',$row->id) }}"
                                               class="btn btn-inverse-warning"><i data-feather="edit"></i></a>
                                            <a href="{{ route('admin.destroy',$row->id )}}"
                                               class="btn btn-inverse-danger" id="delete"><i data-feather="trash-2"></i></a>
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