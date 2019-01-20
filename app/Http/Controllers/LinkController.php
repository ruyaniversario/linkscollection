<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Link;


class LinkController extends Controller
{

    public function test(){
        return view('this is from test function');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$links = Link::all();
        $links = Link::paginate(15);
        return view('link.link')->with('links',$links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("link.create");      //create.blade.php
    }

    public function search(Request $request){
        $search = $request -> get('search');
        $links = DB::table('links')->where('title','like','%'.$search.'%')->paginate(15);
        return view('link.link')->with('links',$links);
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
            "title" => "required|min:5",
            "description"=> "required|min:5|max:200"
        ]);

        $link = new Link;
        $link->title = $request->input('title');
        $link->description = $request->input('description');
        $link->url = $request->input('url');
        $link->save();

        echo "Successfully added.";
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
        $link = Link::find($id);
        return view('link.edit')->with('link',$link);
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
        $link = Link::find($id);
        $link->title = $request->input('title');
        $link->description = $request->input('description');
        $link->url = $request->input('url');
        $link->save();

        echo "Successfully added.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Link::destroy($id);
        echo "Successfully deleted!";
    }
}
