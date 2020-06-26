  <footer class="main-footer text-sm">
     <p class="text-center">Copyright &copy; <?php echo date("Y") ?> Developed By <a
           href="https://www.facebook.com/Partynannii">PARTY<sup> CS</sup></a> All rights reserved.</p>
     </div>
  </footer>
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
     crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
$.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
  </script>
  <!-- Summernote -->
  <script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard3.js"></script>

  <!-- Script Sweet alert -->
  <script type="text/javascript">
<?php if ($this->session->flashdata('save_success')): ?>
   Swal.fire('บันทึกข้อมูลสำเร็จ!', '', 'success'); 
<?php endif; ?>

<?php if ($this->session->flashdata('del_success')): ?>
   Swal.fire('ลบข้อมูลสำเร็จ!', '', 'success'); 
<?php endif; ?>

<?php if ($this->session->flashdata('user_success')): ?>
   Swal.fire('เพิ่มผู้ใช้สำเร็จ!', '', 'success'); 
<?php endif; ?>

<?php if ($this->session->flashdata('user_err')): ?>
   Swal.fire('ไม่สามารถเพิ่มผู้ใช้ได้!', '', 'error'); 
<?php endif; ?>

<?php if ($this->session->flashdata('cannot')): ?>
   Swal.fire({
      icon: 'error',
      title: 'ผิดพลาด!',
      text: 'ไม่สามารถเพิ่มข้อมูลได้ เนื่องจากข้อมูลซ้ำ!',
      footer: 'หากต้องการแก้ไขข้อมูลกรุณาติดต่อเจ้าของเว็บ'
   }) 
<?php endif; ?>
</script>

  <!-- script หน้า Admin สำหรับ modal เพิ่มข้อมูลต่างๆ -->
  <script type="text/javascript">
$(document).on("click", "#edit", function() {
   var j_id = $(this).attr('data-id');
   var j_b = $(this).attr('data-cBrand');
   var j_v = $(this).attr('data-cVrno');
   var j_d = $(this).attr('data-cDept');

   $("#mid").val(j_id);
   $("#mb").val(j_b);
   $("#mv").val(j_v);
   $("#md").val(j_d);
   $('#staticBackdrop1').modal('show')
});
  </script>

  <script type="text/javascript">
$(document).on("click", "#km", function() {
   var did = $(this).attr('data-did');
   var dbrand = $(this).attr('data-dBrand');
   var dvrno = $(this).attr('data-dVrno');

   $("#d_id").val(did);
   $("#d_brand").val(dbrand);
   $("#d_vrno").val(dvrno);
   $('#modalkm').modal('show')
});
  </script>

  <script type="text/javascript">
$(document).on("click", "#taxbtn", function() {
   var tid = $(this).attr('data-tid');
   var tbrand = $(this).attr('data-tBrand');
   var tvrno = $(this).attr('data-tVrno');

   $("#t_id").val(tid);
   $("#t_brand").val(tbrand);
   $("#t_vrno").val(tvrno);
   $('#modaltax').modal('show')
});
  </script>

  <script type="text/javascript">
$(document).on("click", "#insrbtn", function() {
   var iid = $(this).attr('data-iid');
   var ibrand = $(this).attr('data-iBrand');
   var ivrno = $(this).attr('data-iVrno');

   $("#i_id").val(iid);
   $("#i_brand").val(ibrand);
   $("#i_vrno").val(ivrno);
   $('#modalinsr').modal('show')
});
  </script>

  <script type="text/javascript">
$(document).on("click", "#b_wash", function() {
   var id = $(this).attr('data-id');
   var br = $(this).attr('data-br');
   var vr = $(this).attr('data-vr');

   $("#tax_cID").val(id);
   $("#tax_br_vr").val(br + ' ' + vr);
   $('#modalwash').modal('show')
});
  </script>

  <script type="text/javascript">
$(document).on("click", "#del", function() {
   var id = $(this).attr('data-id')
   var br = $(this).attr('data-cBrand')
   var vr = $(this).attr('data-cVrno')

   Swal.fire({
      title: br + ' ' + vr,
      text: 'คุณต้องการลบข้อมูลหรือไม่?',
      icon: 'warning',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ยืนยัน',
      showCancelButton: true,
      cancelButtonText: 'ยกเลิก'

   }).then((result) => {
      if (result.value) {
         $(".car-table").remove();
         $.ajax({
            type: "POST",
            url: "<?php echo site_url('carDel') ?>",
            data: {
               'id': id
            },
            cache: false,
            success: function(response) {
               Swal.fire(
                  "ลบข้อมูลสำเร็จ!",
                  "",
                  "success"
               )
               $('#' + id).remove()
            }
         });
      }
   })
});
  </script>

  <script type="text/javascript">
$(document).on("click", "#b_check", function() {
   var cid = $(this).attr('data-id');
   var br = $(this).attr('data-br')
   var vr = $(this).attr('data-vr');

   $("#br_vr").val(br + ' ' + vr);
   $("#ck_cID").val(cid);
   $('#m_check').modal('show')
});
  </script>
  <!-- script หน้า Admin สำหรับ modal เพิ่มข้อมูลต่างๆ -->


  <!-- script หน้าข้อมูลรถ สำหรับ modal เพิ่มข้อมูลต่างๆ -->
  <script type="text/javascript">
$(document).on("click", "#b_tax", function() {
   var id = $(this).attr('data-id');
   var br = $(this).attr('data-br');
   var vr = $(this).attr('data-vr');

   $("#tax_cID").val(id);
   $("#tax_br_vr").val(br + ' ' + vr);
   $('#m_tax').modal('show')
});

$(document).on("click", "#b_km", function() {
   var id = $(this).attr('data-id');
   var br = $(this).attr('data-br');
   var vr = $(this).attr('data-vr');
   var prev = $(this).attr('data-pre');
   var need = $(this).attr('data-need');

   $("#km_cID").val(id);
   $("#km_br_vr").val(br + ' ' + vr);
   $("#km_prev").val(prev);
   $("#km_need").val(need);
   $('#m_km').modal('show')
});

$(document).on("click", "#b_insr", function() {
   var id = $(this).attr('data-id');
   var br = $(this).attr('data-br');
   var vr = $(this).attr('data-vr');

   $("#insr_cID").val(id);
   $("#insr_br_vr").val(br + ' ' + vr);
   $('#m_insr').modal('show')
});

$(document).on("click", "#b_wash", function() {
   var id = $(this).attr('data-id');
   var br = $(this).attr('data-br');
   var vr = $(this).attr('data-vr');

   $("#wash_cID").val(id);
   $("#wash_br_vr").val(br + ' ' + vr);
   $('#m_wash').modal('show')
});

$(document).on("click", "#b_acd", function() {
   var id = $(this).attr('data-id');
   var br = $(this).attr('data-br');
   var vr = $(this).attr('data-vr');

   $("#acd_cID").val(id);
   $("#acd_br_vr").val(br + ' ' + vr);
   $('#m_acd').modal('show')
});

$(document).on("click", "#b_ticket", function() {
   var id = $(this).attr('data-id');
   var br = $(this).attr('data-br');
   var vr = $(this).attr('data-vr');

   $("#tk_cID").val(id);
   $("#tk_br_vr").val(br + ' ' + vr);
   $('#m_ticket').modal('show')
});
  </script>

  </body>

  </html>