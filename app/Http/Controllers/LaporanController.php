<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::get();

        return response()->json([
            'data' => $laporan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $image->storeAs('public/image', $image->hashName());
            
            $umkm = new Laporan();
            $umkm->image = $image->hashName();
            $umkm->lokasi = $request->lokasi;
            $umkm->keterangan = $request->keterangan;

            $umkm->save();     
            
            return response()->json([
                'data' => $umkm
            ]);

        }else{
            return response('Please input your image', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::find($id);

        return response()->json([
            'data' => $laporan
        ]);
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
        $validateData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $image->storeAs('public/image', $image->hashName());
            
            $umkm = Laporan::find($id);
            $umkm->image = $image->hashName();
            $umkm->lokasi = $request->lokasi;
            $umkm->keterangan = $request->keterangan;

            $umkm->save();     
            
            return response()->json([
                'data' => $umkm
            ]);
            
        }else{
            return response('Please input your image', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();

        return response()->json([
            'message' => 'data berhasil di delete'
        ]);
    }
}
