@inject('R','App\General')
@extends('layouts.main')
@section('title','View Deskofficer')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Desk officer</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Desk officer</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Programme</th>
               
                <th>Action</th>
              </tr>
            </thead>
           
            <tbody>
                @if(isset($user) && $user != null)
               @foreach ($user as $item)
                   
               
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><?php $ap =$R->getAssignProgrammeByuserId($item->id) ?>
                 
                @if(count($ap) != 0)
                @foreach ($ap as $v)
                {{isset($v->Programme->name) ? $v->Programme->name :'' }} <br/> 
                @endforeach
              
              @endif</td>
              
                <td>   <div class="dropdown mb-4">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown
                        </button>
                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                         @if($item->status == 1)
                         <a class="dropdown-item" href="{{url('deactivateAccount',$item->id)}}">Deactivate</a>
                         @elseif($item->status == 0)
                         <a class="dropdown-item" href="{{url('activateAccount',$item->id)}}">Activate</a>
                         @endif
                         
                        </div>
                      </div></td>
              </tr>
              @endforeach 
              @endif
            
           
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
@endsection