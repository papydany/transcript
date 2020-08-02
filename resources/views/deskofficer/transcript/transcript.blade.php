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
	/*padding: 1px 0px;*/
	
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
	/*padding: 1px 0px;*/
	
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
	 .ff >td {padding:2px 0px;
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
			<th ><span style="background-color:blue; padding:45px; color:white;font-weight:bolder;">STUDENT'S ACADEMIC TRANSCRIPT</span></th>
		</tr>
		
		</thead>
	</table>
	</div>

	
	
	<div class="header_left3">
		<table >
			<thead>
			 <tr>
				
	@if($student->id ==388)
		<img src="img/69.jpg" width="50px;" style="float:right;" >
		@endif
		@if($student->id ==35180)
		<img src="img/35180.jpg" width="50px;" style="float:right;">
		@endif
		@if($student->id ==5870)
		<img src="img/5870.jpg" width="50px;" style="float:right;">
		@endif
			@if($student->id ==4195)
		<img src="img/4195.jpg" width="50px;" style="float:right;">
		@endif
		@if($student->id ==4681)
		<img src="img/4681.jpg" width="50px;" style="float:right;">
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
					<td><b>NAME : </b> {{$student->surname .' '.$student->firstname. ' '.$student->othername}}</td>
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
								<td><b>MODE  OF ENTRY  : </b> <span style="font-size: 0.8em;">{{strtoupper($student->mode_of_entry)}}</span></td>
							</tr>
							
							
							<tr>
								<td><b>SEX : </b>{{strtoupper($student->gender)}}</td></tr>
								
									
							<tr><td>		<b>MARITAL STATUS : </b>{{strtoupper($student->marital_status)}}</td>
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
								<td><b>LOCAL GOVT , AREA : </b>{{isset($student->Lga->lga_name) ?
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
								<td><b>DEGREE AWARDED : </b>{{$p->degree}}</td>
								<td><b>FINAL CUMMULATIVE GRADE POINT AVERAGE (CGPA) : </b>{{$c_gpa}}</td>
								@if(student->category_id == 1)
                               <td><b>CLASS OF DIPLOMA : </b>{{$c_degree}}</td>
								@else
                               <td><b>CLASS OF DEGREE : </b>{{$c_degree}}</td>
								@endif
									
								</tr>
							</table>
							<div style="  ">
		
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

							@if($student->entry_year <= '1988')
							<tr>
								<td>4</td>
								<td>A</td>
								<td>3.75</td>
								<td>A-</td>
							</tr>
							
							<tr>
								<td>3.5</td>
								<td>B+</td>
								<td>3</td>
								<td>B</td>
							</tr>
							
							<tr>
								<td>2.75</td>
								<td>B-</td>
								<td>2.50</td>
							   <td>C+</td>
							</tr>
							<tr>
								<td>2.00</td>
								<td>C</td>
								<td>1.75</td>
							   <td>C-</td>
					           
							</tr>

							<tr>
								<td>1.50</td>
								<td>D</td>
								<td>1.25</td>
							   <td>E</td>
					           
							</tr>
							<tr>
								<td>0</td>
								<td>F</td>
							</tr>
							@elseif($student->entry_year >= '1989' && $student->entry_year <= '1990')

						<tr>
								<td>70 - 100</td>
								<td>5</td>
								<td>A</td>
							</tr>
							<tr>
								<td>60- 69</td>
								<td>4</td>
								<td>B+</td>
							</tr>
							<tr>
								<td>50 - 59</td>
								<td>3.5</td>
								<td>B</td>
							</tr>
							<tr>
								<td>45 - 49</td>
								<td>3</td>
								<td>C</td>
							</tr>
							<tr>
								<td>40 - 44</td>
								<td>2.5</td>
								<td>D</td>
							</tr>
							<tr>
								<td>0 - 39</td>
								<td>0</td>
								<td>F</td>
							</tr>
							@else
							
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
							@endif
						</table>
						
						</div>
						@if($student->category_id == 1)
<div class="f1">
							<table style="border:1px solid blue;">
								<tr>
									<td colspan="3" align="center">CLASSIFICATION OF DIPLOMA</td>
								</tr>
								

									<tr>
									<td>1</td>
									<td>4.50 ABOVE</td>
									<td>DISTINCTION</td>
								</tr>
								<tr>
									<td>2</td>
									<td>3.50 - 4.49</td>
									<td>CREDIT</td>
								</tr>
								<tr>
									<td>3</td>
									<td> 2.40 - 3.49</td>
									<td>MERIT</td>
								</tr>
								<tr>
									<td>4</td>
									<td>2.39 - 1.00</td>
									<td>PASS</td>
								</tr>
								<tr>
									<td>5</td>
									<td>0.00 - 0.99</td>
									<td>FAIL</td>
								</tr>
								
							


							
							
							</table>
							</div>




@else


						<div class="f1">
							<table style="border:1px solid blue;">
								<tr>
									<td colspan="3" align="center">CLASSIFICATION OF DEGREE</td>
								</tr>
								@if($student->entry_year <= '1988')

									<tr>
									<td>1</td>
									<td>3.50 ABOVE</td>
									<td>First Class</td>
								</tr>
								<tr>
									<td>2</td>
									<td>3.00 - 3.49</td>
									<td>Second Class Upper</td>
								</tr>
								<tr>
									<td>3</td>
									<td> 2.50 - 2.99</td>
									<td>Second Class Lower</td>
								</tr>
								<tr>
									<td>4</td>
									<td>2.00 - 2.49</td>
									<td>Third Class</td>
								</tr>
								<tr>
									<td>5</td>
									<td>1.75 - 1.99</td>
									<td>Pass</td>
								</tr>
								<tr>
									<td>6</td>
									<td>1.74 - 0.00</td>
									<td>Fail</td>
								</tr>
								@elseif($student->entry_year >= '1989' && $student->entry_year <= '1990')
<tr>
									<td>1</td>
									<td>4.50 - 5.00</td>
									<td>First Class</td>
								</tr>
								<tr>
									<td>2</td>
									<td>4.00-4.49</td>
									<td>Second Class Upper</td>
								</tr>
								<tr>
									<td>3</td>
									<td>3.25-3.99</td>
									<td>Second Class Lower</td>
								</tr>
								<tr>
									<td>4</td>
									<td>2.77-3.24</td>
									<td>Third Class</td>
								</tr>
								<tr>
									<td>5</td>
									<td>2.50-2.74</td>
									<td>Pass</td>
								</tr>
								<tr>
									<td>6</td>
									<td>0.00-2.49</td>
									<td>Fail</td>
								</tr>





								@else
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
								@endif
							
							</table>
							</div>
							@endif
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
								
									<tr><td><br/>Signature & Date  </td>
										<td><br/><span style="color:#000; padding:20px 0 0 3px; font-size:10px;">
											.............................................................</span>
									</td>
									</tr>
									<tr><td>Approved by :</td><td>{{$issuing->name}}</td></tr>
									<tr><td> </td><td>Head Transcript Unit</td></tr>
									<tr><td></td><td>For REGISTRAR</td></tr>
								</table>
								
									
									
									
								
								
								</div>
								<div class="clear"></div>
						</div>

				</footer>			

	
<main >
		<div class="row"  >
	
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
		<?php $rbs =$R->registerBeginningStudent($student->id,$key);	 ?>		
		<tr style="font-size:1.3em"><th colspan="3" align="center" >
			
			
		ACADEMIC SESSION {{$key . ' / '.$key_plus}}</th>
			<th colspan="2" align="center">{{$rbs->level_id. ' / '.$p->level}}</th></tr>	
			
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
		@if($k1 == 1)
		FIRST SEMESTER
	@elseif($k1== 2)
	SECOND SEMESTER
@endif</th>

</tr>

@foreach ($v1 as $v2)
<?php $point =$R->mm($v2->grade,$v2->unit,$student->entry_year);
if($v2->period =='NORMAL')
{
$total_unit += $v2->unit;

$total_point += $point['cp'];
if( $total_point == 0)
{
	$gpa = 0;	
}else{
$gpa = number_format($total_point/$total_unit,2);
}

$c_unit += $v2->unit;

$c_point += $point['cp'];
if( $c_point == 0)
{
	$cgpa = 0;	
}else{
$cgpa = number_format($c_point/$c_unit,2);
}
?>
				<tr>
					<td style="text-align:center">{{$v2->code}}</td>
					<td style="font-size: 8px">{{strtoupper($v2->title)}}</td>
					<td style="text-align:center">{{$v2->unit}}</td>
					<td style="text-align:center">{{$v2->grade}}</td>
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
		
	

		@if($i % 2 == 0 && $i < count($result) )
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
		$collection_vacation =$item_vacation->groupBy('semester_id')->toArray();
		?>
		
		@if($i % 2 == 0)
		<div class="content_left">
			<table style="border-collapse: collapse;">
		@else
		<div id="content_right">
			<table>
		@endif
		<tr><th colspan="5" align="center" style="font-size:1.5em;">
			LONG VACATION  &nbsp;&nbsp;&nbsp;&nbsp;
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
	   <th colspan="2" align="center">{{$rbs->level_id. ' / '.$p->level}}</th></tr>		
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
<?php $point =$R->mm($v_v2->grade,$v_v2->unit,$student->entry_year);


$total_unit += $v_v2->unit;

$total_point += $point['cp'];
if( $total_point == 0)
{
	$gpa = 0;	
}else{
$gpa = number_format($total_point/$total_unit,2);
}

$c_unit += $v_v2->unit;

$c_point += $point['cp'];
if( $c_point == 0)
{
	$cgpa = 0;	
}else{
$cgpa = number_format($c_point/$c_unit,2);
}
?>
				<tr>
					<td style="text-align:center">{{$v_v2->code}}</td>
					<td style="font-size: 8px">{{strtoupper($v_v2->title)}}</td>
					<td style="text-align:center">{{$v_v2->unit}}</td>
					<td style="text-align:center">{{$v_v2->grade}}</td>
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