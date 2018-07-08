
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{url('/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    @can('view_users')
                    <li>
                        <a href="{{route('users.index')}}"><i class="menu-icon fa fa-user"></i>Users</a>
                    </li>
                    @endcan
                    @can('view_roles')
                    <li>
                        <a href="{{route('roles.index')}}"><i class="menu-icon fa fa-image"></i>Roles</a>
                    </li>
                    @endcan
                    {{-- @can('view_permission')
                    <li>
                        <a href="{{route('permissions.index')}}"><i class="menu-icon fa fa-image"></i>Permissions</a>
                    </li>
                    @endcan --}}
                    @can('view_employee')
                    <li>
                        <a href="{{route('employees.index')}}"><i class="menu-icon fa fa-image"></i>Employee</a>
                    </li>
                    @endcan
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Warehouse</a>
                        <ul class="sub-menu children dropdown-menu">
                            @can('view_category')
                            <li>
                                <i class="menu-icon fa fa-cog"></i><a href="{{route('category.index')}}">Category</a>
                            </li>
                            @endcan
                            @can('view_category')
                            <li>
                                <i class="menu-icon fa fa-cog"></i><a href="{{route('size.index')}}">Size</a>
                            </li>
                            @endcan
                            @can('view_product')
                            <li>
                                <i class="menu-icon fa fa-plus-square"></i><a href="{{route('product.index')}}">Store</a>
                            </li>
                            @endcan
                            @can('view_supply')
                            <li>
                                <i class="menu-icon fa fa-plus-square"></i><a href="{{route('supply.index')}}">Supply</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @can('view_leave')
                    <li>
                        <a href="{{route('leave.index')}}"><i class="menu-icon fa fa-plus-square"></i>Leaves</a>
                    </li>
                    @endcan
                    @can('view_salary')
                     <li>
                        <a href="{{route('salary.index')}}"><i class="menu-icon fa fa-plus-square"></i>Salary</a>
                    </li>
                    @endcan
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel