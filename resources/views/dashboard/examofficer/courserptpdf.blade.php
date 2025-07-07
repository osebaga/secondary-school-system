<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.center {
    display: block;
  margin-left: auto;
  margin-right: auto;
}
.table {
    border-left: 0.01em solid #000000;
    border-right: 0;
    border-top: 0.01em solid #000000;
    border-bottom: 0;
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
}
.table td,
.table th {
    border-left: 0;
    border-right: 0.01em solid #000000;
    border-top: 0;
    border-bottom: 0.01em solid #000000;
}

</style>
</head>

 <body>

<div style="text-align: left"><b>SCHOOL OF LIBRARY, ARCHIVES AND DOCUMENTATION STUDIES</b> <br>
        CAMPUS: BAGAMOYO MAIN CAMPUS     <br>
        DEPARTMENT:                      <br>
        PROGRAMME:                       <br>
        SEMESTER EXAMINATION:            <br>

</div>

 <table style=" width:100%"> 
<thead> 
    <tr> 
        <td colspan="2"> <strong>Code</strong> : {{$cozcode}} </td> 
        <td ><strong>Module Name</strong> </td>
        <td colspan="2" > <strong>Credit</strong></td>
    </tr> 
  </thead>
</table>



<table class="table table td table th" style="margin-top:30px; width:100%"> 
    <tr> 
        <th style="font-size: 12px">S/No</th>
        <th style="width: 200px;font-size: 12px">Name</th>
         <th style="width: 200px;font-size: 12px">RegNo</th> 
         <!-- <th style="font-size: 12px">Hw1</th> 
         <th style="font-size: 12px">Hw2</th> 
         <th style="font-size: 12px">Qz1</th> 
         <th style="font-size: 12px">Qz2</th> 
         <th style="font-size: 12px">GAS</th> 
         <th style="font-size: 12px">PRO</th> 
         <th style="font-size: 12px">CT1</th> 
         <th style="font-size: 12px">CT2</th>  -->
         <th style="font-size: 12px">CA</th> 
         <th style="font-size: 12px">SE</th> 
         <th style="font-size: 12px">Total</th> 
         <th style="font-size: 12px">Grade</th> 
         <th style="font-size: 12px">Remarks</th> 
     </tr> 
@foreach($report as $key => $value)
     <tr> 
         <td>{{$key+1}}</td>
         <td style="width: 200px">{{$value->student}}</td>
         <td style="width: 200px">{{$value->regno}}</td>
         <!-- <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td> -->
         <td>{{$value->coursework}}</td>
         <td>{{$value->finalexam}}</td>
         <td>{{$value->total}}</td>
         <td>{{$value->grade}}</td>
         <td>{{$value->remarks}}</td>
    </tr> 
    @endforeach
    

    </table>

 </body>
</html>