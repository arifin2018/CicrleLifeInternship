<?php

namespace App\Http\Controllers;

use App\Models\PackageManagements;
use App\Models\User;
use App\Models\VehicleManagements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countDriver = User::where('roles', 'driver')->count();
        $countVehicle = VehicleManagements::all()->count();
        $countPackageMe = PackageManagements::whereHas('user', function($q){
            $q->where('id', Auth::user() ? Auth::user()->id : '');
        })->count();
        $countPackage = PackageManagements::all()->count();
        return view('home',[
            'countDriver' => $countDriver,
            'countVehicle' => $countVehicle,
            'countPackage' => $countPackage,
            'countPackageMe' => $countPackageMe,
        ]);
    }
    public function home()
    {
        return view('layouts.home');
    }
}
