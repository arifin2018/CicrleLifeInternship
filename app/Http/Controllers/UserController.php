<?php

namespace App\Http\Controllers;

use App\Models\PackageManagements;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = User::where('roles','driver');
            return DataTables::of($query)
                ->addColumn('action',function($item){
                    return '<div class="btn-group">
                                <form action="'.route('driver-delete',$item->id).'" method="POST">
                                    '.method_field('delete').csrf_field().'
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>';
                })
                ->addIndexColumn()->rawColumns(['action'])->make(true);
        }
        return view('layouts.Driver.index');
    }
    public function detail($id)
    {
        // $query = PackageManagements::whereHas('user', function($q) use($id){
        //     $q->where('id', $id);
        // })->with(['user'])->get();
        // dd($query);
        if (request()->ajax()) {
            // $query = User::where('id',$id)->with(['package_managements']);
            // $query = User::find($id)->with(['package_managements'])->get();
            $query = PackageManagements::whereHas('user', function($q) use($id){
                $q->where('id', $id);
            })->with(['user'])->get();
            return DataTables::of($query)
                ->addColumn('action',function($item){
                    return '<div class="btn-group">
                                <form action="'.route('driver-delete',$item->id).'" method="POST">
                                    '.method_field('delete').csrf_field().'
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>';
                })
                ->addIndexColumn()->rawColumns(['action'])->make(true);
        }
        return view('layouts.Driver.detail');
    }
    public function delete($id)
    {
        PackageManagements::findOrFail($id)->delete();
        return redirect()->back();
    }
}
