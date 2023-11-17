<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filter\Var1\AbstractFilter;


trait HasFilter 
{
    public function scopeFilter(Builder $builder, AbstractFilter $filter): Builder
    {
        $filter->applyFilter($builder);
        return $builder;
    }
}