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
                <li class="nav-item nav-category">RealEState</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="octagon"></i>
                        <span class="link-title">Property Type</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            @if(\Illuminate\Support\Facades\Auth::user()->can('type.type_list'))
                                <li class="nav-item">
                                    <a href="{{ route('type.type_list') }}" class="nav-link">All Property Type</a>
                                </li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->can('type.type_add'))
                                <li class="nav-item">
                                    <a href="{{ route('type.type_add')}}" class="nav-link">Add Property Type</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->can('amenity.menu'))
                <li class="nav-item nav-category">Amenities</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                       aria-controls="uiComponents">
                        <i class="link-icon" data-feather="square"></i>
                        <span class="link-title">Amenity</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiComponents">
                        <ul class="nav sub-menu">
                            @if(\Illuminate\Support\Facades\Auth::user()->can('amenity.amenity_list'))
                                <li class="nav-item">
                                    <a href="{{ route('amenity.amenity_list') }}" class="nav-link">All Amenity</a>
                                </li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->can('amenity.create'))
                                <li class="nav-item">
                                    <a href="{{ route('amenity.create') }}" class="nav-link">Amenity Add</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->can('role.menu'))
                <li class="nav-item nav-category">Roles & Permission</li>
                @if(\Illuminate\Support\Facades\Auth::user()->can('group.menu'))
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false"
                           aria-controls="general-pages">
                            <i class="link-icon" data-feather="anchor"></i>
                            <span class="link-title">Group</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav sub-menu">
                                @if(\Illuminate\Support\Facades\Auth::user()->can('group.group_list'))
                                    <li class="nav-item">
                                        <a href="{{ route('group.group_list') }}" class="nav-link">Group List</a>
                                    </li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->can('group.group_add'))
                                    <li class="nav-item">
                                        <a href="{{ route('group.group_add') }}" class="nav-link">Add Group</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->can('permission.menu'))
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false"
                           aria-controls="authPages">
                            <i class="link-icon" data-feather="feather"></i>
                            <span class="link-title">Permission</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="authPages">
                            <ul class="nav sub-menu">
                                @if(\Illuminate\Support\Facades\Auth::user()->can('permission.permission_list'))
                                    <li class="nav-item">
                                        <a href="{{ route('permission.permission_list') }}" class="nav-link">All Permission</a>
                                    </li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->can('permission.permission_add'))
                                    <li class="nav-item">
                                        <a href="{{ route('permission.permission_add') }}" class="nav-link">Add Permission</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->can('role.menu'))
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false"
                           aria-controls="errorPages">
                            <i class="link-icon" data-feather="activity"></i>
                            <span class="link-title">Role</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="errorPages">
                            <ul class="nav sub-menu">
                                @if(\Illuminate\Support\Facades\Auth::user()->can('role.role_list'))
                                    <li class="nav-item">
                                        <a href="{{ route('role.role_list') }}" class="nav-link">All Role</a>
                                    </li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->can('role.role_add'))
                                    <li class="nav-item">
                                        <a href="{{ route('role.role_add') }}" class="nav-link">Add Role</a>
                                    </li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->can('all.role.permission'))
                                    <li class="nav-item">
                                        <a href="{{ route('all.role.permission') }}" class="nav-link">All Roles In
                                            Permission</a>
                                    </li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->can('role.add.permission'))
                                    <li class="nav-item">
                                        <a href="{{ route('role.add.permission') }}" class="nav-link">Add Roles In
                                            Permission</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->can('admin.menu'))
                <li class="nav-item nav-category">User</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#admins" role="button" aria-expanded="false" aria-controls="admins">
                        <i class="link-icon" data-feather="activity"></i>
                        <span class="link-title">Manage User</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="admins">
                        <ul class="nav sub-menu">
                            @if(\Illuminate\Support\Facades\Auth::user()->can('admin.admin_list'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.admin_list') }}" class="nav-link">All User</a>
                                </li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->can('admin.admin_add'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.admin_add') }}" class="nav-link">Add User</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
        </ul>
    </div>
</nav>
