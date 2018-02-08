<?php

namespace App\GraphQL\Mutation;

use App\Karyawan;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;


class UpdateKaryawanMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateKaryawanMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('karyawan');
    }

    public function args()
    {
        return [

            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'nama' => [
                'name' => 'nama',
                'type' => Type::string()
            ],
            'alamat' => [
                'name' => 'alamat',
                'type' => Type::string()
            ],
            'jabatan' => [
                'name' => 'jabatan',
                'type' => Type::string()
            ],
            'no_hp' => [
                'name' => 'no_hp',
                'type' => Type::string()
            ]

        ];
    }

    public function resolve($root, $args)
    {
       $karyawan = Karyawan::find($args['id']);
       if (!$karyawan){
        return null;
       }
       $karyawan->nama = $args['nama'];
       $karyawan->alamat = $args['alamat'];
       $karyawan->jabatan = $args['jabatan'];
       $karyawan->no_hp = $args['no_hp'];
       $karyawan->save();
        return $karyawan;
    }
}