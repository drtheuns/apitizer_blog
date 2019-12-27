<?php

namespace App\QueryBuilders;

use App\Models\Comment;
use Apitizer\QueryBuilder;

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

    }

    public function model()
    {
        return new Comment();
    }
}
