<?php

namespace App\Schemas;

use Apitizer\Validation\ObjectRules;
use App\Models\Post;
use App\Models\PostStatus;
use App\Schemas\Policies\Authenticated;
use Apitizer\Validation\Rules;
use Apitizer\Routing\Scope;
use Illuminate\Database\Eloquent\Model;

class PostSchema extends Schema
{
    public function fields(): array
    {
        return [
            'id'         => $this->int('id'),
            'uuid'       => $this->uuid('uuid'),
            'title'      => $this->string('title')->description('wow'),
            'body'       => $this->string('body')
                                 ->policy(new Authenticated),
            'status'     => $this->enum('status', PostStatus::all()),
            'created_at' => $this->datetime('created_at')->format(),
            'updated_at' => $this->datetime('updated_at')->format(),
        ];
    }

    public function associations(): array
    {
        return [
            'author'     => $this->association('author', UserSchema::class),
            'comments'   => $this->association('comments', CommentSchema::class)
                                 ->description('People always have an opinion.'),
            'tags'       => $this->association('tags', TagSchema::class),
        ];
    }

    public function filters(): array
    {
        return [
            'title'    => $this->filter()->search('title'),
            'status'   => $this->filter()->byField('status'),
            'statuses' => $this->filter()->byField('status')->expect()->array()->whereEach()->string(),
            // belongsTo
            'author'   => $this->filter()->byAssociation('author'),
            'authors'  => $this->filter()->byAssociation('author')->expect()->array()->whereEach()->string(),
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

    public function rules(Rules $rules)
    {
        $rules->storeRules(function (ObjectRules $object) {
            $object->string('title')->required()->max(100);
            $object->string('body')->required();
            $object->string('status')->in(PostStatus::all());
            $object->array('tags')->whereEach()->uuid();
            $object->object('details', function (ObjectRules $object) {
                $object->uuid('author');
            });
            // TODO: Based on relation, add one or many of storerules from child schema.
            // $object->association('comments');
        });
    }

    public function scope(Scope $scope)
    {
        $scope->crud()
              ->association('author', function (Scope $scope) {
                  $scope->readable()
                        ->associationCrud('comments');
              });
    }

    public function model(): Model
    {
        return new Post();
    }
}
