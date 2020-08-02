@extends('layouts.main')
@section('title','Cover Letter')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-5">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Cover letter</h1>
                </div>
                <form class="user" method="POST" action="{{ route('getCoverLetter')}}" target="_blank">
                        @csrf
                  <div class="form-group row">
                    
                    
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user"  placeholder='Enter Transcript Id' name="transcript_id" required>
                  </div>
                 
                  
               
                  <input type="submit" value="Generate" class="btn btn-primary btn-user"/>
                
                  
                 
                </form>
               
                
              </div>
            </div>

         
          </div>
        </div>
      </div>
@endsection
