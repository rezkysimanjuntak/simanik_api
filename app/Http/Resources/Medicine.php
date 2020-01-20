<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Medicine extends JsonResource
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
            'nama_obat' => $this->nama_obat,
            'keterangan' => $this->keterangan,
            'harga' => $this->harga
        ];
    }
}
