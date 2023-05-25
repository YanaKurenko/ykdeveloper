<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\Work;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listMenu (){
        $categories=Category::get();
        $selectedCategory = null;
        $works = Work::get();
        return view('categories.index', compact('categories', 'selectedCategory', 'works'));
    }

     public function workByCategory(Category $category){
        $categories= Category::get();
        $selectedCategory = $category->name;
        $works = Work::where('categoryId', $category->id)->get();
        return view('categories.index', compact('categories','selectedCategory','works'));
     }
     public function showWork(Category $category){
        $work= Work::get();
        return view('works.detail', compact('work','category'));
     }

    public function index()
    {
        $messages='';
        $category= Category::get();
        return view('categories.list', compact('category','messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::get();
        return view('categories.create', compact('category'));
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
            'name' =>'required'
            ]);
        $data= $request->all();
        Category::create($data);

        return redirect('/categorylist');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       // $category=Category::get();
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' =>'required'
            ]);

        $category-> update($request->all());


        return redirect('/categorylist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $count_works=Work::where('categoryId',$category->id)->count();
        //$messages='';
        if($count_works==0) {
             $category-> delete();
              $messages='Deleted';
        }else{
           $messages="No delete category ".$category->id;
        }
        $category= Category::get();
        return view('categories.list', compact('category','messages'));


    }
}
