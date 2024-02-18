@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Property Type</h6>
                            <form class="forms-sample" method="post" action=" {{route('type.update') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="Typename" class="form-label">Type Name</label>
                                <input type="text" name="type_name" id="type_name" value="{{$types->type_name}}" class="form-control @error('type_name') is-invalid @enderror"
                                           autocomplete="off" required>
                                    @error('type_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="typeIcon" class="form-label">Type Icon</label>
                                    <input type="text" name="type_icon" id="type_icon" value="{{$types->type_icon}}" class="form-control @error('type_icon') is-invalid @enderror"
                                           autocomplete="off" required>
                                    @error('type_icon')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
@endsection