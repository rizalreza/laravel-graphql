<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use Folklore\GraphQL\Support\Type as GraphQLType;
use App\Karyawan;

class KaryawanType extends GraphQLType
{
    protected $attributes = [
        'name' => 'KaryawanType',
        'description' => 'A type',
        'model' =>Karyawan::class,
    ];

    public function fields()
    {
        return [
        	'id' => [
        		'type' => Type::nonNull(Type::int()),
                'description' => 'Id karyawan',
        	],
        	'nama' => [
        		'type' => Type::string(),
                'description' => 'Nama karyawan',
        	],
            'alamat' => [
        		'type' => Type::string(),
                'description' => 'Alamat karyawan',
        	],
            'jabatan' => [
        		'type' => Type::string(),
                'description' => 'Jabatan karyawan',
        	],
            'no_hp' => [
        		'type' => Type::string(),
                'description' => 'No hp karyawan',
        	],         
        ];
    }

    protected function resolveKaryawanField($root, $args)
    {
        return strtolower($root->karyawan);
    }
}
