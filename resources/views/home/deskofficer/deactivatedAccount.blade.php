@extends('layouts.main')
@section('title','View Deactivated Account')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Deactivated Account</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Deactivated Account</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
                @if(isset($user) && $user != null)
               @foreach ($user as $item)
                   
               
              <tr>
                <td>{{$item->name}}</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
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