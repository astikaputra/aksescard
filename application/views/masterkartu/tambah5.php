<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      <i class="fa fa-tasks"></i> Aktivasi Kartu
    </h1>


  <div class="pull-right">
   <a href="<?php echo base_url('masterkartu')?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                   <form role="form" action="<?php echo $action;?>" method="POST">
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label for="varchar">Input ID Lantai 5</label>
                         <!--    <input width="65" type="text" class="form-control" name="no_kartu"  id="lantai" value ="<?php //echo $no_kartu; ?>" autofocus/> -->
                       <!--   <input width="100" type="text" class="form-control" name="no_kartu"  id="no_kartu" value ="" autofocus/> -->
                        <input type="text" class="form-control" name="txt_id" autofocus>
                        </div>
                      </div>

                       
                       <div class="form-group">  
                    <input type="hidden" name="id" value="<?php echo $d_akses; ?>"/><br>
                    <button type="submit" hidden="true"><?php echo $button ?></button> 
                </form>
                <br><br><br><br>
                <table id="dataTable1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>NO RFID</th>
                         <th>PASIEN</th>
                         <th>ROOM</th>
                         <th>STATUS</th>
                         <th>USER</th>                                             
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php if ($d_kartu) {
                      foreach($d_kartu as $d) {?>
                     <tr>
                         <td><?php echo $id=$d['id']; ?></td>
                         <td><?php echo $d['fridnum']; ?></td>
                         <td><?php echo $d['pasien']; ?></td>
                         <td><?php echo $d['room']; ?></td>
                         <td><?php echo $d['status']; ?></td>     
                         <td><?php echo $d['user']; ?></td>             
                         <td>               
                          <a class="btn btn-info btn-xs" href="<?php echo base_url(). 'aktivasikartu/aktivasi/'.$id?>" rel="tooltip" title="List Aktivasi Kartu"><i class="fa fa-wrench"></i></a> 
                          <a class="btn bg-purple btn-xs" href="<?php //echo base_url() . 'penerimaankartu/cetak/' . $d->id_penerimaan ?>" rel="tooltip" title="Cetak"><i class="fa fa-print"></i></a>
                         </td>

                          <?php } ?>
                             
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
