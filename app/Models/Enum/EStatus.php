<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 10/03/2022
 * Time: 17:07
 */

namespace App\Models\Enum;


enum EStatus : int
{

        case OUVRIER = 1;
        case EMPLOYEE = 2;
        case CADRE = 3;

}