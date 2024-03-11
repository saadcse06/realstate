@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                @if(\Illuminate\Support\Facades\Auth::user()->can('admin.admin_add'))
                    <a href="{{route('admin.admin_add')}}" class="btn btn-inverse-info">Add Admin User</a>&nbsp;&nbsp;
                @endif
            </ol>
            <form action=" {{ route('admin.admin_list') }}" method="get">
                @csrf
                <div class="row pb-3">
                    <div class="col-md-2">
                        <label> Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $request->name }}">
                    </div>
                    <div class="col-md-2">
                        <label> Status</label>
                        <select name="status" id="status" class="form-select">
                            <option disabled selected>Select Status</option>
                            <option value="active" @if($request->status=='active') selected @endif>Active</option>
                            <option value="inactive" @if($request->status=='inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label> Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $request->start_date }}">
                    </div>
                    <div class="col-md-2">
                        <label> End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $request->end_date }}">
                    </div>
                    <div class="col-md-1 pt-4">
                        <input type="submit" class="btn btn-primary" value="Filter">
                    </div>
                </div>
            </form>
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
                                    {{--@php dd($row->roles); @endphp--}}
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
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('admin.edit'))
                                                <a href="{{ route('admin.edit',$row->id) }}"
                                                   class="btn btn-inverse-warning"><i data-feather="edit"></i></a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('admin.destroy'))
                                                <a href="{{ route('admin.destroy',$row->id )}}"
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