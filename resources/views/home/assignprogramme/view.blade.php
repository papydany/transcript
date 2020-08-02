@extends('layouts.main')
@section('title','View Assign Programme')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">View Assign Programme</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('viewAssignProgrammes') }}">
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
                                <div class="col-lg-12">
                                  <div class="p-5">
                                <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Programme</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                         
                                          <tbody>
                                             
                                              @if(isset($ap) && $ap != null)
                                             @foreach ($ap as $item)
                                              
                                             
                                            <tr>
                                              <td>{{$item->User->name}}</td>
                                              <td>{{$item->User->email}}</td>
                                              <td>{{$item->Programme->name}}</td>
                                              
                                              <td>
                                                  <a href="#" class="btn btn-success btn-circle btn-sm float-right">
                                                          <i class="fas fa-exclamation-triangle"></i>
                                                        </a>  
                                                </td>
                                            
                                            
                                            </tr>
                                            @endforeach 
                                            @endif
                                          
                                         
                                          </tbody>
                                        </table>
                                      </div>
                                </div>
        
        
        </div>
        </div>
        </div>
</div>
@endsection