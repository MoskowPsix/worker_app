<?php 

namespace App\Http\Filter\Worker;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WorkerDescriptionsFilter
{
    public function handle($content, Closure $next) {


        if(request()->has('descriptions')){
            $content->where("descriptions","LIKE","%". request('descriptions') ."%");
        }
        return $next($content);
    }
}