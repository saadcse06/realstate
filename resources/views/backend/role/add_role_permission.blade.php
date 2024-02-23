@extends('admin.admin_dashboard')
@section('admin')
    <style type="text/css">
        .form-check-label{
            text-transform: capitalize;
        }
    </style>
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
                            <h6 class="card-title">Add Roles In Permission</h6>
                            <form id="perForm" class="forms-sample" method="post"
                                  action="{{route('role.permission.store')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="RolseId" class="form-label">Role Name</label>
                                    <select name="role_id" id="role_id" class="form-select">
                                        <option disabled selected>Select Role</option>
                                        @foreach($roles as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultMain">
                                    <label class="form-check-label" for="checkDefaultMain">
                                        Permission All
                                    </label>
                                </div>
                                <hr>
                                @foreach($permission_group as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkDefault">
                                                <label class="form-check-label" for="checkDefault">
                                                    {{ $group->group_name }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            @php
                                                $permissions = App\Models\User::get_permission_by_group_name($group->group_name);
                                            @endphp
                                            @foreach($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" name="permission[]"
                                                           id="checkDefault{{ $permission->id }}"
                                                           value="{{ $permission->id }}">
                                                    <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <br>
                                        </div>
                                    </div>
                                @endforeach
                                {{--end row--}}
                                <button type="submit" class="btn btn-primary me-2">Save</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
    {{--start checkbox checked by JS--}}
    <script type="text/javascript">
        $('#checkDefaultMain').click(function () {
            if ($(this).is(':checked')) {
              $('input[type=checkbox]').prop('checked',true)
            }else {
              $('input[type=checkbox]').prop('checked',false)
            }
        })
    </script>
    {{--end checkbox checked by JS--}}
@endsection