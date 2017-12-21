<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\User;

class TemplateQuery extends Query
{
    protected $attributes = [
        'name' => 'template'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Template'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
            'name' => ['name' => 'name', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args)
    {
        return User::all();
    }
}