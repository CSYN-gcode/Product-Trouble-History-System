<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh">

    <!-- System title and logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('public/images/pricon_logo2.png') }}" alt="OITL" class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light font-size">
            <h5>DMR & PQC</h5>
        </span>
    </a> <!-- System title and logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ url('../RapidX') }}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-left"></i>
                        <p>Return to RapidX</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold">Consumption Management</li>
                <li class="nav-item has-treeview" id="energyNav" style="display: none;">
                    <a href="{{ route('energy_consumption') }}" class="nav-link">
                        <i class="fas fa-charging-station"></i> &nbsp;
                        <p>Energy Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="waternav" style="display: none;">
                    <a href="{{ route('water_consumption') }}" class="nav-link">
                        <i class="fas fa-tint"></i> &nbsp;&nbsp;&nbsp;
                        <p>Water Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('paper_consumption') }}" class="nav-link">
                        <i class="fas fa-file"></i> &nbsp;&nbsp;&nbsp;
                        <p>Paper Consumption - PROD</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="inknav" style="display: none;">
                    <a href="{{ route('ink_consumption') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;&nbsp;&nbsp;
                        <p>Ink Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="reportsnav">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                    <a href="{{ route('reports') }}" class="nav-link">
                    <i class="fas fa-file-chart-line"></i> &nbsp;&nbsp;&nbsp;
                        <p>Reports</p>
                    </a>
                    </a>
                </li>
            </ul>
        </nav>
    </div><!-- Sidebar -->
</aside>
