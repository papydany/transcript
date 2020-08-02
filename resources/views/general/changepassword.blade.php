@inject('R','App\General');
<?php 
$role =$R->getrolename(Auth::user()->id);?>
@extends('layouts.main')
@section('title','Change password')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
        
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('changePassword') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                           
                                        <div class="col-sm-4">
                                                <label  class=" control-label">New Password</label>

                                               <input type="text" class="form-control" name="password" value="" required />
                                               
                                              </div>
        
                                  
                         
                            <div class="col-sm-4">
                                    <label  class=" control-label">Confirm Password</label>
                                    <input type="text" class="form-control" name="password_confirmation" value="" required />
                                             
                                   
                                  </div>
                                  <div class="col-md-3">
                                        <br/>
                                  <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-btn fa-user"></i> Change Password
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