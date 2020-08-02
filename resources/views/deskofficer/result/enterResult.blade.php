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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('insertResult') }}" >
                                {{ csrf_field() }}
                                <input type="hidden" name="student_id"  value="{{$s->id}}"/>
                                <input type="hidden" name="matricNumber"  value="{{$s->matricNumber}}"/>
                                <input type="hidden" name="programme_id"  value="{{$s->programme_id}}"/>
                                <input type="hidden" name="level_id"  value="{{$l}}"/>
                                <input type="hidden" name="period"  value="{{$period}}"/> 
                                <input type="hidden" name="session"  value="{{$session}}"/>         
                           <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
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
                                              <td>{{$item->code}}
                                            <input type="hidden" name="course_id[{{$k}}]"  value="{{$item->course_id}}"/>
                                             <input type="hidden" name="registercourse_id[{{$k}}]"  value="{{$item->id}}"/>
                                              <input type="hidden" name="unit[{{$k}}]"  value="{{$item->unit}}"/>
                                            </td>
                                            <td>{{$item->unit}}</td>
                                              <td>{{$item->Semester->name}}
                                            <input type="hidden" name="semester_id[{{$k}}]"  value="{{$item->semester_id}}"/></td>
                                             
                                            </td>
                                              <td>
                                                  <?php $r =$R->getResult($l,$session,$s->programme_id,$period,$s->id,$item->course_id);?>
                                                  @if($r != '')
                                                  @if($s->entry_year <='1989')
                                                  <input type="text" name="grade[{{$k}}]" pattern="[A-Fa-fpPa+A+b+B+b-B-c-C-C+c+]{1}" value="{{$r->grade}}"/>

                                                  @else

                                                  <input type="text" name="grade[{{$k}}]" pattern="[A-Fa-fpP]{1}" value="{{$r->grade}}"/>

                                                  @endif
                                                  
                                                  @else
                                                  @if($s->entry_year <='1989')
                                                  <input type="text" name="grade[{{$k}}]" pattern="[A-Fa-fpPa+A+b+B+b-B-c-C-C+c+]{1}" value=""/>

                                                  @else
                                                  <input type="text" name="grade[{{$k}}]" pattern="[A-Fa-fpP]{1}" value=""/>

                                                  @endif
                                                  
                                                @endif</td>
                                             
                                            
                                            
                                            </tr>
                                            @endforeach 
                                            @endif
                                          
                                         
                                          </tbody>
                                        </table>
                                   
                                        <div class="col-md-2">
                                                <br/>
                                          <button type="submit" class="btn btn-success">
                                              Add Result
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