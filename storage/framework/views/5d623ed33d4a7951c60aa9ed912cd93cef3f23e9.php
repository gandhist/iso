<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perbarui Scope
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
            <?php endif; ?>

            
            <div>
              <form id="formAdd" name="formAdd" method="POST">
              <?php echo method_field('PATCH'); ?>
              <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label>Kode Scope</label>
                                <input name="kode" id="kode" type="text" class="form-control" placeholder="Kode Scope" value="<?php echo e($data->kode); ?>">
                                <span id="kode" class="help-block" ><?php echo e($errors->first('kode')); ?> </span> 
                            </div>

                            <div class="form-group">
                                <label>Nama Indonesia<span style="color: red;">*</span> </label>
                                <input name="nama_id" id="nama_id" type="text" class="form-control" placeholder="Nama Indonesia" value="<?php echo e($data->nama_id); ?>">
                                <span id="nama_id" class="help-block" ><?php echo e($errors->first('nama_id')); ?> </span> 
                            </div>

                            <div class="form-group">
                                <label>Nama Inggris<span style="color: red;">*</span></label>
                                <input name="nama_en" id="nama_en" type="text" class="form-control" placeholder="Nama Inggris" value="<?php echo e($data->nama_en); ?>">
                                <span id="nama_en" class="help-block" ><?php echo e($errors->first('nama_en')); ?> </span> 
                            </div>
                             
                        </div>
                    </div>
                    
                  </div>
              </div>
              </form>


              <div class="row">
                <div class="col-lg-12">
                    <div class="box-footer">
                        
                        <button type="button" class="btn btn-primary" id="btnSave"> <i class="fa fa-save" ></i> Simpan</button>
                        
                    </div>
                </div>
            </div>
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
var id = "<?php echo e($data->id); ?>";

$(function(){
    $('#btnSave').on('click',function(){
        store()
    });
});

function store(){
  var home = "<?php echo e(url('master/scope')); ?>";
  var formData = new FormData($('#formAdd')[0]);
  var url = "<?php echo e(url('master/scope')); ?>/"+id;
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: url,
    type: 'POST',
    dataType: "JSON",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
        if (response.status) {
            Swal.fire({
                title: response.message,
                // text: response.success,
                type: 'success',
                confirmButtonText: 'Close',
                confirmButtonColor: '#AAA',
                onClose: function() {
                    location.replace(home);
                }
            })

        }
    },
    error: function(xhr, status) {
        // reset to remove error
        var a = JSON.parse(xhr.responseText);
        // reset to remove error
        $('.form-group').removeClass('has-error');
        $('.help-block').hide(); // hide error span message
        $.each(a.errors, function(key, value) {
            $('[name="' + key + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
            $('span[id^="' + key + '"]').show(); // show error message span
            // for select2
            if (!$('[name="' + key + '"]').is("select")) {
                $('[name="' + key + '"]').next().text(value); //select span help-block class set text error string
            }
        });
    }
  });
}



$('.select2').select2();


</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('templates.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>