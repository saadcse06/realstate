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
                            <h6 class="card-title">Add Amenity</h6>
                            <form id="amenityForm" class="forms-sample" method="post" action="{{ route('amenity.store')m}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="Amenity Name" class="form-label">Amenity Name</label>
                                    <input type="text" name="amenitis_name" id="amenitis_name" value="{{old('amenitis_name')}}" class="form-control"
                                           autocomplete="off">
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
        $(document).ready(function (){
            $('#amenityForm').validate({
                rules: {
                    amenitis_name: {
                        required : true,
                    },

                },
                messages :{
                    amenitis_name: {
                        required : 'Please Enter Amenity Name',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>
    {{--end form validation by JS--}}
@endsection