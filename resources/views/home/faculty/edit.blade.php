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
                <form class="user" method="POST" action="{{ route('updateFaculty')}}">
                        @csrf
                  <div class="form-group row">
                    
                    
                  </div>
                  <div class="form-group">
                        <input type="hidden"  name="id" value="{{$collection->id}}">
                  
                    <input type="text" class="form-control form-control-user"  name="name" value="{{$collection->name}}">
                  </div>
               
                  <input type="submit" value="Update" class="btn btn-warning btn-user"/>
                
                  
                 
                </form>
               
                
              </div>
            </div>

          </div>
        </div>
      </div>
@endsection
