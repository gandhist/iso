<?php

namespace App\Http\Controllers\Iso;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\IsoModel;
use App\Laporan;
use App\KotaModel;
use App\ProvinsiModel;
use App\NegaraModel;
use PDF;
use App\Traits\GlobalFunction;
use Illuminate\Support\Facades\Crypt;
use Vinkla\Hashids\Facades\Hashids;


class IsoController extends Controller
{
    use GlobalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $data = IsoModel::orderBy('id','desc');
        if($request->get('f_awal_first') && $request->get('f_akhir_first')){
            $f_aw_surv = Carbon::createFromFormat('d/m/Y',$request->get('f_awal_first'))->format('Y-m-d');
            $f_ak_surv = Carbon::createFromFormat('d/m/Y',$request->get('f_akhir_first'))->format('Y-m-d');
            $data->whereBetween("first_surv",[$f_aw_surv, $f_ak_surv])->orderBy('first_surv','desc');
        }
        if($request->get('f_awal_second') && $request->get('f_akhir_second')){
            $f_aw_surv = Carbon::createFromFormat('d/m/Y',$request->get('f_awal_second'))->format('Y-m-d');
            $f_ak_surv = Carbon::createFromFormat('d/m/Y',$request->get('f_akhir_second'))->format('Y-m-d');
            $data->whereBetween("second_surv",[$f_aw_surv, $f_ak_surv])->orderBy('second_surv','desc');
        }
        $data = $data->get();
        return view('iso.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $judul = "Input Data Sertifikat Iso";
        $save_method = "add";
        $inisiator = IsoModel::all();
        $provinsi = ProvinsiModel::all();
        $kota = KotaModel::all();
        $negara = NegaraModel::all();
        return view('iso.create')->with(compact('judul','inisiator','provinsi','kota','negara','save_method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_bu' => 'required',
            'id_kota' => 'required',
            'id_prov' => 'required',
            'id_negara' => 'required',
            'no_sert' => 'required',
            'scope' => 'required',
            'alamat' => 'required',
            'tgl_sert' => 'required',
            'tipe_iso' => 'required',
        ],[
            'nama_bu.required' => 'Nama Badan Usaha Harus Di Isi!',
            'id_kota.required' => 'Kota Harus Di Isi!',
            'id_prov.required' => 'Provinsi Harus Di Isi!',
            'id_negara.required' => 'Negara Harus Di Isi!',
            'no_sert.required' => 'No Sertifikat Harus Di Isi!',
            'scope.required' => 'Ruang Linkup/Scope Harus Di Isi!',
            'alamat.required' => 'Alamat Harus Di Isi!',
            'tgl_sert.required' => 'Tanggal Serifikat Harus Di Isi!',
            'tipe_iso.required' => 'Tipe Iso Harus Di Isi!',
        ]);
        $data = new IsoModel;
        $data->create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil di Simpan'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $judul = "Perbarui Data Sertifikat Iso";
        $save_method = "edit";
        $inisiator = IsoModel::all();
        $provinsi = ProvinsiModel::all();
        $kota = KotaModel::all();
        $negara = NegaraModel::all();
        $data = IsoModel::find($id);
        return view('iso.create')->with(compact('data','judul','inisiator','provinsi','kota','negara','save_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_bu' => 'required',
            'id_kota' => 'required',
            'id_prov' => 'required',
            'id_negara' => 'required',
            'no_sert' => 'required',
            'scope' => 'required',
            'alamat' => 'required',
            'tgl_sert' => 'required',
            'tipe_iso' => 'required',
        ],[
            'nama_bu.required' => 'Nama Badan Usaha Harus Di Isi!',
            'id_kota.required' => 'Kota Harus Di Isi!',
            'id_prov.required' => 'Provinsi Harus Di Isi!',
            'id_negara.required' => 'Negara Harus Di Isi!',
            'no_sert.required' => 'No Sertifikat Harus Di Isi!',
            'scope.required' => 'Ruang Linkup/Scope Harus Di Isi!',
            'alamat.required' => 'Alamat Harus Di Isi!',
            'tgl_sert.required' => 'Tanggal Serifikat Harus Di Isi!',
            'tipe_iso.required' => 'Tipe Iso Harus Di Isi!',
        ]);
        $data = IsoModel::find($id);
        $data->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil di Simpan'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $idData = explode(',', $request->idHapusData);
        $user_data = [
            'deleted_by' => Auth::id(),
            'deleted_at' => Carbon::now()->toDateTimeString()
        ];
        IsoModel::whereIn('id', $idData)->update($user_data);
        return redirect('admin/iso')->with('success', 'Data terpilih berhasil dihapus');
    }

