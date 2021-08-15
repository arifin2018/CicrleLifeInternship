<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageManagementsRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PackageManagements;
use App\Models\VehicleManagements;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PackageManagementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = PackageManagements::with(['user']);
            return DataTables::of($query)
                ->addColumn('action',function($item){

                    return '<div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-dark" href="'.route('package-management.edit',$item->id).'">
                                        Edit
                                    </a>
                                    <form action="'.route('package-management.destroy',$item->id).'" method="POST">
                                        '.method_field('delete').csrf_field().'
                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                    </form>
                                </div>
                            </div>';
                })
                ->addIndexColumn()->rawColumns(['action'])->make(true);
        }
        return view('layouts.PackageManagements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::where('roles','driver')->get();
        $vehicleManagements = VehicleManagements::all();
        return view('layouts.PackageManagements.create',[
            'drivers' => $drivers,
            'vehicleManagements' => $vehicleManagements
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageManagementsRequest $request)
    {
        $data = $request->all() + ['item_code' => Str::random(10)];
        PackageManagements::create($data);
        return redirect()->route('package-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drivers = User::where('roles','driver')->get();
        $vehicleManagements = VehicleManagements::all();
        $packageManagements =  PackageManagements::findOrFail($id);
        return view('layouts.PackageManagements.edit',[
            'drivers' => $drivers,
            'packageManagements' => $packageManagements,
            'vehicleManagements' => $vehicleManagements
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageManagementsRequest $request, $id)
    {
        $data = $request->all();
        $item = PackageManagements::findOrFail($id);
        $item->update($data);
        return redirect()->route('package-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PackageManagements::findOrFail($id)->delete();
        return redirect()->back();
    }
}
