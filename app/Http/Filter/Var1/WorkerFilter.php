<?php

namespace App\Http\Filter\Var1;

use Illuminate\Database\Eloquent\Builder;

class WorkerFilter {

    private array $params = [];

    public function __construct(array $params){
        $this->params = $params;
    }

    public function getCallbacks() {
        return [
            self::NAME => 'name',
            self::SURNAME => 'surname',
            self::EMAIL => 'email',
            self::AGE_FROM => 'ageFrom',
            self::AGE_TO => 'ageTo',
            self::IS_MARRIED => 'isMarried',
            self::DESCRIPTION => 'description',
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
    const NAME ='name';
    const SURNAME = 'surname';
    const EMAIL = 'email';
    const AGE_FROM = 'from';
    const AGE_TO = 'to';
    const IS_MARRIED = 'is_married';
    const DESCRIPTION = 'description';

    public function name(Builder $builder, $value) {
        $builder->where("name", 'LIKE', "%".$value."%");

    }
    public function surname(Builder $builder, $value) {
        $builder->where("surname", 'LIKE', "%".$value."%");

    }
    public function email(Builder $builder, $value) {
        $builder->where("email", 'LIKE', "%".$value."%");

    }
    public function ageFrom(Builder $builder, $value) {
        $builder->where("age", '>', $value);

    }
    public function ageTo(Builder $builder, $value) {
        $builder->where("age", '<', $value);

    }
    public function isMarried(Builder $builder, $value) {
        $builder->where("is_married", true);

    }
    public function description(Builder $builder, $value) {
        $builder->where("name", 'LIKE', "%".$value."%");

    }

}