@inject('R','App\General')
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Academic Transcript</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">
table {
    font-family: arial, sans-serif;
	border-spacing: 0px;
    width: 100%;
}
.row{
	 margin-right: -.75rem;
    width: auto;
	height:auto;
}

.p{font-size: 1em;
line-height: 20px}
 .float_left{
	   width: 40%;
	   float:left;
	font-size: 0.7em;
	margin-right: 5%;
	
	
	}
	.float_left1{
	   width: 20%;
	   float:left;
	font-size: 0.7em;
	
	}
	.float_left3{
	   width: 35%;
	   float:left;
	font-size: 0.7em;
	
	
	}
	.transcript_left{
	   width: 80%;
	   float:left;
	font-size: 0.7em;
	margin-right: 5%;
	
	
	}
	.transcript_left1{
	   width: 15%;
	   float:left;
	font-size: 0.7em;
	
	
	
	}
	
.header_left2{
		width: 100%;
		padding: 2px 0px;
		}
        footer{
	   position: fixed;
	   left: 0;
	   right: 0;
	   height: 60px;
	   bottom: 30px;
	
	
	}
    .f{
		
        width:45%;
        float: left;
        font-size: 0.6em;
        
     }
     .ft{
         
         width: 54%;
         float: left;
        
         font-size: 0.6em;
         
         
      }
		.content_left{
	   width: 49%;
	   float:left;
	font-size: 0.55em;
	
	}
	#content_right{
	   width: 49%;
	   float: right;
	font-size: 0.55em;
	
    }
   .clear{clear:both;
   }
   
   .ft >td, .ft >th {
	
	color: black;
	padding: 2px;

	
}

#content_right >td, #content_right >th {
	color: black;
	border: 1px solid blue;
	
}

.degree >td, .degree >th {
	color: black;
	border: 1px solid blue;
    font-size: 0.7em;
	
}
#watermark{
	position: fixed;
	bottom:10cm;
	left:20%;
	width: 8cm;
	height: 8cm;
	z-index: -2000;
	
	}


	

