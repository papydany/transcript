@extends('layouts.main')
@section('title','Subjects')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create  Subjects</h1>
                          </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('subjects') }}" data-parsley-validate>
                                {{ csrf_field() }}
              
        
                                <div class="form-group row">
                                    @for ($i = 0; $i < 20; $i++)
                                 <div class="col-sm-6">
                                      <label for="Course_title" class=" control-label">Subject Name</label>
                                        <input  type="text" class="form-control" name="name[{{$i}}]" value="{{ old('name') }}">
        
                                      
                                    </div>
         
                                    @endfor
                                     
                                  
                                    
                                    </div>
                                    
                                   <div class="col-md-3">
                                              <br/>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-user"></i> Add Subject
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