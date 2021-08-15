<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleManagementsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PackageManagements;
use App\Models\VehicleManagements;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class VehicleManagementsContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = VehicleManagements::with(['user']);
            return DataTables::of($query)
                ->addColumn('action',function($item){
                    return '<div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-dark" href="'.route('vehicle-management.edit',$item->id).'">
                                        Edit
                                    </a>
                                    <form action="'.route('vehicle-management.destroy',$item->id).'" method="POST">
                                        '.method_field('delete').csrf_field().'
                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                    </form>
                                </div>
                            </div>';
                })
                ->editColumn('picture', function($item){
                    return $item->picture ? '
                    <a href="'.Storage::url($item->picture).'">
                        <img src="'.Storage::url($item->picture).'" style="max-height: 40px;" />
                    </a>
                    ':'';
                })
                ->addIndexColumn()->rawColumns(['action','picture'])->make(true);
        }
        return view('layouts.VehicleManagements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::where('roles','driver')->get();
        return view('layouts.VehicleManagements.create',[
            'drivers' => $drivers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleManagementsRequest $request)
    {
        $data = $request->all();
        $data['picture'] = $request->file('picture')->store('public/image/vehicle');
        VehicleManagements::create($data);
        return redirect()->route('vehicle-management.index');
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
        $vehicleManagements = VehicleManagements::findOrFail($id);
        $packageManagements =  PackageManagements::all();
        return view('layouts.VehicleManagements.edit',[
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
    public function update(VehicleManagementsRequest $request, $id)
    {
        $data = $request->all();
        $data['picture'] = $request->file('picture')->store('public/image/vehicle');
        $item = VehicleManagements::findOrFail($id);
        if ($request->picture == true) {
            Storage::delete($item->picture);
        }
        $item->update($data);
        return redirect()->route('vehicle-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleManagements::findOrFail($id)->delete();
        return redirect()->back();
    }
}
