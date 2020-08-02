@extends('layouts.main')
@section('title','Edit Programme')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-5">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Edit Specialization</h1>
                </div>
                <form class="user" method="POST" action="{{ route('updateSpecialization')}}">
                        @csrf
                  <div class="form-group row">
                    
                    
                  </div>
                  <div class="form-group">
                        <input type="hidden"  name="id" value="{{$s->id}}">
                        <label  class=" control-label">Specialization Name</label>
                    <input type="text" class="form-control form-control-user"  name="name" value="{{$s->name}}">
                  </div>
                  <div class="form-group">
                        
                                <label  class=" control-label">Active Level</label>
                                  
                                  <select class="form-control" name="level">
                                          <option value="">Select Level</option>
                                          <option value="1">100</option>
                                          <option value="2">200</option>
                                          <option value="3">300</option> 
                                          <option value="4">400</option>
                                          <option value="5">500</option>
                                          <option value="6">600</option>
                                          <option value="7">700</option>  
                                          <option value="8">800</option>
                                          <option value="9">900</option>
                                          <option value="10">1000</option>
                                          <option value="11">1100</option>          
                                         
                                      </select>
                              
              </div>
              
                  <input type="submit" value="Update" class="btn btn-warning btn-user"/>
                
                  
                 
                </form>
               
                
              </div>
            </div>

          </div>
        </div>
      </div>
@endsection
