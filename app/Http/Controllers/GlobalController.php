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

//        $this->show_files("../database/rawdata/");
        $this->show_files("../database/");

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
            return response()->json($dados, 201);

        } else {
            $dados = $dados->first();
            $dados->data = $request->get("data");
            $dados->save();
        }

        return response()->json($dados, 200);
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
        if (count($data) <= 0)
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

    public function connectionTest()
    {
        return response("OK", 200);
    }

    public function generateFile(Request $request)
    {
        $type = $request->get('type');

        return response($type, 200);
    }


    public function show_files($local)
    {
        $folder = [];

        if (!$local) {
            return false;
        }

        if (!is_dir($local)) {
            echo '<h1>Não foi possível encontrar o diretório com os arquivos base!</h1>';
        } else {
            $dir = opendir($local);
            while ($file = readdir($dir)) {
                if ($file != "." && $file != ".." && $file != ".htaccess") {
                    if (is_dir($local . '/' . $file)) {
                        $folder[$file] = [];
                    }
                    unset($file);
                }
            }
            closedir($dir);

            foreach ($folder as $k => $f) {
                $dir = opendir($local . $k);
                $folder[$k] = ['folder' => $k, 'path' => $local . $k . '/', 'files' => []];

                while ($file = readdir($dir)) {
                    if ($file != "." && $file != ".." && $file != ".htaccess") {
                        if (!is_dir($local . $k . '/' . $file)) {
                            array_push($folder[$k]['files'],['name'=>$file, 'path'=>$local . $k . '/']);
                        }
                        unset($file);
                    }
                }
                closedir($dir);
                unset($dir);
            }

            echo '<pre>';
            var_dump($folder);
        }
    }

}
