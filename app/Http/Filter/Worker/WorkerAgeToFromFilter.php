<?php 

namespace App\Http\Filter\Worker;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WorkerNameFilter
{
    public function handle($content, Closure $next) {


        if(request()->has('to')) {
            $content->where("age", '<', request('to'));
        }
        if (request()->has('from')){
            $content->where("age", '>', request('from'));
        }
        return $next($content);
    }
}