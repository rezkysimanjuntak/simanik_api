<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Doctor extends JsonResource
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
            'nomor_telepon' => $this->nomor_telepon,
            'kategori' => $this->kategori,
            'rating' => $this->rating
        ];        
    }
}
