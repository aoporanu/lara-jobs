<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed title
 * @property mixed description
 * @property mixed company
 * @property mixed category
 * @property mixed created_at
 * @property mixed updated_at
 */
class JobResource extends JsonResource
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
            'name'          => $this->title,
            'description'   => $this->description,
            'company'       => $this->company,
            'category'      => $this->category,
        ];
    }
}
