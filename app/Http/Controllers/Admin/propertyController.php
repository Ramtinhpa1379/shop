<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\propertiesRequest;
use App\Models\properties;
use App\Models\propertyGroups;
use Illuminate\Http\Request;

class propertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.property.index",
        [
            'properties'=>properties::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.property.create",[
            'groups'=>propertyGroups::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(propertiesRequest $request)
    {
        properties::query()->create([
            'title'=>$request->get('title'),
            'property_groups_id'=>$request->get('property_group_id')
        ]);

        return redirect(route("property.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function show(properties $properties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\properties  $properties
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(properties $properties)
    {
        return view("admin.property.edit",[
            'property'=>$properties,
            'groups'=>propertyGroups::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function update(propertiesRequest $request, properties $properties)
    {
        $properties->update([
            'title'=>$request->get('title'),
            'property_groups_id'=>$request->get('property_group_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function destroy(properties $properties)
    {
        //
    }
}
