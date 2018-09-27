<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      <i class="fa fa-tasks"></i> Penerimaan Kartu
    </h1>


  <div class="pull-right">
    <a href="<?php echo base_url('penerimaankartu/tambah')?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Kartu</a>
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
                         <th>TANGGAL</th>
                         <th>DARI</th>
                         <th>QTY</th>
                         <th>STATUS</th>                         
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php if ($d_penerimaankartu) {
                      foreach($d_penerimaankartu as $d) {?>
                     <tr>
                         <td><?php echo $d->id_penerimaan; ?></td>
                         <td><?php echo $d->tanggal; ?></td>
                         <td><?php echo $d->dari; ?></td>     
                         <td><?php echo $d->qty; ?></td>             
                         <td>
                         <?php if($d->status == "Waiting"){ ?>
                             <span class="label label-danger">Waiting</span>
                         <?php } elseif ($d->status == "On Progress"){ ?>
                             <span class="label label-warning">On Progress</span>
                         <?php } else { ?>
                             <span class="label label-success">Finished</span>
                         <?php } ?>
                         </td>
                         <td>
                             <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'penerimaankartu/terima/' . $d->id_penerimaan ?>" rel="tooltip" title="List Penerimaan Kartu"><i class="fa fa-wrench"></i></a>
                         <!--     <a class="btn btn-warning btn-xs" href="<?php //echo base_url() . 'penerimaankartu/ubah/' . $d->id_penerimaan ?>" rel="tooltip" title="Ubah"><i class="fa fa-pencil " ></i></a>
                             <a class="btn btn-danger btn-xs hapus-data" href="#" data-url="<?php //echo base_url() . 'penerimaankartu/hapus/' . $d->id_penerimaan ?>"  rel="tooltip" title="Hapus"><i class="fa fa-trash-o "></i></a> -->
                             <a class="btn bg-purple btn-xs" href="<?php echo base_url() . 'penerimaankartu/cetak/' . $d->id_penerimaan ?>" rel="tooltip" title="Cetak"><i class="fa fa-print"></i></a>
                         </td>
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
