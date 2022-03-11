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
use function PHPUnit\Framework\isEmpty;

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


      if ($data['dureeEnjour'] - $employee['soldeRestant'] <= 0){

          Congee::create([
              'dureeEnJour' => $data['dureeEnjour'],
              'employee_id' => $employee->employee_id,
              'dateSortie' => date('Y-m-d',strtotime($data['dateSortie'])),
          ]);

          $this->soldeConge::where('id',$employee->id)
              ->update(['soldeRestant' => $employee->soldeRestant - $data['dureeEnjour']]);


      }else{

          return 'Solde restant insuffisant';
      }

      }else{
          return 'Solde restant insuffisant';
      }


    }


    public function getAll()
    {
      return  $this->conge::all();
    }
}