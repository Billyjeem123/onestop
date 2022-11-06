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
                <i class="fa fa-gears"></i> <span>Settings</span> 
                <i class="fa fa-angle-down pull-right"></i>
              </a>
                <ul class="treeview-menu">
                    <li><a href="addContPlan"> Add/Del Contribution Plan </a></li>
                    <li><a href="addContAmount"> Add/Del Contribution Amount</a></li>
                    <li><a href="addContDuration"> Add/Del Contribution Duration</a></li>
                    <li><a href="addContPurpose"> Add/Del Contribution Purpose</a></li>
                    <li><a href="addBankDetails"> Add/Del List of Banks</a></li>
                    <li><a href="addAgentDetails"> Add/Del Agent Details</a></li>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Contributor's Wallet </span>
                <i class="fa fa-angle-down pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="verifyPayment"> Verify Funded Wallet</a></li>
                <li><a href="viewfundedwallet"> View Funded Wallet</a></li>
                <li><a href="verifyBankTransfer"> Verify Bank Transfer Fund</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Contributor's Account </span>
                <i class="fa fa-angle-down pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="viewAccount"> View Profile Account </a></li>
              </ul>
            </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-money"></i>
                      <span>Contributor Loan </span>
                      <i class="fa fa-angle-down pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="#">Loan</a></li>
                      <li><a href="#">Loan</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-money"></i>
                      <span>Dividends </span>
                      <i class="fa fa-angle-down pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="#">Loan</a></li>
                      <li><a href="#">Loan</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-money"></i>
                      <span>Pay Bills </span>
                      <i class="fa fa-angle-down pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="#">Loan</a></li>
                      <li><a href="#">Loan</a></li>
                  </ul>
              </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file"></i>
                <span> Edit Pages </span>
                <i class="fa fa-angle-down pull-right"></i>
              </a>
              <ul class="treeview-menu">
                    <li><a href="addHomepage">Home Page</a></li>
                    <li><a href="addAboutus">Aboutus Page</a></li>
                    <li><a href="addHowitworks">How it Works</a></li>
                    <li><a href="addGetLoan">Get a Loan Page</a></li>
                    <li><a href="addPrivacy">Privacy Policy</a></li>
                    <li><a href="addTerms">General Terms</a></li>
                    <li><a href="addFaq">FAQ'S</a></li>
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