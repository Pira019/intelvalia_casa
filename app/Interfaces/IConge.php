<?php
/**
 * Created by PhpStorm.
 * User: Pira
 * Date: 3/11/2022
 * Time: 6:26 AM
 */

namespace App\Interfaces;


interface IConge extends IRessource
{

    /*this data

    idEMploye, datesortie, dureeEnjours

    */
        public function demangerConger($data) ;
}