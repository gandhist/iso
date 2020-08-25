<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>Validity - <?php echo e($data->nama_bu); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE-2.3.11/dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE-2.3.11/plugins/datatables/dataTables.bootstrap.css')); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE-2.3.11/plugins/fileinput-v4.5.2-0/css/fileinput.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE-2.3.11/plugins/fileinput-v4.5.2-0/css/fileinput-rtl.css')); ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">

  <!-- FONT AWESOME -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor')); ?>/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('global.css')); ?>">
  
  <?php echo $__env->yieldPushContent('style'); ?>
<?php $__env->startPush('style'); ?>
<style>

.footer--light {
 background:#e7e8ed
}

.footer-menu {
 padding-left:48px
}
.footer-menu ul li a {
 font-size:15px;
 line-height:32px;
 -webkit-transition:.3s;
 -o-transition:.3s;
 transition:.3s
}
.footer-menu ul li a:hover {
 color:#5867dd
}
.footer-menu--1 {
 width:100%
}
.footer-widget-title {
 line-height:42px;
 margin-bottom:10px;
 font-size:18px
}
.mini-footer {
 background:#192027;
 text-align:center;
 padding:32px 0
}
.mini-footer p {
 margin:0;
 line-height:26px;
 font-size:15px;
 color:#999
}
.mini-footer p a {
 color:#5867dd
}
.mini-footer p a:hover {
 color:#34bfa3
}
    </style>
<?php $__env->stopPush(); ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="padding: 30px">
    
  
      <div class="container">
            
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
                <div class="widget-user-image">
                    <div class="text-center">
                      <a href="<?php echo e(asset('iso/ketentuan.zip')); ?>">
                        <img class="img-thumbnail img-fluid" style="height: 150px; width:200px" src="<?php echo e(asset('iso/images/logoheader.png')); ?>" alt="Logo Mandiri Certification">
                      </a>
                    </div>
                </div>
              
            </div>
            
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header text-center">
                            <h1 ><?php echo e($data->nama_bu); ?></h1>
                        </div>
                    </div>
                </div>
              <div class="row">
                <div class="col-sm-4 border-right text-center">
                    <h4>Scope Of Sertification :</h4>
                  <div class="description-block">
                    <h5 class="description-header">
                        <?php if($data->lap_r): ?>
                            <?php $__currentLoopData = $data->lap_r->scope_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if($loop->last): ?>
                                    <?php echo e($key->scope_r->nama_en); ?>

                                <?php else: ?>
                                    <?php echo e($key->scope_r->nama_en); ?>, 
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right text-center">
                    <h4>Standard : </h4> <div class="description-block"> <h5 class="description-header"> <a href="<?php echo e(asset('iso/ketentuan.zip')); ?>"><?php echo e($data->iso_r->kode); ?> </a></h5> </div>
                    <h4>Certificate Number : </h4> <div class="description-block"> <h5 class="description-header"> <?php echo e($data->no_sert); ?> </h5> </div>                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 text-center">
                    <h4>Address : </h4>
                  <div class="description-block">
                    <h5 class="description-header"><?php echo e($data->alamat); ?></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>

            <div class="box-footer">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading text-center text-bold">
                        CERTIFICATE STATUS
                    </div>
                        <div class="table-responsive">

                            <table class="table table-bordered">
                                
                                <tr>
                                    <td class="bg-aqua-active">Main Assesment Date</td>
                                    <td class="text-center"><?php echo e(\Carbon\Carbon::parse($data->tgl_sert)->isoFormat('DD MMMM YYYY')); ?></td>
                                    <td class="bg-aqua-active">Certificate Status</td>
                                    <td class="text-center"><button type="button" class="btn btn-block btn-success">Valid</button></td>
                                </tr>
                                <tr>
                                    <td class="bg-aqua-active">Effective Date</td>
                                    <td class="text-center"><?php echo e(\Carbon\Carbon::parse($data->tgl_sert)->isoFormat('DD MMMM YYYY')); ?></td>
                                    <td class="bg-aqua-active">Expired Date</td>
                                    <td class="text-center"><p> <?php echo e(\Carbon\Carbon::parse($data->valid_date)->isoFormat('DD MMMM YYYY')); ?></p></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading text-center text-bold">
                        SURVEILANCE STATUS
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive">
                            
                            <tr>
                                <td class="bg-aqua-active">1<sup>st</sup> Surveilance</td>
                                <td class="text-center"><?php echo e(\Carbon\Carbon::parse($data->first_surv)->isoFormat('DD MMMM YYYY')); ?></td>
                                <td class="bg-aqua-active">1<sup>st</sup> Surveilance Status</td>
                                <td class="text-center"><button type="button" class="btn btn-block btn-success">Valid</button></td>
                            </tr>
                            <tr>
                                <td class="bg-aqua-active">2<sup>nd</sup> Surveilance</td>
                                <td class="text-center"><?php echo e(\Carbon\Carbon::parse($data->second_surv)->isoFormat('DD MMMM YYYY')); ?></td>
                                <td class="bg-aqua-active">2<sup>nd</sup> Surveilance Status</td>
                                <td class="text-center"><button type="button" class="btn btn-block btn-success">Valid</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

          </div>
  
      </div><!-- /.container -->
</body>
<footer class="footer-area footer--light">
    <div class="mini-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text text-center">
              <p>© <?php echo e(\Carbon\Carbon::now()->isoFormat("YYYY")); ?>

                <a href="<?php echo e(url('/')); ?>">Mandiri Certification</a>. All rights reserved.
              </p>
            </div>
  
            <div class="go_top">
              <span class="icon-arrow-up"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php echo $__env->make('templates.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
