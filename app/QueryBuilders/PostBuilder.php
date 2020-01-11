<?php

namespace App\QueryBuilders;

use App\Models\Post;
use App\QueryBuilders\Policies\Authenticated;
use Illuminate\Database\Eloquent\Model;

class PostBuilder extends QueryBuilder
{
    public function fields(): array
    {
        return [
            'id'         => $this->int('id'),
            'uuid'       => $this->uuid('uuid'),
            'title'      => $this->string('title')->description('wow'),
            'body'       => $this->string('body')
                                 ->policy(new Authenticated),
            'status'     => $this->enum('status', ['published', 'draft', 'scrapped', 'another-status']),
            'created_at' => $this->datetime('created_at')->format(),
            'updated_at' => $this->datetime('updated_at')->format(),
            'author'     => $this->association('author', UserBuilder::class),
            'comments'   => $this->association('comments', CommentBuilder::class)
                                 ->description('People always have an opinion.'),
            'tags'       => $this->association('tags', TagBuilder::class),
        ];
    }

    public function filters(): array
    {
        return [
            'title'    => $this->filter()->search('title'),
            'status'   => $this->filter()->byField('status'),
            'statuses' => $this->filter()->byField('status')->expectMany('string'),
            // belongsTo
            'author'   => $this->filter()->byAssociation('author'),
            'authors'  => $this->filter()->byAssociation('author')->expectMany('string'),
            // hasMany
            'comment'  => $this->filter()->byAssociation('comments'),
        ];
    }

    public function sorts(): array
    {
        return [
            'id'         => $this->sort()->byField('id'),
            'created_at' => $this->sort()->byField('created_at'),
        ];
    }

    public function model(): Model
    {
        return new Post();
    }
}
