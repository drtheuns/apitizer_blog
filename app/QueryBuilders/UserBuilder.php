<?php

namespace App\QueryBuilders;

use App\Models\User;
use Apitizer\QueryBuilder;

class UserBuilder extends QueryBuilder
{
    public function fields(): array
    {
        return [
            'id'    => $this->int('id'),
            'name'  => $this->string('name'),
            'email' => $this->string('email'),
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

    public function model()
    {
        return new User;
    }
}
