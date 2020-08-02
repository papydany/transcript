@extends('layouts.main')
@section('title','Create Deskofficer')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit <span class="text-primary">{{$s->surname.' ( '.$s->matricNumber.' ) '}}</span> Records</h1>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                    <b> Fac : </b>{{$s->Faculty->name}}
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <b> Dept : </b> {{$s->Department->name}}
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                          <b> Cat : </b>  {{$s->Category->name}}
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <b> Prog : </b>   {{$s->Programme->name}}
                          </div>
                </div>
                <hr/>
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
                                <label  class=" control-label">Email</label>
                          <input type="text" class="form-control form-control-user" name="email"   value='{{$s->email}}'>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                                <label  class=" control-label">Phone</label>
                                <input type="text" class="form-control form-control-user"   name='phone' value='{{$s->phone}}'>
                              </div>
                        
                      </div>
                      <div class="form-group row">
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
                                <option value="{{$v->id}}">{{$v->state_name}}</option>
                                @endforeach
                                @endif
                            </select>
                           
                          </div>
                          <div class="col-sm-4 mb-4 mb-sm-0">
                            <label for="password-confirm" >LGA</label>
                            <select class="form-control" name="localgovt_id" id="lga">
                      
                        
                       </select>

                             
                          </div>
                       
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 mb-4 mb-sm-0">
                              <label for="session" class=" control-label">Entry Year</label>
                              <select class="form-control" name="entry_year">
                              <option value=""> - - Select Entry Year</option>
                               
                                  @for ($year = 2006; $year >= 1977; $year--)
                                  {{!$yearnext =$year+1}}
                                  <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                  @endfor
                                
                              </select>
                             
                            </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                               <label for="faculty">Gender</label>
                                <select class="form-control" name="gender">
                                <option value="">-- select --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                           </select>
                              </div>
                                 <div class="col-sm-4 mb-4 mb-sm-0">
                            <label for="marital_status" class=" control-label"> Marital Status</label>
                            <select class="form-control" name="marital_status">
                            <option value=""> - - Select - -</option>
                            <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Devioced">Devioced</option>
                              </select>
                           
                          </div>

                          
                              </div>
                  <div class="form-group row">
                      <div class="col-sm-4 mb-4 mb-sm-0">
                          <label  class=" control-label">Birth Date</label>
                        <input type="date" name="birthdate" class="form-control">
                         
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                   
                  <label  class=" control-label">Parent</label>
                    <input type="text" class="form-control form-control-user" name="parent"   value='{{$s->parent}}' required>
                  </div>
                      <div class="col-sm-4 mb-4 mb-sm-0">
                        <label  class=" control-label">Address</label>
                    <textarea  class="form-control form-control-user" name="address"></textarea>
                      </div>
                   </div>

                   <div class="form-group row">
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <label  class=" control-label"> Date Of Graduation</label>
                      <input type="date" name="date_of_graduation" class="form-control">
                       
                      </div>
                      <div class="col-sm-4 mb-4 mb-sm-0">
                        <label for="marital_status" class=" control-label"> Mode Of Entry</label>
                        <select class="form-control" name="mode_of_entry">
                        <option value=""> - - Select - -</option>
                        <option value="UNIFIED MATRICULATION EXAMINATION">UME</option>
                            <option value="UNIFIED MATRICULATION EXAMINATION(Direct Entry)">UME(D/E)</option>
                          
                            <option value="CES">CES</option>
                          </select>
                       
                      </div>
                   
                   
                 </div>
               
               
                  <input type="submit" value="Update" class="btn btn-warning btn-user "/>
                
                  
                 
                </form>
                </div>
                </div>
               
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
