@extends('layouts.main')
@section('title','Faculty')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-5">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create a Faculty</h1>
                </div>
                <form class="user" method="POST" action="{{ route('faculty')}}">
                        @csrf
                  <div class="form-group row">
                    
                    
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user"  placeholder="Faculty" name="name">
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
                                    <th>Name</th>
                                   
                                    <th>Action</th>
                                  </tr>
                                </thead>
                               
                                <tbody>
                                   
                                    @if(isset($collection) && $collection != null)
                                   @foreach ($collection as $item)
                                       
                                   
                                  <tr>
                                    <td>{{$item->name}}</td>
                                  
                                    <td> <a href="{{url('editFaculty',$item->id)}}" class="btn btn-warning btn-circle">
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
