<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(2);
        return view('home')->with('posts', $posts);
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
            'quote-title' => 'required',
            'supplier1' => 'required',
            'filePath1' => 'required',
            'supplier2' => 'required',
            'filePath2' => 'required',
            'supplier3' => 'required',
            'filePath3' => 'required'
        ]);

        //create notice
        $post=new Post;
        $post->quotationTitle=$request->input('quote-title'); //QUOTATION TITLE
        $post->createdBy= auth()->user()->id; //CREATED BY
        //START QUOTATION GROUP
        $post->refNo1=rand(1000, 9999); //REF NO.1
        $post->supplier1=$request->input('supplier1'); //SUPPLIER 1
        $post->quoteState1="Not Processed"; //QUOTATION STATE 1
        $post->filePath1= "myfiles"; //$request->input('filePath1'); //FILE PATH 1

        $post->refNo2=rand(1000, 9999); //REF NO.1
        $post->supplier2=$request->input('supplier2'); //SUPPLIER 2
        $post->quoteState2="Not Processed"; //QUOTATION STATE 2
        $post->filePath2= "myfiles"; //$request->input('filePath2'); //FILE PATH 2

        $post->refNo3=rand(1000, 9999); //REF NO.1
        $post->supplier3=$request->input('supplier3'); //SUPPLIER 1
        $post->quoteState3="Not Processed"; //QUOTATION STATE 1
        $post->filePath3= "myfiles"; //$request->input('filePath3'); //FILE PATH 1

        $post->save();
        return redirect()->back()->with('success', 'Quotations Uploaded Successfully');
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
        //
    }
}
