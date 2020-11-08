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
        $start_date = Carbon::now()->format('Y-m-d 00:00:00' );
        $end_date = Carbon::now()->format('Y-m-d 23:59:59' );

        $disease_counts = PatientDisease::select( 'disease_id', DB::raw('count(*) as disease_count' ))
            ->groupBy('disease_id')
            ->whereBetween('created_at',[$start_date, $end_date])
            ->get();

        $season_names = Season::select( 'name' )
            ->distinct()
            ->join('patient_diseases','patient_diseases.season_id','seasons.id')
            ->get()
            ->pluck('name');

        $season_counts = PatientDisease::select(DB::raw('count(disease_id) as disease_count'))
            ->groupBy( 'season_id' )
            ->get()
            ->pluck('disease_count');

        /**
         * Database object to Array
         */
        $disease_name_array = [];
        $disease_count_array = [];

        foreach ( $disease_counts as $disease_count )
        {
            $disease_count_array[] = $disease_count->disease_count;
            $dis_id = $disease_count->disease_id;
            $dis_nam = Disease::select( 'disease_name' )->whereId( $dis_id )->first();
            $disease_name_array[] = $dis_nam->disease_name;
        }

        return view('admin.index',compact('disease_count_array','disease_name_array','season_names','season_counts'));
    }
}
