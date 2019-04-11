<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Procurement;

class PostsController extends Controller
{
   
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(2);
        $posts2=Post::where('processed', 1)->orderBy('created_at', 'desc')->paginate(2);
        $p_a=Procurement::where('authorised', 2);//->orderBy('created_at', 'desc')->paginate(2);
        $p_r=Procurement::where('authorised', 1);//)->orderBy('created_at', 'desc')->paginate(2);
        
        // return $posts;
        if(auth()->user()->role=='admin')
        return view('admin')->with('posts', $posts2)->with('a_quotations',$p_a)->with('r_quotations',$p_r);
        else
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
            'filePath1' => 'image|required|max:1999',
            'supplier2' => 'required',
            'filePath2' => 'required',
            'supplier3' => 'required',
            'filePath3' => 'required'
        ]);

        //HANDLE FILE UPLOAD
        if ($request->hasFile('filePath1')) {
            //get filename with extension
            $filenameWithExt = $request->file('filePath1')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('filePath1')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('filePath1')->storeAs('public/quotations', $fileNameToStore1);
        }

        //HANDLE FILE UPLOAD
        if ($request->hasFile('filePath2')) {
            //get filename with extension
            $filenameWithExt2 = $request->file('filePath2')->getClientOriginalName();
            //get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            //get just ext
            $extension2 = $request->file('filePath2')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            //upload image
            $path2 = $request->file('filePath2')->storeAs('public/quotations', $fileNameToStore2);
        }

        //HANDLE FILE UPLOAD
        if ($request->hasFile('filePath3')) {
            //get filename with extension
            $filenameWithExt3 = $request->file('filePath3')->getClientOriginalName();
            //get just filename
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            //get just ext
            $extension3 = $request->file('filePath3')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            //upload image
            $path3 = $request->file('filePath3')->storeAs('public/quotations', $fileNameToStore3);
        }

      
        //post quotation
        $post=new Post;
        $post->quotationTitle=$request->input('quote-title'); //QUOTATION TITLE
        $post->createdBy= auth()->user()->id; //CREATED BY
        //START QUOTATION GROUP
        $post->refNo1=rand(1000, 9999); //REF NO.1
        $post->supplier1=$request->input('supplier1'); //SUPPLIER 1
        $post->quoteState1="Not Processed"; //QUOTATION STATE 1
        $post->filePath1= $fileNameToStore1; //FILE PATH 1

        $post->refNo2=rand(1000, 9999); //REF NO.1
        $post->supplier2=$request->input('supplier2'); //SUPPLIER 2
        $post->quoteState2="Not Processed"; //QUOTATION STATE 2
        $post->filePath2= $fileNameToStore2;  //FILE PATH 2

        $post->refNo3=rand(1000, 9999); //REF NO.1
        $post->supplier3=$request->input('supplier3'); //SUPPLIER 1
        $post->quoteState3="Not Processed"; //QUOTATION STATE 1
        $post->filePath3= $fileNameToStore3;  //FILE PATH 1
        $post->processed=0;

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
        $post = Post::find($id);
        if(auth()->user()->role=="admin")

        return view ('process')->with('post', $post);
        else
        return view ('show')->with('post', $post);
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
