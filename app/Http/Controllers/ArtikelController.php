<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Models\Shortcode;
use DataTables;
use App\Helpers\Post;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Artikel();
        $url = route('artikel.store');
        return view('artikel.form',['model' => $model,'url'=>$url]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Artikel();
        $model->title = $request->title;
        $model->post = $request->post;

        if ($model->save()) {
            return redirect()->route('artikel');
        }
        else
        {
            return  back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Artikel::findOrFail($id);
        $render = new Post($model->post);
        echo "<pre>";
        print_r($render);
        die();
        return view('artikel.view', ['model' => $model,'render'=>$render]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Artikel::findOrFail($id);
        $url = route('artikel.update');
        return view('artikel.edit', ['model' => $model,'url'=>$url]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Artikel::find($id);
        $model->title = $request->title;
        $model->post = $request->post;

        if ($model->save()) {
            return redirect()->route('artikel');
        }
        else
        {
            return  back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Artikel::find($id);
        $model->delete();
        return redirect()->route('artikel');
    }

    public function loadData()
    {
        $model = Artikel::select(['id', 'title', 'created_at']);
        return Datatables::of($model)
            ->addColumn('action', function ($data) {
                return '<a href="'.route('artikel.view', ['id' => $data->id]).'" class="btn btn-xs btn-primary">View</a>';
            })
            ->make(true);
    }
}
