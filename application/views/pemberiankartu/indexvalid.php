<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      <i class="fa fa-tasks"></i> Validasi Kartu Akses
    </h1>
  </section>

<!-- Main content -->
  <section class="content">

  <!-- Main row -->
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
        <!--
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><! /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table id="dataTable1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                        <th>NO</th>
                         <th>NO RFID</th>
                         <th>PASIEN</th>
                         <th>ROOM</th>
                         <th>STATUS</th>
                         <th>TGL AKTIF</th>
                         <th>USER</th>        
                         <?php if($this->session->userdata('level')=='1'){?>                                     
                         <th>AKSI</th>
                         <?php }?>
                     </tr>
                 </thead>
                 <tbody>
                   <?php 
                   $this->load->model('main_model');
                   if ($d_kartu) {
                      foreach($d_kartu as $d) {?>
                     <tr>
                      <?php
                            $st1['id'] = $d['status'];
                            $s1 = $this->main_model->GetSelectedData('tb_status',$st1);
                            $stt = $s1[0]['status'];
                            ?>
                      <form role="form" action="<?php echo $action;?>" method="POST">
                         <td><?php echo $id=$d['id']; ?></td>
                         <td><?php echo $rfid=$d['fridnum']; ?></td>
                         <td>
                          <input type="text" class="form-control form-xm" name="pasien" autofocus value="<?php echo $d['pasien']; ?>" readonly> 
                         </td>
                         <td>
                         <input type="text" class="form-control"  name="room" autofocus value="<?php echo $d['room']; ?>" readonly>
                         </td>
                         <td align="center"><?php echo $stt; ?></td>     
                         <td><?php echo $tgl_aktif=$d['tgl_aktif']; ?></td>
                         <td><?php echo $d['user']; ?></td>       
                         <?php if($this->session->userdata('level')=='1'){?>
                         <td align="center">
                         <input type="hidden" name="id" value="<?php echo $id;?>">
                         <input type="hidden" name="tgl_aktif" value="<?php echo $tgl_aktif;?>">
                         <input type="hidden" name="rfid" value="<?php echo $rfid;?>"> 
                          <button class="btn btn-primary btn-xm" name="save" rel="tooltip" title="Aktivasi Kartu"><i class="fa fa-save"></i></button> 
                         </td>
                         <?php } ?>
                       </form>
                     </tr>
                     <?php }
                   }?>
                 </tbody>
             </table>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!--box body-->
          </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

  <!-- /.row (main row) -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper-->
