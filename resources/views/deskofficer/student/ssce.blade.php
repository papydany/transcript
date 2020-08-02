@inject('R','App\General');

@extends('layouts.main')
@section('title','Add SSCE')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update <span class="text-primary">{{$s->surname.' ( '.$s->matricNumber.' ) '}}</span> SSCE  Records</h1>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                    <b> Fac : </b>{{$s->Faculty->name}}
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <b> Dept : </b> {{$s->Department->name}}
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                          <b> Cat : </b>  {{$s->Category->name}}
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <b> Prog : </b>   {{$s->Programme->name}}
                          </div>
                </div>
                <hr/>
               
                  @if(isset($stype) && $stype != null)
                  <form class="form-horizontal" method="POST" action="{{ route('updateStudentSsce')}}">
                    @csrf
                    
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="Course_title" class=" control-label">last Institution Attended</label>
                      <input  type="text" class="form-control" name="last_institution" 
                      value="{{$s->last_institution}}" required>
                      </div>  
                         
                      <input type="hidden" name="student_id" value="{{$s->id}}"/>
                    </div>
                    <div class="form-group row">
                    @foreach ($stype as $item)
                   
                    
                  <div class="col-lg-5">
                    
                    <table class="table table-bordered">
                     
                      <tr><th colspan="2">{{$item->name}}</th></tr>
                      <tr><th>Subject</th><th>Grade</th></tr>
                      @foreach ($sb as $v)
                      <?php 
                      $grade =$R->getSsceGrade($s->id,$v->id,$item->id);?>   
                      <tr>
                        <td>{{$v->name}}</td>
                        <td> 
                          @if($grade != '')
                          <input  type="text" class="form-control" name="grade[{{$v->id.$item->id}}]" value="{{$grade->grade}}">
                         @else
                         <input  type="text" class="form-control" name="grade[{{$v->id.$item->id}}]" value="">
                         
                          @endif
                          <input  type="hidden" class="form-control" name="subject_id[{{$v->id.$item->id}}]" value="{{$v->id}}">
                          <input  type="hidden" class="form-control" name="ssce_type_id[{{$v->id.$item->id}}]" value="{{$item->id}}">
                         
                        </td>
                      </tr>   
                      @endforeach
                      
                    
                      
                    
                     
                    </table>
                   
                  </div>
                  @endforeach
                    </div>
                    <div class="col-md-3">
                      <br/>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-user"></i> Update
                </button>
            </div>
              </form>
              @endif
               
               
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
