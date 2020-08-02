@inject('R','App\General');
<?php 
$role =$R->getrolename(Auth::user()->id);?>
@extends('layouts.main')
@section('title','Students')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">View  Students</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('viewStudents') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                                 
                            @if($role->name == 'TO')
                                        <div class="col-sm-3">
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
        
                                    <div class="col-sm-3">
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
                            @elseif($role->name == 'do')
                            <div class="col-sm-4">
                                    <label for="semester" class=" control-label">Programme</label>
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
                                    <label for="session" class=" control-label">Entry Year</label>
                                    <select class="form-control" name="entry_year"  required>
                                    <option value=""> - - Select Entry Year</option>
                                     
                                        @for ($year =Date('Y'); $year >= 1977; $year--)
                                        {{!$yearnext =$year+1}}
                                        <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                        @endfor
                                      
                                    </select>
                                   
                                  </div>
                                  <div class="col-md-3">
                                        <br/>
                                  <button type="submit" class="btn btn-success">
                                      <i class="fa fa-btn fa-user"></i> Continue
                                  </button>
                              </div>
                                </div>
                            </form>

                              @if(isset($s))
                               <div class="card mb-4 py-3 border-bottom-success">
                                 <div class="row justify-content-center">
                               <div class="col-7" ><b>Programme : </b> {{$p->name}}</div>
                               <div class="col-5" ><b> Entry Session : </b>{{$y.' / '.$next}} </div>
                                 </div>
                               </div>

                                <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <th>Surname</th>
                                              <th>First name</th>
                                              <th>Other</th>
                                              <th>Matric Number</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                         
                                          <tbody>
                                             
                                              @if(isset($s) && $s != null)
                                             @foreach ($s as $item)
                                              
                                             
                                            <tr>
                                              <td>{{$item->surname}}</td>
                                              <td>{{$item->firstname}}</td>
                                              <td>{{$item->othername}}</td>
                                              <td>{{$item->matricNumber}}</td>
                                              <td>
                                                  <a href="{{url('editStudent',$item->id)}}" target="_blank" class="btn btn-success btn-circle btn-sm float-left">
                                                      <i class="fas fa-exclamation-triangle"></i>
                                                    </a>
                                                    &nbsp;  
                                                    &nbsp;
                                                    <a href="{{url('addSsce',$item->id)}}" target="_blank" class="btn btn-primary btn-sm ">
                                                     Add Scce Grade</i>
                                                    </a>  
                                                  <a href="{{url('deleteStudent',$item->id)}}" class="btn btn-danger btn-circle btn-sm float-right" >
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