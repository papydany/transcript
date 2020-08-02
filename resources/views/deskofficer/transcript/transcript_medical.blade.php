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
    width: 100%;
	height:auto;
}

.page-break {
    page-break-after: always;
}
 .float_left{
	   width: 35%;
	   float:left;
	font-size: 0.75em;
	
	
	}
	.float_left1{
	   width: 35%;
	   float:left;
	font-size: 0.7em;
	
	}
	.float_left3{
	   width: 30%;
	   float:left;
	font-size: 0.75em;
	padding: 2px 0px;
	
	}
	
	.header_left{
		width: 10%;
		float:left;
		padding: 0px;
		
		}

		.header_left2{
		width: 80%;
		float:left;
		
		
		}
		.header_left3{
		width: 10%;
		float:right;
		padding: 0px;
		
		}
		.content_left{
	   width: 100%;
	
	font-size: 0.60em;
	
	}
	
	footer{
	   position: fixed;
	   left: 0;
	   right: 0;
	   height: 45px;
	   bottom: 30px;
	
	
	}
	.f{
		
		width: 8%;
		float: left;
	   font-size: 0.5em;
	
	 }
	 .f1{
		 
		 width: 15%;
		 float: left;
	   font-size: 0.5em;
	   margin-left: 1%;
	  }
	 .ft{
		 
		 width: 20%;
		 float: left;
		 margin-left: 1%;
		 font-size: 0.45em;
		 }
		 .fa{
		 
		 width: 23%;
		 float: left;
		 font-size: 0.49em;
		 
		 }
	 .fff{
		 width: 20%;
		 float: left;
		 margin-left: 1%;
		 font-size: 1em;
		 font-weight: bold;
	  }
	 .ff{
		 width: 30%;
		 float: right;
		 font-size: 0.52em;
		 margin-left: 1%;
		 
	  }
	 .ff >td {padding: 2px;
		}
   .clear{clear:both;
   }
   
   .content_left >td, .content_left >th {
	
	color: black;
	border: 1px solid blue;
	
	
}

#content_right >td, #content_right >th {
	color: black;
	border: 1px solid blue;
	
}

.degree >td, .degree >th {
	color: black;
	border: 1px solid blue;
	padding: 1px;
	font-size: 0.8em;
	
}
#watermark{
	position: fixed;
	bottom:7cm;
	left:30%;
	width: 8cm;
	height: 8cm;
	z-index: -2000;
	
	}


header{
	position: fixed;
	top:-10;
	left:0px;
	right:0px;
	height:150px;

	
	}
</style>
</head>
<body>
	<script type="text/php">
		if ( isset($pdf) ) {
			// OLD 
			// $font = Font_Metrics::get_font("helvetica", "bold");
			// $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
			// v.0.7.0 and greater
			$x = 620;
			$y = 40;
			$text = "{PAGE_NUM} of {PAGE_COUNT}";
			$font = $fontMetrics->get_font("helvetica", "bold");
			$size = 10;
			$color = array(0,0,0);
			$word_space = 0.0;  //  default
			$char_space = 0.0;  //  default
			$angle = 0.0;   //  default
			$pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
		}
	</script>
<header>
	<div class="row">
	<div class="header_left">
		<table >
			<thead>
			 <tr>
		<img src="img/logo.png" width="40px;" >
			 </tr>
			</thead>
		</table>
	</div>
	<div class="header_left2">
	
	<table>
		<thead align="center">
		 <tr style="font-size:1em;">
			<th>UNIVERSITY OF CALABAR, CALABAR, NIGERIA</th>
		</tr>
		<tr style="font-size:1em;">
			<th ><span style="background-color:blue; padding:45px; color:white;font-weight:bolder;">STUDENT'S ACADEMIC TRANSCRIPT</th>
		</tr>
		
		</thead>
	</table>
	</div>
	<div class="header_left3">
		<table >
			<thead>
			 <tr>
				 
				@if($student->id ==389)
				<img src="img/69.jpg" width="50px;" style="float:right;" >
				
				@elseif($student->std_id ==35180)
				<img src="img/35180.jpg" width="50px;" style="float:right;">

				@elseif($student->id ==7875)
				<img src="img/7875.jpg" width="50px;" style="float:right;">
				
				@elseif($alltranscrip != null)
				<?php 
				if(File::exists('img/'.$alltranscrip->alumniNo.'.jpg')){
					$image ='img/'.$alltranscrip->alumniNo.'.jpg';
	}elseif(File::exists('img/'.$alltranscrip->alumniNo.'.jpeg')){
		$image ='img/'.$alltranscrip->alumniNo.'.jpeg';
	}
	elseif(File::exists('img/'.$alltranscrip->alumniNo.'.png')){
		$image ='img/'.$alltranscrip->alumniNo.'.png';
	}
	?>
	@if(isset($image))
				<img src="{{$image}}" width="50px;" style="float:right;">
		@endif	

		@else
