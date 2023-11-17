<?php

namespace App\Http\Filter\Var1;

use Illuminate\Database\Eloquent\Builder;

class PostFilter {

    private array $params = [];

    public function __construct(array $params){
        $this->params = $params;
    }

    public function getCallbacks() {
        return [
            self::TITLE => 'title',
            self::VIEW => 'view',
           
        ];
    }

    public function applyFilter(Builder $builder) 
    {
        foreach($this->getCallbacks() as $key => $callback) {
            if(isset($this->params[$key])){
                $this->$callback($builder, $this->params[$key]);
            }
        }
    }
    const TITLE ='title';
    const VIEW = 'view';
    

    public function title(Builder $builder, $value) {
        $builder->where("name", 'LIKE', "%".$value."%");

    }
    public function view(Builder $builder, $value) {
        $builder->where("surname", 'LIKE', "%".$value."%");

    }

}