<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beach;
use App\Http\Requests\UpdateBeachRequest;
use App\Http\Requests\StoreBeachRequest;
use Illuminate\Validation\Rule;

class BeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beachList = Beach::paginate(5);
        return view("admin.beaches.index",  compact("beachList"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.beaches.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBeachRequest $request)
    {
        $newBeach = new Beach();
        $data = $request->validated();
        $newBeach->fill($data);
        $newBeach->save();

        return redirect()->route("admin.beaches.show", $newBeach->id)->with('stored', $newBeach->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beach = Beach::findOrFail($id);
        return view("admin.beaches.show", compact("beach"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beach = Beach::findOrFail($id);
        return view("admin.beaches.edit", compact("beach"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBeachRequest $request, $id)
    {
        $data = $request->validated();
        $newBeach =  Beach::findOrFail($id);
        $newBeach->update($data);

        return redirect()->route("admin.beaches.show", $newBeach->id)->with("updated", $newBeach->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beach = Beach::findOrFail($id);
        $beach->delete();

        return redirect()->route("admin.beaches.index")->with("deleted", $beach->name);
    }

    public function trashed(){
        $beachList = Beach::onlyTrashed()->paginate(10);
        return view('admin.beaches.trashed', compact('beachList'));
    }

    public function restore(Int $id){
        $beach = Beach::withTrashed()->findOrFail($id);
        $beach->restore();
        return redirect()->route('admin.beaches.index')->with('restored', $beach->name);
    }

    public function hardDelete($id){
        $beach = Beach::withTrashed()->findOrFail($id);
        $beach->forceDelete();
        return redirect()->route("admin.beaches.index")->with("hardDelete", $beach->name);
    }
}