<?php
$image1 ='img/'.$student->id.'.jpg';
?>
		<img src="{{$image1}}" width="50px;" style="float:right;">	
				@endif	
			 </tr>
			</thead>
		</table>
	</div>
	<div class="clear"></div>
	</div>

	<div class="row">
	<div class="float_left">
		<table>
			<thead>
				<tr>
					<td><b>NAME : </b> {{$student->surname.',' .' '.$student->firstname. ' '.$student->othername}}</td>
				</tr>
			 <tr>
				<td><b>MATRIC NUMBER : </b>{{$student->matricNumber}}</td>
			</tr>
			
			<tr>
				<td><b>FACULTY : </b>{{$student->Faculty->name}}</td>
			</tr>
			<tr>
				<td><b>DEPARTMENT : </b>{{$student->Department->name}}</td>
			</tr>
			<tr>
				<td><b>DATE OF BIRTH : </b> {{strtoupper(date('F j, Y',strtotime($student->birthdate)))}}</td>
			</tr>
			
			</thead>
		</table>
	</div>
			
					<div class="float_left1">
						<table >
							<thead>
							 <tr>
			
								<td><b>SESSION OF ENTRY : </b>{{$student->entry_year.' / '.$next}}</td>
							</tr>
							<tr>
								<td><b>DATE OF GRADUATION : </b>{{strtoupper(date('F j, Y',strtotime($student->date_of_graduation)))}}</td>
							</tr>
							<tr>
								<td><b>MODE  OF ENTRY  : </b> {{strtoupper($student->mode_of_entry)}}</td>
							</tr>
							
							
							<tr>
								<td><b>SEX : </b>{{strtoupper($student->gender)}}</td></tr>
								
									
							<tr><td><b>MARITAL STATUS : </b>{{strtoupper($student->marital_status)}}</td>
							</tr>
							
							</thead>
						</table>
					</div>

					<div class="float_left3">
						<table >
							<thead>
								<tr>
			
									<td><b>NATIONALITY : </b>
										{{isset($student->State->state_name) ? strtoupper($student->nationality) : ''}}
									</td>
								</tr>
							 <tr>
			
								<td><b>STATE OF ORIGIN : </b>
									{{isset($student->State->state_name) ? strtoupper($student->State->state_name) : ''}}
								</td>
							</tr>
							<tr>
								<td><b>LOCAL GOVT, AREA : </b>{{isset($student->Lga->lga_name) ?
								strtoupper($student->Lga->lga_name) : ''}}</td>
							</tr>
						
							
							<tr>
								<td><b>PARENTS OR GUARDIANS : </b> {{strtoupper($student->parent)}}
								</td>
							</tr>
							</thead>
						</table>
					</div>
							<div class="clear"></div>
							<table class="degree" >
								<tr>
								<td><b>DEGREE AWARDED: </b>{{$p->degree}}</td>
								
									<td><b>CLASS OF DEGREE: </b>PASS</td>
								</tr>
							</table>
							<div style="">
		
								<hr/>
										
							</div> 
									
						</div>
					</header>
					<div id="watermark">
						<img src="img/logo2.jpg" width="120%;" height="120%">
					</div>

					<footer>
						
						<hr/>
						<div class="row">
							
						<div class="f">
						<table style="border:1px solid blue;">
							<tr>
								<td colspan="3" style="text-align:center;">Grading System</td>
							</tr>
							
							<tr>
								<td>70 - 100</td>
								<td>5</td>
								<td>A</td>
							</tr>
							<tr>
								<td>60- 69</td>
								<td>4</td>
								<td>B</td>
							</tr>
							<tr>
								<td>50 - 59</td>
								<td>3</td>
								<td>C</td>
							</tr>
							<tr>
								<td>45 - 49</td>
								<td>2</td>
								<td>D</td>
							</tr>
							<tr>
								<td>40 - 44</td>
								<td>1</td>
								<td>E</td>
							</tr>
							<tr>
								<td>0 - 39</td>
								<td>0</td>
								<td>F</td>
							</tr>
						</table>
						
						</div>

						<div class="f1">
							<table style="border:1px solid blue;">
								<tr>
									<td colspan="3" align="center">Grading In Clinical</td>
								</tr>
								<tr>
									<td>2</td>
									<td>P(D)</td>
									<td>Pass With Distinction</td>
								</tr>
								<tr>
									<td>1</td>
									<td>P</td>
									<td>Pass</td>
								</tr>
								
								<tr>
									<td>3</td>
									<td>F</td>
									<td>Fail</td>
								</tr>
							
							
							
							</table>
							</div>
							<div class="ft">
								
							<?php echo $code; ?>
							<span style=""><b>Transcript ID : </b>{{$barcodeId}}</span>
									
							</div>
							<div class="fa">
							
								<table style="">
									<tr>
										<td align="center"><b>DESTINATION </b></td>
									</tr>
								
								<tr><td>{!!$address!!}</td>
								</table>		
								</div>
							<div class="ff">
								<table>
									<tr>
										<th colspan="2">This is a true copy of the record on file in this office</th>
									</tr>
								
									<tr><td><br/>Signature & Date  </td>
										<td><br/><span style="color:#000; padding:20px 0 0 3px; font-size:10px;">
											.............................................................</span>
									</td>
									</tr>
									<tr><td>Approved by : </td><td>{{$issuing->name}}</td></tr>
									<tr><td> </td><td>Head Transcript Unit</td></tr>
									<tr><td></td><td>For REGISTRAR</td></tr>
								</table>
								
									
									
									
								
								
								</div>
								<div class="clear"></div>
						</div>

				</footer>			

	
