<?php

namespace App\GraphQL\Query;


use GraphQL;
use App\Karyawan;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;


class KaryawanQuery extends Query
{
    protected $attributes = [
        'name' => 'KaryawanQuery'
       
    ];

    public function type()
        {
            return Type::listOf(GraphQL::type('karyawan'));
        }

    public function args()
    {
        return [
            'id' => ['name' => 'id','type' => Type::int()],
            'nama' => ['name' => 'nama','type' => Type::string()],
            'alamat' => ['name' => 'alamat','type' => Type::string()],
            'jabatan' => ['name' => 'jabatan','type' => Type::string()],
            'no_hp' => ['name' => 'no_hp','type' => Type::string()
            ],
            

        ];
    }

    public function resolve($root, $args)
    {
        if(isset($args['id']))
            {
                return Karyawan::where('id' , $args['id'])->get();
            }
            else if(isset($args['nama']))
            {
                return Karyawan::where('nama', $args['nama'])->get();
            }
            else
            {
                return Karyawan::all();
            }
    }
}

