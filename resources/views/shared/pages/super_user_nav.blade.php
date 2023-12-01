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

                <li class="nav-header font-weight-bold" id="user_header" >User Management</li>
                <li class="nav-item has-treeview" id="user_settings" >
                    <a href="{{ route('user_management') }}" class="nav-link">
                        <i class="fa-solid fa-users-gear fa-lg"></i>
                        <p >User Settings</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold">Dashboard Management</li>
                <li class="nav-item has-treeview" id="dashboard-energy" >
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fa-solid fa-square-poll-vertical fa-lg"></i>
                        <p> Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="dashboard">
                    <a href="{{ route('status_dashboard') }}" class="nav-link">
                        {{-- <i class="fas fa-charging-station"></i> --}}
                        {{-- <i class="fa-solid fa-toolbox"></i> --}}
                        <i class="fa-solid fa-table-list fa-lg"></i>
                        <p >Die-set Status</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold">Preparation Request</li>
                {{-- <li class="nav-item has-treeview" id="DMR_PQC_ts_Nav">
                    <a href="{{ route('DMR_PQC_TS') }}" class="nav-link">
                        <i class="fa-solid fa-screwdriver-wrench fa-lg"></i>
                        <p>DMR & PQC - TS</p>
                    </a>
                </li> --}}

                <li class="nav-item has-treeview"> <!-- DMR & PQC - TS  -->
                    <a href="{{ route('dmrpqc_ts') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        DMR & PQC - TS
                      </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('ts_prod_identification') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                          <p>Product Identification</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('ts_dieset_condition') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Dieset Condition</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('DMR_PQC_TS') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                          <p>Machine Set-up</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('DMR_PQC_TS') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Product Requirement</p>
                        </a>
                      </li>
                    </ul> --}}
                  </li>

                <li class="nav-item has-treeview" id="DMR_PQC_cn_Nav">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          DMR & PQC - CN
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('DMR_PQC_TS') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                            <p>Product Identification</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('DMR_PQC_TS') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dieset Condition</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('DMR_PQC_TS') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                            <p>Machine Set-up</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('DMR_PQC_TS') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product Requirement</p>
                          </a>
                        </li>
                      </ul>
                </li>

                <li class="nav-header font-weight-bold" id="reports_header" >Reports</li>
                <li class="nav-item has-treeview" id="reportsnav" >
                    <a href="{{ route('reports') }}" class="nav-link">
                    {{-- <i class="fas fa-file-alt fa-lg"></i> --}}
                    <i class="fa-solid fa-file-export fa-lg"></i>
                        <p>Report Settings</p>
                    </a>
                </li>

                {{-- <li class="nav-item has-treeview" id="dashboard-water" >
                    <a href="{{ route('dashboard-water') }}" class="nav-link">
                        <i class="fas fa-tint"></i> &nbsp;
                        <i style="font-size: 15px;" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Water Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="dashboard-ink" >
                    <a href="{{ route('dashboard-ink') }}" class="nav-link">
                        <i class="fas fa-fill-drip"></i>
                        <i style="font-size: 15px;" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Ink Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="dashboard-paper" >
                    <a href="{{ route('dashboard-paper') }}" class="nav-link">
                        <i class="fas fa-file"></i> &nbsp;
                        <i style="font-size: 15px;" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Paper Consumption</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold">Consumption Management</li>
                <li class="nav-item has-treeview" id="energyNav" >
                    <a href="{{ route('energy_consumption') }}" class="nav-link">
                        <i class="fas fa-charging-station"></i> &nbsp;
                        <p>Energy Consumption</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="waternav" >
                    <a href="{{ route('water_consumption') }}" class="nav-link">
                        <i class="fas fa-tint"></i> &nbsp;&nbsp;&nbsp;
                        <p>Water Consumption</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item has-treeview" id="inknav" >
                    <a href="{{ route('ink_consumption') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;
                        <p>Ink Consumption</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item has-treeview" id="inknav_sg" >
                    <a href="{{ route('ink_consumption_sg') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;
                        <p>Ink Consumption - SG</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="inknav_prod" >
                    <a href="{{ route('ink_consumption_prod') }}" class="nav-link">
                    <i class="fas fa-fill-drip"></i> &nbsp;
                        <p>Ink Consumption - PROD</p>
                    </a>
                </li>

                <li class="nav-item has-treeview" id="papernav" >
                    <a href="{{ route('paper_consumption') }}" class="nav-link">
                        <i class="fas fa-file"></i> &nbsp;&nbsp;&nbsp;
                        <p>Paper Consumption - PROD</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold" id="reports_header"  >Report Generation</li>
                <li class="nav-item has-treeview" id="reportsnav"  >
                    <a href="{{ route('reports') }}" class="nav-link">
                    <i style="font-size: 15px;" class="nav-icon fas fa-file-alt"></i>
                        <p>Report Settings</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
    </div><!-- Sidebar -->
</aside>

