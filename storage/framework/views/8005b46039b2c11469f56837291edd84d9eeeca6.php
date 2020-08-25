<?php $__env->startSection('content'); ?>
<style>
    .jumbotron {
		background-image: url("p3sm.jpeg");
  		background-size: 100%;
		background-repeat:no-repeat;
	}
	
	
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
	<div class="jumbotron">
		
		
		
		
		
	
	<div class="welcome">
		<h1 style="margin-bottom:50px;">Selamat Datang di Website Sertifikat P3SM</h1>
		
		<button href="#" class="btn btn-success btn-border-filled" id="login" >Login</button>
		
		<button href="#" class="btn btn-success btn-border-filled" id="seminar" >Daftar Seminar</button>
	</div>

	<div class="login">
		<h2 class="head-title">Login</h2>
		<p>Silahkan Login dengan email dan password yang sudah terverifikasi.</p>
		<div class="col-sm-4">
		  	<form action="<?php echo e(url('login')); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Username" name="username">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<span class="glyphicon glyphicon-lock"></span>
				</div>
				<button type="submit" class="btn btn-primary">Sign In</button>
			
		  	</form>
		</div>
	</div>
	</div>
	<div class="seminar">
        <b>Daftar Seminar</b>
		<br>
        <table id="example" class="table table-bordered table-striped dataTable customTable" role="grid">
            <thead>
                <tr role="row">
                    <th style="width:2%;text-align:center;">No</th>
                    <th style="width:14%;text-align:center;">Tema</th>
                    <th style="width:17%;text-align:center;">Judul Seminar</th>
                    
					<th style="width:5%;text-align:center;">Tempat</th>
					<th style="width:5%;text-align:center;">Biaya</th>
					<th style="width:5%;text-align:center;"></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
					<td style="text-align:center;"><?php echo e($loop->iteration); ?></td>
					<td><?php echo e(str_limit(strip_tags(html_entity_decode($key->tema)),40)); ?></td>
					<td><?php echo e($key->nama_seminar); ?> <?php echo e(isset($key->tgl_awal) ? \Carbon\Carbon::parse($key->tgl_awal)->isoFormat("DD MMMM YYYY") : ''); ?></td>				
					
					<td style="text-align:center;"><?php echo e($key->lokasi_penyelenggara); ?></td>
					<td><?php if($key->is_free == '0'): ?> Gratis <?php else: ?> Rp. <?php echo e(format_uang($key->biaya)); ?> <?php endif; ?></td></td>
					<td style="text-align:center;">
						<a href="<?php echo e(url('infoseminar/detail',$key->id)); ?>" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="tooltip"
						data-placement="top" title="Lihat Detail">Detail</a>
					</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
	</div>

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" >
	$('.login').hide();
	$('.welcome').fadeIn('slow');
	$('.seminar').hide();
	$(function() {
		$('#login').on('click', function(){
			$('.welcome').fadeOut('slow', function(){
        		$('.login').fadeIn('slow');
      		});
		});

		$('#seminar').on('click', function(){
			$('.seminar').fadeIn('slow');
		});
	});

	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>