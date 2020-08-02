@extends('layouts.main')
@section('title','Edit Subject')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit  Subject</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('updateSubject') }}" >
                                {{ csrf_field() }}
                      
      @if(isset($s))
                                <div class="form-group row">
                                 <div class="col-sm-4">
                                      <label for="Course_title" class=" control-label">Subject Name</label>
                                        <input  type="text" class="form-control" name="name" value="{{$s->name}}" required>
                                        <input id="id" type="hidden"  name="id" value="{{$s->id}}">
                                      
                                    </div>
              
        
                                     
                                  
                                    
                                    </div>
                                    
                                   <div class="col-md-3">
                                              <br/>
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-btn fa-user"></i> Update Subject
                                        </button>
                                    </div>
                                    @endif
        
                                </div>
        
                                </form>
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection