<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Doctor;
use App\Http\Resources\Doctor as DoctorResource;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$doctors = Doctor::paginate(15);
        $doctors = Doctor::orderBy('created_at', 'desc')->paginate(5);

        return DoctorResource::collection($doctors);
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
        /*$doctor = $request->isMethod('put') ? Doctor::findOrFail
        ($request->id) : new Doctor;
        */

        $doctor = new Doctor;
        $doctor->id = $request->input('id');
        $doctor->nama = $request->input('nama');
        $doctor->alamat = $request->input('alamat');
        $doctor->nomor_telepon = $request->input('nomor_telepon');
        $doctor->kategori = $request->input('kategori');
        $doctor->rating = $request->input('rating');


        if($doctor->save()) {
            return new DoctorResource($doctor);
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
        $doctor = Doctor::findOrFail($id);

        return new DoctorResource($doctor);
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
        if($doctor = Doctor::findOrFail ($id)) {
            //$doctor->id = $request->input('id');
            $doctor->nama = $request->input('nama');
            $doctor->alamat = $request->input('alamat');
            $doctor->nomor_telepon = $request->input('nomor_telepon');
            $doctor->kategori = $request->input('kategori');
            $doctor->rating = $request->input('rating');
            
            if($doctor->save()) {
                return new DoctorResource($doctor);
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
        $doctor = Doctor::findOrFail($id);

        if($doctor->delete()) {
            return new DoctorResource($doctor);
        }
    }
}
