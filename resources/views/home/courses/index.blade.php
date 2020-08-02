@extends('layouts.main')
@section('title','Courses')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create  Courses</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('courses') }}" data-parsley-validate>
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
                                      <label for="semester" class=" control-label">Semester</label>
                                      <select class="form-control" name="semester_id" required>
                                          <option value="">Select Semester</option>
                                                   
                                          @if(isset($s))
                                          @foreach($s as $v)
                                          <option value="{{$v->id}}">{{$v->name}}</option>
                                          @endforeach
                                          @endif
                                      </select>
                                     
                                    </div>
                            
                                </div>
                                <hr/>
        @for ($i = 0; $i < 20; $i++)
                                <div class="form-group row">
                                 <div class="col-sm-6">
                                      <label for="Course_title" class=" control-label">Course Title</label>
                                        <input id="faculty_name" type="text" class="form-control" name="title[{{$i}}]" value="{{ old('title') }}">
        
                                      
                                    </div>
                                     <div class="col-sm-2">
                                      <label for="Course_code" class=" control-label">Courses Code</label>
                                        <input id="course_code" type="text" class="form-control" name="code[{{$i}}]" value="{{ old('code') }}">
        
                                    </div>
        
                                     <div class="col-sm-2">
                                      <label for="course_unit" class=" control-label">Course Unit</label>
                                        <input id="course_unit" type="text" class="form-control" name="unit[{{$i}}]" value="{{ old('unit') }}">
                                        </div>
                                  
                                    
                                    </div>
                                    @endfor
                                   <div class="col-md-3">
                                              <br/>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-user"></i> Add Course
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