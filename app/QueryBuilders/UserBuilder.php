<?php

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserBuilder extends QueryBuilder
{
    public function fields(): array
    {
        return [
            'id'    => $this->int('id'),
            'name'  => $this->string('name'),
            'email' => $this->string('email'),
            'posts' => $this->association('posts', PostBuilder::class),
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

    public function model(): Model
    {
        return new User;
    }
}
