<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\propertyGroupsRequest;
use App\Models\propertyGroups;
use Illuminate\Http\Request;

class propertyGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.properties.index',
        ['properties'=>propertyGroups::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(propertyGroupsRequest $request)
    {
        propertyGroups::query()->create([
            'title'=>$request->get('title')
        ]);
        return redirect(route("properties.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\propertyGroups  $propertyGroups
     * @return \Illuminate\Http\Response
     */
    public function show(propertyGroups $propertyGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\propertyGroups  $propertyGroups
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(propertyGroups $propertyGroups)
    {
        return view("admin.properties.edit",[
            'property'=>$propertyGroups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\propertyGroups  $propertyGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, propertyGroups $propertyGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\propertyGroups  $propertyGroups
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(propertyGroups $propertyGroups)
    {
        $propertyGroups->delete();

        return redirect(route("properties.index"));
    }
}
