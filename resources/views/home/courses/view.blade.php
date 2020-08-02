@extends('layouts.main')
@section('title','View Courses')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">View  Courses</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('viewCourses') }}" data-parsley-validate>
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
                                    <div class="col-md-3">
                                        <br/>
                                  <button type="submit" class="btn btn-success">
                                      <i class="fa fa-btn fa-user"></i> Continue
                                  </button>
                              </div>
                            
                                </div>
                                @if(isset($course) && $course != null)
                                <div class="card mb-4 py-3 border-bottom-success">
                                  <div class="row">
                                <div class="col-4" ><b>Category : </b> {{$cat->name}}</div>
                                <div class="col-4" ><b> Semester: </b>{{$sem->name}} </div>
                              
                                  </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                          <th>Title</th>
                                          <th>Code</th>
                                          <th>Unit</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                     
                                      <tbody>
                                         
                                         
                                         @foreach ($course as $item)
                                          
                                         
                                        <tr>
                                          <td>{{$item->title}}</td>
                                          <td>{{$item->code}}</td>
                                          <td>{{$item->unit}}</td>
                                          <td>
                                              <a href="{{url('editCourse',$item->id)}}" class="btn btn-success btn-circle btn-sm float-right">
                                                      <i class="fas fa-exclamation-triangle"></i>
                                                    </a>  
                                            </td>
                                        
                                        
                                        </tr>
                                        @endforeach 
                                       
                                      
                                     
                                      </tbody>
                                    </table>
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