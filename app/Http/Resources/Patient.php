<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Patient extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'jenis_kelamin' => $this->jenis_kelamin,
            'umur' => $this->umur,
            'jenis_penyakit' => $this->jenis_penyakit,
            'nomor_telepon' => $this->nomor_telepon,
        ];
    }
}
