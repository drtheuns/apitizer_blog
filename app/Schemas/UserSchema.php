<?php

namespace App\Schemas;

use Apitizer\Routing\Scope;
use Apitizer\Validation\ObjectRules;
use App\Models\User;
use Apitizer\Validation\Rules;
use Illuminate\Database\Eloquent\Model;

class UserSchema extends Schema
{
    public function fields(): array
    {
        return [
            'id'    => $this->int('id'),
            'name'  => $this->string('name'),
            'email' => $this->string('email'),
        ];
    }

    public function associations(): array
    {
        return [
            'posts' => $this->association('posts', PostSchema::class),
            'comments' => $this->association('comments', CommentSchema::class),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function sorts(): array
    {
        return [];
    }

    public function rules(Rules $rules)
    {
        $rules->storeRules(function (ObjectRules $object) {
            $object->string('name')->required();
            $object->string('email')->required()->email();
        });
    }

    public function scope(Scope $scope)
    {
        $scope->readable()
              ->association('posts', function (Scope $scope) {
                  $scope->readable()
                        ->association('comments', function (Scope $scope) {
                            $scope->readable();
                        });
              });
    }

    public function model(): Model
    {
        return new User;
    }
}
