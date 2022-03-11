<?php
/**
 * Created by PhpStorm.
 * User: Pira
 * Date: 3/11/2022
 * Time: 1:29 AM
 */

namespace App\Repositories;


use App\Interfaces\Calcules\ICalcules;

class CalculesRepository implements ICalcules
{

    private  $soldeAcquis;


    public function dateDifference($startDate, $endDate): int
    {
        $startDate = date_create($startDate);
        $endDate = date_create($endDate);

        $diff = date_diff($startDate,$endDate);

        return $diff->format("%Y");
    }

    public function soldeAcquis($startDate,$endDate,$age): int
    {
        $diff = date_diff(date_create($startDate),date_create($endDate));



        //6 mois +- 182 jours
        if ($diff->days >= 182){

            if ($age<18){

                //365/25 jours

                $this->soldeAcquis = 365/24;

            }else{


                if($diff->y<5){
                    //350 % 18
                    $this->soldeAcquis = 365/18;
                }else{

                    $this->soldeAcquis = 365/30;
                }
            }
            return $this->soldeAcquis;

        }else{
            return 0;
        }
    }
}