@extends('layouts.main')
@section('title','Department')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-5">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create a Department</h1>
                </div>
                <form class="user" method="POST" action="{{ route('department')}}">
                        @csrf
                  <div class="form-group row">
                    
                    
                  </div>
                  <div class="form-group">
                  <select class="form-control form-control-lg" name="faculty_id">
                        <option>Select Faculty</option>
                        @if(isset($f) && $f != null)
                        @foreach ($f as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>   
                        @endforeach
                        @endif
                      </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user"  placeholder='department' name="name">
                  </div>
                  
                  <input type="submit" value="Create" class="btn btn-primary btn-user"/>
                
                  
                 
                </form>
               
                
              </div>
            </div>

            <div class="col-lg-7">
                    <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Faculty</th>
                                    <th>Departments</th>
                                    
                                  </tr>
                                </thead>
                               
                                <tbody>
                                   
                                    @if(isset($f) && $f != null)
                                   @foreach ($f as $item)
                                    <?php $d = $item->departments; ?> 
                                   
                                  <tr>
                                    <td>{{$item->name}}</td>
                                    <td>@foreach ($d as $i)
                                        {{$i->name}}&nbsp;&nbsp;
                                        <a href="{{url('editDepartment',$i->id)}}" class="btn btn-success btn-circle .btn-sm float-right">
                                                <i class="fas fa-exclamation-triangle"></i>
                                              </a>  
                                        <hr/>
                                    @endforeach</td>
                                  
                                  
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
