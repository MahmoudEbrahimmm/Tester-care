<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            '#' => $this->id,
            'Category_name' => $this->name,
            'Category_slug' => $this->slug,
            'Category_parent' => $this->parent_id,
            'Category_image' => $this->image,
            'Category_note_desc' => $this->description,
        ];
    }
}
