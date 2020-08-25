<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat ISO <?php echo e($data->nama_bu); ?></title>

    <style>
      

      #watermark {
        position: fixed;
        top: 30%;
        left: 20%;
        width: 100%;
        text-align: center;
        opacity: .4;
        font-size: 60px;
        transform: rotate(25deg);
        transform-origin: 5% 5%;
        z-index: -1000;
      }
      body {
        margin: 0px;
        padding: 0;
        background-color: #FAFAFA;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
      }

      * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
      }

      .page {
          position: relative;
          overflow: hidden;
          width: 21cm;
          min-height: 29.7cm;
          padding: 0cm;
          margin: 0cm auto;
          border: 0px #D3D3D3 solid;
          border-radius: 0px;
          
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
          
          background-size: contain;
          background-repeat: no-repeat;
      }

      .cert{
        width: 560px;
        border-collapse: collapse;
      }

      .cert, td, th {
        white-space:nowrap;
        }


      
      @page  {
          size: A4;
          margin: 0;
      }
      
      [contenteditable=true]:empty:before {
      content: attr(placeholder);
      color:gray;
      }
      /* found this online --- it prevents the user from being able to make a (visible) newline */
      [contenteditable=true] br{
      display:none;
    }


      }

  </style>

</head>
<body>
      <?php if($data->is_reseller == 0): ?>
      <div class="page" style="background-image: url('/iso/images/blanko_iso.png');">
        <?php else: ?>
        <div class="page" style="background-image: url('/iso/images/blanko_iso_nopo.png');">
      <?php endif; ?>
        <div id="watermark">
          <?php if($data->status == 1): ?>
            <h1><?php echo e($data->status_r->nama); ?></h1>
          <?php endif; ?>
        </div>
        <div style="text-align: center; margin-top: 0px;">
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
      </div>
      <div style="margin-top: 90px; margin-left: 115px; margin-right: 110px; text-align: justify; border: 0px #206f9c solid;">
        <p style="text-align: center;">This is to certify that</p>
        <div style="text-indent: 28px">
          <p style="font-size: 26px; margin-top:-10px; font-weight: bold; text-align: center;"><?php echo e($data->nama_bu); ?></p>
        </div>
        <p style="margin-top: -20px; text-align: center; text-indent: 22px"><?php echo e($data->alamat); ?> <?php echo e($data->kota ? $data->kota_r->nama : ''); ?></p>
        <p style="line-height: 150%; text-align: center;">&nbsp; has been assessed and registered <strong>PT. Sertifikasi Badan Usaha Mandiri</strong> 
          <br> as confirming to the requirements of :</p>
        <p style="font-size: 24px; font-weight: bold; color: #206f9c; text-transform: uppercase; text-align: center;"><?php echo e($data->iso_r->nama_en); ?></p>
        <p style="font-size: 42px; font-weight: bold; color: #206f9c; text-transform: uppercase; text-align: center; margin-top: -5PX;"><?php echo e($data->iso_r->kode); ?></p>
        <P style="margin-top: -10px; text-align: center;">For the following Scope :</P>
        <p style="font-size: 16px; font-weight: bold; text-align: justify; line-height: 150%;">
            "Provision of
           <?php $__currentLoopData = $data->lap_r->scope_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if($loop->last): ?> And <?php endif; ?><?php echo e($key->scope_r->nama_en); ?><?php if(!$loop->last): ?>, <?php endif; ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            "</p>
      </div>
      <div style="margin-left: 115px; margin-right: 120px;">
      <table class="cert" width="420px">
        <tr>
          <td colspan="3">Certificate No.</td>
          <td colspan="1">:</td>
          <td colspan="4"><u><?php echo e($data->no_sert); ?></u></td>
          <td colspan="3">1<sup>st</sup> Survaillance</td>
          <td colspan="1">:</td>
          <td colspan="4"><u><?php echo e(\Carbon\Carbon::parse($data->tgl_sert)->add('1','years')->isoFormat('DD-MM-YYYY')); ?></u></td>
        </tr>
        <tr>
          <td colspan="3">Issued Date</td>
          <td colspan="1">:</td>
          <td colspan="4"><u><?php echo e(\Carbon\Carbon::parse($data->tgl_sert)->isoFormat('DD-MM-YYYY')); ?></u></td>
          <td colspan="3">2<sup>nd</sup> Survaillance</td>
          <td colspan="1">:</td>
          <td colspan="4"><u><?php echo e(\Carbon\Carbon::parse($data->tgl_sert)->add('2','years')->isoFormat('DD-MM-YYYY')); ?></u></td>
        </tr>
        <tr>
          <td colspan="3">Valid Date</td>
          <td colspan="1">:</td>
          <td colspan="4"><u><?php echo e(\Carbon\Carbon::parse($data->tgl_sert)->add('3','years')->isoFormat('DD-MM-YYYY')); ?></u></td>
          <td colspan="3">Recertification</td>
          <td colspan="1">:</td>
          <td colspan="4"><u><?php echo e(\Carbon\Carbon::parse($data->tgl_sert)->add('3','years')->isoFormat('DD-MM-YYYY')); ?></u></td>
        </tr>
        <tr>
          <td colspan="8" style="padding: 20px; vertical-align: bottom; text-align: left;">
            <?php if($data->status != 1): ?>
              <img src="<?php echo e(public_path('qr/')); ?>/QR_<?php echo e($data->id); ?>.png" height="100px">
            <?php else: ?>
            <span height="100px"></span>
            <?php endif; ?>
          </td>
          <td colspan="8" style="padding: 20px; vertical-align: bottom; text-align: center;"><img src="<?php echo e(public_path('iso/images/')); ?>/tt_dasril.png" width="140px" height="50px" ><br>Director</td>
        </tr>
        
      </table>  
      
      
    </div>
    


</body>
</html>