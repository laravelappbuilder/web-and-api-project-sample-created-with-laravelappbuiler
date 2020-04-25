<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
          'id' => $this->id,
          'coverimage' => asset('images/'.$this->coverimage),
					'title' => $this->title,
					'body' => $this->body,
					'link' => '/posts/'.$this->slug,
					'created_at' => $this->created_at->diffForHumans(),
          'updated_at' => $this->updated_at,
        ];
    }
}
