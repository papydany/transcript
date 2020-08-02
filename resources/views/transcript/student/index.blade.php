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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('studentDetail') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                                 
                           
                                        <div class="col-sm-6">
                                                <label  class=" control-label">Enter Matric Number</label>
                                                <input type="text" name="matricNumber" class="form-control"/>
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
                              <div class="row">
                                <div class="col-lg-3">
                                  <table class="table table-bordered">
                                    <tr><th>D O B</th><td>{{$s->birthdate}}</td></tr>
                      
                    
                                    <tr><th>State</th><td>{{isset($s->State->state_name) ? $s->State->state_name : ''}}</td></tr>
                                    <tr><th>LGA</th><td>{{isset($s->Lga->lga_name) ? $s->Lga->lga_name : ''}}</td></tr>
                                    <tr><th>Entry Year</th><td>{{$s->entry_year}}</td></tr>
                                    <tr><th>Status</th><td>{{$s->marital_status}}</td></tr>
                                    <tr><th>Sex</th><td>{{$s->gender}}</td></tr>
                                    <tr><th>Mode Of Entry</th><td>{{$s->mode_of_entry}}</td></tr>
                                    <tr><th>Date of Graduation</th><td>{{date('j F, Y',strtotime($s->date_of_graduation))}}</td></tr>
                                                         
                                     </table>
                                </div>
                                <div class="col-lg-9">
                              <form class="user" method="POST" action="{{ route('updateStudent')}}">
                                      @csrf
                                <div class="form-group row">
                                  <div class="col-sm-4 mb-4 mb-sm-0">
                                      <input type="hidden" name="id"   value='{{$s->id}}'>
                                  
                                          <label  class=" control-label">Surname</label>
                                    <input type="text" class="form-control form-control-user" name="surname"   value='{{$s->surname}}' required>
                                  </div>
                                  <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label  class=" control-label">First name</label>
                                          <input type="text" class="form-control form-control-user"   name='firstname' value='{{$s->firstname}}' required>
                                        </div>
                                  <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label  class=" control-label">Other name</label>
                                    <input type="text" class="form-control form-control-user"  name='othername' value="{{$s->othername}}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <label  class=" control-label">Matric Number</label>
                                  <input type="text" class="form-control form-control-user"  name='matricNumber' value="{{$s->matricNumber}}" required>
                                </div>
                                <div class="col-sm-4 mb-4 mb-sm-0">
                                    <label  class=" control-label">Nationality</label>
                              <input type="text" class="form-control form-control-user"  name='nationality' value="{{$s->nationality}}">
                            </div>
                            <div class="col-sm-4 mb-4 mb-sm-0">
                                <label  class=" control-label">State</label>
    
                                <select class="form-control" name="state_id" id='state_id'>
                                    <option value="" >Select State</option>
                                   
                                    @if(isset($st))
                                    @foreach($st as $v)
                                    @if($v->id == $s->state_id)
                                    <option selected value="{{$v->id}}">{{$v->state_name}}</option>
                                    @endif
                                    <option value="{{$v->id}}">{{$v->state_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                               
                              </div>
                                     
                                      
                                    </div>
                                    <div class="form-group row">
                                      
                             
                                        <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label for="password-confirm" >LGA</label>
                                      
                                          <select class="form-control" name="localgovt_id" id="lga">
                                            @if(isset($s->lga_id))
                                            <option selected value="{{$s->lga_id}}">{{isset($s->Lga->lga_name) ? $s->Lga->lga_name : ''}}</option>
                                            @endif
                                      
                                     </select>
              
                                           
                                        </div>
                                        <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label for="session" class=" control-label">Entry Year</label>
                                            <select class="form-control" name="entry_year">
                                            <option value=""> - - Select Entry Year</option>
                                             
                                                @for ($year = 2006; $year >= 1977; $year--)
                                                {{!$yearnext =$year+1}}
                                                @if($year == $s->entry_year )
                                                <option selected value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                              
                                                @endif
                                                <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                                @endfor
                                              
                                            </select>
                                           
                                          </div>
                                      <div class="col-sm-4 mb-4 mb-sm-0">
                                             <label for="faculty">Gender</label>
                                              <select class="form-control" name="gender">
                                              <option value="">-- select --</option>
                                              @if(isset($s->gender))
                                              <option selected value="{{$s->gender}}">{{$s->gender}}</option>
                                              @endif
                                              <option value="male">Male</option>
                                              <option value="female">Female</option>
                                         </select>
                                            </div>
                                     
                                    </div>
                                    <div class="form-group row">
                   
                                               <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label for="marital_status" class=" control-label"> Marital Status</label>
                                          <select class="form-control" name="marital_status">
                                          <option value=""> - - Select - -</option>
                                          @if(isset($s->marital_status))
                                          <option selected value="{{$s->marital_status}}">{{$s->marital_status}}</option>
                                          @endif
                                          <option value="Single">Single</option>
                                              <option value="Married">Married</option>
                                              <option value="Devioced">Devioced</option>
                                            </select>
                                         
                                        </div>
                                        <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label  class=" control-label">Birth Date</label>
                                          <input type="date" name="birthdate" value="{{$s->birthdate}}" class="form-control">
                                           
                                          </div>
                                          <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label  class=" control-label"> Date Of Graduation</label>
                                          <input type="date" name="date_of_graduation" value="{{$s->date_of_graduation}}" class="form-control">
                                           
                                          </div>
              
                                        
                                            </div>
                                <div class="form-group row">
                                    
                                      <div class="col-sm-4 mb-4 mb-sm-0">
                                 
                                <label  class=" control-label">Parent</label>
                                  <input type="text" class="form-control form-control-user" name="parent"   value='{{$s->parent}}' required>
                                </div>
                                <div class="col-sm-4 mb-4 mb-sm-0">
                                    <label for="marital_status" class=" control-label"> Mode Of Entry</label>
                                    <select class="form-control" name="mode_of_entry">
                                    <option value=""> - - Select - -</option>
                                    @if(isset($s->mode_of_entry))
                                    <option selected value="{{$s->mode_of_entry}}">{{$s->mode_of_entry}}</option>
                                    @endif
                                    <option value="UNIFIED MATRICULATION EXAMINATION">UME</option>
                                        <option value="UNIFIED MATRICULATION EXAMINATION(Direct Entry)">UME(D/E)</option>
                                      
                                        <option value="CENTRE FOR EDUCATIONAL SERVICES">CES</option>
                                      </select>
                                   
                                  </div>
                                   
                                 </div>
              
                             
                             
                                <input type="submit" value="Update" class="btn btn-warning btn-user "/>
                              
                                
                               
                              </form>
                              </div>
                              </div>
                             
                              @elseif(isset($oldstudent))
        <!--================================ old students records==================== -->

                              <div class="row">
                                <div class="col-lg-3">
                                  <table class="table table-bordered">
                                    <tr><th>D O B</th><td>{{$oldstudent->birthdate}}</td></tr>
                      
                    
                                    <tr><th>State</th><td>{{isset($oldstudent->state_of_origin) ?$oldstudent->state_of_origin : ''}}</td></tr>
                                    <tr><th>LGA</th><td>{{isset($oldstudent->local_gov) ? $oldstudent->local_gov : ''}}</td></tr>
                                    <tr><th>Entry Year</th><td>{{$oldstudent->std_custome18}}</td></tr>
                                    <tr><th>Status</th><td>{{$oldstudent->marital_status}}</td></tr>
                                    <tr><th>Sex</th><td>{{$oldstudent->gender}}</td></tr>
                                    <tr><th>Mode Of Entry</th><td>{{$oldstudent->std_custome3}}</td></tr>
                                    <tr><th>Date of Graduation</th><td>{{date('j F, Y',strtotime($oldstudent->date_of_graduation))}}</td></tr>
                                                         
                                     </table>
                                </div>
                                <div class="col-lg-9">
                              <form class="user" method="POST" action="{{ route('updateOldStudent')}}">
                                      @csrf
                                <div class="form-group row">
                                  <div class="col-sm-4 mb-4 mb-sm-0">
                                      <input type="hidden" name="std_id"   value='{{$oldstudent->std_id}}'>
                                  
                                          <label  class=" control-label">Surname</label>
                                    <input type="text" class="form-control form-control-user" name="surname"   value='{{$oldstudent->surname}}' required>
                                  </div>
                                  <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label  class=" control-label">First name</label>
                                          <input type="text" class="form-control form-control-user"   name='firstname' value='{{$oldstudent->firstname}}'>
                                        </div>
                                  <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label  class=" control-label">Other name</label>
                                    <input type="text" class="form-control form-control-user"  name='othernames' value="{{$oldstudent->othernames}}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <label  class=" control-label">Matric Number</label>
                                  <input type="text" class="form-control form-control-user"  name='matric_no' value="{{$oldstudent->matric_no}}" required>
                                </div>
                                <div class="col-sm-4 mb-4 mb-sm-0">
                                    <label  class=" control-label">Nationality</label>
                              <input type="text" class="form-control form-control-user"  name='nationality' value="{{$oldstudent->nationality}}">
                            </div>
                            <div class="col-sm-4 mb-4 mb-sm-0">
                                <label  class=" control-label">State</label>
    
                                <select class="form-control" name="state_of_origin" id='state_id'>
                                    <option value="" >Select State</option>
                                   
                                    @if(isset($st))
                                    @foreach($st as $v)
                                    @if($v->state_name == $oldstudent->state_of_origin)
                                    <option selected value="{{$v->id}}">{{$v->state_name}}</option>
                                    @endif
                                    <option value="{{$v->id}}">{{$v->state_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                               
                              </div>
                                     
                                      
                                    </div>
                                    <div class="form-group row">
                                      
                             
                                        <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label for="password-confirm" >LGA</label>
                                      
                                          <select class="form-control" name="localgovt_id" id="lga">
                                            @if(isset($s->lga_id))
                                            <option selected value="{{$s->lga_id}}">{{isset($s->Lga->lga_name) ? $s->Lga->lga_name : ''}}</option>
                                            @endif
                                      
                                     </select>
              
                                           
                                        </div>
                                        <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label for="session" class=" control-label">Entry Year</label>
                                            <select class="form-control" name="std_custome18">
                                            <option value=""> - - Select Entry Year</option>
                                             
                                                @for ($year = date('Y'); $year >= 1977; $year--)
                                                {{!$yearnext =$year+1}}
                                                @if($year == $oldstudent->std_custome18 )
                                                <option selected value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                              
                                                @endif
                                                <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                                @endfor
                                              
                                            </select>
                                           
                                          </div>
                                      <div class="col-sm-4 mb-4 mb-sm-0">
                                             <label for="faculty">Gender</label>
                                              <select class="form-control" name="gender">
                                              <option value="">-- select --</option>
                                              @if(isset($oldstudent->gender))
                                              <option selected value="{{$oldstudent->gender}}">{{$oldstudent->gender}}</option>
                                              @endif
                                              <option value="male">Male</option>
                                              <option value="female">Female</option>
                                         </select>
                                            </div>
                                     
                                    </div>
                                    <div class="form-group row">
                   
                                               <div class="col-sm-4 mb-4 mb-sm-0">
                                          <label for="marital_status" class=" control-label"> Marital Status</label>
                                          <select class="form-control" name="marital_status">
                                          <option value=""> - - Select - -</option>
                                          @if(isset($oldstudent->marital_status))
                                          <option selected value="{{$oldstudent->marital_status}}">{{$oldstudent->marital_status}}</option>
                                          @endif
                                          <option value="Single">Single</option>
                                              <option value="Married">Married</option>
                                              <option value="Devioced">Devioced</option>
                                            </select>
                                         
                                        </div>
                                        <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label  class=" control-label">Birth Date</label>
                                          <input type="date" name="birthdate" value="{{$oldstudent->birthdate}}" class="form-control">
                                           
                                          </div>
                                          <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label  class=" control-label"> Date Of Graduation</label>
                                          <input type="date" name="date_of_graduation" value="{{$oldstudent->date_of_graduation}}" class="form-control">
                                           
                                          </div>
              
                                        
                                            </div>
                                <div class="form-group row">
                                    
                                      <div class="col-sm-4 mb-4 mb-sm-0">
                                 
                                <label  class=" control-label">Parent</label>
                                  <input type="text" class="form-control form-control-user" name="parents_name"   value='{{$oldstudent->parents_name}}' required>
                                </div>
                                <div class="col-sm-4 mb-4 mb-sm-0">
                                    <label for="marital_status" class=" control-label"> Mode Of Entry</label>
                                    <select class="form-control" name="std_custome3">
                                    <option value=""> - - Select - -</option>
                                    @if(isset($oldstudent->mode_of_entry))
                                    <option selected value="{{$oldstudent->mode_of_entry}}">{{$oldstudent->mode_of_entry}}</option>
                                    @endif
                                    <option value="UNIFIED MATRICULATION EXAMINATION">UME</option>
                                        <option value="UNIFIED MATRICULATION EXAMINATION(Direct Entry)">UME(D/E)</option>
                                      
                                        <option value="CENTRE FOR EDUCATIONAL SERVICES">CES</option>
                                      </select>
                                   
                                  </div>
                                   
                                 </div>
              
                             
                             
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