<?php

namespace App\Http\Controllers\Master\Scope;
use App\Http\Controllers\Controller;

use App\Models\Masters\Scope;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Scope::orderBy('id','desc')->get();
        return view('master.scope.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master.scope.create');
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
        $request->validate(
            [
                'nama_id' => 'required',
                'nama_id' => 'unique:iso_scope',
                // 'kode' => 'unique:iso_scope',
                'nama_en' => 'unique:iso_scope',
                'nama_en' => 'required'
            ],
            [
                'nama_id.required' => 'Nama Indonesia harus di isi',
                'nama_en.required' => 'Nama Inggris harus di isi',
                // 'kode.unique' => 'Kode sudah ada',
                'nama_id.unique' => 'Nama Indonesia sudah ada',
                'nama_en.unique' => 'Nama Inggris sudah ada'
            ]
        );
        $simpan =  array_merge($request->all(), ['created_by' => Auth::id(), 'created_at' => Carbon::now()->toDateTimeString()]);
        Scope::create($simpan);
        return response()->json([
            'status' => true,
            'message' => "Scope berhasil tersimpan!"
        ],200);
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
        $data = Scope::find($id);
        return view('master.scope.edit')->with(compact('data'));

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
        $simpan =  array_merge($request->all(), ['updated_by' => Auth::id(), 'updated_at' => Carbon::now()->toDateTimeString()]);
        Scope::find($id)->update($simpan);
        return response()->json([
            'status' => true,
            'message' => "Scope berhasil tersimpan!"
        ],200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = explode(',',$request->idHapusData);
        $data = Scope::whereIn('id',$id);
        $data->update([
            'deleted_at' => Carbon::now()->toDateTimeString(),
            'deleted_by' => Auth::id(),
        ]);
        return redirect('master/scope')->with('success','Data Berhasil dihapus');
    }
}
