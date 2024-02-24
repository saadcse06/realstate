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
            <li class="nav-item nav-category">RealEstate</li>
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->can('type.menu'))
            <li class="nav-item nav-category">Property</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="property">
                    <i class="link-icon" data-feather="octagon"></i>
                    <span class="link-title">Property Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="property">
                    <ul class="nav sub-menu" >
                        @if(\Illuminate\Support\Facades\Auth::user()->can('type.list'))
                        <li class="nav-item">
                            <a href="{{ route('type.list') }}" class="nav-link">All Property Type</a>
                        </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->can('type.add'))
                        <li class="nav-item">
                            <a href="{{ route('type.add' )}}" class="nav-link">Add Property Type</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->can('amenity.menu'))
            <li class="nav-item nav-category">Amenity</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#amenity" role="button" aria-expanded="false" aria-controls="amenity">
                    <i class="link-icon" data-feather="square"></i>
                    <span class="link-title">Amenity</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="amenity">
                    <ul class="nav sub-menu">
                        @if(\Illuminate\Support\Facades\Auth::user()->can('amenity.list'))
                        <li class="nav-item">
                            <a href="{{ route('amenity.list' )}}" class="nav-link" >All Amenity</a>
                        </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->can('amenity.add'))
                        <li class="nav-item">
                            <a href="{{ route('amenity.add' )}}" class="nav-link" >Add Amenity</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif

            <li class="nav-item nav-category">Roles & Permission</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Group</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('group.list') }}" class="nav-link">Group List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('group.add') }}" class="nav-link">Add Group</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#permissions" role="button" aria-expanded="false" aria-controls="permissions">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="permissions">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('permission.list') }}" class="nav-link">All Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permission.add') }}" class="nav-link">Add Permission</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="false" aria-controls="roles">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Role</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="roles">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('role.list') }}" class="nav-link">All Role</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role.add') }}" class="nav-link">Add Role</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.role.permission') }}" class="nav-link">All Roles In Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role.add.permission') }}" class="nav-link">Add Roles In Permission</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#admins" role="button" aria-expanded="false" aria-controls="admins">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Manage Admin User</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="admins">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.list') }}" class="nav-link">All Admin User</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.add') }}" class="nav-link">Add Admin User</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
