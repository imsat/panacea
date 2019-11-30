<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'identifier' => (string)$this->id,
            'name' => $this->category_name,
            'mark' => $this->category_slug,
            'details' => $this->category_description,
            'creationDate' => $this->created_at,
            'lastChange' => $this->updated_at,
        ];
    }
}
