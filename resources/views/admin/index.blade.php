@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                                data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date"
                           data-input>
                </div>
                {{--<button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">--}}
                {{--<i class="btn-icon-prepend" data-feather="printer"></i>--}}
                {{--Print--}}
                {{--</button>--}}
                {{--<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">--}}
                {{--<i class="btn-icon-prepend" data-feather="download-cloud"></i>--}}
                {{--Download Report--}}
                {{--</button>--}}
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    @if(\Illuminate\Support\Facades\Auth::user()->can('admin.admin_list'))
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">Total Users</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <a href="{{ route('admin.admin_list') }}"><h3 class="mb-2">{{ $user }}</h3>
                                            </a>
                                        </div>
                                        {{--<div class="col-6 col-md-12 col-xl-7">--}}
                                        {{--<div id="customersChart" class="mt-md-3 mt-xl-0"></div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->can('amenity.amenity_list'))
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">Total Amenity</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <a href="{{ route('amenity.amenity_list') }}"><h3
                                                        class="mb-2">{{ $type }}</h3></a>
                                        </div>
                                        {{--<div class="col-6 col-md-12 col-xl-7">--}}
                                        {{--<div id="ordersChart" class="mt-md-3 mt-xl-0"></div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->can('type.type_list'))
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">Total Property Type</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5">
                                            <a href="{{ route('type.type_list') }}"><h3 class="mb-2">{{ $type }}</h3>
                                            </a>
                                        </div>
                                        {{--<div class="col-6 col-md-12 col-xl-7">--}}
                                        {{--<div id="growthChart" class="mt-md-3 mt-xl-0"></div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div> <!-- row -->

        <div class="row">
            <div class="col-lg-7 col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Monthly Report</h6>
                        </div>
                        <p class="text-muted">Monthly Created Profile.</p>
                        <input type="hidden" value="{{ json_encode(($cntData), true) }}" id="cntData">
                        <input type="hidden" value="{{ json_encode(($dateData), true) }}" id="dateData">
                        <div id="monthlyReportChart"></div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

    </div>


@endsection