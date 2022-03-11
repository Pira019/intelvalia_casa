<?php

namespace App\Http\Controllers;

use App\Interfaces\IEmployeeRepo;
use App\Interfaces\ISoldeConge;
use App\Models\SoldeCongee;
use Illuminate\Http\Request;

class SoldeCongeeController extends Controller
{
    /**
     * SoldeCongeeController constructor.
     */

    protected  $soldeConge;

    public function __construct(ISoldeConge $soldeConge, IEmployeeRepo $employeeRepo)
    {
        $this->soldeConge =$soldeConge;
        $employeeRepo->calculerSoldeConge();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function index()
    {
     return response()->json($this->soldeConge->getAll());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoldeCongee  $soldeCongee
     * @return \Illuminate\Http\Response
     */
    public function show(SoldeCongee $soldeCongee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoldeCongee  $soldeCongee
     * @return \Illuminate\Http\Response
     */
    public function edit(SoldeCongee $soldeCongee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SoldeCongee  $soldeCongee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoldeCongee $soldeCongee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoldeCongee  $soldeCongee
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoldeCongee $soldeCongee)
    {
        //
    }
}
