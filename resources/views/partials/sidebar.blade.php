    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4 mt-1">Rental Mobil</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item {{ Request::is('/') ? 'active' : '' }}">
                <a href="/">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>
            <!-- master data -->
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Master Data</li>
            
                <li class="sidebar-menu-item {{ Request::is('pelanggan') ? 'active' : '' }}">
                    <a href="/pelanggan">
                        <i class="ri-user-line sidebar-menu-item-icon"></i>
                            Data Pelanggan                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('booking') ? 'active' : '' }}">
                    <a href="/booking">
                        <i class="ri-coins-line sidebar-menu-item-icon"></i>
                            Data Booking                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('merk') ? 'active' : '' }}">
                    <a href="/merk">
                        <i class="ri-stack-line sidebar-menu-item-icon"></i>
                            Data Merk                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('armada') ? 'active' : '' }}">
                    <a href="/armada">
                        <i class="ri-car-line sidebar-menu-item-icon "></i>
                            Data Armada                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('pembayaran') ? 'active' : '' }}">
                    <a href="/pembayaran">
                        <i class="ri-shopping-cart-line sidebar-menu-item-icon"></i>
                            Data Pembayaran                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('booking_armada') ? 'active' : '' }}">
                    <a href="/booking_armada">
                        <i class="ri-bill-line sidebar-menu-item-icon"></i>
                            Data Booking Armada                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
                    </a>
                </li>
            
            <!-- end master -->

            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Custom</li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-user-line sidebar-menu-item-icon"></i>
                    Authentication
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Login
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Registration
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Reset Password
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Change Password
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->