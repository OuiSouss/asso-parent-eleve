<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Http\Requests\ContributionRequest;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributions = Contribution::all();
        return response()->json($contributions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contribution = new Contribution();
        return view('admin.configuration.contribution.form', compact('contribution'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContributionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContributionRequest $request)
    {
        $contribution = new Contribution($request->all());
        $contribution->save();
        return response($contribution);
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
        $contribution = Contribution::findOrFail($id);
        return view('admin.configuration.contribution.form', compact('contribution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ContributionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContributionRequest $request, $id)
    {
        $contribution = Contribution::findOrFail($id);
        $contribution->update($request->all());
        return redirect(route('admin.configuration.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contribution = Contribution::findOrFail($id);
        $contribution->delete();
        return response(200);
    }
}
