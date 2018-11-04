<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'id'            => $this->id,
            'cover'         => $this->cover,
            'slogan'        => $this->slogan,
            'description'   => $this->description,
            'jobs'          => JobResource::collection($this->jobs)
        ];
    }
}
