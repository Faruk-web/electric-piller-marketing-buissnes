<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        <a class="font-w600 text-dual" href="{{route('/')}}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">3i Logistics<span class="font-w400"></span>
            </span>
        </a>
        
        <div>
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll">
        <div class="content-side">
        <ul class="nav-main">
        <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('/')}}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-plane"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Flight Type</span></span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link active bg-light text-dark" href="">
                        <i class="nav-main-link-icon fas fa-money-check text-dark"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Scan</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-id-card-alt"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">All Scanned Passport</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fa fa-file"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Report</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Material Purchase</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('raw.material')}}">
                                <span class="nav-main-link-name">Raw material</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Supplier</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('supplier.index')}}">
                                <span class="nav-main-link-name">Supplier Create</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Purchase</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('purchase.invoice')}}">
                                <span class="nav-main-link-name">Purcharse Invoice</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

