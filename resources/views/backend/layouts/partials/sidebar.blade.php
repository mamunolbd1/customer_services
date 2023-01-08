<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    CRM Details
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (Auth::check())
                        @if (auth()->user()->user_type == 'admin')
                        <a class="nav-link" href="{{ route('admin.crm_data') }}">Crm Data</a>
                        @endif
                        @endif
                        <a class="nav-link" href="{{ route('admin.export') }}">Report Download</a>
                    </nav>
                </div>
                @if (Auth::check())
                @if (auth()->user()->user_type == 'admin')
                <a class="nav-link" href="{{ route('admin.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Create User
                </a>
                @endif
                @endif
                @if (Auth::check())
                @if (auth()->user()->user_type == 'admin')
                <a class="nav-link" href="{{ route('admin.userlist') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    User List
                </a>
                @endif
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>