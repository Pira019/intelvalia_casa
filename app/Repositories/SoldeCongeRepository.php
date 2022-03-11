<?php
/**
 * Created by PhpStorm.
 * User: Pira
 * Date: 3/11/2022
 * Time: 1:06 AM
 */

namespace App\Repositories;


use App\Interfaces\IEmployeeRepo;
use App\Interfaces\ISoldeConge;
use App\Models\SoldeCongee;

class SoldeCongeRepository implements ISoldeConge
{

    protected $soldeConge;
    protected $calculesoldeConge;

    public function __construct(SoldeCongee $soldeConge)
    {
        $this->soldeConge = $soldeConge;

    }

    public function getAll()
    {

        return $this->soldeConge::all();
    }

    public function save($data)
    {

        $this->soldeConge::upsert(
            $data,
            ['employee_id' => $data['employee_id'], 'annee' =>$data ['annee']],
            ['employee_id'],['employee_id']

        );

        return 0;
    }
}