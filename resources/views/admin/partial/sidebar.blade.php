<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Real<span>Estate</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">RealEstate</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="type">
                    <i class="link-icon" data-feather="octagon"></i>
                    <span class="link-title">Property Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="type">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('type.list') }}" class="nav-link">All Property Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('type.add' )}}" class="nav-link">Add Property Type</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#mail" role="button" aria-expanded="false" aria-controls="mail">
                    <i class="link-icon" data-feather="square"></i>
                    <span class="link-title">Amenity</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="mail">
                    <ul class="nav sub-menu" id="submenu">
                        <li class="nav-item">
                            <a href="{{ route('amenity.list' )}}" class="nav-link" >All Amenity</a>
                        </li>
                        <li class="nav-item @if(\Illuminate\Support\Facades\Route::currentRouteName()=='amenity.add') show @endif">
                            <a href="{{ route('amenity.add') }}">Add Amenity</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Roles & Permission</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="false" aria-controls="roles">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Roles & Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="roles">
                    <ul class="nav sub-menu" id="submenu">
                        <li class="nav-item">
                            {{--<a href="{{ route('amenity.add') }}" class="nav-link">All Permission</a>--}}
                        </li>
                        <li class="nav-item">
                            {{--<a href="{{ route('amenity.add') }}" class="nav-link">Add Permission</a>--}}
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu" id="submenu">
                        <li class="nav-item">
                            <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
