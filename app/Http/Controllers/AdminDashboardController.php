<?php

namespace App\Http\Controllers;



use App\Disease;
use App\PatientDisease;
use App\Season;
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

        $disease_count = PatientDisease::select('disease_id', DB::raw('count(*) as disease_count'))
            ->groupBy('disease_id')
            ->whereBetween('created_at',[$start_date, $end_date])
            ->get();


        $season_name = Season::select('name')->distinct()->join('patient_diseases','patient_diseases.season_id','seasons.id')->whereBetween('patient_diseases.created_at',[$start_date, $end_date])->get();
        $season_count =  DB::select(DB::raw("SELECT COUNT(disease_id) as disease_count from patient_diseases GROUP BY season_id"));

        /**
         * Database object to Array
         */
        $ne=array();
        $me=array();
        $season_count_array = array();
        $season_name_array = array();

        $i=0;
        foreach ($disease_count as $disease_coun)
        {
            $me[$i] = $disease_coun->disease_count;
            $dis_id = $disease_coun->disease_id;
            $dis_nam= Disease::select('disease_name')->where('id',$dis_id)->first();
            $ne[$i]= $dis_nam->disease_name;
            $i++;
        }

        $i=0;
        foreach ($season_name as $season)
        {
            $season_name_array[$i] = $season->name;
            $i++;
        }
        $i=0;
        foreach ($season_count as $season_count)
        {
            $season_count_array[$i] = $season_count->disease_count;
            $i++;
        }


        return view('admin.index',compact('me','ne','season_name_array','season_count_array'));
    }
}
