@extends('layouts.app')

@section('content')
@if(session('status'))
    {{session('status')}}
@endif

<div class="container">
    <div class="row">
            <div class="col-sm-4" style="margin-bottom: 24px;">
                    <div class="card bg-light">
                    <div class="card-header">Procurement Analysis</div>
                        <div class="card-body">
                            <!--analysis card-->
                            <div class="card card-1" style="width: 18rem;">
                                <div class="card-body">
                                   
                                    <p class="card-text graphs"><i class="fas fa-chart-bar"></i></p>
                                    <button type="button" class="btn btn-secondary btn-graph">
                                        Authorized Quotations <span class="badge badge-light">345</span>
                                    </button>
                                </div>
                            </div><br />
                            <!--analysis card-->
                            <div class="card card-2" style="width: 18rem;">
                                <div class="card-body">
                                    
                                    <p class="card-text graphs"><i class="fas fa-chart-line"></i></p>
                                    <button type="button" class="btn btn-secondary btn-graph">
                                        Rejected Quotations <span class="badge badge-light">79</span>
                                    </button>
                                </div>
                            </div><br /> 
                            <!--analysis card-->
                            <div class="card card-3" style="width: 18rem;">
                                <div class="card-body">
                                    
                                    <p class="card-text graphs"><i class="fas fa-chart-pie"></i></p>
                                    <button type="button" class="btn btn-secondary btn-graph">
                                        Orders Made <span class="badge badge-light">201</span>
                                    </button>
                                </div>
                            </div><br />
                            <!--analysis card-->
                            <div class="card card-4" style="width: 18rem;">
                                <div class="card-body">
                                    
                                    <p class="card-text graphs"><i class="fas fa-chart-area"></i></p>
                                    <button type="button" class="btn btn-secondary btn-graph">
                                        Pending Orders <span class="badge badge-light">45</span>
                                    </button>
                                </div>
                            </div><br />  
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
                    <?php
                        $procurement=$post->procurement;
                    ?>
                    <a href="/posts" class="btn btn-link">Back</a>
                    <h5 class="card-title">Procurement Authorization Sheet</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><strong>Category: </strong>{{$post->quotationTitle}}</h6>
                    <p class="card-text"><strong>Chosen Supplier:</strong> {{$procurement->supplier}}</p><br />
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
                    <?php
                    

                    // if($procurement->authorised=0)
                    // echo 'unprocessed';
                    // elseif($procurement->authorised=1)
                    // echo 'rejected';
                    // else
                    // echo 'approved';
                    // ?><hr />
                      {{ Form::open(['action'=>['ProcurementsController@update',$procurement->id], 'method'=>'POST']) }}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {{-- {{Form::select('authorise', array('choose'=>'Choose Action...', 'approve'=>'approve','reject'=>'reject'))}} --}}
                                <select id="inputState" class="form-control">
                                        <option selected>Do you authorize or reject?</option>
                                        <option>Authorize</option>
                                        <option>Reject</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-5">
                                {{Form::text('reason','',['id'=>'','class'=>'form-control','placeholder'=>'State the reason...', 'required'])}}
                            </div>
                            {{Form::hidden('procurement_id', $procurement->id)}}
                            {{Form::hidden('_method', 'PUT')}}
                            <div class="form-group col-md-3">
                            {{Form::submit('Submit',['id'=>'','class'=>'btn btn-secondary'])}}
                            </div>
                        </div>
                  {{ Form::close() }}

                  {{-- <form class="modal-form">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <select id="inputState" class="form-control">
                                <option selected>Do you authorize or reject?</option>
                                <option>Authorize</option>
                                <option>Reject</option>
                            </select>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="procurement-reason" placeholder="State reason for authorizing...">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
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
