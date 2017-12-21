<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Template;

class AddUserTemplateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'AddUserTemplate'
    ];

    public function type()
    {
        return GraphQL::type('Template');
    }

    public function args()
    {
        return [
            'users_id' => ['name' => 'users_id', 'type' => Type::nonNull(Type::int())],
            'template' => ['name' => 'templatepassword', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function rules()
    {
        return [
            'users_id' => ['required'],
            'template' => ['required']
        ];
    }

    public function resolve($root, $args)
    {
        $tpl = new Template;
        $tpl->name = '';
        $tpl->users_id = $args['users_id'];
        $tpl->save();

        foreach($args['values'] as $key => $value) {
            $tpl->values()->attach(["key" => $key, "value" => $value]);
        }
        
        return $tpl;
    }
}