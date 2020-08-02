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
                            <h1 class="h4 text-gray-900 mb-4">View  Course</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="GET" action="{{ url('courseTitle') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                                 
                           
                                        <div class="col-sm-4">
                                                <label  class=" control-label">Enter Matric Number</label>
                                                <input type="text" name="matricNumber" class="form-control"/>
                                            </div>
                                            <div class="col-sm-4">
                                                <label  class=" control-label">Level</label>
                    
                                                <select class="form-control" name="level" required>
                                                    <option value="" >Select Level</option>
                                                    <option  value="1">100</option>
                                                   <option value="2">200</option>
                                                    <option value="3">300</option>
                                                    <option value="4">400</option>
                                                <option  value="5">500</option>
                                                 <option value="6">600</option>
                                                 <option  value="7">700</option>
                                                 <option value="8">800</option>
                                                   
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

                              @if(isset($olds))
                              <p>{{$olds->surname.' '.$olds->othernames}}</p>
                              <p>{{$olds->matric_no}}</p>
                                <div class="col-lg-12">
                              <form class="user" method="POST" action="{{ route('updateOldCourseTitle')}}">
                                      @csrf
                                      <table class="table-bordered">
                                        <tr>
                                            <th>COURSE CODE</th>
                                            <th >COURSE TITLE</th>
                                        <th>CREDIT HOUR</th>
                                        <th>SEMESTER</th>
                                        
                                        </tr>
                                      @foreach($old_result as $v)
                                      <div class="form-group">
                                        <tr>
                                            <td style="text-align:center">{{$v->thecourse_code}}</td>
                                            <td width=60%>
                                        <input type="hidden"  name="id[]" value="{{$v->thecourse_id}}">
                                       
                                        <input type="text" class="form-control" name="title[{{{$v->thecourse_id}}}]" value="{{strtoupper($v->thecourse_title)}}">
                                            </td>
                                            <td style="text-align:center;" width=20px>
                                            <input  type="text" class="form-control" name="unit[{{$v->thecourse_id}}]" value="{{$v->thecourse_unit}}">
                                      </td>
                                            <td style="text-align:center">{{$v->semester}}</td>
                                            
                                           
                                            </tr>	
                                      </div>
                                      @endforeach
                               
                                    </table>
                                <input type="submit" value="Update" class="btn btn-warning btn-user "/>
                              
                                
                               
                              </form>
                              </div>
                              </div>
                             
                              @elseif(isset($s))
        <!--================================ new students records==================== -->
        <p>{{$s->surname.' '.$s->firstname.' '.$s->othername}}</p>
        <p>{{$s->matricNumber}}</p>
          <div class="col-lg-12">
        <form class="user" method="POST" action="{{ route('updateCourseTitle')}}">
                @csrf
                <table class="table-bordered">
                  <tr>
                      <th>COURSE CODE</th>
                      <th >COURSE TITLE</th>
                  <th>CREDIT HOUR</th>
                  <th>SEMESTER</th>
                  
                  </tr>
                @foreach($result as $v)
                <div class="form-group">
                  <tr>
                      <td style="text-align:center">{{$v->code}}</td>
                      <td width=60%>
                  <input type="hidden"  name="id[]" value="{{$v->id}}">
                 
                  <input type="text" class="form-control" name="title[{{{$v->id}}}]" value="{{strtoupper($v->title)}}">
                      </td>
                      <td style="text-align:center;" width=20px>
                      <input  type="text" class="form-control" name="unit[{{$v->id}}]" value="{{$v->unit}}">
                </td>
                      <td style="text-align:center">	@if($v->semester_id == 1)
                        FIRST SEMESTER
                      @elseif($v->semester_id == 2)
                      SECOND SEMESTER
                    @endif</td>
                      
                     
                      </tr>	
                </div>
                @endforeach
         
              </table>
          <input type="submit" value="Update" class="btn btn-warning btn-user "/>
        
          
         
        </form>
        </div>
        </div>
                             
                                @endif
        
                                
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection