<body class="sidebar-mini sidebar-collapse skin-yellow-light" style="height: auto;" id="body123">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" style="width: auto;" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button> 
          </div>
        </div>
      </form> -->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        
          <li class="nav-item dropdown mr-2">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
              การแจ้งเตือน <i class="far fa-comments fa-fw"></i>
              <?php if ($numrows != 0) : ?>
              <span class="badge badge-danger navbar-badge"> <?php echo $numrows; ?> </span>
              <?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

              <?php if ($numrows != 0) : ?>
                <?php foreach ($notify as $n) { ?>
                  <a href="#" class="dropdown-item mb-2">
                    <!-- Message Start -->
                    <div class="media">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          <?php echo $n->c_vrno; ?>
                          <span class="float-right text-sm"><sup> <?php echo $n->c_brand; ?> </sup></span>
                        </h3>
                        <p class="text-sm text-danger mt-1 mb-1 d-flex justify-content-between"> <?php echo $n->n_detail; ?> <i class="fa fa-info-circle"></i></p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                <?php } ?>
              <!-- <a href="#" class="dropdown-item dropdown-footer">ดูทั้งหมด</a>-->
              <?php else : ?>
                <div class="dropdown-item" style="cursor: no-drop;">
                  <!-- Message Start -->
                  <div class="media">
                    <div class="media-body">
                      <p class="text-sm text-center"> ไม่มีแจ้งเตือน </p>
                    </div>
                  </div>
                  <!-- Message End -->
                </div>
              <?php endif; ?>
            </div>
          </li>

        <div class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <span class="row">
              <?php echo strtoupper($this->session->userdata('empid')); ?> &nbsp;
              <name class="d-none d-md-block d-lg-block">
                <?php echo $this->session->userdata('fname'); ?>
                <?php echo $this->session->userdata('lname'); ?>
              </name>
            </span>
          </div>
        </div>
        <style>
          #ddd {
            margin: .25rem;
          }
        </style>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu dropdown-menu-right" style="padding: 0; margin:0;">
            <a href="<?php echo base_url('me/profile') ?>" class="dropdown-item">
              <i class="fa fa-user mr-2"></i> ข้อมูลผู้ใช้
            </a>

            <?php if ($this->session->userdata('level') != 'USER') : ?>
              <div class="dropdown-divider" id="ddd"></div>
              <a href="<?php echo site_url('AdminCars/index') ?>" class="dropdown-item">
                <i class="fa fa-plus mr-2"></i> จัดการรถ
              </a>
              <a href="<?php echo base_url('AdminUsers/add_user') ?>" class="dropdown-item">
                <i class="fa fa-user-plus mr-1"></i> จัดการผู้ใช้
              </a>
            <?php endif; ?>
            <a href="<?php echo base_url('Me/report') ?>" class="dropdown-item">
              <i class="fa fa-exclamation-circle mr-2"></i> แจ้งปัญหา
            </a>
            <div class="dropdown-divider" id="ddd"></div>
            <a href="<?php echo site_url('logout') ?>" class="dropdown-item dropdown-footer">
              <i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT
            </a>
          </div>
        </li>
      </ul>
    </nav>