    public function print($id){
        // generate qr first
        $idc = Hashids::encode($id);
        $url4 = url("iso/validity/$idc");
        $nama4 = "QR_".$id.".png";
        $qrcode4 = \QrCode::margin(100)->format('png')->errorCorrection('L')->size(150)->generate($url4, base_path("public/qr/".$nama4));

        $data['data'] = IsoModel::find($id);
        $pdf = PDF::loadview('iso.iso_temp', $data);
        $pdf->setPaper('A4','portrait');
        return $pdf->stream("Sertifikat.pdf");
        return view('iso.iso_temp');
    }

    public function printx($id){
        // generate qr first
        $idc = Hashids::encode($id);
        $url4 = url("iso/validity/$idc");
        $nama4 = "QR_".$id.".png";
        $qrcode4 = \QrCode::margin(100)->format('png')->errorCorrection('L')->size(150)->generate($url4, base_path("public/qr/".$nama4));

        $data['data'] = IsoModel::find($id);
        $pdf = PDF::loadview('iso.iso_tempx', $data);
        $pdf->setPaper('A4','portrait');
        return $pdf->stream("Sertifikat.pdf");
        return view('iso.iso_temp');
    }

    public function printxBlanko($id){
        // generate qr first
        $idc = Hashids::encode($id);
        $url4 = url("iso/validity/$idc");
        $nama4 = "QR_".$id.".png";
        $qrcode4 = \QrCode::margin(100)->format('png')->errorCorrection('L')->size(150)->generate($url4, base_path("public/qr/".$nama4));

        $data['data'] = IsoModel::find($id);
        $pdf = PDF::loadview('iso.iso_blanko_rame', $data);
        $pdf->setPaper('A4','portrait');
        return $pdf->stream("Sertifikat.pdf");
        return view('iso.iso_temp');
    }

    // print blanko
    public function print_blanko($id){
        // $id = Crypt::encrypt($id);
        $idc = Hashids::encode($id);
        // generate qr first
        $url4 = url("iso/validity/$idc");
        $nama4 = "QR_".$id.".png";
        $qrcode4 = \QrCode::margin(100)->format('png')->errorCorrection('L')->size(150)->generate($url4, base_path("public/qr/".$nama4));

        $data['data'] = IsoModel::find($id);
        $pdf = PDF::loadview('iso.iso_temp2', $data);
        $pdf->setPaper('A4','portrait');
        return $pdf->stream("Sertifikat.pdf");
    }

    // validity iso
    public function validity($id){
        $idc = Hashids::decode($id);
        $data = IsoModel::find($idc[0]);
        $frst = strtotime($data->first_surv);
        $scnd = strtotime($data->second_surv);
        $now = strtotime(Carbon::now()->isoFormat('YYYY-MM-DD'));
        $first_surv = false;
        $second_surv = false;
        if($now >= $frst){
            switch ($data->is_paid_first_surv) {
                case '0':
                    $first_surv = false;
                    break;
                
                default:
                    $first_surv = true;
                    break;
            }
        }
        else {
            $first_surv = true;
        }
        if($now >= $scnd){
            switch ($data->is_paid_second_surv) {
                case '0':
                    $second_surv = false;
                    break;
                
                default:
                    $second_surv = true;
                    break;
            }
        }
        else {
            $second_surv = true;
            if($data->is_paid_first_surv == 0){
                $second_surv = false;
            }
        }
        return view('iso.validity')->with(compact('data','first_surv','second_surv'));
    }

    // generate iso number
    public function bentukNo(Request $request){
        $id = $request->id;
        $id_iso = $request->id_std;
        $id_kokab = $request->id_kota;
        $no_iso = $this->generate_iso_number($id_iso, $id_kokab);
        $lp = Laporan::find($id);
        $lp->id_number = $no_iso;
        $simpan = $lp->save();
        $iso = IsoModel::where('id_laporan',$lp->id)->first();
        if(!$iso){
            return response()->json([
                'status' => false,
                'message' => 'No Iso Tidak ada'
            ], 200);
        }
        $iso->no_sert = $no_iso;
        $iso->status = $lp->status;
        $iso->save();
        if($simpan){
            return response()->json([
                'status' => true,
                'message' => 'No Iso Berhasil di bentuk',
                'noiso' => $lp->id_number
            ], 200);
        }
        else {
            return response()->json([
                'status' => false,
                'message' => 'No Iso gagal di bentuk'
            ], 200);
        }


    }

    // update paid
    public function paid (Request $request){
        $idData = explode(',', $request->id_surveilance);
        $update_data = [
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ];
        $data = IsoModel::whereIn('id', $idData);
        if($request->param_surveilance == "first"){
            $data->update(array_merge($update_data, ['is_paid_first_surv' => 1]));
        }
        else {
            $data->where('is_paid_first_surv', 1)->update(array_merge($update_data, ['is_paid_second_surv' => 1]));
        }
        return redirect('isos')->with('success', 'Berhasil ubah status pembayaran surveillance');

    }

    
}
