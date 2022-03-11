<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enum\EStatus;
use App\Models\Enum\EContract;
use Illuminate\Support\Facades\Date;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbrInserts = [
          [ 'nom' => 'A',
              'prenom' => 'A',
               'contrat' => EContract::CDI,
               'statut' => EStatus::OUVRIER ,
               'age' => 17 ,
               'date_embauche' => \date('Y-m-d',strtotime('1/1/2020')),

            ],

            [ 'nom' => 'B',
                'prenom' => 'B',
                'contrat' => EContract::CDI,
                'statut' => EStatus::EMPLOYEE ,
                'age' => 59 ,
                'date_embauche' => \date('Y-m-d',strtotime('1/1/1995')),

            ],


            [ 'nom' => 'C',
                'prenom' => 'C',
                'contrat' => EContract::CDD,
                'statut' => EStatus::EMPLOYEE ,
                'age' => 43 ,
                'date_embauche' => \date('Y-m-d',strtotime('1/1/2022')),

            ],


            [ 'nom' => 'D',
                'prenom' => 'D',
                'contrat' => EContract::CDD,
                'statut' => EStatus::EMPLOYEE ,
                'age' => 35 ,
                'date_embauche' => \date('Y-m-d',strtotime('1/2/2020')),

            ],


        ];

        foreach ($nbrInserts as $insert){
            Employee::insert($insert);
        }




    }
}
