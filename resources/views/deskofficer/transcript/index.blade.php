@extends('layouts.main')
@section('title','Students')
@section('content')
@inject('R','App\General')
<?php 
$role =$R->getrolename(Auth::user()->id)?>
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5">
              <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Transcript</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" target="_blank" action="{{ url('transcript') }}" >
                                {{ csrf_field() }}
                               
                                <div class="form-group">
                           
                           
                                    <label for="semester" class=" control-label">Matric Number</label>
                                   <input type="text" name="matricNumber" value="" class="form-control form-control-user" required />
                                
                                </div>
                               @if( $role->name =='TO' && Auth::user()->transcript_right !=null)
                                  <div class="form-group">
                                    <textarea name="address"></textarea>
                                 </div>
                                 @endif
                           
                               
                             
                                      

                                   <div class="col-md-1">
                                              <br/>
                                        <button type="submit" class="btn btn-success">
                                            Continue
                                        </button>
                                    </div>
                                
                                
        
                               
        
                                </form>
                         
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection