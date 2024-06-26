<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identify' => $this->uuid,
            'name' => $this->name,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'lessons' => LessonResource::collection($this->lessons)
        ];
    }
}
