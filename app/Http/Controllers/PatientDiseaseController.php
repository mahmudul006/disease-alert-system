<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Location;
use App\Patient;
use App\PatientDisease;
use App\Season;
use Illuminate\Http\Request;

class PatientDiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all();
        $diseases = Disease::all();
        $seasons = Season::all();
        $locations = Location::all();
        return view('admin.pages.patientdisease.createpatientdisease',compact('patients','diseases', 'seasons', 'locations'));
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
        PatientDisease::create($request->all());
        return redirect()->route('patientdisease.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PatientDisease  $patientDisease
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDisease $patientDisease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientDisease  $patientDisease
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientDisease $patientDisease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientDisease  $patientDisease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientDisease $patientDisease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientDisease  $patientDisease
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientDisease $patientDisease)
    {
        //
    }
}
