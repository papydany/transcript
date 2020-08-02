@extends('layouts.main')
@section('title','Assign Programme')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Assign Programme</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('assignProgrammes') }}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                        <div class="col-sm-4">
                                                <label  class=" control-label">Faculty</label>
                                                <select class="form-control" name="faculty_id" id="faculty_id" required>
                                                    <option value="">Select Faculty</option>
                                                             
                                                    @if(isset($f))
                                                    @foreach($f as $v)
                                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                               
                                              </div>
                                    <div class="col-sm-4">
                                      <label  class=" control-label">Department</label>
                                      <select class="form-control" name="depart_id" id="depart_id">
                                          <option value="">Select Department</option>
                                                   
                                        
                                      </select>
                                     
                                    </div>
                                    <div class="col-md-3">
                                            <br/>
                                      <button type="submit" class="btn btn-success">
                                          <i class="fa fa-btn fa-user"></i> Continue
                                      </button>
                                  </div>
                            
                                </div>
                                <hr/>
     
                                  
        
                                </div>
        
                                </form>
                                </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                                <div class="p-5">
                                                @if(isset($d))
                                                <h4><b>Department :: </b> </h4>
                                                @endif
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('assignProgrammesToOfiicer') }}" data-parsley-validate>
                                                {{ csrf_field() }}
                                                <div class="form-group row">
                                        <div class="col-sm-7"> 
                                           @if(isset($u))
                                        @if(count($u) > 0)
                                        
                                        <table class="table table-bordered table-striped">
                                        <tr>
                                          <td>Select</td>
                                        <th>S/N</th>
                                        <th>Name</th>
                                         <th>Username</th>
                                       </tr>
                                       {{!!$c = 0}}
                                       @foreach($u as $v)
                                       <tr>
                                        <td><label><input type="radio" name="optradio" value="{{$v->id}}"></label></td>
                                       <td>{{++$c}}</td>
                                        
                                       <td>{{$v->name}}</td>
                                       <td>{{$v->email}}</td>
                                     </tr>
                                       @endforeach
                                    
                                        </table>
                                      
                 
                
                                        @endif
                                        @endif
                
                                        </div>
                                        <div class="col-sm-5">
                                                @if(isset($p))
                                                @if(count($p) > 0)
                                                @foreach($p as $v)
                                     
                                                <input type="checkbox" name="programme[]" value="{{$v->id}}"> &nbsp; {{$v->name}} <br/>
                                                @endforeach
                                                <br/>
                                                <div class="col-sm-8 col-sm-offset-2">
                                                <input type="submit" class="btn btn-success btn-block" name="hod" value="Assign Programme">
                                        </div>
                                                @endif
                                                @endif
                                          
                                    </div>
                                                </div>
                                    </form>
                                        </div>
                                </div>
          </div></div>
        </div>
</div>
@endsection