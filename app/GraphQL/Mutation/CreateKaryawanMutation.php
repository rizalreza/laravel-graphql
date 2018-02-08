<?php
namespace App\GraphQL\Mutation;



use App\Karyawan;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateKaryawanMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateKaryawan'
    ];

    public function type(){
        return GraphQL::type('karyawan');
    }

    public function args()
    {
        return [

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

        $karyawan = Karyawan::create($args);
        
        return $karyawan;
    }
}
