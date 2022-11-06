<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/<?php echo $pic; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $fname; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group hidden">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="homepage">
                <i class="fa fa-home"></i> <span>Dashboard</span> <i class="pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#" target="_blank">
                <i class="fa fa-gears"></i> <span>Settings</span> <i class="pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Units, Links & Beneficiaries</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="createLinks"> Create Links </a></li>
                <li><a href="viewExecutive"> View Executive Links Details</a></li>
                <li><a href="viewUnits"> View All Units Details </a></li>
                  <li><a href="viewBeneficiary"> View All Beneficiaries Details </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Innovations</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">View Pitches</a></li>
                <li><a href="#"> Approve Funds</a></li>
                <li><a href="#"> View Funds </a></li>
                  <li><a href="#"> View Funded Innovations </a></li>
              </ul>
            </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-money"></i>
                      <span>Fund</span>
                      <i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="approveRegistration">Approve Registration Fee</a></li>
                      <li><a href="#">Set Fund Amount</a></li>
                      <li><a href="#"> Set Registration Fee</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-user"></i>
                      <span>Sub Admin </span>
                      <i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="#"> Create Sub Admin</a></li>
                      <li><a href="#"> View Sub Admin</a></li>
                  </ul>
              </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pencil"></i>
                <span>Edit Pages</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#">  Empowerment </a></li>
                  <li><a href="#">  Innovations </a></li>
               <!-- <li class="active"><a href="#"> View Exam Score </a></li>
               -->
              </ul>
            </li>
            <li class="treeview">
              <a href="logout.php">
                <i class="fa fa-power-off"></i>
                <span>Logout</span>
                </a>
              </li>
              </ul>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>