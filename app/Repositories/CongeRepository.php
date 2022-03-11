<?php
/**
 * Created by PhpStorm.
 * User: Pira
 * Date: 3/11/2022
 * Time: 6:30 AM
 */

namespace App\Repositories;


use App\Interfaces\IConge;
use App\Models\Congee;
use App\Models\SoldeCongee;

class CongeRepository implements  IConge
{

    private $conge;
    private  $soldeConge;

    /**
     * CongeRepository constructor.
     */
    public function __construct(Congee $congee, SoldeCongee $soldeCongee)
    {
        $this->conge = $congee;
        $this->soldeConge = $soldeCongee;
    }

    public function demangerConger($data)
    {
      $employee =  $this->soldeConge::where([
          ['annee' ,'=', $data['annee']],
          ['soldeAcquis','<>', 0],
          ['employee_id', '=', $data['employee_id']]

        ])->first();


      if($employee){

      if ($data['dureeEnjour'] - $employee['dureeEnjour'] > 0){

          $this->conge::create([
              'dureeEnJour' => $data['dureeEnjour'],
              'employeek_id' => $employee->employee_id,
              'dateSortie' => $data['dateSortie'],
          ]);

          $this->soldeConge::where('id',$employee->id)
              ->update(['soldeRestant' => $employee->soldeRestant - $data['dureeEnjour']]);


      }else{

          return 'Solde restant insuffisant';
      }

    }else{

          return 'Solde insuffisant';
      }

    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
    }
}