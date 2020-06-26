<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">

  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-5 col-sm-8 col-xs-12">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center"> <?php echo $this->session->userdata('fname');?>  <?php echo $this->session->userdata('lname'); ;?></h3>

              <p class="text-muted text-center">
                <?php if ($this->session->userdata('dept') == 'CS') : ?>
                  Application Software Support
                <?php endif; ?>
                <?php if ($this->session->userdata('dept') == 'TA') : ?>
                  Technician Support
                <?php endif; ?>
              </p>

              <ul class="list-group list-group-unbordered mb-3 row">
                <li class="list-group-item">
                  <b>รหัสพนักงาน</b> <a class="float-right"> <?php echo $this->session->userdata('empid') ;?> </a>
                </li>
                <li class="list-group-item">
                  <b>สิทธิ์การใช้งาน</b> <a class="float-right"> <?php echo $this->session->userdata('level') ;?> </a>
                </li>
                <li class="list-group-item">
                  <b>อีเมล</b> <a class="float-right"> <?php echo strtoupper($this->session->userdata('email')) ;?> </a>
                </li>
                <li class="list-group-item">
                  <b>เริ่มใช้งานเมื่อ</b> <a class="float-right"> <?php echo date("d M Y", strtotime($this->session->userdata('date'))) ;?> </a>
                </li>
              </ul>
              
              <button class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#change_pwd">เปลี่ยนรหัสผ่าน</button>

              <!-- Modal -->
              <div class="modal fade" id="change_pwd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="change_pwd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="change_pwd">เปลี่ยนรหัสผ่าน</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="<?php echo site_url('change_password') ;?>" method="post">
                      <div class="modal-body">
                        <div class="form-group">
                          <input type="text" class="form-control text-center" disabled value="<?php echo $this->session->userdata('empid').'  -  '.$this->session->userdata('fname').' '.$this->session->userdata('lname') ;?>">
                        </div>
                        <div class="form-group">
                          <input type="password" name="new_pwd" class="form-control mb-1" id="new_pwd" placeholder="รหัสผ่านใหม่" required>
                          <input type="password" id="confirm_new_pwd" class="form-control" placeholder="ยืนยันรหัสผ่าน" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="u_id" value="<?php echo $this->session->userdata('uid') ;?>">
                        <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                      </div>
                    </form>
                    <script type="text/javascript">
                      $('#confirm_new_pwd, #new_pwd').keyup(function(){

                          var p1 = $('#new_pwd').val();
                          var p2 = $('#confirm_new_pwd').val();

                          if  (p1 == p2) {

                            $('#new_pwd').removeClass('is-invalid');
                            $('#confirm_new_pwd').removeClass('is-invalid');
                            $('#new_pwd').addClass('is-valid');
                            $('#confirm_new_pwd').addClass('is-valid');

                          } else {

                            $('#new_pwd').addClass('is-invalid');
                            $('#confirm_new_pwd').addClass('is-invalid');
                          }

                          if (p1,p2 == '') {
                            $('#new_pwd').removeClass('is-invalid');
                            $('#confirm_new_pwd').removeClass('is-invalid');
                            $('#new_pwd').removeClass('is-valid');
                            $('#confirm_new_pwd').removeClass('is-valid');
                          }
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->