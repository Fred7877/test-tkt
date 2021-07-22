<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompagnyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray(
            [
                'id' => $this->id,
                'name' => $this->name,
                'sector' => $this->sector,
                'siren' => $this->siren,
            ]
        );
    }
}
