
<?php



?>

@extends('layouts.app')

@section('content')
@if(session('status'))
    {{session('status')}}
@endif

<div class="container">
    <div class="row">
        <div class="col-sm-4" style="margin-bottom: 24px;">
            <!--Notifications--->
            <!---End Notification--->
            <div class="card bg-light">
            <div class="card-header">Upload Quotations</div>
                <div class="card-body">

                        {{ Form::open(['action'=>'PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
                            <div class="form-group">
                                {{Form::label('quote-title','Qoutation Title')}} 
                                {{Form::text('quote-title','',['id'=>'','class'=>'form-control','placeholder'=>'Give your qoutations a title'])}}
                            </div><hr />
                            <div class="form-group">
                                {{Form::text('supplier1','',['id'=>'','class'=>'form-control','placeholder'=>'Company name (Quote 1)'])}}
                            </div>
                            <div class="file-upload-wrapper">
                                {{Form::file('filePath1')}}
                            </div><hr />
                            <div class="form-group">
                                {{Form::text('supplier2','',['id'=>'','class'=>'form-control','placeholder'=>'Company name (Quote 1)'])}}
                            </div>
                            <div class="file-upload-wrapper">
                                {{Form::file('filePath2')}}
                            </div><hr />
                            <div class="form-group">
                                {{Form::text('supplier3','',['id'=>'','class'=>'form-control','placeholder'=>'Company name (Quote 1)'])}}
                            </div>
                            <div class="file-upload-wrapper">
                                {{Form::file('filePath3')}}
                            </div><hr />
                        {{Form::submit('Submit',['id'=>'','class'=>'btn btn-secondary'])}}
                        {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quotation Database</h5><br />
                    <!--Start Post of Quotation-->
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                    <h6 class="card-subtitle mb-2 text-muted">{{$post->quotationTitle}}</h6>
                    <p class="card-text">Uploaded on {{$post->created_at}} <br /><strong>Quotation Status:</strong> <?php if($post->processed==1)
                    $status='processed'; else $status='unprocessed';?>{{$status}}</p>
                    <table id="tbl1" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Ref Number</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">{{$post->refNo1}}</th>
                            <td>{{$post->supplier1}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}" class="btn  btn-primary">view</a>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">{{$post->refNo2}}</th>
                            <td>{{$post->supplier2}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}" class="btn  btn-primary">view</a>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">{{$post->refNo3}}</th>
                            <td>{{$post->supplier3}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}" class="btn  btn-primary">view</a>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <br />
                    <!--End Post-->
                        @endforeach
                        {{$posts->links()}}
                    @else 
                        <p>No Posts Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
@endsection
