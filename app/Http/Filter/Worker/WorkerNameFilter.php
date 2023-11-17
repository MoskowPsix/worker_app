<?php 

namespace App\Http\Filter\Worker;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WorkerNameFilter
{
    public function handle($content, Closure $next) {


        if(request()->has('name')){
            $content->where("name","LIKE","%". request('name') ."%");
        }
        return $next($content);
    }
}