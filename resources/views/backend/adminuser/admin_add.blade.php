@extends('admin.admin_dashboard')
@section('admin')
    {{--Only for form validation by JS--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{--Only for form validation by JS--}}
    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add Admin User</h6>
                            <form id="perForm" class="forms-sample" method="post" action="{{route('admin.store')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Admin Username</label>
                                    <input type="text" name="username" id="username" value="{{old('username')}}"
                                           class="form-control"
                                           autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Admin Name</label>
                                    <input type="text" name="name" id="name" value="{{old('name')}}"
                                           class="form-control"
                                           autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Admin Email</label>
                                    <input type="email" name="email" id="email" value="{{old('email')}}"
                                           class="form-control"
                                           autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Admin Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{old('phone')}}"
                                           class="form-control"
                                           autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Admin Address</label>
                                    <input type="text" name="address" id="address" value="{{old('address')}}"
                                           class="form-control"
                                           autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Admin Password</label>
                                    <input type="password" name="password" id="password" value="{{old('password')}}"
                                           class="form-control"
                                           autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="roles" class="form-label">Roll Name</label>
                                    <select name="roles" id="roles" class="form-select">
                                        <option disabled selected>Select Role</option>
                                        @foreach($role as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
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
    {{--start form validation by JS--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#perForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Name',
                    },
                    email: {
                        required: 'Please Enter Email',
                    },
                    phone: {
                        required: 'Please Enter Phone',
                    },
                    username: {
                        required: 'Please Enter Username',
                    },
                    password: {
                        required: 'Please Enter Password',
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>
    {{--end form validation by JS--}}
@endsection