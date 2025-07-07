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

         @foreach($coursecodes as $key => $value)
         <th colspan="4" style="text-align: center">{{$value->coursecode}}</th> 
         @endforeach

         <th rowspan="2" style="width: 10px;">Credit</th>
         <th rowspan="2" style="width: 10px;">Point</th> 
         <th rowspan="2" style="width: 10px;">GPA</th> 
         <th rowspan="2" style="width: 10px;">Remarks</th> 

     </tr> 
   
<!-- subheaders -->
     <tr> 
         <td></td>
         <td></td>
         <td ></td>
         <td></td>

         @foreach($coursecodes as $key => $value)
         <td>CA</td>
         <td>FE</td>
         <td>Total</td>
         <td>GD</td>
         @endforeach



    </tr> 
    <!-- subheaders -->
    <?php  $count= 0; ?>
    <!-- values   -->
    @foreach($students as $key => $value)
    <tr> 
        <td>{{$key+1}}</td>
        <td>{{$value->surname}}, {{$value->firstname}} {{$value->middlename}}</td>
        <td>{{$value->regno}}</td>
        <td>{{$value->sex}}</td>

         @foreach($coursecodes as $key => $values)
         <td>
         {{$reports[$key+$count]->coursework}}
         </td>
         <td>
         {{$reports[$key+$count]->finalexam}}
         </td>
         <td>
         {{$reports[$key+$count]->total}}
         </td>
         <td>
         {{$reports[$key+$count]->grade}}
         </td>
         @endforeach
         
         <td></td>
         <td></td>
         <td></td>
         <td></td>

         <?php $count = $count+$spancount;?>
    </tr> 
    @endforeach

    <!-- values   -->

   </table>

 </body>
</html>