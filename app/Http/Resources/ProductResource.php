<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'identifier' => (string)$this->id,
            'name' => $this->product_name,
            'category' => $this->category_id,
            'mark' => $this->product_slug,
            'details' => $this->product_description,
            'warranty' => $this->product_warranty,
            'creationDate' => $this->created_at,
            'lastChange' => $this->updated_at,
        ];
    }
}
