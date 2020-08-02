@extends('layouts.main')
@section('title','Specialization')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create  Specialization</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('specializations') }}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                      <label  class=" control-label">Department</label>
                                      <select class="form-control" name="department_id" id="department_id" required>
                                          <option value="">Select Department</option>
                                                   
                                          @if(isset($d))
                                          @foreach($d as $v)
                                          <option value="{{$v->id}}">{{$v->name}}</option>
                                          @endforeach
                                          @endif
                                      </select>
                                     
                                    </div>
                                    <div class="col-sm-4">
                                            <label  class=" control-label">Department</label>
                                            <select class="form-control" name="programme_id" id="programme_id" required>
                                                <option value="">Select Department</option>
                                                         
                                               
                                            </select>
                                           
                                          </div>
                            
                                </div>
                                <hr/>
        @for ($i = 0; $i < 3; $i++)
                                <div class="form-group row">
                                 <div class="col-sm-4">
                                      <label for="Course_title" class=" control-label">Specialization Name</label>
                                        <input id="name" type="text" class="form-control" name="name[{{$i}}]" value="{{ old('name') }}">
        
                                 </div>
                                 <div class="col-sm-2">
                                      <label  class=" control-label">Active Level</label>
                                        
                                        <select class="form-control" name="level[{{$i}}]">
                                                <option value="">Select Level</option>
                                                <option value="1">100</option>
                                                <option value="2">200</option>
                                                <option value="3">300</option> 
                                                <option value="4">400</option>
                                                <option value="5">500</option>
                                                <option value="6">600</option>
                                                <option value="7">700</option>  
                                                <option value="8">800</option>
                                                <option value="9">900</option>
                                                <option value="10">1000</option>
                                                <option value="11">1100</option>          
                                               
                                            </select>
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