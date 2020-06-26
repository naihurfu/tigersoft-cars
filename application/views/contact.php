<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark"><i class="fa fa-phone"></i> เบอร์ติดต่อ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"> <a href="<?php echo base_url('Welcome') ?>">แดชบอร์ด</a> </li>
                  <li class="breadcrumb-item active"> เบอร์ติดต่อ </li>
               </ol>
            </div>
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <!-- /.col -->
            <?php foreach ($data as $c) { ?>
            <div class="d-flex flex-row">
               <div class="card mr-3" style="width: 310px;">
                  <div class="card-header p-2">
                     <ul class="nav nav-pills text-center text-bold">
                        <li class="nav-item col-12"> <i class="fa fa-truck" aria-hidden="true"></i>
                           <?php echo $c->title ;?></li>
                     </ul>
                  </div>

                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="card-content">
                        <!-- Post -->
                        <div class="post col">
                           <!-- /.user-block -->
                           <p class="text-left">
                              <?php if (!empty($c->detail)): ?>
                              <i class="fa fa-map-marker" aria-hidden="true"></i>
                              <?php echo $c->detail; ?>
                              <div class="dropdown-divider"></div>
                              <?php endif; ?>

                              <i class="fa fa-angle-right"> </i>
                              <a href="tel:<?php echo $c->tel1;?>">
                                 <span class="badge bg-success"> <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                                    <?php echo $c->tel1;?>
                                 </span>
                              </a>

                              <?php if(empty($c->tel2)) : ?>
                              <br>
                              <?php endif; ?>

                              <?php if (!empty($c->tel2)): ?>
                              <br>
                              <i class="fa fa-angle-right"> </i>
                              <a href="tel:<?php echo $c->tel2;?>">
                                 <span class="badge bg-success"> <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                                    <?php echo $c->tel2;?>
                                 </span>
                              </a>
                              <?php endif; ?>
                              <?php if (!empty($c->tel3)): ?>
                              <br>
                              <i class="fa fa-angle-right"> </i>
                              <a href="tel:<?php echo $c->tel2;?>">
                                 <span class="badge bg-success"> <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                                    <?php echo $c->tel3;?>
                                 </span>
                              </a>
                              <?php endif; ?>
                              <br>
                           </p>
                           <?php if (!empty($c->linkLocation)): ?>
                           <a href="<?php echo $c->linkLocation;?>" target="_blank"
                              class="btn btn-sm btn-primary btn-block"> <i class="fas fa-map-marked "></i>
                              Location</a>
                           <?php endif; ?>
                        </div>
                     </div>
                     <!-- /.tab-content -->
                  </div>
                  <!-- /.card-body -->

               </div>
               <!-- /.nav-tabs-custom -->
            </div>
            <?php } ?>
         </div>
         <!-- /.row -->
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->