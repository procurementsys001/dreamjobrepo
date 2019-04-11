<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Procurement;
use App\Notifications\ProcurementNotification;
use App\Post;
use Notification;
use App\Notifications\ProcurementNotify;
use App\User;

class ProcurementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //


        $this->validate($request,[
            'post_id' => 'required',
            'supplier' => 'required',
            'reason' => 'required'
            
        ]);


        $post=Post::Find($request->post_id);
        $procurement= new Procurement;

        $procurement->post_id=$request->input('post_id');
        $procurement->supplier=$request->input('supplier');
        $procurement->reason=$request->input('reason');
        $procurement->created_by= auth()->user()->id;
        $procurement->authorised=0;
        $procurement->admin_reason='';

        $post->processed=1;

        $post->save();
        $procurement->save();

       // Notification::send();

        return redirect()->back()->with('success', 'Quotations Sent for Authorization');
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
        $procurement = Procurement::find($request->input('procurement_id'));
        if($request->authorise=='approved')
        $procurement->authorised=2; // 2 for approved 1 for not approved
        else
        $procurement->authorised=1;
        $procurement->admin_reason=$request->input('reason');
        $procurement->save();

        $details = [
            'procurement_supplier' =>  $procurement->supplier,
            'procurement_status' =>  $request->authorise
        ];

        $post=Post::Find($procurement->post_id);
        $user=User::Find($post->createdBy);

     Notification::send($user, new ProcurementNotification($details));

        return redirect()->back()->with('success', 'Report back has been sent to the Lower Management');
    }

    public function update1(Request $request)
    {
        //
        $procurement = Procurement::find($request->input('procurement_id'));
        if($request->authorise=='approve')
        $procurement->authorised=1;
        else
        $procurement->authorised=0;
        $procurement->save();
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
