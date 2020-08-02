@extends('layouts.main')
@section('title','View Specialization')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">View Specialization</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('viewSpecializations') }}" data-parsley-validate>
                                {{ csrf_field() }}
                                <div class="form-group row">
                                        <div class="col-sm-4">
                                          <label  class=" control-label">Department</label>
                                          <select class="form-control" name="department_id" id="department_id" required>
                                              <option value="">Select Department</option>
                                                       
                                              @if(isset($d))
                                              @foreach($d as $v)
                                              <option value="{{$v->id}}">{{$v->name}}</option>
                                              @endforeach
                                              @endif
                                          </select>
                                         
                                        </div>
                                        <div class="col-sm-4">
                                                <label  class=" control-label">Department</label>
                                                <select class="form-control" name="programme_id" id="programme_id" required>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                          <th>Level</th>

                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                     
                                      <tbody>
                                         
                                          @if(isset($s) && $s != null)
                                         @foreach ($s as $item)
                                          
                                         
                                        <tr>
                                          <td>{{$item->name}}</td>
                                          <td>{{$item->level}}</td>
                                          
                                          <td>
                                              <a href="{{url('editSpecialization',$item->id)}}" class="btn btn-success btn-circle .btn-sm float-right">
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
        
                                </form>
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection