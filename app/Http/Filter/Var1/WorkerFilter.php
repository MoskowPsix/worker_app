<?php

namespace App\Http\Filter\Var1;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filter\Var1\AbstractFilter;


class WorkerFilter extends AbstractFilter {

    public function getCallbacks(): array 
    {
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