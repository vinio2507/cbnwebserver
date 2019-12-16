<?php

namespace App\Http\Controllers;

use App\GlobalC;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = GlobalC::where('name', $request->get('name'))->get();

        if (count($dados) == 0) {
            $dados = GlobalC::create($request->all());
        }else{
           $dados = $dados->first()->setAttribute("data", $request->get("data"));
        }

        return $dados;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\GlobalC $GlobalC
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $data = GlobalC::where('name', $name)->get();
        if(count($data) <= 0)
            return response()->json('{"ERROR":"INFORMAÇÃO NÃO ENCONTRADA"}', 404);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\GlobalC $GlobalC
     * @return \Illuminate\Http\Response
     */
    public function edit(GlobalC $GlobalC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\GlobalC $GlobalC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GlobalC $GlobalC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\GlobalC $GlobalC
     * @return \Illuminate\Http\Response
     */
    public function destroy(GlobalC $GlobalC)
    {
        //
    }
}
