<?php 

namespace App\Http\Filter\Worker;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WorkerEmailFilter
{
    public function handle($content, Closure $next) {


        if(request()->has('email')){
            $content->where("email","LIKE","%". request('email') ."%");
        }
        return $next($content);
    }
}