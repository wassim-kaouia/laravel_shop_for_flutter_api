<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
              

                <li class="menu-title">Dashboards</li>

                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="bx bxs-briefcase"></i>
                        <span>Roles</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users') }}" class=" waves-effect">
                        <i class="bx bxs-contact"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('products') }}" class=" waves-effect">
                        <i class="bx bxs-t-shirt"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="bx bxs-folder-open"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="bx bxs-dollar-circle"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="bx bxs-car"></i>
                        <span>Shippments</span>
                    </a>
                </li>

                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="bx bxl-mastercard"></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="bx bxs-happy"></i>
                        <span>Reviews</span>
                    </a>
                </li>

                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="bx bxs-purchase-tag"></i>
                        <span>Tags</span>
                    </a>
                </li>

                <li>
                    <a href="chat" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right">New</span>
                        <span>Messages</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Shop Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('units') }}">Units</a></li>
                        <li><a href="ecommerce-product-detail">Cities</a></li>
                        <li><a href="ecommerce-orders">States</a></li>
                        <li><a href="ecommerce-customers">Countries</a></li>
                    </ul>
                </li>

                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->