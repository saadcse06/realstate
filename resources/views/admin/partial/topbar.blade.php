<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        {{--<form class="search-form">--}}
            {{--<div class="input-group">--}}
                {{--<div class="input-group-text">--}}
                    {{--<i data-feather="search"></i>--}}
                {{--</div>--}}
                {{--<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">--}}
            {{--</div>--}}
        {{--</form>--}}
        <ul class="navbar-nav">
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--<i data-feather="bell"></i>--}}
                    {{--<div class="indicator">--}}
                        {{--<div class="circle"></div>--}}
                    {{--</div>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">--}}
                    {{--<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
                        {{--<p>6 New Notifications</p>--}}
                        {{--<a href="javascript:;" class="text-muted">Clear all</a>--}}
                    {{--</div>--}}
                    {{--<div class="p-1">--}}
                        {{--<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
                            {{--<div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
                                {{--<i class="icon-sm text-white" data-feather="gift"></i>--}}
                            {{--</div>--}}
                            {{--<div class="flex-grow-1 me-2">--}}
                                {{--<p>New Order Recieved</p>--}}
                                {{--<p class="tx-12 text-muted">30 min ago</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
                        {{--<a href="javascript:;">View all</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
            @php
                $id = Auth::user()->id;
                $data= App\Models\User::find($id);
            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{(!empty($data->photo))? url($data->photo) :url('upload/no_image.jpg')}}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{(!empty($data->photo))? url($data->photo) :url('upload/no_image.jpg')}}" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{$data->name}}</p>
                            <p class="tx-12 text-muted">{{$data->email}}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{route('admin.profile')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{route('admin.change.password')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            {{--<a href="#" onClick='addDarkTheme( "<?= $book->id ?>" )'>Dark Mode</a>--}}
                            <a href="javascript:;" class="text-body ms-0" id="dark-mode" value="1">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Dark Mode</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            {{--<a href="#" onClick='addDarkTheme( "<?= $book->id ?>" )'>Dark Mode</a>--}}
                            <a href="javascript:;" class="text-body ms-0" id="light-mode" value="0">
                                <i class="me-2 icon-md" data-feather="anchor"></i>
                                <span>Light Mode</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{route('admin.logout')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

{{--<script>--}}
    {{--$('#dark-mode').click(function($e){--}}
        {{--$e.preventDefault();--}}
        {{--$.post("/ajax/add-mode", {--}}
            {{--"dark-mode": $(this).data('dark-mode')--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

<script>
    $(function(){
        $('#dark-mode').click(function() {
            $.ajax({
                url: '/ajax/add_mode',
                type: 'GET',
                data: { mode_val: '1' },
                success: function (response) {
                    location.reload();
                },
            });
        });
    });

    $(function(){
        $('#light-mode').click(function() {
            $.ajax({
                url: '/ajax/add_mode',
                type: 'GET',
                data: { mode_val: '0' },
                success: function (response) {
                    location.reload();
                },
            });
        });
    });
</script>
