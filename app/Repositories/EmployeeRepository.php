<?php
/**
 * Created by PhpStorm.
 * User: Pira
 * Date: 3/11/2022
 * Time: 12:22 AM
 */

namespace App\Repositories;

use App\Interfaces\Calcules\ICalcules;
use App\Interfaces\IConge;
use App\Interfaces\IEmployeeRepo;
use App\Interfaces\ISoldeConge;
use App\Models\Employee;
use function Spatie\Ignition\ErrorPage\title;
use function Symfony\Component\Mime\Header\get;

class EmployeeRepository implements IEmployeeRepo
{


    private $calcules;
    private $soldeConge;
    private $employee_;
    private $conge;
    /**
     * EmployeeRepository constructor.
     */
    public function __construct(ICalcules $calcules, ISoldeConge $soldeConge, Employee $employee, IConge $conge)
    {
        $this->calcules = $calcules;
        $this->soldeConge = $soldeConge;
        $this->employee_=$employee;

        $this->conge = $conge;
    }

    public function demanderConge()
    {

        //recuperer les data
       $getInputs= func_get_args();

       $this->conge->demangerConger($getInputs);
    }

    public function calculerSoldeConge(): int
    {

        $finalArray =  array();
       $employees = $this->getAll();

        foreach ($employees as $list){

            $nbrAnnee = $this->calcules->dateDifference($list->date_embauche,date('Y-m-d',strtotime(now())));

            if ($nbrAnnee>0){
                for ($i=0; $i<$nbrAnnee; $i++){

                    $annee= intval(date('Y',strtotime($list['date_embauche'])))+$i;

                    $this->soldeConge->save([
                        'employee_id' => $list['id'],
                        'annee' => intval(date('Y',strtotime($list['date_embauche']))) +$i,
                        'soldeAcquis' => $this->calcules->soldeAcquis($list['date_embauche'],date('m-d',strtotime($list['date_embauche'])).'-'.$annee,['age']),
                        'soldeRestant' => $this->calcules->soldeAcquis($list['date_embauche'],date('m-d',strtotime($list['date_embauche'])).'-'.$annee,['age']),
                        'expire' => true,
                    ]);
                }
            }
        }
return 0;


    }

    public function calculerPeriodEssai(): int
    {





    }

    public function getAll()
    {
        return Employee::all();
    }

    public function findEmployer($data) : array
    {
       return $this->employee_::where($data)->first();
    }
}