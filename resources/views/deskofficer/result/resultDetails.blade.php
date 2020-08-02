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
                            <h1 class="h4 text-gray-900 mb-4">Enter  Result</h1>
                          </div>
                        <div class="row">
                            <div class="col-lg-12">
                           <span class="text-primary"> {{$s->surname .' '. $s->firstname. ' ' .$s->othername .' ('.$s->matricNumber.')'}}</span>
                            </div>
                        </div>
                            <div class="card mb-4 py-3 border-bottom-success">
                              <div class="row ">
                            <div class="col-4">
                           <p><b>Faculty : </b>{{$s->Faculty->name}}</p>
                           <p> <b>Department : </b>{{$s->Department->name}}</p>
                            </div>
                            <div class="col-4">
                                    <p><b>School:</b> {{$s->Category->name}}</p>
                                    <p> <b>Programme : </b>{{$s->Programme->name}}</p>
                                     </div>
                                     <div class="col-4">
                                       <?php $next =$session + 1; ?>
                                      <b>Level</b> {{$l}}00
                                       <br/><b>Session : </b>{{$session.' / '.$next}}
                                       <br/><b>Period : </b>{{$period}}
                                       </div>
                    </div>
                            </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('delete_multiple_grade') }}" >
                                {{ csrf_field() }}
                                       
                           <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <th>Select</th>
                                              <th>Code</th>
                                              <th>Unit</th>
                                              <th>Semester</th>
                                              <th>Grade</th>
                                          
                                            </tr>
                                          </thead>
                                         
                                          <tbody>
                                             
                                              @if(isset($rc) && $rc != null)
                                             @foreach ($rc as $k => $item)
                                              
                                             
                                            <tr>
                                                <td><input type="checkbox" name="id[]" value="{{$s->id}}"></td>
                                              <td>{{$item->code}}
                                           
                                            </td>
                                            <td>{{$item->unit}}</td>
                                              <td>{{$item->Semester->name}}</td>
                                             
                                            </td>
                                              <td>
                                                  <?php $r =$R->getResult($l,$session,$s->programme_id,$period,$s->id,$item->course_id);?>
                                                  @if($r != '')
                                                 

                                {{$r->grade}}

                                                 @endif</td>
                                             
                                            
                                            
                                            </tr>
                                            @endforeach 
                                            @endif
                                          
                                         
                                          </tbody>
                                        </table>
                                   
                                        <div class="col-md-2">
                                                <br/>
                                          <button type="submit" class="btn btn-danger">
                                              Delete Result
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