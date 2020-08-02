@extends('layouts.main')
@section('title','VC')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-5">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create a VC</h1>
                </div>
                <form class="user" method="POST" action="{{ route('vc')}}">
                        @csrf
                  <div class="form-group row">
                    
                    
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user"  placeholder='VC name' name="name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user"  placeholder='VC qualification' name="position" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user"  placeholder='VC email' name="email">
                  </div>
               
                  <input type="submit" value="Create" class="btn btn-primary btn-user"/>
                
                  
                 
                </form>
               
                
              </div>
            </div>
            @if(isset($i) && $i != null)
            <div class="col-lg-7">
                    <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" width="100%" cellspacing="0">
                                
                                  <tr>
                                    <th>Name</th>
                                    <td>{{$i->name}}</td>
                                  </tr>
                                  <tr>
                                   <th>Qualification</th>
                                   <td> {{$i->position}}</td>
                                  </tr>
                                  <tr>
                                    <th>Email</th>
                                    <td> {{$i->email}}</td>
                                   </tr>
                                  </table>
                            </div>
                          </div>
            </div>
            @endif
          </div>
        </div>
      </div>
@endsection
