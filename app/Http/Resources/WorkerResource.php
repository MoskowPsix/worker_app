<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $date = '2023-10-10';
        Carbon::parse($date);
        return [
            "id"=> $this->id,
            "name" => $this->name,
            "surname" => $this->surname,
            "age" => $this->age,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
