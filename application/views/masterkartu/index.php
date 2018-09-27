<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      <i class="fa fa-tasks"></i> Aktivasi Kartu
    </h1>


  <div class="pull-right">
    <a href="<?php echo base_url('masterkartu/tambah3')?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Kartu 3 </a>
    
     <a href="<?php echo base_url('masterkartu/tambah5')?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Kartu 5</a>
  </div>

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
                         <th>AKSES</th>
                         <th>USER</th>                                             
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php if ($d_kartu) {
                    $no=1;
                      foreach($d_kartu as $d) {

                        $st1['id'] = $d['status'];
                            $st2['id'] = $d['akses'];
                            $s1 = $this->main_model->GetSelectedData('tb_status',$st1);
                            $s2 = $this->main_model->GetSelectedData('tb_akses',$st2);
                            $stt = $s1[0]['status'];
                            $akses = $s2[0]['akses'];
                            $id = $d['id']; ?>
                     <tr>
                         <td><?php echo $no ?></td>
                         <td><?php echo $d['fridnum']; ?></td>
                         <td><?php echo $d['pasien']; ?></td>
                         <td><?php echo $d['room']; ?></td>
                         <td><?php echo $stt; ?></td>
                         <td><?php echo $akses; ?></td>     
                         <td><?php echo $d['user']; ?></td>       
                         <td>               
                          <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'aktivasikartu/aktivasi/' . $id ?>" rel="tooltip" title="List Aktivasi Kartu"><i class="fa fa-wrench"></i></a> 
                          <a class="btn bg-purple btn-xs" href="<?php //echo base_url() . 'penerimaankartu/cetak/' . $d->id_penerimaan ?>" rel="tooltip" title="Cetak"><i class="fa fa-print"></i></a>
                         </td>

                          <?php $no++;} ?>
                             
                         <?php }  ?>
                     </tr>
                     <?php}
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
