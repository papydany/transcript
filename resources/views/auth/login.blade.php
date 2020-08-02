@extends('layouts.app')
@section('content')
<body class="bg-gradient-primary">

        <div class="container">
      
          <!-- Outer Row -->
          <div class="row justify-content-center">
      
            <div class="col-xl-10 col-lg-12 col-md-9">
      
              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                    <div class="p-5">
                     <br/> <img src="img/th.jpg" />
                    </div>
                </div>
                    <div class="col-lg-6">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">LOGIN </h1>
                        </div>
                        @include('partial._message')
                       
                                <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                          <div class="form-group">
                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="emailHelp" placeholder="Enter Email Address...">
                            

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                          <div class="form-group">
                          
                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        
                         
                          <input type='submit' value='LOGIN' class="btn btn-primary btn-user btn-block"/>
                           
                         
                      
                          
                        </form>
                        <hr>
                        <div class="text-center">
                                @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                         
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
            </div>
      
          </div>
      
        </div>





@endsection
