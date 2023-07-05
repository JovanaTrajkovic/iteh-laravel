<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgencijaZaNekretnineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'naziv' => $this->resource->naziv,
            'adresa' => $this->resource->adresa,
            'email' => $this->resource->email,
            'website' => $this->resource->website,
            'brojTelefona' => $this->resource->brojTelefona,
        ];
    }
}
