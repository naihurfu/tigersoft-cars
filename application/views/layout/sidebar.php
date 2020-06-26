<aside class="main-sidebar layout-fixed sidebar-light-primary elevation-2">

   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
               <a href="<?php echo site_url('Welcome') ?>" class="nav-link">
                  <i class="nav-icon fa fa-home fa-fw"></i>
                  <p>
                     แดชบอร์ด
                  </p>
               </a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
               <a href="<?php echo site_url('Cars/index') ?>" class="nav-link">
                  <i class="fa fa-car nav-icon"></i>
                  <p>บันทึกข้อมูลรถ</p>
               </a>
            </li>
            <li class="nav-item">
               <a href=" <?php echo base_url('CarsWash/index') ?> " class="nav-link">
                  <i class="fa fa-shower nav-icon"></i>
                  <p>ข้อมูลการล้างรถ</p>
               </a>
            </li>
            <li class="nav-item">
               <a href=" <?php echo base_url('Check/index') ?> " class="nav-link">
                  <i class="fa fa-wrench nav-icon"></i>
                  <p>เช็คสภาพรถ</p>
               </a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
               <a href=" <?php echo site_url('History/kmUpdate') ?> " class="nav-link">
                  <i class="fa fa-chart-line nav-icon"></i>
                  <p>ประวัติอัพเดตเลขไมล์</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo site_url('History/taxUpdate') ?>" class="nav-link">
                  <i class="fa fa-calendar-check nav-icon"></i>
                  <p>ประวัติการต่อภาษี</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo site_url('History/insrUpdate') ?>" class="nav-link">
                  <i class="fa fa-shield-alt nav-icon"></i>
                  <p>ประวัติการต่อประกันภัย</p>
               </a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
               <a href="<?php echo site_url('History/acdUpdate') ?>" class="nav-link">
                  <i class="fa fa-car-crash nav-icon"></i>
                  <p>ประวัติอุบัติเหตุและอื่นๆ</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo site_url('History/ticket') ?>" class="nav-link">
                  <i class="fa fa-ticket-alt nav-icon"></i>
                  <p>ประวัติการโดนใบสั่ง</p>
               </a>
            </li>
            <!-- <div class="dropdown-divider"></div>
            <li class="nav-item has-treeview">
               <a href="<?php echo base_url('Spec/view') ?>" class="nav-link">
                  <i class="nav-icon fa fa-laptop fa-fw"></i>
                  <p>
                     ข้อมูลสเปคคอมพิวเตอร์
                  </p>
               </a>
            </li> -->
            <div class="dropdown-divider"></div>
            <li class="nav-item has-treeview">
               <a href="<?php echo base_url('Welcome/contact') ?>" class="nav-link">
                  <i class="nav-icon fa fa-phone fa-fw"></i>
                  <p>
                     เบอร์ติดต่อ
                  </p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="<?php echo base_url('Welcome/news') ?>" class="nav-link">
                  <i class="nav-icon fa fa-comment-alt fa-fw"></i>
                  <p>
                     เกี่ยวกับเว็บไซต์
                  </p>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>