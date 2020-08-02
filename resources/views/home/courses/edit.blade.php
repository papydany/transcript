@extends('layouts.main')
@section('title','Edit Courses')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit  Courses</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('updateCourse') }}" >
                                {{ csrf_field() }}
                      
      @if(isset($c))
                                <div class="form-group row">
                                 <div class="col-sm-4">
                                      <label for="Course_title" class=" control-label">Title</label>
                                        <input  type="text" class="form-control" name="title" value="{{$c->title}}" required>
                                        <input id="id" type="hidden"  name="id" value="{{$c->id}}">
                                      
                                    </div>
                                     <div class="col-sm-2">
                                      <label for="Course_code" class=" control-label"> Code</label>
                                        <input id="course_code" type="text" class="form-control" name="code" value="{{$c->code}}">
        
                                    </div>
        
                                     <div class="col-sm-1">
                                      <label  class=" control-label"> Unit</label>
                                        <input id="course_unit" type="text" class="form-control" name="unit" value="{{$c->unit}}">
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
                                    
                                   <div class="col-md-3">
                                              <br/>
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-btn fa-user"></i> Update Course
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