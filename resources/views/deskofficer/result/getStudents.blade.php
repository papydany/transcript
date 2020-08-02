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
                            <h1 class="h4 text-gray-900 mb-4">Enter  Result</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('getStudents') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                           
                            <div class="col-sm-3">
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
                           
                            <div class="col-sm-2">
                                    <label for="session" class=" control-label">Entry Year</label>
                                    <select class="form-control" name="entry_year"  required>
                                    <option value="">Select Entry Year</option>
                                     
                                        @for ($year = 2016; $year >= 1977; $year--)
                                        {{!$yearnext =$year+1}}
                                        <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                        @endfor
                                      
                                    </select>
                                   
                                  </div>
                                  <div class="col-sm-2">
                                        <label for="session" class=" control-label">Present Level</label>
                                        <select class="form-control" name="level_id"  required>
                                        <option value="">  Select Level</option>
                                         
                                            @for ($year = 1; $year <= 11; $year++)
                                        
                                            <option value="{{$year}}">{{$year}}00</option>
                                            @endfor
                                          
                                        </select>
                                       
                                      </div>
                                      <div class="col-sm-2">
                                            <label for="session" class=" control-label">Present Session</label>
                                            <select class="form-control" name="session"  required>
                                            <option value=""> Select Session</option>
                                             
                                                @for ($year = 2020; $year >= 1977; $year--)
                                                {{!$yearnext =$year+1}}
                                                <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                                @endfor
                                              
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

                                   <div class="col-md-1">
                                              <br/>
                                        <button type="submit" class="btn btn-success">
                                            Continue
                                        </button>
                                    </div>
                                </div>
                               
        
                               
        
                                </form>
                                @if(isset($s) && $s != null)
                                <div class="card mb-4 py-3 border-bottom-success">
                                  <div class="row ">
                                <div class="col-4" ><p><b>Programme : </b> {{$p->name}}</p>
                                  <p><b>Entry Year : </b>{{$y. ' / '.$next}}</p>
                                </div>
                                
                                <div class="col-3" ><b>Present Session : </b>{{$session. ' / '.$n_session}} </div>
                                <div class="col-2" ><b>Present level : </b>{{$level}}00</div>
                                <div class="col-2" ><b>Period : </b>{{$period}} </div>
                               
                               
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
                                              <th>Enter Result</th>
                                            </tr>
                                          </thead>
                                         
                                          <tbody>
                                             
                                              
                                             @foreach ($s as $item)
                                              
                                             
                                            <tr>
                                              <td>{{$item->surname}}</td>
                                              <td>{{$item->firstname}}</td>
                                              <td>{{$item->othername}}</td>
                                              <td>{{$item->matricNumber}}</td>
                                              <td>
                                                  <a href="{{url('enterResult',[$item->id,$level,$session,$period,$token])}}" target="_blank" class="btn btn-primary btn-circle btn-sm ">
                                                      <i class="fas fa-exclamation-triangle"></i>
                                                    </a>  
                                                  
                                                </td>
                                            
                                            
                                            </tr>
                                            @endforeach 
                                           
                                          
                                         
                                          </tbody>
                                        </table>
                                        @endif
                                   
        
                                </div>
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection