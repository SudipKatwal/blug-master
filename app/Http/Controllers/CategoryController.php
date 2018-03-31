<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data('title',$this->title('Category'));
        $categories = Category::all();
        return view(
            'Back.Pages.Posts.category',
            $this->data,
            compact('categories')
        );
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
        $this->validate($request,[
            'name'=>'required|string'
        ]);

        $name = $request->name;
        $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/','-',$request->name));

        if(Category::create(['name'=>$name,'slug'=>$slug])){
            return redirect()->route('category.index')->with('New category has been added.');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::find($id)->delete()){
            return redirect()->route('category.index')->with('success','Category has been deleted.');
        }
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;

        if (isset($request['enable'])) {
            $data['is_active'] = 1;
            $message = "User was Enabled";
        }
        if (isset($request['disable'])) {
            $data['is_active'] = 0;
            $message = "User was Disabled";
        }
        $category = Category::find($id);
        if ($category::where('id',$id)->update($data)) {
            return redirect()->route('category.index')->with('success', $message);
        } else {
            return redirect()->back()->with('success', $message);
        }
    }
}
