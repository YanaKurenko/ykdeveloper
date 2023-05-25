<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $docs=Document::get();
       $work= Work::get();
       return view('works.list', compact('work','docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::get();
        
        return view('works.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryId'=>'required',
            
            'name'=>'required',
            'desc'=>'required',
            'shortDesc'=>'required',
            'purepose'=>'required',
            
            ]);
        $data=$request->all();
        $filename=$request->file('images')->getClientOriginalName();
        // dd($filename);
        $data['images'] = $filename;

        Work::create($data);
        $file = $request->file('images');
        if($filename) {
            
            $file->move('../public/images/',$filename);
        }
        return redirect('/worklist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //$firstImage= Gallery::where('workId','=', $work->id)->first();
        //dd($firstImage);
        $gallery= Gallery::where('workId','=', $work->id)->get();
        // dd($gallery);
        return view('works.detail', compact('work','gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
