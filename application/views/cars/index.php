<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark ml-3"><i class="fa fa-car ml-2 mr-2" aria-hidden="true"></i> บันทึกข้อมูลรถ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome') ?>">แดชบอร์ด</a></li>
                  <li class="breadcrumb-item active">บันทึกข้อมูลรถ</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
               <?php foreach ($query as $c) { ?>
               <div class="card card-widget widget-user mx-auto">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header" style="background-color: #ebedeb;">
                     <p class="widget-user-desc text-left" style="font-size: 12px;"><?php echo $c->c_brand; ?></p>
                     <h1 class="widget-user-username text-center" style="font-size: 30px;"><?php echo $c->c_vrno; ?>
                     </h1>
                  </div>
                  <div class="card-footer border-top border-bottom pt-0">
                     <div class="row">
                        <div class="col-sm-4 mb-1">
                           <div class="description-block">
                              <h5 class="description-header"><?php echo date("d M Y", strtotime($c->ct_end)); ?></h5>
                              <span class="description-text">ภาษี</span>
                           </div>
                           <!-- <button type="button" class="btn btn-outline-primary btn-sm btn-block" id="b_tax" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>">
                      ต่อภาษี/พรบ.
                    </button> -->
                        </div>
                        <div class="col-sm-4 mb-1">
                           <div class="description-block">
                              <h5 class="description-header"><?php echo number_format($c->cd_kmpresent); ?> /
                                 <?php echo number_format($c->cd_kmneedservice); ?></h5>
                              <span class="description-text">เลขไมล์</span>
                           </div>
                           <!-- <button type="button" class="btn btn-outline-primary btn-sm btn-block" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>" id="b_km">อัพเดทเลขไมล์</button> -->
                        </div>
                        <div class="col-sm-4 mb-1">
                           <div class="description-block">
                              <h5 class="description-header"><?php echo date("d M Y", strtotime($c->ci_end)); ?></h5>
                              <span class="description-text">ประกันภัย</span>
                           </div>
                           <!-- <button type="button" class="btn btn-outline-primary btn-sm btn-block" id="b_insr" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>">ต่อประกันภัย</button>-->
                        </div>

                        <!--<div class="col-sm-4 mb-2">
                    <button type="button" id="b_wash" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>" class="btn btn-outline-success btn-sm btn-block"><i class="fa fa-fw fa-shower"></i> ล้างรถ</button>
                  </div>-->
                        <div class="col-sm-6 mb-2">
                           <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                              data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>"
                              data-vr="<?php echo $c->c_vrno; ?>" data-pre="<?php echo $c->cd_kmpresent; ?>"
                              data-need="<?php echo $c->cd_kmneedservice; ?>" id="b_km">
                              <i class="fa fa-fw fa-chart-line"></i> อัพเดทเลขไมล์</button>
                        </div>
                        <div class="col-sm-6">
                           <button class="btn btn-outline-info btn-sm btn-block dropdown-toggle" type="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-fw fa-info-circle"></i> อื่นๆ
                           </button>
                           <div class="dropdown-menu">
                              <button class="dropdown-item" type="button" id="b_tax" data-id="<?php echo $c->c_id; ?>"
                                 data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>"> <i
                                    class="fa fa-fw fa-calendar-check"></i> ต่อภาษี </button>
                              <button class="dropdown-item" type="button" id="b_insr" data-id="<?php echo $c->c_id; ?>"
                                 data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>"><i
                                    class="fa fa-fw fa-shield-alt"></i> ต่อประกันภัย</button>
                              <div class="dropdown-divider"></div>
                              <button class="dropdown-item" type="button" id="b_acd" data-id="<?php echo $c->c_id; ?>"
                                 data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>"><i
                                    class="fa fa-fw fa-car-crash"></i> บันทึกอุบัติเหตุ</button>

                              <button class="dropdown-item" type="button" id="b_ticket"
                                 data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>"
                                 data-vr="<?php echo $c->c_vrno; ?>">
                                 <i class="fa fa-fw fa-ticket-alt"></i> บันทึกใบสั่ง</button>
                           </div>
                        </div>
                        <!-- <button type="button" class="btn btn-outline-danger btn-sm btn-block" id="b_acd" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>" >บันทึกอุบัติเหตุ</button> -->
                     </div>
                  </div>
                  <div class="row">
                     <div class="col text-left ml-2">
                        <small class="text-muted" style="font-size: 12px;"><i class="fa fa-shower"
                              aria-hidden="true"></i> ล้างรถล่าสุด :
                           <?php echo date("d M Y, H:i", strtotime($c->cw_timestamp)); ?></small>
                     </div>
                     <div class="col text-right mr-2">
                        <small class="text-muted" style="font-size: 12px;"><i class="fa fa-history"
                              aria-hidden="true"></i> อัพเดทเลขไมล์ล่าสุด :
                           <?php echo date("d M Y, H:i", strtotime($c->cd_timestamp)); ?></small>
                     </div>
                  </div>
               </div>
               <?php } ?>

               <?php if ($this->session->userdata('empid') == 'TG0276') : ?>
               <?php foreach ($query as $c) { ?>
               <?php } ?>
               <?php endif; ?>

               <!-- /.widget-user -->
            </div>
         </div>
      </div><!-- /.container-fluid -->
      <?php include 'modal.php'; ?>
   </section>
   <!-- /.content -->
</div>