<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="widtd=device-widtd, initial-scale=1">

</head>

 <body >
 <?php $pointsum = 0; $creditsum = 0; ?>
    <table> 
    <tr> 
        <td style="text-align: center;border-block: none"><h1> {{$header}}</h1></td>
    </tr>  
    <tr> 
        <td style="text-align: center;border-block: none"><h3>CAMPUS: BAGAMOYO MAIN CAMPUS</h3> </td>
    </tr>  
    <tr> 
        <td style="text-align: center;border: none">
            <h4>{{$head3}}</h4>
        </td>
    </tr>  
    <tr> 
        <td style="text-align: center;border: none">
            <h4>{{$head4}}</h4>
        </td>
    </tr>  
    <tr> 
        <td style="text-align: center;border: none"></td>
    </tr>  

    
 
    <tr> 
        <th rowspan="2" >#</th>
         <th rowspan="2" >Name</th> 
         <th rowspan="2">Reg No</th> 
         <th rowspan="2" style="width: 10px;">sex</th> 

         <th  colspan="{{$sem1span}}" style="text-align: center">semister I</th> 
         <th  colspan="{{$sem2span}}" style="text-align: center">semister II</th> 

         
         <th rowspan="2" style="width: 10px;">Point</th> 
         <th rowspan="2" style="width: 10px;">GPA</th> 
         <th rowspan="2" style="width: 10px;">Remarks</th> 

     </tr> 
   
<!-- subheaders -->

     <tr> 
         <th colspan="4"></th>
         @foreach($sem1coz as $coz)
         <th  style="text-align: center">{{$coz->coursecode}}</th> 
        
        @endforeach

        @foreach($sem2coz as $coz)
         <th  style="text-align: center">{{$coz->coursecode}}</th> 
       
        @endforeach 

    </tr> 
    <!-- subheaders -->
    <?php  $count= 0;$count2= 0; ?>
    <!-- values   -->
    @foreach($students as $key => $value)
        <tr> 
                <td>{{$key+1}}</td>
                <td>{{$value->surname}}, {{$value->firstname}} {{$value->middlename}}</td>
                <td>{{$value->regno}}</td>
                <td>{{$value->sex}}</td>
                
                
                @foreach($sem1coz as $key => $coz)
                <?php $creditsum = $creditsum + $coz->credits; ?>
                <td>
                @if($studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore>=70)  
                <?php $pointsum = $pointsum + $coz->credits*5; ?>    
                A
                @elseif($studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore>=65
                &&$studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore < 70)
                <?php $pointsum = $pointsum + $coz->credits*4; ?>  
                B+
                @elseif($studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore>=60
                &&$studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore < 65)
                <?php $pointsum = $pointsum + $coz->credits*3; ?>  
                B
                @elseif($studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore>=40
                &&$studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore < 60)
                <?php $pointsum = $pointsum + $coz->credits*2; ?>  
                C
                @elseif($studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore>=30
                &&$studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore < 40)
                <?php $pointsum = $pointsum + $coz->credits*1; ?>  
                D
                @elseif($studentCA[$key+$count]->examscore+$studentSE[$key+$count]->examscore < 30)
                <?php $pointsum = $pointsum + $coz->credits*0; ?>  
                E
                @endif
                </td>
                @endforeach

                @foreach($sem2coz as $key => $coz)
                <?php $creditsum = $creditsum + $coz->credits; ?>
                <td>

                @if($studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore>=70) 
                <?php $pointsum = $pointsum + $coz->credits*5; ?>     
                A
                @elseif($studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore>=65
                &&$studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore < 70)
                <?php $pointsum = $pointsum + $coz->credits*4; ?>  
                B+
                @elseif($studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore>=60
                &&$studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore < 65)
                <?php $pointsum = $pointsum + $coz->credits*3; ?>  
                B
                @elseif($studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore>=40
                &&$studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore < 60)
                <?php $pointsum = $pointsum + $coz->credits*2; ?>  
                C
                @elseif($studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore>=30
                &&$studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore < 40)
                <?php $pointsum = $pointsum + $coz->credits*1; ?>  
                D
                @elseif($studentCA2[$key+$count2]->examscore+$studentSE2[$key+$count2]->examscore < 30)
                <?php $pointsum = $pointsum + $coz->credits*0; ?>  
                E
                @endif
                </td>
                @endforeach

                <?php $count = $count+$sem1span; $count2 = $count2+$sem2span;?>
             
               <td>{{$pointsum}}</td>
               <td><?php echo(substr($pointsum/$creditsum, 0, 3)); ?></td>
               <td>
                   <?php if(substr($pointsum/$creditsum, 0, 3)>2.0){
                    echo('PASS');
                        } else{
                            echo('FAIL');
                        }
                    ?></td>
        </tr> 
    @endforeach

    <!-- values   -->

   </table>

 </body>
</html>