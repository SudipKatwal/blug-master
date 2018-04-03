<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data('title',$this->title('Pages'));
        $pages = Page::all();
        return view(
            'Back.Pages.Page.page',
            $this->data,
            compact('pages')
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

        if(Page::create(['name'=>$name,'slug'=>$slug])){
            return redirect()->route('pages.index')->with('success','New pages has been added.');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Page::find($id)->delete()){
            return redirect()->route('pages.index')->with('success','Page has been deleted.');
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
        $category = Page::find($id);
        if ($category::where('id',$id)->update($data)) {
            return redirect()->route('pages.index')->with('success', $message);
        } else {
            return redirect()->back()->with('success', $message);
        }
    }
}
