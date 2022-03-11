<?php
/**
 * Created by PhpStorm.
 * User: Pira
 * Date: 3/11/2022
 * Time: 1:24 AM
 */

namespace App\Interfaces\Calcules;

interface ICalcules
{

    //Calculer le mois(12) pour alimenter soldeCongé
    public function dateDifference($startDate,$endDate) ;
    public function soldeAcquis($startDate,$endDate,$age) : int;

}