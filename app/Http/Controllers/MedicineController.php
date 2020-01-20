<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Medicine;
use App\Http\Resources\Medicine as MedicineResource;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::orderBy('created_at', 'desc')->paginate(5);

        return MedicineResource::collection($medicines);
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
        /*$medicine = $request->isMethod('put') ? Medicine::findOrFail
        ($request->id) : new Medicine;
        */

        $medicine = new Medicine;
        $medicine->id = $request->input('id');
        $medicine->nama_obat = $request->input('nama_obat');
        $medicine->keterangan = $request->input('keterangan');
        $medicine->harga = $request->input('harga');
        
        if($medicine->save()) {
            return new MedicineResource($medicine);
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
        $medicine = Medicine::findOrFail($id);

        return new MedicineResource($medicine);
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
        if($medicine = Medicine::findOrFail ($id)) {
            //$medicine->id = $request->input('id');
            $medicine->nama_obat = $request->input('nama_obat');
            $medicine->keterangan = $request->input('keterangan');
            $medicine->harga = $request->input('harga');
            
            if($medicine->save()) {
                return new MedicineResource($medicine);
            }
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
        $medicine = Medicine::findOrFail($id);

        if($medicine->delete()) {
            return new MedicineResource($medicine);
        }
    }
}
