<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Scopes
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Scope</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-content">
        <div class="box-body">
            <?php if(session()->get('success')): ?>
            <div class="alert alert-success">
              <?php echo e(session()->get('success')); ?>  
            </div>
            <br />
            <?php endif; ?>

            
            <div>
              
              
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-sm-6">
                      
                    </div>

                    <div class="col-sm-4">

                    </div>

                    <div class="col-sm-2" style='text-align:right'>
                        <div class="row" style="margin-top:-3px;margin-bottom:3px">
                            <div class="col-xs-12">
                                <div class="btn-group">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="btn-group">
                                    <a href="<?php echo e(url('master/scope/create')); ?>" class="btn btn-info"> <i
                                            class="fa fa-plus"></i>
                                        Tambah</a>
                                    <button class="btn btn-success" id="btnEdit" name="btnEdit"> <i
                                            class="fa fa-pencil"></i>
                                        Edit</button>
                                    <button class="btn btn-danger" id="btnHapus" name="btnHapus"> <i
                                            class="fa fa-trash"></i>
                                        Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
              
                <table id="data-tables" class="table table-striped table-bordered dataTable customTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-indent: 5px;"><i class="fa fa-check-square-o"></i></th>
                            <th style="text-indent: 22px;">No</th>
                            <th>Kode Scope</th>
                            <th>Nama Indonesia</th>
                            <th>Nama Inggris</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                         <td style='text-align:center'>
                            <input  type="checkbox" data-id="<?php echo e($key->id); ?>" class="selection"
                            id="selection[]" name="selection[]">
                         </td>
                         <td><?php echo e($loop->iteration); ?></td>
                         <td><?php echo e($key->kode ?? ''); ?></td>
                         <td><?php echo e($key->nama_id); ?></td>
                         <td><?php echo e($key->nama_en); ?></td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
            


<div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <form action="<?php echo e(url('master/scope/destroy')); ?>" class="form-horizontal" id="formDelete" name="formDelete"
        method="post" enctype="multipart/form-data">
        <?php echo method_field("DELETE"); ?>
        <?php echo csrf_field(); ?>
        <input type="hidden" value="" name="idHapusData" id="idHapusData">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                </div>
                <div class="modal-body" id="konfirmasi-body">
                    Yakin ingin menghapus data terpilih?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" data-id=""
                        data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Deleting..."
                        id="confirm-delete">Hapus</button>
                </div>
            </div>
        </div>
    </form>
</div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer"></div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
$(function(){
});

  // onclick button hapus
  $('#btnHapus').on('click', function (e) {
        e.preventDefault();
        var id = [];
        $('.selection:checked').each(function () {
            id.push($(this).data('id'));
        });
        $("#idHapusData").val(id);
        if (id.length == 0) {
            Swal.fire({
                title: "Tidak ada data yang terpilih",
                type: 'warning',
                confirmButtonText: 'Close',
                confirmButtonColor: '#AAA'
            });
            // Swal.fire('Tidak ada data yang terpilih');
        } else {
            console.log(id)
            $('#modal-konfirmasi').modal('show');
        }
    });

    // Button edit click
    $('#btnEdit').on('click', function (e) {
        e.preventDefault();
        var id = [];
        $('.selection:checked').each(function () {
        id.push($(this).data('id'));
        });
        if (id.length == 0) {
        alert('Tidak ada data yang terpilih');
        } else if (id.length > 1) {
        alert('Harap pilih satu data untuk di ubah');
        } else {
        url = id[0];
        window.location.href = "<?php echo e(url('master/scope')); ?>/" + url + "/edit";
        }
    });


</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('templates.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>