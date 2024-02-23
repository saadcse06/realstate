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
            <li class="nav-item nav-category">Property</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="property">
                    <i class="link-icon" data-feather="octagon"></i>
                    <span class="link-title">Property Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="property">
                    <ul class="nav sub-menu" >
                        <li class="nav-item">
                            <a href="{{ route('type.list') }}" class="nav-link">All Property Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('type.add' )}}" class="nav-link">Add Property Type</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Amenity</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#amenity" role="button" aria-expanded="false" aria-controls="amenity">
                    <i class="link-icon" data-feather="square"></i>
                    <span class="link-title">Amenity</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="amenity">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('amenity.list' )}}" class="nav-link" >All Amenity</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('amenity.add' )}}" class="nav-link" >Add Amenity</a>
                        </li>
                    </ul>
                </div>
            </li>

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
                <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="false" aria-controls="roles">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="roles">
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
                            <a href="{{ route('role.add.permission') }}" class="nav-link">Add Roles in Permission</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
