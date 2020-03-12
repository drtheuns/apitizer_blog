<?php

namespace App\Schemas;

use Apitizer\Routing\Scope;
use App\Models\Tag;
use Apitizer\Validation\ObjectRules;
use Apitizer\Validation\Rules;
use Illuminate\Database\Eloquent\Model;

class TagSchema extends Schema
{
    public function fields(): array
    {
        return [
            'id'   => $this->int('id'),
            'name' => $this->string('name'),
        ];
    }

    public function associations(): array
    {
        return [];
    }

    public function filters(): array
    {
        return [];
    }

    public function sorts(): array
    {
        return [
            'name' => $this->sort()->byField('name'),
        ];
    }

    public function rules(Rules $rules)
    {
        $rules->storeRules(function (ObjectRules $object) {
            $object->string('name')->required();
        });

        $rules->updateRules(function (ObjectRules $object) {
            $object->string('name')->required();
        });
    }

    public function scope(Scope $scope)
    {
    }

    public function model(): Model
    {
        return new Tag;
    }
}
