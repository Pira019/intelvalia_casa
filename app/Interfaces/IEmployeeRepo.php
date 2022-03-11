<?php
/**
 * Created by PhpStorm.
 * User: Pira
 * Date: 3/10/2022
 * Time: 11:29 PM
 */
namespace App\Interfaces;

interface IEmployeeRepo extends IRessource
{

    public function demanderConge();
    public function calculerSoldeConge() : int ;
    public function calculerPeriodEssai() : int ;
    public function findEmployer($data) : array ;



}