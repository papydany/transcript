@inject('R','App\General');
<?php 
$role =$R->getrolename(Auth::user()->id);?>
@extends('layouts.main')
@section('title','View Registered Students')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">View Registered Courses</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('viewRegisterCourses') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                            @if($role->name == 'sa')
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
        
                                  
                            @elseif($role->name == 'do')
                            <div class="col-sm-3">
                                    <label  class=" control-label">Programme</label>
                                    <select class="form-control" name="programme_id" required>
                                        <option value="">Select Programme</option>
                                                 
                                        @if(isset($ap))
                                        @foreach($ap as $v)
                                        <option value="{{$v->programme_id}}">{{$v->Programme->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                   
                                  </div>
                            @endif
                            <div class="col-sm-3">
                                    <label for="session" class=" control-label">Session</label>
                                    <select class="form-control" name="session_id"  required>
                                    <option value=""> - - Select Session </option>
                                     
                                        @for ($year = 2016; $year >= 1977; $year--)
                                        {{!$yearnext =$year+1}}
                                        <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                        @endfor
                                      
                                    </select>
                                   
                                  </div>

                                  <div class="col-sm-3">
                                        <label for="session" class=" control-label">Level</label>
                                        <select class="form-control" name="level_id"  required>
                                        <option value=""> - - Select Level</option>
                                         
                                            @for ($year = 1; $year <= 11; $year++)
                                        
                                            <option value="{{$year}}">{{$year}}00</option>
                                            @endfor
                                          
                                        </select>
                                       
                                      </div>
                        
                                  <div class="col-md-3">
                                        <br/>
                                  <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-btn fa-user"></i> Continue
                                  </button>
                              </div>
                           
                                </div>
                               
       
                                  
        
                                
        
                                </form>
                                @if(isset($rc))
                                
                                <div class="card mb-4 py-3 border-bottom-success">
                                  <div class="row justify-content-center">
                                <div class="col-4" ><b>Programme : </b> {{$p->name}}</div>
                                <div class="col-4" ><b> Session: </b>{{$y. ' / '.$next}} </div>
                                <div class="col-4" ><b> Level: </b>{{$l}}00</div>
                                  </div>
                                </div>
                               
                                      <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                              <thead>
                                                <tr>
                                                  <th>select</th>
                                                  <th>Code</th>
                                                  <th>Title</th>
                                                  <th>unit</th>
                                                  <th>Semester</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                             
                                              <tbody>
                                                 
                                                  @if(isset($rc) && $rc != null)
                                                 @foreach ($rc as $item)
                                                  
                                                 
                                                <tr>
                                                  <td><input type="checkbox" name="id[]" value="{{$item->id}}"> </td>
                                                  <td>{{$item->code}}</td>
                                                  <td>{{$item->title}}</td>
                                                  <td>{{$item->unit}}</td>
                                                  <td>{{$item->Semester->name}}</td>
                                                 <td>
                                                  <a href="{{url('editRegisterCourse',$item->id)}}" target="_blank" class="btn btn-success btn-circle btn-sm float-right">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                  </a>  
                                                  <a href="{{url('deleteRegisterCourse',$item->id)}}" class="btn btn-danger btn-circle btn-sm " >
                                                    <i class="fas fa-trash"></i>
                                                  </a>  
                                          </td>
                                                
                                                
                                                </tr>
                                                @endforeach 
                                                @endif
                                              
                                             
                                              </tbody>
                                            </table>
                                       
            
                                    </div>
                               @endif
                               
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection