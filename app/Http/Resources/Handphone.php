<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Handphone extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'nama' => $this->nama,
            'tipe' => $this->tipe,
            'ram' => $this->ram,
            'rom' => $this->rom,
            'harga' => $this->harga,
        ];
    }
}
