<?php

namespace App\QueryBuilders;

use App\Models\Post;
use Apitizer\QueryBuilder;
use Apitizer\Transformers\DateTimeFormat;
use Apitizer\Types\Apidoc;

class PostBuilder extends QueryBuilder
{
    public function fields(): array
    {
        return [
            'id' => $this->int('id'),
            'title' => $this->string('title')->description('wow'),
            'body' => $this->string('body'),
            'created_at' => $this->datetime('created_at')->format(),
            'updated_at' => $this->datetime('updated_at')->format(),
            'comments' => $this->association('comments', CommentBuilder::class),
        ];
    }

    public function filters(): array
    {
        return [
            'title' => $this->filter()->search('title'),
        ];
    }

    public function sorts(): array
    {
        return [
            'created_at' => $this->sort()->byField('created_at'),
        ];
    }

    public function model()
    {
        return new Post();
    }
}
