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
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Main
                </a>
                <a class="nav-link collapsed" href="akash.html" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    CRM Details
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Crm Data</a>
                        <a class="nav-link" href="">Report Download</a>
                    </nav>
                </div>
                {{-- <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-task"></i></div>
                    Services
                </a> --}}
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                    Portfolio
                </a>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    About
                    {{-- {{ route('admin.contact') }}
                    {{ route('admin.about') }}
                    {{ route('admin.portfolio') }}
                    {{ route('admin.service') }} --}}
                </a>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                    Contact
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>