@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('type.add')}}" class="btn btn-inverse-info">Add Property Type</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property Type List</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Type Icon</th>
                                    <th>Type Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->type_icon}}</td>
                                    <td>{{$row->type_name}}</td>
                                    <td>
                                        <a href="{{ route('type.edit',$row->id) }}" class="btn btn-inverse-warning">Edit</a>
                                        <a href="{{ route('type.destroy',$row->id )}}" class="btn btn-inverse-danger">Delete</a>
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