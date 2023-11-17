<?php 

namespace App\Http\Filter\Worker;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WorkerSurnameFilter
{
    public function handle($content, Closure $next) {


        if(request()->has('surname')){
            $content->where("surname","LIKE","%". request('surname') ."%");
        }
        return $next($content);
    }
}