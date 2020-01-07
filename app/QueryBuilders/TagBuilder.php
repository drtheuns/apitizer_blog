<?php

namespace App\QueryBuilders;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class TagBuilder extends QueryBuilder
{
    public function fields(): array
    {
        return [
            'id'   => $this->int('id'),
            'name' => $this->string('name'),
        ];
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

    public function model(): Model
    {
        return new Tag;
    }
}
