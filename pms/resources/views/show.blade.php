@extends('layouts.app')

@section('content')
@if(session('status'))
    {{session('status')}}
@endif

<div class="container">
    <div class="row">
        <div class="col-sm-4" style="margin-bottom: 24px;">
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
                {{-- @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <p>{{\Session::get('success')}}</p>
                @endif --}}
                <div class="card-body">
                    <a href="/posts" class="btn btn-link">Back</a>
                    <h5 class="card-title">Procurement Process</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><strong>Category: </strong>{{$post->quotationTitle}}</h6><br />
                   <!---Start displaying quotations-->
                   <div class="row">
                        <div class="col-md-4">
                          <div class="thumbnail">
                          <a href="/storage/quotations/{{$post->filePath1}}">
                              <img src="/storage/quotations/{{$post->filePath1}}" alt="Lights" style="width:100%"><br />
                              <div class="caption quotation-caption">
                                <p><strong>From:</strong> {{$post->supplier1}}</p>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="thumbnail">
                            <a href="/storage/quotations/{{$post->filePath2}}">
                              <img src="/storage/quotations/{{$post->filePath2}}" alt="Nature" style="width:100%"><br />
                              <div class="caption quotation-caption">
                                <p><strong>From:</strong> {{$post->supplier2}}</p>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="thumbnail">
                            <a href="/storage/quotations/{{$post->filePath3}}">
                              <img src="/storage/quotations/{{$post->filePath3}}" alt="Fjords" style="width:100%"><br />
                              <div class="caption quotation-caption">
                                <p><strong>From:</strong> {{$post->supplier3}}</p>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>

                     


                      {{ Form::open(['action'=>'ProcurementsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            {{-- {{Form::select('supplier', array('action'=>'Select Supplier...', $post->supplier1 =>$post->supplier1, $post->supplier2 => $post->supplier2, $post->supplier3 => $post->supplier3))}} --}}
                            <select id="inputState" class="form-control" name="supplier">
                                <option selected>Choose a Supplier..</option>
                                <option  >{{$post->supplier1}}</option>
                                <option>{{$post->supplier2}}</option>
                                <option>{{$post->supplier3}}</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::text('reason','',['id'=>'','class'=>'form-control','placeholder'=>'State your reason...', 'required'])}}
                        </div>
                        <div class="form-group col-md-2">
                            {{Form::submit('Submit',['id'=>'','class'=>'btn btn-secondary'])}}
                        </div>
                        {{Form::hidden('post_id', $post->id)}}

                    </div>
                  {{ Form::close() }}
                   <!--End display of quotations--->
                    {{-- <form method="POST" action="{{url('')}}">
                        {{ csrf_field() }}
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <select id="inputState" class="form-control" name="supplier">
                              <option selected>Choose a Supplier..</option>
                              <option  >{{$post->supplier1}}</option>
                              <option>{{$post->supplier2}}</option>
                              <option>{{$post->supplier3}}</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputCity" name="reason" placeholder="State your reason!">
                            </div>
                          <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary">Procure</button>
                          </div>
                        </div>
                      </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
  
@endsection
