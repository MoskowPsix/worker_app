<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deportment extends Model
{
    use HasFactory;
    protected $table = "deportments";
    protected $guarded = false;

    public function boss() {
        return $this->hasOneThrough(Worker::class, Position::class)
        ->where('position_id', 4);
    }

    public function workers() {
        return $this->hasManyThrough(Worker::class, Position::class);
    }
}
