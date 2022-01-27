<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Asset_Tracker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Vaishnavi</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Assets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addassettype')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Asset Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listassettype')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Asset Types</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('assetlist')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Assets</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('addasset')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Assets</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              
              
            </a>
          </li>
          


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>