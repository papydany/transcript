<section class="content home" style="z-index: 79;">
@if(Session::has('success'))
  <div class="col-sm-3"></div>  
    <div class="col-sm-9 col-sm-offset-3 alert alert-success" role="alert">
        <strong>Success: </strong>{{Session::get('success')}}    <i class="fa fa-fw fa-check-circle fa-lg" style="color:green"></i> 
    </div>

    @endif

    @if(Session::has('warning'))
    <div class="col-sm-3"></div>  
    <div class="col-sm-9 col-sm-offset-3 alert alert-warning" role="alert">
      {{Session::get('warning')}}
    </div>

    @endif
  @if(Session::has('danger'))
    <div class="row">
    
    <div class="col-sm-9 alert alert-danger" role="alert">
      {{Session::get('danger')}}
    </div>
</div>
    @endif


@if(count($errors) > 0)
  <div class="col-sm-3"></div>  
    <div class="col-sm-9 col-sm-offset-3 alert alert-danger" role="alert">

        <strong>Error <i class="fa fa-times" aria-hidden="true"></i></strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
    </div>
 

    @endif
    </section>