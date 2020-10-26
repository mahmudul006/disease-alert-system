<?php

namespace App\Http\Controllers;



use App\Disease;
use App\PatientDisease;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {

        /**
         * Database query
         */
        $start_date = Carbon::now()->format('Y-m-d 00:00:00');
        $end_date = Carbon::now()->format('Y-m-d 23:59:59');

        $disease_name = Disease::select('disease_name')
            ->distinct()
            ->join('patient_diseases','patient_diseases.disease_id','diseases.id')
            ->whereBetween('patient_diseases.created_at',[$start_date, $end_date])
            ->get();

        $disease_count = PatientDisease::select('disease_id', DB::raw('count(*) as disease_count'))
            ->groupBy('disease_id')
            ->whereBetween('created_at',[$start_date, $end_date])
            ->get();

        /**
         * Database object to Array
         */
        $ne=array();
        $me=array();
        $i=0;
        foreach ($disease_name as $disease)
        {
            $ne[$i] = $disease->disease_name;
            $i++;
        }
        $i=0;
        foreach ($disease_count as $disease_coun)
        {
            $me[$i] = $disease_coun->disease_count;
            $i++;
        }

        return view('admin.index',compact('me','ne'));
    }
}
