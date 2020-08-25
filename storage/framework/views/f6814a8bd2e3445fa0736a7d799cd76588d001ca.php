<?php error_reporting(E_ALL ^ E_DEPRECATED); ?>
<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                
                <title>Laporan Audit v1</title>
            
                <style>

                    body {
                        background-image:url("iso/images/wm_iso_biru_2.png");
                        /* background-image:url("<?php echo e(asset('a.png')); ?>"); */
                        /* background-image-resize:6; */
                        line-height:150%;
                        font-family:arial;
                    }

                    td{
                        line-height:150%;
                    }

                    .page {
                        position: relative;
                        overflow: hidden;
                        width: 21cm;
                        min-height: 29.7cm;
                        padding: 0cm;
                        margin: auto;
                        margin-top:20px;
                    }
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

                    table{
                        table-layout:fixed;
                    }
                    
                    @media  print{
                    .pagebreak{
                        page-break-before: always;
                    }

                    .noprint{
                        display:none;
                    }
                    }

                
                </style>

            </head>
            <body>
                <div id="watermark">
                    <?php if($data->status == 1): ?>
                        <h1><?php echo e($data->status_r->nama); ?></h1>
                    <?php endif; ?>
                </div>
                <div class="page">
                    <div align=center >
                        <div style="text-align: justify;">
                            <br>
                            <br>
                            <p style="margin-top:80px; text-align: center; font-size: 18px; font-weight:bold; text-decoration: underline;">LAPORAN AUDIT</p>
                            <p style="font-weight: bold; font-size: 18px;">Sertifikasi Sistem Manajemen Mutu</p>
                        </div>
                    </div>
                    
                    <table width=100% border=1 cellspacing=0 cellpadding=0 style="border-collapse:collapse;border:1;">
                            <tr>
                                <td style="width:30%; padding:10px; background-color:#206f9c; color: white; font-weight: bold;">Organization</td>
                                <td  style="width:70%; padding:10px; background-color: #206f9c; color: white; font-weight: bold; ">
                                    <?php echo e($data->bu_r->nama_bu); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px; font-size:14px;">Address</td>
                                <td style="width:70%; vertical-align: top; padding:10px; font-size:14px;">
                                    <?php echo e($data->bu_r->alamat); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Standard</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->iso_r->kode); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">ID Number</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->id_number); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Audit Date</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->audit_date ? \Carbon\Carbon::parse($data->audit_date)->isoFormat('DD MMMM YYYY') : ''); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Visit Number</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->visit_number); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Visit Type</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->visit_type); ?>

                                </td>
                            </tr>
                        </table>
                        <p></p>
                        <table width=100% border=1 cellspacing=0 cellpadding=0 style="border-collapse:collapse;border:1;">
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Company Representative</td>
                                <td style="width:70%; vertical-align: top; padding:10px; font-weight: bold;">
                                    <?php echo e($data->bu_r->bu_p_r->nama_pimp); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Site Audited</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->site_audited); ?>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="24" style="vertical-align: top; padding:10px; text-align: center;"><i>* Untuk multi-situs audit, semua situs diaudit akan tercantum dalam lingkup audit<br> atau dalam lampiran</i></td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Lead Auditor</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->lead_auditor); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; vertical-align: top; padding:10px;">Additional Team Member</td>
                                <td style="width:70%; vertical-align: top; padding:10px;">
                                    <?php echo e($data->additional_member); ?>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="24" style="vertical-align: top; padding:10px; text-align: center;"><i>Laporan ini bersifat rahasia dan didistribusikan terbatas kepada tim audit, perwakilan klien dan kantor Mandiri Certification</i></td>
                            </tr>
                        </table> 
                </div>

                <div class="pagebreak"></div>

                <div class="page">
                    <div align=center >
                        <div style="text-align: justify;">
                            <br>
                            <br>

                            <p style="margin-top: 80px; text-align: center; font-size: 18px; font-weight:bold; text-decoration: underline;">LAPORAN AUDIT</p>   
                            
                            <ol type="1">
                                <li><b>Tujuan Audit</b></li>
                            
                                    Tujuan dari audit ini:
                                    <ul>
                                        <li>Untuk mengkonfirmasi bahwa sistem manajemen sesuai dengan semua persyaratan standar.</li>
                                        <li>Untuk mengkonfirmasi bahwa organisasi telah efektif menerapkan sistem manajemen yang telah direncanakan.</li>
                                        <li>Untuk mengkonfirmasi bahwa manajemen mampu mencapai tujuan kebijakan organisasi.</li>
                                    </ul>
                                <br>

                                <li><b>Ruang Lingkup Sertifikasi</b></li>
                                    Audit Mencakup:
                                    <br>
                                    <p style="font-weight: bold; text-align: justify;">
                                        "Provision of
                                       <?php $__currentLoopData = $data->scope_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($loop->last): ?> And <?php endif; ?><?php echo e($key->scope_r->nama_en); ?><?php if(!$loop->last): ?>, <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        "
                                    </p>
                                    </td>
                                    
                                    
                                    
                                    <i><small>Ini adalah audit multi-situs dan lampiran daftar semua situs yang relevan dan / atau lokasi terpencil telah ditetapkan (terlampir) dan setuju dengan klien</small></i>
                                     <input <?php echo e($data->scope_multi_situs == "ya" ? "checked='checked'" : ""); ?> type="checkbox"> Yes 
                                     <input <?php echo e($data->scope_multi_situs == "tidak" ? "checked='checked'" : ""); ?> type="checkbox"> No
                                    <br>
                                    <br>

                                <li><b>Temuan Audit Saat Ini Dan Solusi</b></li>
                                Tim audit melakukan audit proses berbasis berfokus pada aspek penting / resiko / tujuan diperlukan oleh standar. Metode audit yang dilakukan adalah wawancara, observasi kegiatan dan review dokumentasi catatan.<br>
                                Struktur audit sudah sesuai dengan rencana audit dan matriks perencanaan audit yang disertakan sebagai lampiran laporan ringkasan.
                                <br>
                                <br>
                                Tim audit menyimpulkan bahwa organisasi 
                                <input <?php echo e($data->tas_1 == 'telah' ? "checked='checked'" : ''); ?> type="checkbox" class="Radio">telah 
                                <input <?php echo e($data->tas_1 == 'belum' ? "checked='checked'" : ''); ?> type="checkbox" class="Radio">belum 
                                 ditetapkan dan dipelihara sistem manajemen sesuai dengan persyaratan standar dan menunjukkan kemampuan sistem untuk secara sistematis mencapai persyaratan yang disepakati untuk produk atau jasa dalam lingkup dan kebijakan organisasi dan tujuan.
                                <br>
                                <br>
                                Jumlah ketidak sesuaian diidentifikasi:   <b><?php echo e(strtoupper($data->tas_2)); ?></b>
                                
                                <br>
                                <br>
                                Oleh karena itu tim audit merekomendasikan bahwa, berdasarkan hasil dari audit dan keadaan sistem menunjukkan perkembangan dan kematangan, sertifikasi sistem manajemen menjadi:<br>
                                <input <?php echo e($data->tas_3 == 'diberikan' ? "checked='checked'" : ''); ?> type="checkbox"> Diberikan<br>
                                <input <?php echo e($data->tas_3 == 'lanjut' ? "checked='checked'" : ''); ?> type="checkbox"> Lanjut<br>
                                <input <?php echo e($data->tas_3 == 'rahasia' ? "checked='checked'" : ''); ?> type="checkbox"> Dirahasiakan<br>
                                <input <?php echo e($data->tas_3 == 'tangguh' ? "checked='checked'" : ''); ?> type="checkbox"> Ditangguhkan sampai tindakan korektif yang memuaskan<br>
                            
                            </ol>
            
                        </div>
                    </div>
                </div>

                <div class="pagebreak"></div>

                    <div class="page">
                    <div align=center >
                        <div style="text-align: justify;">
                            <br>
                            <br>

                            <p style="margin-top: 80px; text-align: center; font-size: 18px; font-weight:bold; text-decoration: underline;">LAPORAN AUDIT</p>   
                            
                            <ol type="1" start="4">
                                <li><b>Hasil Audit Sebelumnya (N/A)</b></li>
                                    Hasil audit terakhir dari sistem ini telah ditinjau, khususnya untuk memastikan kereksi yang sesuai.<br>
                                    <table border=0 width=95%>
                                        <tr>
                                            <td width=5% style="vertical-align:top; padding:5px;"><input <?php echo e($data->audit_sebelumnya == '1' ? "checked='checked'" : ''); ?> type="checkbox"></td>
                                            <td width=95% style="text-align:justify;  vertical-align:top;">Setiap ketidaksesuaian yang diidentifikasi selama audit sebelumnya telah diperbaiki dan tindakan perbaikan terus menjadi efektif.</td>
                                        </tr>
                                        <tr>
                                            <td width=5% style="vertical-align:top; padding:5px;"><input <?php echo e($data->audit_sebelumnya == '2' ? "checked='checked'" : ''); ?> type="checkbox"></td>
                                            <td width=95% style="text-align:justify; vertical-align:top;">Sistem manajemen belum ditangani ketidaksesuaian yang diidentifikasi selama kegiatan audit sebelumnya dan isu tertentu telah kembali didefinisikan dalam bagian ketidaksesuaian laporan ini.</td>
                                        </tr>
                                        <tr>
                                            <td width=5% style="vertical-align:top; padding:5px;"><input <?php echo e($data->audit_sebelumnya == '3' ? "checked='checked'" : ''); ?> type="checkbox"></td>
                                            <td width=95% style="text-align:justify; vertical-align:top;">Tidak ada Corrective Action Request (CAR) dari kunjungan sebelumnya untuk ditindaklanjuti.</td>
                                        </tr>
                                    </table>
                                    <br>
                                            
                                <li><b>Temuan Audit</b></li>
                                    Tim audit melakukan proses audit berdasarkan berfokus pada aspek yang signifikan / resiko / tujuan. Metode audit yang digunakan adalah wawancara, observasi kegiatan dan review dokumentasi dan catatan.<br>
                                    <table border=1 width=95% cellspacing=0 cellpadding=0 style="border-collapse:collapse; border:1;">
                                        <tr>
                                            <td width=80% style="text-align:justify; vertical-align:top; padding:5px;">Dokumentasi sistem manajemen memperlihatkan kesesuaian dengan persyaratan standar audit dan memberikan struktur yang memadai untuk mendukung implementasi dan pemeliharaan sistem manajemen.</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_1 == '1' ? "checked='checked'" : ''); ?> type="checkbox"><br>Yes</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_1 == '0' ? "checked='checked'" : ''); ?> type="checkbox"><br>No</td>
                                        </tr>
                                        <tr>
                                            <td width=80% style="text-align:justify; vertical-align:top; padding:5px;">Organisasi telah menunjukkan implementasi yang efektif untuk pemeliharaan / perbaikan sistem manajemen.</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_2 == '1' ? "checked='checked'" : ''); ?> type="checkbox"><br>Yes</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_2 == '0' ? "checked='checked'" : ''); ?> type="checkbox"><br>No</td>
                                        </tr>
                                        <tr>
                                            <td width=80% style="text-align:justify; vertical-align:top; padding:5px;">Organisasi telah menunjukkan dan menjalankan sistem  yang mampu telusur, tepat sasaran dengan tujuan untuk kemajuan yang dipantau dan terdokumentasi terhadap prestasi mereka.</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_3 == '1' ? "checked='checked'" : ''); ?> type="checkbox"><br>Yes</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_3 == '0' ? "checked='checked'" : ''); ?> type="checkbox"><br>No</td>
                                        </tr>
                                        <tr>
                                            <td width=80% style="text-align:justify; vertical-align:top; padding:5px;">Program audit internal telah sepenuhnya dilaksanakan dan menunjukkan efektifitas sebagai alat untuk mempertahankan dan meningkatkan sistem manajemen.</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_4 == '1' ? "checked='checked'" : ''); ?> type="checkbox"><br>Yes</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_4 == '0' ? "checked='checked'" : ''); ?> type="checkbox"><br>No</td>
                                        </tr>
                                        <tr>
                                            <td width=80% style="text-align:justify; vertical-align:top; padding:5px;">Proses tinjauan manajemen memperlihatkan kemampuan untuk memastikan kesesuaian, kecukupan dan efektifitas sistem manajemen.</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_5 == '1' ? "checked='checked'" : ''); ?> type="checkbox"><br>Yes</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_5 == '0' ? "checked='checked'" : ''); ?> type="checkbox"><br>No</td>
                                        </tr>
                                        <tr>
                                            <td width=80% style="text-align:justify; vertical-align:top; padding:5px;">Selama proses audit, sistem manajemen keseluruhan memperlihatkan kesesuaian dengan persyaratan standar audit.</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_6 == '1' ? "checked='checked'" : ''); ?> type="checkbox"><br>Yes</td>
                                            <td width=10% style="text-align:center; vertical-align:middle; padding:5px;"><input <?php echo e($data->ta_6 == '0' ? "checked='checked'" : ''); ?> type="checkbox"><br>No</td>
                                        </tr>
                                        
                                    </table>

                            </ol>
            
                        </div>
                    </div>
                </div>

                <div class="pagebreak"></div>

                <div class="page">
                    <div align=center >
                        <div style="text-align: justify;">
                            <br>
                            <br>

                            <p style="margin-top: 80px; text-align: center; font-size: 18px; font-weight:bold; text-decoration: underline;">LAPORAN AUDIT</p>   
                            
                            <ol type="1" start="6">
                                <li><b>Tahapan Dalam Proses Audit</b></li>
                                    Proses spesifik, kegiatan dan fungsi yang rinci dalam Matrix Perencanaan Audit dan Audit Plan. Dalam melakukan audit dan keterkaitan berbagai audit yang dikembangkan. Jalur audit diikuti, termasuk bukti obyektif dan pengamatan terhadap keseluruhan proses dan kontrol yang dicatat dalam "Catatan Audit" yang merupakan bagian dari paket sertifikasi permanen tetapi tidak disampaikan kepada klien.<br>
                                    Peluang untuk perbaikan serta pengamatan positif atau negatif khusus yang dijelaskan dibawah bagian 8 sementara ketidaksesuaian dicatat dalam lampiran "Permintaan Tindakan Korektif (CAR)"
                                    <br>
                                    <br>
                                    
                                <li><b>Ketidaksesuaian</b></li>
                                    Ketidaksesuaian rinci dalam lampiran "Permintaan Tindakan Korektif (CAR)" harus ditangani melalui proses tindakan korektif organisasi, sesuai dengan persyaratan yang relevan tindakan korektif dan pencegahan dari standar audit dan catatan lengkap.<br>
                                    <table border=1 width=95% cellspacing=0 cellpadding=0 style="border-collapse:collapse; border:1;">
                                        <tr>
                                            <td width=5% style="vertical-align:top; padding:10px;"><input <?php echo e($data->tikor == 'major' ? "checked='checked'" : ''); ?> type="checkbox"></td>
                                            <td width=95% style="text-align:justify; padding:5px; vertical-align:top;">Tindakan korektif untuk mengatasi ketidaksesuaian <b>MAJOR</b> diidentifikasi harus segera dilakukan dan <b>Mandiri Certification diberitahu tentang tindakan yang diambil dalam waktu 30 hari.</b> Auditor Mandiri Certification akan melakukan <b>tindak lanjut kunjungan dalam waktu 60 hari</b> untuk mengkonfirmasi tindakan yang diambil, evaluasi terhadap keefektifan mereka, dan menentukan apakah sertifikasi dapat diberikan atau dilanjutkan.</td>
                                        </tr>
                                        <tr>
                                            <td width=5% style="vertical-align:top; padding:10px;"><input <?php echo e($data->tikor == 'minor' ? "checked='checked'" : ''); ?> type="checkbox"></td>
                                            <td width=95% style="text-align:justify; padding:5px; vertical-align:top;">Tindakan korektif untuk mengatasi ketidaksesuaian <b>MINOR</b> harus segera dilakukan dan diidentifikasi dan <b>catatan dengan bukti pendukung yang dikirim ke auditor Mandiri Certification untuk close-out dalam waktu 90 hari.</b> Pada kunjungan Audit jadwal berikutnya, tim audit Mandiri Certification akan menindaklanjuti semua ketidaksesuaian diidentifikasi untuk mengkonfirmasi efektifitas tindakan perbaikan dan pencegahan yang diambil.</td>
                                        </tr>    
                                    </table>
                                    <br>

                                <li><b>Observasi Dan Peluang Peningkatan</b></li>
                                    <ol type="1">
                                        <?php $__currentLoopData = $data->obs_r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><span id="obs_1" contenteditable="true" placeholder=". . . . . . . . . "><?php echo e($key->nilai); ?></span></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                                    </ol>
                                            
                            </ol>
            
                        </div>
                    </div>
            </div>

                <div class="pagebreak"></div>

                <div class="page">
                    <div align=center >
                        <div style="text-align: justify;">
                            <br>
                            <br>

                            <p style="margin-top: 80px; text-align: center; font-size: 18px; font-weight:bold; text-decoration: underline;">LAPORAN AUDIT</p>
                        </div>
                        
                        <p style="text-align:left; "><b>Corrective Action Request<br>
                        <input <?php echo e($data->car == '1' ? "checked='checked'" : ''); ?> type="checkbox"> <b>Major </b>  
                        <input <?php echo e($data->car == '0' ? "checked='checked'" : ''); ?> type="checkbox"> <b>Minor</b></p>

                        <table width=100% border=1 cellspacing=0 cellpadding=0 style=" border-collapse:collapse;border:0;">
                            <tr>
                                <td colspan="2" style="vertical-align: top; padding:5px;">Organisasi</td>
                                <td colspan="6" style="vertical-align: top; padding:5px; font-weight: bold;">
                                    <span id="nama_perusahaan" contenteditable="true" placeholder="Nama Perusahaan" style="text-transform: uppercase;"><?php echo e($data->bu_r->nama_bu); ?></span>
                                </td>
                            </tr>
                        
                            <tr>
                                <td colspan="2" style="vertical-align: top; padding:5px;">Lokasi Audit</td>
                                <td colspan="6" style="vertical-align: top; padding:5px;">
                                    <span id="alamat" contenteditable="true" placeholder="Alamat"><?php echo e($data->bu_r->alamat); ?></span>
                                </td>
                            </tr>
                        
                            <tr>
                                <td colspan="2" style="width:25%; vertical-align:top; padding: 5px;">Auditor(s)</td>
                                <td colspan="2" style="width:25%; vertical-align:top; padding: 5px;"><span id="auditors" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->lead_auditor); ?> & <?php echo e($data->additional_member); ?> </span></td>
                                <td colspan="2" style="width:25%; vertical-align:top; padding: 5px;">Date(s) of audit(s)</td>
                                <td colspan="2" style="width:25%; vertical-align:top; padding: 5px;"><span id="aud_date" contenteditable="true" placeholder="DD-MM-YYYY"><?php echo e($data->audit_date ? \Carbon\Carbon::parse($data->audit_date)->isoFormat('DD MMMM YYYY') : ''); ?></span></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="vertical-align: top; padding:5px;">Standard(s)</td>
                                <td colspan="6" style="vertical-align: top; padding:5px;">
                                    <span id="id_iso" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->iso_r->kode); ?></span>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" style="vertical-align: top; padding:5px;">Organization Rep.</td>
                                <td colspan="6" style="vertical-align: top; padding:5px;">
                                    <span id="comp_rep" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->or1); ?></span>
                                </td>
                            </tr>
                            
                            
                            
                            
                            
                            <tr>
                                <td colspan="4" style="vertical-align:top; padding: 5px;">Area/Department/Process</td>
                                <td colspan="4" style="vertical-align:top; padding: 5px;"><span id="area" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->dept); ?></span></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Document Ref.</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="doc_reff" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->doc_ref); ?></span></td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Standard Ref.</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="std_reff" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->standard_ref); ?></span></td>
                                
                            <tr>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">No. CAR</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="car_no" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->car_no); ?></span></td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">CAR Close-Out date</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="co_date" contenteditable="true" placeholder="DD-MM-YYYY"><?php echo e($data->car_date ? \Carbon\Carbon::parse($data->car_date)->isoFormat('DD MMMM YYYY') : ''); ?></span></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Detail of Non-Conformity</td>
                                <td colspan="6" style="vertical-align:top; padding: 5px;"><span id="det_non_conf" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->doc_r->nama); ?></span></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Organization Rep.</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="comp_rep" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->or2); ?></span></td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Auditor</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="auditors" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->auditor1); ?></span></td>
                            </tr>
                            
                            <tr>
                                <td colspan="8" style="vertical-align:top; padding: 5px;">Untuk mencegah terulangnya temuan maka tindakan korektif yang dilakukan adalah :<br>
                                    <span id="pencegahan" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->pencegahan); ?></span></td>
                            </tr>

                            <tr>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Organization Rep.</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="org_rep" contenteditable="true" placeholder=". . . . . . . . . ."><?php echo e($data->or3); ?></span></td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Date</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="org_rep_date" contenteditable="true" placeholder="DD-MM-YYYY"><?php echo e($data->date_or ? \Carbon\Carbon::parse($data->date_or)->isoFormat('DD MMMM YYYY') : ''); ?></span></td>
                            </tr>

                            <tr>
                                <td colspan="8" style="vertical-align:top; padding: 5px;">Penerimaan Corrective Action / Komentar (gunakan lembar tambahan jika perlu) :<br>
                                    <span id="penerimaan" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->penerimaan); ?></span></td>
                            </tr>

                            <tr>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Auditor</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="auditor" contenteditable="true" placeholder=". . . . . . . ."><?php echo e($data->auditor2); ?></span></td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;">Date</td>
                                <td colspan="2" style="vertical-align:top; padding: 5px;"><span id="aud_date" contenteditable="true" placeholder="DD-MM-YYYY"><?php echo e($data->auditor_date ? \Carbon\Carbon::parse($data->auditor_date)->isoFormat('DD MMMM YYYY') : ''); ?></span></td>
                            </tr>
                            
                            <tr>
                                <td colspan="4" style="vertical-align:top; padding: 5px;">Response required (in months)</td>
                                <td colspan="2" style="text-align:center; font-weight:bold; vertical-align:top; padding: 5px;">Major</td>
                                <td colspan="2" style="text-align:center; font-weight:bold; vertical-align:top; padding: 5px;">Minor</td>
                            </tr>
                            
                            <tr>
                                <td colspan="4" rowspan="2" style="text-align:justify; vertical-align:top; padding: 5px;">Corrective Action harus ditangani dalam jangka waktu yang dinyatakan. Verifikasi tindakan akan terjadi pada kunjungan berikutnya. Tindak lanjut tambahan mungkin diperlukan seperti yang ditunjukkan.</td>
                                <td colspan="1" style="text-align:center; font-weight:bold; background-color:#206f9c; color: white; vertical-align:top; padding: 5px;">Define</td>
                                <td colspan="1" style="text-align:center; font-weight:bold; background-color:#206f9c; color: white; vertical-align:top; padding: 5px;">Close Out</td>
                                <td colspan="1" style="text-align:center; font-weight:bold; background-color:#206f9c; color: white; vertical-align:top; padding: 5px;">Define</td>
                                <td colspan="1" style="text-align:center; font-weight:bold; background-color:#206f9c; color: white; vertical-align:top; padding: 5px;">Close Out</td>
                            </tr>
                            
                            
                            <tr>
                            
                            <td colspan="1" style="text-align:center; font-weight:bold; vertical-align:top; padding: 5px;">1 Bulan</td>
                            <td colspan="1" style="text-align:center; font-weight:bold; vertical-align:top; padding: 5px;">3 Bulan</td>
                            <td colspan="1" style="text-align:center; font-weight:bold; vertical-align:top; padding: 5px;">3 Bulan</td>
                            <td colspan="1" style="text-align:center; font-weight:bold; vertical-align:top; padding: 5px;">Next Visit</td>
                            </tr>

                            <tr>
                                
                                
                            </tr>
                            
                            
                        </table></div>
                </div>

            </body>
            </html>