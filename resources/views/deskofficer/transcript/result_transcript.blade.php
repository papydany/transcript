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

.page-break {
    page-break-after: always;
}
 .float_left{
	   width: 35%;
	   float:left;
	font-size: 0.7em;
	}
	.float_left1{
	   width: 35%;
	   float:left;
	font-size: 0.7em;
}
	.float_left3{
	   width: 30%;
	   float:left;
	font-size: 0.7em;
	}

		.header_left{
		width: 10%;
		float:left;
		padding: 0px;
		
		}

		.header_left2{
		width: 80%;
		float:left;
		padding: 2px 0px;
		
		}
		.header_left3{
		width: 10%;
		float:right;
		padding: 0px;
		
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
		 
		 width: 18%;
		 float: left;
	   font-size: 0.5em;
	   margin-left:1%;
	  }
	 .ft{
		 
		 width: 20%;
		 float: left;
		 margin-left:1%;
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
		 width: 29%;
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
    font-size: 0.7em;
	
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
	<?php $i =0;  $c=1; $c_unit=0; $c_point=0; $cgpa=0; ?>
<header>
	<div class="row">
		<div class="header_left">
			<table >
				<thead>
				 <tr>
			<img src="img/logo.png" width="40px;"  >
				 </tr>
				</thead>
			</table>
		</div>
		<div class="header_left2">
	<table >
		<thead align="center">
		 <tr style="font-size:1em;">
			<th>UNIVERSITY OF CALABAR, CALABAR, NIGERIA</th>
		</tr>
		<tr style="font-size:1em;">
			<th ><span style="background-color:blue; padding:45px; color:white;font-weight:bolder;">
				STUDENT'S ACADEMIC TRANSCRIPT</span></th>
		</tr>
	
		</thead>
	</table>
		</div>
		<div class="header_left">
			<table >
				<thead>
				 <tr>
	
		@if($student->std_id ==388)
			<img src="img/69.jpg" width="50px;" style="float:right;">
			@endif
			@if($student->std_id ==35180)
			<img src="img/35180.jpg" width="50px;" style="float:right;">
			@endif
			@if($student->std_id ==30650)
			<img src="img/30650.jpg" width="50px;" style="float:right;">
			@endif
			@if($student->std_id ==16330)
			<img src="img/30650.jpg" width="50px;" style="float:right;">
			@endif
			@if($student->std_id ==34491)
			<img src="img/34491.jpg" width="50px;" style="float:right;">
			@endif
			@if($student->std_id ==33202)
			<img src="img/33202.jpg" width="50px;" style="float:right;">
			@endif

			
			
			
			@if($alltranscrip != null)
			<?php 
			if(file_exists('img/'.$alltranscrip->alumniNo.'.jpg')){
				$image ='img/'.$alltranscrip->alumniNo.'.jpg';
}elseif(file_exists('img/'.$alltranscrip->alumniNo.'.jpeg')){
    $image ='img/'.$alltranscrip->alumniNo.'.jpeg';
}
elseif(file_exists('img/'.$alltranscrip->alumniNo.'.png')){
    $image ='img/'.$alltranscrip->alumniNo.'.png';
}
?>
@if(isset($image))
			<img src="{{$image}}" width="50px;" style="float:right;">
	@endif

	@else
<?php
$image1 ='img/'.$student->std_id.'.jpg';
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
					<td><b>NAME :</b> {{$student->surname.',' .' '.$student->firstname. ' '.$student->othernames}}</td>
				</tr>
			 <tr>
				<td><b>MATRIC NUMBER : </b>{{$student->matric_no}}</td>
			</tr>
			
			<tr>
				<td><b>FACULTY : </b>{{$f->faculties_name}}</td>
			</tr>
			<tr>
				<td><b>DEPARTMENT : </b><span style="font-size: 0.8em;">
					{{$d->departments_name}}</span></td>
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
			
								<td><b>SESSION OF ENTRY : </b>{{$student->std_custome18.' / '.$next}}</td>
							</tr>
							<tr>
								<td><b>DATE OF GRADUATION : </b>{{strtoupper(date('F j, Y',strtotime($student->date_of_graduation)))}}</td>
							</tr>
							<tr>
								<td><b>MODE OF ENTRY : </b> <span style="font-size: 0.8em;">{{strtoupper($student->std_custome3)}}</span></td>
							</tr>
							
							<tr>
								<td><b>SEX : </b> {{strtoupper($student->gender)}}
								</td>
							</tr>
							<tr>
								<td>

									<b>MARITAL STATUS : </b>{{strtoupper($student->marital_status)}}</td>
							</tr>
							
							</thead>
						</table>
					</div>

					<div class="float_left3">
						<table >
							<thead>
								<tr>
			
									<td><b>NATIONALITY : </b>
										{{isset($student->nationality) ? strtoupper($student->nationality) : ''}}
									</td>
								</tr>
							 <tr>
			
								<td><b>STATE OF ORIGIN : </b>{{strtoupper($student->state_of_origin)}}</td>
							</tr>
							<tr>
								<td><b>LOCAL GOVT , AREA :</b>{{strtoupper($student->local_gov)}}</td>
							</tr>
							
							
							<tr>
								<td><b>PARENTS OR GUARDIANS
								 : </b> {{strtoupper($student->parents_name)}}
								</td>
							</tr>
							</thead>
						</table>
					</div>
							<div class="clear"></div>
							<table class="degree" >
								<tr>
								<td><b>DEGREE AWARDED : </b>{{
										$fos->degree_name}} </td>
								<td><b>FINAL CUMMULATIVE GRADE POINT AVERAGE (CGPA)  : </b>{{$c_gpa}}</td>
									<td><b>CLASS OF DEGREE : </b>{{$c_degree}}</td>
								</tr>
							</table>
							<div>
		
								<hr/>
										
							</div> 
									
						</div>
					</header>
					<table style="margin-top:165px;"></table>
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
									<td colspan="3" align="center">CLASSIFICATION OF DEGREE</td>
								</tr>
								<tr>
									<td>1</td>
									<td>4.50 - 5.00</td>
									<td>First Class</td>
								</tr>
								<tr>
									<td>2</td>
									<td>3.50 - 4.49</td>
									<td>Second Class Upper</td>
								</tr>
								<tr>
									<td>3</td>
									<td> 2.40 - 3.49</td>
									<td>Second Class Lower</td>
								</tr>
								<tr>
									<td>4</td>
									<td>1.50 - 2.39</td>
									<td>Third Class</td>
								</tr>
								<tr>
									<td>5</td>
									<td>1.00 - 1.49</td>
									<td>Pass</td>
								</tr>
								<tr>
									<td>6</td>
									<td>0.00 - 0.99</td>
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
										<td align="center">DESTINATION </td>
									</tr>
								
								<tr><td>{!!$address!!}</td>
								</table>		
								</div>
							<div class="ff">
								<table>
									<tr>
										<th colspan="2">This is a true copy of the record on file in this office</th>
									</tr>
								
									<tr><td><br/>Signature & Date</td>
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
		<div class="row" >
	
			
		@if(isset($result))
		@foreach ($result as $key =>$item)
		<?php $key_plus =$key + 1;
		$collection =$item->groupBy('std_mark_custom1')->toArray();
		
		$i ++;

		?>

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
		<?php $rbs =$R->registerOldStudent($student->std_id,$key);	 ?>		
	<tr style="font-size:1.3em"><th colspan="3" align="center">

		 ACADEMIC SESSION {{$key . ' / '.$key_plus}}</th>
	<th colspan="2" align="center">{{$rbs->level_id.' / '.$fos->duration}}</th></tr>		
	<tr>
		<th>COURSE CODE</th>
		<th>COURSE TITLE</th>
	<th>CREDIT HOUR</th>
	<th>GRADE</th>
	<th>GRADE POINT</th>
	</tr>	
			
@foreach ($collection as $k1=>$v1)

<?php  $total_unit=0; $total_point=0; $gpa=0; ?>

<tr>
	<th colspan="5" align="center" style="font-size:1.3em">
		@if($k1 == 'First Semester')
		FIRST SEMESTER
	@elseif($k1== 'Second Semester')
	SECOND SEMESTER
@endif</th>

</tr>

@foreach ($v1 as $v2)
<?php $point =$R->mm($v2->std_grade,$v2->thecourse_unit,$student->std_custome18);

if($v2->period =='NORMAL')
{
	
$total_unit += $v2->thecourse_unit;

$total_point += $point['cp'];
if( $total_point == 0)
{
	$gpa = 0;	
}else{
$gpa = number_format($total_point/$total_unit,2);
}

$c_unit += $v2->thecourse_unit;

$c_point += $point['cp'];
if( $c_point == 0)
{
	$cgpa = 0;	
}else{
$cgpa = number_format($c_point/$c_unit,2);
}
?>
				<tr>
					<td style="text-align:center">{{$v2->thecourse_code}}</td>
					<td style="font-size: 8px">{{strtoupper($v2->thecourse_title)}}</td>
					<td style="text-align:center">{{$v2->thecourse_unit}}</td>
					<td style="text-align:center">{{$v2->std_grade}}</td>
					<td style="text-align:center">{{$point['cp']}}</td>
					</tr>
<?php } ?>
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
	
		</div>
		
		
	

		@if($i % 2 == 0 && $i < count($result))
		
		<div class="clear"></div>
		<div class="page-break"></div>
		<table style="margin-top:165px;"></table>
		@endif
		<!-- long vaction code -->
		@if($no == $i  && count($vacation) != null)
		@if($i % 2 == 0)
		<div class="page-break"></div>
		<table style="margin-top:165px;"></table>
		@endif

		@if(isset($vacation))
		@foreach ($vacation as $key_vacation =>$item_vacation)
		<?php $key_plus_vacation =$key_vacation + 1;
		$collection_vacation =$item_vacation->groupBy('std_mark_custom1')->toArray();
		?>
		
		@if($i % 2 == 0)
		<div class="content_left">
			<table style="border-collapse: collapse;">
		@else
		<div id="content_right">
			<table>
		@endif
		<tr><th colspan="5" align="center" style="font-size:1.5em;">
			LONG VACATION &nbsp;&nbsp;&nbsp;&nbsp;
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
	   <th colspan="2" align="center">{{$rbs->level_id.' / '.$fos->duration}}</th></tr>		
	   <tr>
		   <th>COURSE CODE</th>
		   <th>COURSE TITLE</th>
	   <th>CREDIT HOUR</th>
	   <th>GRADE</th>
	   <th>GRADE POINT</th>
	   </tr>
	   @foreach ($collection_vacation as $v_k1=>$v_v1)

<?php  $total_unit=0; $total_point=0; $gpa=0; ?>

<tr>
	<th colspan="5" align="center" style="font-size:1.3em">
		@if($v_k1 == 'First Semester')
		FIRST SEMESTER
	@elseif($v_k1== 'Second Semester')
	SECOND SEMESTER
@endif</th>

</tr>

@foreach ($v_v1 as $v_v2)
<?php $point =$R->mm($v_v2->std_grade,$v_v2->thecourse_unit,$student->std_custome18);


$total_unit += $v_v2->thecourse_unit;

$total_point += $point['cp'];
if( $total_point == 0)
{
	$gpa = 0;	
}else{
$gpa = number_format($total_point/$total_unit,2);
}

$c_unit += $v_v2->thecourse_unit;

$c_point += $point['cp'];
if( $c_point == 0)
{
	$cgpa = 0;	
}else{
$cgpa = number_format($c_point/$c_unit,2);
}
?>
				<tr>
					<td style="text-align:center">{{$v_v2->thecourse_code}}</td>
					<td style="font-size: 8px">{{strtoupper($v_v2->thecourse_title)}}</td>
					<td style="text-align:center">{{$v_v2->thecourse_unit}}</td>
					<td style="text-align:center">{{$v_v2->std_grade}}</td>
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
					@endforeach
					@endif
					@endif

					



 @endforeach
	
	@endif
	
</div>
</main>	

</body>
</html>	