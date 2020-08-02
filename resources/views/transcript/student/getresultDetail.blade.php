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
                            <h1 class="h4 text-gray-900 mb-4">Result Details</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="GET" action="{{ url('getresultDetail') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                                 
                           
                                        <div class="col-sm-3">
                                                <label  class=" control-label">Enter Matric Number</label>
                                                <input type="text" name="matricNumber" class="form-control"/>
                                            </div>
                                            <div class="col-sm-3">
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
                                              <div class="col-sm-2">
                                                <label for="session" class=" control-label">Period</label>
                                                <select class="form-control" name="period"  required>
                                                <option value=""> Select Period</option>
                                                <option value="NORMAL">NORMAL</option>
                                                   
                                                    <option value="VACATION">VACATION</option>
                                                    
                                                  
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
                                
                                <div class="row ">
                              <div class="col-4">
                             <p><b>Faculty : </b>{{$s->Faculty->name}}</p>
                             <p> <b>Department : </b>{{$s->Department->name}}</p>
                              </div>
                              <div class="col-4">
                                      <p><b>School:</b> {{$s->Category->name}}</p>
                                      <p> <b>Programme : </b>{{$s->Programme->name}}</p>
                                       </div>
                                       <div class="col-4">
                                       
                                        <b>Level</b> {{$l}}00
                                         
                                         <br/><b>Period : </b>{{$period}}
                                         </div>
                      </div>

                              </div>
@endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('delete_grade') }}" >
                                {{ csrf_field() }}
                                       
                           <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <th>Select</th>
                                              <th>Code</th>
                                              <th>Unit</th>
                                              <th>Session</th>
                                              <th>Semester</th>
                                              <th>Grade</th>
                                          
                                            </tr>
                                          </thead>
                                         
                                          <tbody>
                                             
                                              @if(isset($rc) && $rc != null)
                                             @foreach ($rc as $k => $item)
                                             <?php $r =$R->getResult($l,$item->session,$s->programme_id,$period,$s->id,$item->course_id);?>
                                               
                                             @if($r != '')
                                            <tr>
                                                <td><input type="checkbox" name="id[]" value="{{$r->id}}"></td>
                                              <td>{{$item->code}}
                                           
                                            </td>
                                            <td>{{$item->unit}}</td>
                                            <td>{{$item->session}}</td>
                                              <td>{{$item->Semester->name}}</td>
                                             
                                            </td>
                                              <td>
                                                    
                                                 

                                {{$r->grade}}

                                                 </td>
                                             
                                            
                                            
                                            </tr>
                                            @endif
                                            @endforeach 
                                            @endif
                                          
                                         
                                          </tbody>
                                        </table>
                                   
                                        <div class="col-md-2">
                                                <br/>
                                          <button type="submit" class="btn btn-danger">
                                              Delete Result
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