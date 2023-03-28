<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    private mixed $id;
    private mixed $title;
    private mixed $slug;
    private mixed $content;
    private mixed $user;
    private mixed $published_at;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'post_name'=>$this->title,
            'slug'=>$this->slug,
            'content'=>$this->content,
            'author'=>[
                'name'=>$this->user->name,
                'email'=>$this->user->email,
            ],
            'created_at'=>$this->published_at
        ];
    }
}
