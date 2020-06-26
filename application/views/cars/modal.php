<div class="modal fade" id="m_tax" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel1">ต่อภาษี/พรบ.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('taxUpdate') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control text-center" id="tax_br_vr" disabled>
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
            <textarea class="form-control" name="tax_remark" rows="3" maxlength="200" placeholder="หมายเหตุ"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="cID" id="tax_cID">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="m_km" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel2">เลขไมล์</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('kmUpdate') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>รุ่น/เลขทะเบียน</label>
            <input type="text" class="form-control text-center" id="km_br_vr" readonly>
          </div>
          
          <div class="form-group">
            <label>เลขไมล์ก่อนหน้า</label>
            <input type="number" name="km_previous" class="form-control" placeholder="เลขไมล์ก่อนหน้า" id="km_prev" readonly>
          </div>
          <div class="form-group">
            <label>เลขไมล์ที่ต้องเข้าศูนย์</label>
            <input type="number" name="km_needservice" class="form-control" placeholder="เลขไมล์ที่ต้องเข้าศูนย์" id="km_need">
          </div>
          <div class="form-group">
            <label>เลขไมล์ปัจจุบัน</label>
            <input type="number" name="km_present" class="form-control" placeholder="เลขไมล์ปัจจุบัน">
          </div>
          <div class="form-group mt-2">
            <textarea class="form-control" name="km_remark" rows="3" maxlength="200" placeholder="หมายเหตุ"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="km_cID" id="km_cID">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="m_insr" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel3">ต่อประกันภัย</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('insrUpdate'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control text-center" id="insr_br_vr" disabled>
          </div>
          <div class="row mt-4">
            <div class="col">
              <label for="">เริ่มประกันภัย</label>
              <input type="date" class="form-control" name="insr_start">
            </div>
            <div class="col">
              <label for="">สิ้นสุดประกันภัย</label>
              <input type="date" class="form-control" name="insr_end">
            </div>
          </div>
          <div class="form-group mt-2">
            <textarea class="form-control" name="insr_remark" rows="3" maxlength="200" placeholder="หมายเหตุ"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="insr_cID" id="insr_cID">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="m_wash" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel4">ล้างรถ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('washUpdate') ; ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control text-center" id="wash_br_vr" disabled>
          </div>
          <div class="form-group">
            <label for="">วันที่นำรถไปล้าง</label>
            <input type="date" name="wash_date" class="form-control">
          </div>
          <div class="form-group mt-2">
            <textarea class="form-control" name="wash_remark" rows="3" maxlength="200" placeholder="หมายเหตุ"></textarea>
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

<div class="modal fade" id="m_acd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel4">บันทึกอุบัติเหตุ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('acdUpdate') ; ?>" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control text-center" id="acd_br_vr" disabled>
          </div>
          <div class="form-group">
            <label for="">วันที่เกิดอุบัติเหตุ</label>
            <input type="date" name="acd_date" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="acd_dmg" placeholder="เหตุที่เกิดขึ้น">
          </div>
          <div class="form-group mt-2">
            <textarea class="form-control" name="acd_detail" rows="3" maxlength="200" placeholder="รายละเอียด"></textarea>
          </div>
          <div class="form-group mt-2">
            <textarea class="form-control" name="acd_remark" rows="3" maxlength="200" placeholder="หมายเหตุ"></textarea>
          </div>
          <?php if ($this->session->userdata('empid') == 'TG0276') : ?>
          <div class="form-group mt-2" style="padding: 20px; border: groove; border-color: aliceblue; border-width: thin;">
            <input type='file' id="files" name='files[]' multiple=""> 
          </div>
          <?php endif; ?>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="acd_cID" id="acd_cID">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="m_ticket" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel4" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel4">บักทึกใบสั่ง</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Cars/ticketAdd') ; ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control text-center" id="tk_br_vr" disabled>
          </div>
          <div class="form-group mb-1">
            <label for="">วันที่โดนใบสั่ง</label>
            <input type="date" name="tk_date" class="form-control" required>
          </div>
          <div class="form-group mb-1">
            <input type="text" class="form-control" name="tk_topic" placeholder="ข้อหา" required>
          </div>
          <div class="form-group mb-1">
            <input type="text" class="form-control" name="tk_location" placeholder="จุดที่โดนใบสั่ง" required>
          </div>
          <div class="form-group mb-1">
            <input type="text" class="form-control" name="tk_company" placeholder="ชื่อบริษัทที่ไป" required>
          </div>
          <div class="row mt-2">
            <div class="col">
              <input type="text" class="form-control" name="tk_user1" placeholder="รหัสพนักงานคนที่ 1" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="tk_user2" placeholder="รหัสพนักงานคนที่ 2">
            </div>
          </div>
          <div class="form-group mt-2">
            <textarea class="form-control" name="tk_remark" rows="3" maxlength="200" placeholder="รายละเอียด"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="tk_cID" id="tk_cID">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>