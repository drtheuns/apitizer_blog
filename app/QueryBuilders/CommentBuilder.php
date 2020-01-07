<?php

namespace App\QueryBuilders;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class CommentBuilder extends QueryBuilder
{
    public function fields(): array
    {
        return [
            'id'         => $this->int('id'),
            'body'       => $this->string('body'),
            'created_at' => $this->datetime('created_at')->format(),
            'updated_at' => $this->datetime('updated_at')->format(),
            'post'       => $this->association('post', PostBuilder::class),
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
        return new Comment();
    }
}