</style>
</head>
<body>

	<div class="row" style="margin-bottom:10px;">

	<div class="header_left2">
	
	<table>
		<thead align="center">
		 <tr style="font-size:1.5em;">
			<th>UNIVERSITY OF CALABAR</th>
		</tr>
		<tr style="font-size:1em;">
			<th>CALABAR, NIGERIA</th>
		</tr>
		
		</thead>
	</table>
	</div>
	
	
	
	</div>

	<div class="row" style="margin-bottom:0px;">
	<div class="float_left">
		<table>
			<thead>
				<tr>
					<th>Vice Chancellor</th>
				</tr>
			 <tr>
				<td><b>{{$vc->name}}</b></td>
			</tr>
			
			<tr>
				<td>{{$vc->position}}</td>
			</tr>
			<tr>
				<td><b>Email :</b>vcunical.edu.ng<br/>
				zakpagu@unical.edu.ng<br/>
			zeeakpagu@yahoo.co.uk</td>
			</tr>
			
			
			
			</thead>
		</table>
	</div>
			
					<div class="float_left1">
						<table >
							<thead>
							 <tr>
								<img src="img/logo.png" width="40%" >
                             </tr>
                            </thead>
						</table>
					</div>

					<div class="float_left3">
						<table >
							<thead>
								<tr>
			<th>Registrar & Secretary To Council</th>
								</tr>
							 <tr>
			 <td><b>{{$r->name}}</b></td>
							</tr>
							<tr>
								<td>{{$r->position}}</td>
							</tr>
							<tr>
								<td><b>All Correspondence to : </b> The Registrar
									<br/>P.M.B. 1115, Calabar Cross River State,Nigeria
								</td>
							</tr>
							<tr>
								<td><b>Email : </b> {{$r->email}}
								</td>
							</tr>
							</thead>
						</table>
                    </div>
                    
                            <div class="clear"></div>
                            
                            <div class=".header_left2">
							<table>
								<thead align="center">
								<tr style="font-size:1em;">
								<th>OFFICE OF THE REGISTRAR</th>
								
								</tr>
								</thead>
                            </table>
                            </div>
                     
                        
							
									
						</div>
						<hr/>
					
					<div id="watermark">
						<img src="img/logo2.jpg" width="120%;" height="120%">
					</div>

					<div class="row" style="margin-bottom:20px;">
						<div class="transcript_left">
						<b>Transcript ID : </b>	{{$transcript_id}}
						</div>
					
						<div class="transcript_left1">
							{{strtoupper(date('F j, Y',strtotime($date)))}}
						</div>
						<div class="clear"></div>
					</div>
                    <div class="row">
                        <div class="float_left">{!!$b->address!!}</div>
                        <div class="clear"></div>
					</div>
				
            
                    
	<div class="row" style="">
        <div class="float_left">
            <table>
                <thead>
                    <tr >
                        <td colspan="2">ACADEMIC TRANSCRIPT OF</td>
                    </tr>
                 <tr>
                    <td colspan="2">
                        <b style="font-size:1.2em;">{{$student->surname .','.' '.$student->firstname. ' '.$student->othernames}}
                        </b></td>
                </tr>
                
                <tr>
                    <td>REGISTRATION NO :</td>
                    <td>{{$student->matric_no}}</td>
                </tr>
                
                
                
                </thead>
            </table>
        </div>
                
                        <div class="float_left1">
                            <table >
                                <thead>
									<tr>
										
									</tr>
                                </thead>
                            </table>
                        </div>
    
                        <div class="float_left3">
                            <table >
                                <thead>
                                    <tr>
                <td colspan="2"></td>
                                    </tr>
                                 <tr>
                 <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td>DEPARTMENT</td>
                                    <td>{{$d->departments_name}}</td>
                                </tr>
                                
                                </thead>
                            </table>
                        </div>
                        
                                <div class="clear"></div>
                               </div>

		<div class="row p">
            <p> We have been requested to forward to you,the Academic Transcript of the above named student /ex-student of the University of Calabar, 
            Calabar, Nigeria. The candidtate is / was of the Department of <b>{{$d->departments_name}} </b> in the Faculty/College/Institute of <b>{{$f->faculties_name}}.</b>
        </p>
    <p>The transcript is herewith enclosed. You will have to satisfy yourself that<b> {{$student->surname .', '.$student->firstname. ' '.$student->othernames}}</b>
         of our records and the one requesting us to send this transcript is one and the same person.</p>
	<p>The transcript is CONFIDENTIAL and  on no account should the student or other unauthorised person(s) be
        allowed access to it.
    </p>
    <p>Please acknowledge receipt by sending an email to transcript@unical.edu.ng quoting the candidtate's name and Transcript ID at the top of the page.</p>
	<p>Any other  document supplied by the candidtate that may be enclosed, should be treated as separate from the transcript and attended to on its own merit.
	</p>
	<p>Please note that any alteration or mutilation on this transcript renders it invalid.</p>
	<p>Thanks.</p>
 

    
				
        </div>
        <div class="row" style="">
            
                <div class="f">
                    <table>
                        <tr>
                            <td><span style="color:#000; padding:20px 0 0 3px; font-size:10px;">
                                .............................................................</span>
                        </td>
                        </tr>
                       
                    <tr><td>{{$issuing->name}}</td></tr>
                        <tr><td>For REGISTRAR</td></tr>
                      
                    </table>
					</div>
					<div class="clear"></div>
		</div>
		<div class="row" style="margin-top:25px;">
                    
					<div class="f"><?php echo $code; ?></div>
					
					
					
					@if(isset($result))
					<?php $i =0;?>
                    <div class="ft">
                        <table>
                            <tr><th colspan="2">The Transcript Consist Of :</th></tr>
        @foreach ($result as $key =>$item)
		<?php $key_plus =$key + 1; $i++?>
		
        <tr><td>
            @if($i == 1)
            FIRST
			@elseif($i==2)
			SECOND
			@elseif($i==3)
			THIRD
			@elseif($i==4)
			FOURTH
			@elseif($i==5)
			FIFTH
			@elseif($i==6)
			SIXTH
			@elseif($i==7)
			SEVENTH
			@endif
			YEAR 
            </td>
            <td>{{$key .' / '.$key_plus}}</td>
        
		</tr>
		
        @endforeach
        
        @endif
                        </table>
        
                    
        </div>
        <div class="clear"></div>
        </div>
        <footer>
        <div class="ft">
          			
        </div>
            <div class="f">
                <table>
                    <tr>
                        <th colspan="2">This is a true copy of the record on file in this office</th>
                    </tr>
                
                    <tr><td><br/><br/>Signature & Date  </td>
                        <td><br/><br/><span style="color:#000; padding:20px 0 0 3px; font-size:10px;">
                            .............................................................</span>
                    </td>
					</tr>
					<tr><td colspan="2">{{$issuing->name}}</td></tr>
                    <tr><td colspan="2">Head Transcript Unit</td></tr>
					<tr align="center"><td colspan="2"><br/>For REGISTRAR</td></tr>
                </table>
                
                    
                    
                    
                
                
                </div>
                <div class="clear"></div>
            </footer>
        </div>

	
		</div>
		
		</div>

	
	


	
	

</body>
</html>	