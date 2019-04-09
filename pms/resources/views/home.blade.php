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
                <div class="card-body">
                    <h5 class="card-title">Quotation Database</h5><br />
                    <!--Start Post of Quotation-->
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                    <h6 class="card-subtitle mb-2 text-muted">{{$post->quotationTitle}}</h6>
                    <p class="card-text">Uploaded By {{$post->createdBy}} on {{$post->created_at}}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Ref Number</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">{{$post->refNo1}}</th>
                            <td>{{$post->supplier1}}</td>
                            <td>{{$post->quoteState1}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}" class="btn  btn-danger">download</a>
                                <a href="" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModalCenter">view</a>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">{{$post->refNo2}}</th>
                            <td>{{$post->supplier2}}</td>
                            <td>{{$post->quoteState2}}</td>
                            <td>
                                <a href="" class="btn  btn-danger">download</a>
                                <a href="" class="btn  btn-primary">view</a>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">{{$post->refNo3}}</th>
                            <td>{{$post->supplier3}}</td>
                            <td>{{$post->quoteState3}}</td>
                            <td>
                                <a href="" class="btn  btn-danger">download</a>
                                <a href="" class="btn  btn-primary">view</a>
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
  
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Econet Quotation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
        </div>
        <div class="modal-footer">
            <form>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Submit quotation for review</label>
                    </div>
                    </div>
                    <div class="col-auto my-1">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>State why you chose this Quotation...</option>
                            <option value="1">Fair Pricing</option>
                            <option value="2">Quality Products</option>
                            <option value="3">Products sold on credit</option>
                        </select>
                        </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
                    </div>
                </div>
            </form>   
        </div>
      </div>
    </div>
  </div>
@endsection
