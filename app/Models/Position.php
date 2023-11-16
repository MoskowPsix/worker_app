<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = "positions";
    protected $guarded = false;

    public function workers() {
        return $this->hasMany(Worker::class);
    }

    public function deportment() {
        return $this->belongsTo(Deportment::class);
    }

    public function oldWorker() {
        return $this->hasOne(Worker::class)->ofMany('age', 'max');
    }

    public function minWorker() {
        return $this->hasOne(Worker::class)->ofMany('age', 'min');
    }
    public function nameWorker($name) {
        return $this->hasOne(Worker::class)->where('name', 'LIKE','%'.$name.'%')->firstOrFail();
    }

}
