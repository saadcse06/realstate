@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('permission.export')}}" class="btn btn-inverse-danger">Download Xlsx</a>
            </ol>
        </nav>
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Import Permission</h6>
                            <form id="perForm" class="forms-sample" method="post" enctype="multipart/form-data" action="{{route('permission.store_import_data')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="PermissionName" class="form-label">Excel File Import </label>
                                        <input input type="file" name="import_file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-inverse-warning">Upload</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
@endsection