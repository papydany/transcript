@extends('layouts.main')
@section('title','Create Deskofficer')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="POST" action="{{ route('createDeskofficer')}}">
                        @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user"  placeholder="Name" name='name' required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user"  placeholder="phone number" name='phone' required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user"  placeholder="Email Address" name="email" required>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user"  placeholder="Password" name='password' required>
                    </div>
                    <div class="col-sm-6">
                        
                        <select class="form-control" name="role" required>
                          <option value="">select role</option>     
                                @if(isset($role))
                                @if($role != null)
                            @foreach ($role as $item)
                            <option value="{{$item->id}}">{{$item->desc}}</option> 
                            @endforeach
                            @endif
                            @endif  
                        </select>
                        
                                        </div>
                  </div>
                  <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block"/>
                
                  
                 
                </form>
               
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
