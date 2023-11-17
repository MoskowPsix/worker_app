<?php 

namespace App\Http\Filter\Worker;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WorkerIsMarriedFilter
{
    public function handle($content, Closure $next) {


        if(request()->has('is_married')){
            $content->where("is_married", true);
        } else {
            $content->where("is_married", false);
        }
        return $next($content);
    }
}