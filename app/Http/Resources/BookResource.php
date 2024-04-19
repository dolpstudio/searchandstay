<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'isbn' => $this->isbn,
            'bookvalue' => (float) number_format($this->bookvalue, 2, '.', ''),
            'stores' => $this->store,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
