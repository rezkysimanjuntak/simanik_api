<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecord extends JsonResource
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
            'nama_pasien' => $this->nama_pasien,
            'nama_dokter' => $this->nama_dokter,
            'jenis_penyakit' => $this->jenis_penyakit,
            'tanggal' => $this->tanggal,
            'total_biaya' => $this->total_biaya
        ];
    }
}
