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
                            <h1 class="h4 text-gray-900 mb-4">Create  Students</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('students') }}" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                            @if($role->name == 'sa')
                                        <div class="col-sm-4">
                                                <label  class=" control-label">Category</label>

                                                <select class="form-control" name="category_id" required>
                                                    <option >Select Category</option>
                                                   
                                                    @if(isset($c))
                                                    @foreach($c as $v)
                                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                               
                                              </div>
        
                                    <div class="col-sm-4">
                                      <label for="semester" class=" control-label">Semester</label>
                                      <select class="form-control" name="semester_id" required>
                                          <option value="">Select Semester</option>
                                                   
                                          @if(isset($s))
                                          @foreach($s as $v)
                                          <option value="{{$v->id}}">{{$v->name}}</option>
                                          @endforeach
                                          @endif
                                      </select>
                                     
                                    </div>
                            @elseif($role->name == 'do')
                            <div class="col-sm-4">
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
                            @endif
                            <div class="col-sm-4">
                                    <label for="session" class=" control-label">Entry Year</label>
                                    <select class="form-control" name="entry_year"  required>
                                    <option value=""> - - Select Entry Year</option>
                                     
                                        @for ($year = date('Y'); $year >= 1977; $year--)
                                        {{!$yearnext =$year+1}}
                                        <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                        @endfor
                                      
                                    </select>
                                   
                                  </div>
                                </div>
                                <hr/>
                              

                             
    
        @for ($i = 0; $i < 10; $i++)
                                <div class="form-group row">
                                 <div class="col-sm-3">
                                      <label for="surname" class=" control-label">Surname</label>
                                        <input id="surname" type="text" class="form-control" name="surname[{{$i}}]" value="{{ old('surname') }}">
        
                                      
                                    </div>
                                     <div class="col-sm-3">
                                      <label for="firstname" class=" control-label">First name</label>
                                        <input id="firstname" type="text" class="form-control" name="firstname[{{$i}}]" value="{{ old('firstnamename') }}">
        
                                    </div>
        
                                     <div class="col-sm-3">
                                      <label for="othername" class=" control-label">Other name</label>
                                        <input id="othername" type="text" class="form-control" name="othername[{{$i}}]" value="{{ old('othername') }}">
                                        </div>
                                        <div class="col-sm-3">
                                        <label for="othername" class=" control-label">Matric Number</label>
                                        <input id="othername" type="text" class="form-control" name="matricNumber[{{$i}}]" value="{{ old('matricNumber') }}">
                                        </div>       
                                    
                                    </div>
                                    @endfor
                                   <div class="col-md-3">
                                              <br/>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-user"></i> Add Students
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