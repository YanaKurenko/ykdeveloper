<?php

namespace App\Http\Controllers;

use App\Models\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variables= Variable::get();
        return view('welcome', compact('variables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function show(Variable $variable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function edit(Variable $variable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variable $variable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variable $variable)
    {
        //
    }
}
