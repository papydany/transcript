@extends('layouts.main')
@section('title','Programme')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create  Programme</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('programmes') }}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                        <div class="col-sm-4">
                                                <label  class=" control-label">Category</label>

                                                <select class="form-control" name="category_id" required>
                                                    <option >Select Category</option>
                                                   
                                                    @if(isset($c))
                                                    @foreach($c as $v)
                                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                               
                                              </div>
        
                                    <div class="col-sm-4">
                                      <label  class=" control-label">Department</label>
                                      <select class="form-control" name="department_id" required>
                                          <option value="">Select Department</option>
                                                   
                                          @if(isset($d))
                                          @foreach($d as $v)
                                          <option value="{{$v->id}}">{{$v->name}}</option>
                                          @endforeach
                                          @endif
                                      </select>
                                     
                                    </div>
                            
                                </div>
                                <hr/>
        @for ($i = 0; $i < 5; $i++)
                                <div class="form-group row">
                                 <div class="col-sm-4">
                                      <label for="Course_title" class=" control-label">Programme Name</label>
                                        <input id="name" type="text" class="form-control" name="name[{{$i}}]" value="{{ old('name') }}">
        
                                 </div>
                                 <div class="col-sm-3">
                                  <label  class=" control-label">Degree To Be Awared</label>
                                    <input  type="text" class="form-control" name="degree[{{$i}}]" value="{{ old('degree') }}">
                                    </div>
                                 <div class="col-sm-2">
                                      <label  class=" control-label">Duration</label>
                                        <input  type="text" class="form-control" name="level[{{$i}}]" value="{{ old('level') }}">
                                        </div>
                                  
                                    
                                    </div>
                                    @endfor
                                   <div class="col-md-3">
                                              <br/>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-user"></i> Add 
                                        </button>
                                    </div>
        
                                </div>
        
                                </form>
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection