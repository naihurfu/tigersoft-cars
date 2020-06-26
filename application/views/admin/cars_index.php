<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-cogs ml-2 mr-2" aria-hidden="true"></i> จัดการรถ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus fa-fw mr-2" aria-hidden="true"></i>เพิ่มรถ</button>
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
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body" style="padding: 0;">
              <table class="table table-borderless table-hover col-12">
                <thead>
                  <tr class="border-bottom">
                    <th style="vertical-align: middle;">รุ่น/ยี่ห้อ</th>
                    <th style="vertical-align: middle;">ทะเบียน</th>
                    <th style="vertical-align: middle;">แผนก</th>
                    <th style="vertical-align: middle;" class="text-center" colspan="2"> เครื่องมือ <br> <small class="text-danger" style="font-size: 10px;">*เพิ่มข้อมูลให้ครบโดยใช้ปุ่มในแถบเครื่องมือ หากรถไม่แสดงที่หน้าเว็บ</small></th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($query as $c) { ?>
                    <tr id="<?php echo $c->c_id ;?>">
                      <td>
                        <span id="data-cBrand"><?php echo $c->c_brand; ?></span>
                      </td>
                      <td>
                        <span id="data-cVrno"><?php echo $c->c_vrno; ?></span>
                      </td>
                      <td>
                        <span><?php echo $c->d_name; ?></span>
                      </td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog"></i> แก้ไข /ลบ
                          </button>
                          <div class="dropdown-menu">
                            <input type="hidden" id="data-cDept" name="deptID" value="<?php echo $c->d_id ?>">
                            <a href="#" id="edit" data-id="<?php echo $c->c_id; ?>" data-cBrand="<?php echo $c->c_brand; ?>" data-cVrno="<?php echo $c->c_vrno; ?>" data-cDept="<?php echo $c->c_dept; ?>" class="dropdown-item"><i class="far fa-edit text-info"></i> แก้ไข</a>
                            <a href="#" id="del" data-id="<?php echo $c->c_id; ?>" data-cBrand="<?php echo $c->c_brand; ?>" data-cVrno="<?php echo $c->c_vrno; ?>" class="dropdown-item"><i class="fa fa-trash-alt text-danger mr-1"></i> ลบ</a>
                          </div>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus"></i> เพิ่มข้อมูล
                          </button>
                          <div class="dropdown-menu">
                            <a href="#" id="km" data-did="<?php echo $c->c_id; ?>" data-dBrand="<?php echo $c->c_brand; ?>" data-dVrno="<?php echo $c->c_vrno; ?>" class="dropdown-item"><i class="far fa-edit text-info"></i> เลขไมล์</a>
                            <a href="#" id="taxbtn" data-tid="<?php echo $c->c_id; ?>" data-tBrand="<?php echo $c->c_brand; ?>" data-tVrno="<?php echo $c->c_vrno; ?>" class="dropdown-item"><i class="fa fa-calendar-alt fa-fw text-info"></i> ภาษี/พรบ.</a>
                            <a href="#" id="insrbtn" data-iid="<?php echo $c->c_id; ?>" data-iBrand="<?php echo $c->c_brand; ?>" data-iVrno="<?php echo $c->c_vrno; ?>" class="dropdown-item"><i class="fa fa-calendar-alt fa-fw text-info"></i> ประกันภัย</a>
                            <a href="#" id="b_wash" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>" class="dropdown-item"><i class="fa fa-shower fa-fw text-info" aria-hidden="true"></i> ล้างรถ</a>
                            <a href="#" id="b_check" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>" class="dropdown-item"><i class="fa fa-wrench fa-fw text-info" aria-hidden="true"></i> สภาพรถ</a>
                          </div>
                        </div>
                      </td>
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
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <form action="<?php echo site_url('carsCreate'); ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">เพิ่มรถ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="brand">รุ่น / ยี่ห้อ</label>
            <select class="form-control" name="c_brand">
              <option value="TOYOTA REVO">TOYOTA REVO</option>
              <option value="TOYOTA YARIS">TOYOTA YARIS</option>
              <option value="SUZUKI CARRY">SUZUKI CARRY</option>
            </select>
          </div>
          <div class="form-group">
            <label>เลขทะเบียน</label>
            <input type="text" name="c_vrno" class="form-control" placeholder="1กก 1234" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="c_dept">แผนก</label>
            <select class="form-control" name="c_dept">
              <option value="1">CS</option>
              <option value="2">TA</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="width: 120px;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
          <input type="hidden" name="uid" value="<?php echo ($this->session->userdata('uid')); ?>">
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

<div class="modal fade" id="m_check" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel2">เพิ่มข้อมูลสภาพรถ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </div>
      </button>
      <form action="<?php echo site_url('checkCreate') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>รุ่น/เลขทะเบียน</label>
            <input type="text" class="form-control text-center" id="br_vr" readonly>
          </div>
          <div class="form-group">
            <label>เครื่องมือ</label>
            <select class="form-control" name="ck_tools">
              <option value="1">มี</option>
              <option value="0">ไม่มี</option>
            </select>
          </div>
          <div class="form-group">
            <label for="spare_tire">ล้ออะไหล่</label>
            <select class="form-control" name="ck_sparetire">
              <option value="1">มี</option>
              <option value="0">ไม่มี</option>
            </select>
          </div>
          <label for="tire">ลมยาง</label>
          <div class="row">
            <div class="col">
              <input name="ck_ftire" type="number" class="form-control" placeholder="หน้า" minlength="1" maxlength="2" required>
            </div>
            <div class="col">
              <input name="ck_btire" type="number" class="form-control" placeholder="หลัง" minlength="1" maxlength="2" required>
            </div>
          </div>
          <small class="text-muted">ตัวอย่าง : หน้า 35  หลัง 38 </small>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="cID" id="ck_cID">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>