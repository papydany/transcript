@extends('layouts.main')
@section('title','View Subject')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                
          <!-- Nested Row within Card Body -->
          <div class="row">
                <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">View Subjects</h1>
                          </div>
            
                                @if(isset($s) && $s != null)
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                         
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                     
                                      <tbody>
                                         
                                         
                                         @foreach ($s as $item)
                                          
                                         
                                        <tr>
                                          <td>{{$item->name}}</td>
                                       
                                          <td>
                                              <a href="{{url('editSubject',$item->id)}}" class="btn btn-success btn-circle .btn-sm float-right">
                                                      <i class="fas fa-exclamation-triangle"></i>
                                                    </a>  
                                            </td>
                                        
                                        
                                        </tr>
                                        @endforeach 
                                       
                                      
                                     
                                      </tbody>
                                    </table>
                                  </div>
                                  @endif
        
                                </div>
        
                                </form>
                                </div>
                                </div>
          </div>
        </div>
</div>
@endsection