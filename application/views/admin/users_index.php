<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-2 text-dark"><i class="fa fa-cogs ml-2 mr-2" aria-hidden="true"></i> จัดการผู้ใช้งาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_adduser"><i class="fa fa-plus fa-fw mr-2" aria-hidden="true"></i>เพิ่มผู้ใช้งาน</button>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card text-center">
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-borderless table-hover col-12">
                <thead>
                  <tr class="border-bottom">
                    <th>รหัสพนักงาน</th>
                    <th>ชื่อ-สกุล</th>
                    <th>แผนก</th>
                    <th>อีเมล</th>
                    <th>ระดับผู้ใช้</th>
                    <!--<th>วันที่เริ่มใช้งาน</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query as $c) { ?>
                    <tr>
                      <td>
                        <span><?php echo $c->u_empid; ?></span>
                      </td>
                      <td>
                        <span><?php echo $c->u_fname; ?> <?php echo $c->u_lname; ?></span>
                      </td>
                      <td>
                        <span><?php echo $c->d_name; ?></span>
                      </td>
                      <td>
                        <span><?php echo $c->u_email; ?></span>
                      </td>
                      <td>
                        <span class="badge bg-success"> <?php echo $c->u_level ;?> </span>
                      </td>
                      <!--<td>
                        <span> <?php echo date('d M Y',strtotime($c->u_saveat)) ;?> </span>
                      </td>-->
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Add Cars -->
  <div class="modal fade" id="m_adduser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <form action="<?php echo base_url('AdminUsers/added_user') ;?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">เพิ่มผู้ใช้งาน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="empID" class="form-control" placeholder="รหัสพนักงาน" aria-describedby="helpId" maxlength="6" required style="text-transform:uppercase">
          </div>
          <div class="form-group">
            <input type="text" name="fname" class="form-control mb-1" placeholder="ชื่อ" aria-describedby="helpId" required>
            <input type="text" name="lname" class="form-control" placeholder="นามสกุล" aria-describedby="helpId" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control mb-1" placeholder="อีเมล" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="c_dept">แผนก</label>
            <select class="form-control" name="c_dept">
              <option value="1">CS</option>
              <option value="2">TA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="c_dept">สิทธิ์การใช้งาน</label>
            <select class="form-control" name="level">
              <option value="ADMIN">ADMIN</option>
              <option value="USER">USER</option>
            </select>
          </div>
          <div class="form-group">
            <input type="password" id="PWD" name="password" class="form-control mb-1" placeholder="รหัสผ่าน" aria-describedby="helpId" maxlength="50" minlength="8" required>
            <input type="password" id="confirmPWD" class="form-control" placeholder="ยืนยันรหัสผ่าน" aria-describedby="helpId" maxlength="50" minlength="8" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="width: 120px;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#PWD, #confirmPWD').keyup(function(){

    var p1 = $('#confirmPWD').val();
    var p2 = $('#PWD').val();

    if  (p1 == p2) {

      $('#confirmPWD').removeClass('is-invalid');
      $('#PWD').removeClass('is-invalid');
      $('#confirmPWD').addClass('is-valid');
      $('#PWD').addClass('is-valid');

    } else {

      $('#confirmPWD').addClass('is-invalid');
      $('#PWD').addClass('is-invalid');
    }

    if (p1,p2 == '') {
      $('#confirmPWD').removeClass('is-invalid');
      $('#PWD').removeClass('is-invalid');
      $('#confirmPWD').removeClass('is-valid');
      $('#PWD').removeClass('is-valid');
    }
  });
</script>
<div class="modal fade" id="staticBackdrop1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('carEdit') ;?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel1">แก้ไขข้อมูลรถ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="brand">รุ่น / ยี่ห้อ</label>
            <select class="form-control" name="c_brand" id="mb">
              <option value="TOYOTA REVO">TOYOTA REVO</option>
              <option value="TOYOTA YARIS">TOYOTA YARIS</option>
              <option value="SUZUKI CARRY">SUZUKI CARRY</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">เลขทะเบียน</label>
            <input type="text" id="mv" class="form-control" placeholder="" aria-describedby="helpId" name="c_vrno">
          </div>

          <div class="form-group">
            <label for="c_dept">แผนก</label>
            <select class="form-control" id="md" name="c_dept">
              <option value="1">CS</option>
              <option value="2">TA</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="mid" name="id">
          <button type="submit" class="btn btn-success" style="width: 120px;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalkm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalkm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('kmCreate'); ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title">เพิ่มข้อมูลเลขไมล์</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control text-center" id="d_brand" disabled>
            </div>
            <div class="col">
              <input type="text" class="form-control text-center" id="d_vrno" disabled>
            </div>
          </div>
          <div class="form-group mt-4">
            <label for="">เลขไมล์ก่อนหน้า</label>
            <input type="number" name="km_previous" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">เลขไมล์ปัจจุบัน</label>
            <input type="number" name="km_present" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">เลขไมล์เลขไมล์ที่ต้องเข้าศูนย์</label>
            <input type="number" name="km_needservice" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">หมายเหตุ</label>
            <textarea class="form-control" name="km_remark" rows="3" maxlength="200"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="d_id" name="km_carid">
          <button type="submit" class="btn btn-success" style="width: 120px;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modaltax" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modaltaxinsr" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('taxCreate'); ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title">เพิ่มข้อมูลภาษี/พรบ.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control text-center" id="t_brand" disabled>
            </div>
            <div class="col">
              <input type="text" class="form-control text-center" id="t_vrno" disabled>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col">
              <label for="">เริ่มภาษี/พรบ.</label>
              <input type="date" class="form-control" name="tax_start" id="ts">
            </div>
            <div class="col">
              <label for="">สิ้นสุดภาษี/พรบ.</label>
              <input type="date" class="form-control" name="tax_end" id="te">
            </div>
          </div>

          <div class="form-group mt-2">
            <label for="exampleFormControlTextarea1">หมายเหตุ</label>
            <textarea class="form-control" name="tax_remark" rows="3" maxlength="200"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" id="t_id" name="tax_id">
          <button type="submit" class="btn btn-success" style="width: 120px;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalinsr" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modaltaxinsr" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('insrCreate'); ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title">เพิ่มข้อมูลประกันภัย</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control text-center" id="i_brand" disabled>
            </div>
            <div class="col">
              <input type="text" class="form-control text-center" id="i_vrno" disabled>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col">
              <label for="">เริ่มพรบ.ประกันภัย</label>
              <input type="date" class="form-control" name="insr_start" id="ts">
            </div>
            <div class="col">
              <label for="">สิ้นสุดพรบ.ประกันภัย</label>
              <input type="date" class="form-control" name="insr_end" id="te">
            </div>
          </div>

          <div class="form-group mt-2">
            <label for="exampleFormControlTextarea1">หมายเหตุ</label>
            <textarea class="form-control" name="insr_remark" rows="3" maxlength="200"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" id="i_id" name="insr_id">
          <button type="submit" class="btn btn-success" style="width: 120px;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modalwash" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel4">ล้างรถ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('washCreate') ; ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control text-center" id="wash_br_vr" disabled>
          </div>
          <div class="form-group">
            <label for="">วันที่นำรถไปล้าง</label>
            <input type="date" name="wash_date" class="form-control">
          </div>
          <div class="form-group mt-2">
            <label for="exampleFormControlTextarea1">หมายเหตุ</label>
            <textarea class="form-control" name="wash_remark" rows="3" maxlength="200"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="wash_cID" id="wash_cID">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>