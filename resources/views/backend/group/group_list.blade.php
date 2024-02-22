@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('group.add')}}" class="btn btn-inverse-info">Add Group</a>
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
                                            <a href="{{ route('group.edit',$row->id) }}" class="btn btn-inverse-warning">Edit</a>
                                            <a href="{{ route('group.destroy',$row->id )}}" class="btn btn-inverse-danger" id="delete">Delete</a>
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