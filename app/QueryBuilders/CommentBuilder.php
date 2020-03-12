<?php

namespace App\QueryBuilders;

use Apitizer\Routing\Scope;
use App\Models\Comment;
use Apitizer\Validation\RuleBuilder;
use Apitizer\Validation\Rules;
use Illuminate\Database\Eloquent\Model;

class CommentBuilder extends QueryBuilder
{
    public function fields(): array
    {
        return [
            'id'         => $this->int('id'),
            'uuid'       => $this->uuid('uuid'),
            'body'       => $this->string('body'),
            'created_at' => $this->datetime('created_at')->format(),
            'updated_at' => $this->datetime('updated_at')->format(),
        ];
    }

    public function associations(): array
    {
        return [
            'post'   => $this->association('post', PostBuilder::class),
            'author' => $this->association('author', UserBuilder::class),
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
    }

    public function scope(Scope $scope)
    {
        $scope->crud();
    }

    public function model(): Model
    {
        return new Comment();
    }
}
