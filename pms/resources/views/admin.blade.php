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
            <form class="modal-form">
            <div class="form-row">
                <div class="form-group col-md-4">
                <select id="inputState" class="form-control">
                    <option selected>Do you authorize or reject?</option>
                    <option>Authorize</option>
                    <option>Reject</option>
                </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="procurement-reason" placeholder="State reason for authorizing...">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