<main >
		<div class="row" style="margin-top:170px;">
	
			<?php $i =0;  
			$c_unit=0; $c_point=0; $cgpa=0;
			?>
		@if(isset($result))
		@foreach ($result as $key =>$item)
		<?php $key_plus =$key + 1;
		$collection =$item->groupBy('semester_id')->toArray();
		//dd($collection)
		$i ++;

		?>
@if($i == 1)
	
@if($i % 2 != 0)
<div class="content_left">
    <table style="border-collapse: collapse;">
@else
<div id="content_right">
    <table  >
@endif
<tr><th colspan="5" align="center" style="font-size:1.5em;">
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
</th>
</tr>
		
					
		<tr style="font-size:1.3em"><th colspan="3" align="center">
		 ACADEMIC SESSION {{$key . ' / '.$key_plus}}</th>
			<th colspan="2" align="center">{{$i. ' / '.$p->level}}</th></tr>	
			
			<tr>
				<th>COURSE CODE</th>
				<th>COURSE TITLE</th>
			<th align="center">CREDIT HOUR</th>
			<th align="center">GRADE</th>
			<th align="center">GRADE POINT</th>
			</tr>			
@foreach ($collection as $k1=>$v1)

<?php  $total_unit=0; $total_point=0; $gpa=0; ?>

<tr>
	<th colspan="5" align="center">
		@if($k1 == 1)
		FIRST SEMESTER
	@elseif($k1== 2)
	SECOND SEMESTER
@endif</th>

</tr>

@foreach ($v1 as $v2)
<?php $point =$R->mm($v2->grade,$v2->unit,$student->entry_year);
$total_unit += $v2->unit;

$total_point += $point['cp'];
if( $total_point == 0)
{
	$gpa = 0;	
}else{
$gpa = round($total_point/$total_unit,2);
}

$c_unit += $v2->unit;

$c_point += $point['cp'];
if( $c_point == 0)
{
	$cgpa = 0;	
}else{
$cgpa = round($c_point/$c_unit,2);
}
?>
				<tr>
					<td style="text-align:center">{{$v2->code}}</td>
					<td style="font-size: 7.92px">{{strtoupper($v2->title)}}</td>
					<td style="text-align:center">{{$v2->unit}}</td>
					<td style="text-align:center">{{$v2->grade}}</td>
					<td style="text-align:center">{{$point['cp']}}</td>
					</tr>
					@endforeach
					<tr>
						<th colspan="2">Total</th>
						<th align="center">{{$total_unit}}</th>
<th align="center"><b>GPA : </b>{{$gpa}}</th>
<th align="center">{{$total_point}}</th>
					</tr>
	
					@endforeach
					<tr>
						<th colspan="2">Cumulative</th>
						<th align="center">{{$c_unit}}</th>
<th align="center"><b>CGPA : </b>{{$cgpa}}</th>
<th align="center">{{$c_point}}</th>
					</tr>	

										
								
				</tbody>
			</table>
				
        </div>
		<div class="page-break"></div>
	
        @else

        
<div class="content_left">
	@if($i == 2)
	<table style="border-collapse: collapse;margin-top:170px;">
	</table>
	@endif
    <table style="border-collapse: collapse;">

		
					
		<tr style="font-size:1.3em"><th colspan="4" align="center">
			@if($i == 1)
            FIRST
			@elseif($i==2)
			(PART I) &nbsp; 
			@elseif($i==3)
			(PART II) &nbsp; 
			@elseif($i==4)
			(PART III) &nbsp; 
			@elseif($i==5)
            (PART IV) &nbsp; 
			@elseif($i==6)
			
			@elseif($i==7)
			
			@endif
			
		MBBCh EXAMS RESULTS {{$key}}</th>
			</tr>	
			
			<tr>
				<th>COURSE CODE</th>
				<th>COURSE TITLE</th>
			
			<th align="center">GRADE</th>
			<th align="center">GRADE POINT</th>
		
			</tr>			
@foreach ($collection as $k1=>$v1)

<?php  $total_unit=0; $total_point=0; $gpa=0; ?>



@foreach ($v1 as $v2)

				<tr>
					<td width="20%">{{$v2->code}}</td>
					<td style="font-size: 7.92px">{{strtoupper($v2->title)}}</td>
				
					<td width="20%" style="text-align:center">{{$v2->grade}}</td>
				
					
					<td width="20%" style="text-align:center">
						@if($v2->grade == 'P') 
						PASS
					@elseif($v2->grade =='P(D)')
					PASS WITH DISTINCTION
				
				@endif</td>
				
					</tr>
					@endforeach
	
	
					@endforeach
				

										
								
				</tbody>
			</table>
				
        </div>
        
		
        @endif
        
        </div>
    
		
        </div>
        <div class="clear"></div>
</main>

	
	@endforeach
	
		
	@endif
	
	

</body>
</html>	