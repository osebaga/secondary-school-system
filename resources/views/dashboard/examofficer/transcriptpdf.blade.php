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
<?php $pointsum = 0; $creditsum = 0; ?>
 <body style="border-style:double">

 <?php
     function grade($grade){
        if($grade >=70 && $grade <= 100){
            return 'A';
        }
        if($grade >=65 && $grade < 70){
            return 'B+';
        }
        if($grade >=60 && $grade < 65){
            return 'B';
        }
        if($grade >=40 && $grade < 60){
            return 'C';
        }
        if($grade >=30 && $grade < 40){
            return 'D';
        }
        if($grade < 30){
            return 'E';
        }
    } 

?>
 <?php
 

     function points($grade,$credit){
        if($grade >=70 && $grade <= 100){
            return $credit*5;
        }
        if($grade >=65 && $grade < 70){
            return $credit*4;
        }
        if($grade >=60 && $grade < 65){
            return $credit*3;
        }
        if($grade >=40 && $grade < 60){
            return $credit*2;
        }
        if($grade >=30 && $grade < 40){
            return $credit*1;
        }
        if($grade < 30){
            return $credit*0;
        }
        
    } 

?>

 <table style="text-align: center; margin:20px,10px,20px,100px; width:100%"> 
<thead> 
    <tr> 
        <th colspan="2" style="width:30%">
         <img src="{{ base_path()}}/college.png"  style="width:130px; height:120px" ></img></th> 
        <th style="width:40%" >
                    <p >CENTRE FOR FOREIGN RELATIONS <br>
                     P.o. Box 9321 <br> Tel: 022-2780160
                    <br>  Fax: 022-2780161 <br> 
                        Email: ita@tra.go.tz <br>  
                        Dar es Salaam, Tanzania
                    </p>
        </th>
        <th colspan="2" style="width:30%">
        @if($student->photo=="" || $student->photo==null)
                    <img  class="" style="width:130px; height:120px"   src="{{ base_path()}}/public/img/default-avatar.png" 
                    class="img-circle img-responsive"> 
                    @else
                    <img  class="" style="width:130px; height:120px"    src="{{ base_path()}}/public/storage/pictures/{{$student->photo}}" 
                    class="img-circle img-responsive">
        @endif
        </th> 
 

    </tr> 
</thead>
</table>


<table class="table table td table th" style="text-align: center; margin:20px,10px,20px,100px; width:100%"> 
<thead> 
    <tr> 
        <td colspan="2" style="text-align: left"><b>AWARDED TO: </b>{{$student->surname}}, {{$student->firstname}} {{$student->middlename}}</td> 
        <td colspan="1" style="text-align: left"><b>REG NO: </b>{{$student->regno}} </td>
        <td colspan="1" style="text-align: left"><b>SEX: </b>{{$student->sex}}</td>

    </tr> 
    <tr> 
        <td colspan="2" style="text-align: left;font-size:14px"><b>CITIZENSHIP: </b> TANZANIAN </td> 
        <td colspan="2" style="text-align: left;font-size:14px""><b> REMARKS: </b></td> 
    </tr> 
    </thead> 
    <tbody> 
            <tr> 
                <td colspan="2" style="text-align: left;font-size:14px"><b>BIRTHDATE:  </b>{{$student->dbirth}} </td> 
                <td colspan="2" style="text-align: left;font-size:14px"><b>ADDRESS: </b> {{$student->paddress}} </td> 
            </tr> 
            <tr> 
                <td style="text-align: left;font-size:14px"><b>CAMPUS: </b> </td> 
                <td style="text-align: left;font-size:14px"><b>DEPARTMENT: </b> </td> 
                <td colspan="2" style="text-align: left;font-size:14px"><b>PROGRAMME: </b> {{$student->programmeofstudy}}</td> 
            </tr> 
        </tbody> 
</table>


<table class="table table td table th" style="text-align:center; margin-top:30px;margin-left:20px;margin-right:20px; width:100%"> 
    <caption > FIRST YEAR</caption> 

    <tr> 
        <th>Semester</th>
         <th>code</th> 
         <th>Course Tittle</th> 
         <th>Unit</th> 
         <th>Grade</th> 
         <th>Point</th> 
         <th>GPA</th> 
     </tr> 

     @foreach($code1yea1 as $key => $c1y1)
     <tr> 
         <td>{{$c1y1->semester}}</td>
         <td> {{$c1y1->coursecode}}</td>
         <td style="text-align: left;width: 250px">{{$c1y1->modulename}}</td>
         <td>{{$c1y1->credits}}
             <?php  $creditsum = $creditsum + $c1y1->credits ?>
         </td>

         <td><?php echo(grade($y1ca1[$key]->examscore+$y1se1[$key]->examscore)); ?></td>
         <td>
             <?php echo(points($y1ca1[$key]->examscore+$y1se1[$key]->examscore,$c1y1->credits));
              $pointsum = $pointsum+points($y1ca1[$key]->examscore+$y1se1[$key]->examscore,$c1y1->credits) ?>
            </td>
         <td></td>

    </tr> 
    @endforeach
    @foreach($code2yea1 as $key => $c2y1)
     <tr> 
     <td>{{$c2y1->semester}}</td>
         <td> {{$c2y1->coursecode}}</td>
         <td style="text-align: left;width: 250px">{{$c2y1->modulename}}</td>
         <td>{{$c2y1->credits}}
         <?php  $creditsum = $creditsum + $c2y1->credits ?>
         </td>

         <td><?php echo(grade($y1ca2[$key]->examscore+$y1se2[$key]->examscore)); ?>
          </td>
         <td><?php echo(points($y1ca2[$key]->examscore+$y1se2[$key]->examscore,$c2y1->credits));
          $pointsum = $pointsum+points($y1ca2[$key]->examscore+$y1se2[$key]->examscore,$c2y1->credits); ?></td>
         <td></td>

    </tr> 
    @endforeach
    <!-- GPA value here -->
    <tr>
    <td colspan="6" ></td>
    <td><?php echo(substr($pointsum/$creditsum, 0, 3)); ?></td>
    </tr>

    
</table>



<!-- <table style="text-align: center;margin-top:30px;margin-left:20px;margin-right:20px; width:100%"> 
    <p style="text-align: center; ">4. Key to Classification of Awards: SEE THE TABLE BELOW</p> 

    <tr> 
        <th colspan="2">Degree</th>
         <th colspan="2">Diploma</th> 
         <th colspan="2">Certificate</th> 
     </tr> 

     <tr> 
         <td>Overall G.P.A.</td>
         <td>Class</td>
         <td>Overall G.P.A.</td>
         <td>Class</td>
         <td>Overall G.P.A.</td>
         <td>Class</td>
    </tr> 
    <tr> 
    <td>4.4-5.0</td>
         <td>FIRST</td>
         <td>4.4-5.0</td>
         <td>FIRST</td>
         <td>3.5-5.0</td>
         <td>FIRST</td>
    </tr> 
    <tr> 
    <td>3.5-4.3</td>
         <td>UPPER-SECOND</td>
         <td>3.5-4.3</td>
         <td>UPPER-SECOND</td>
         <td>3.0-3.4</td>
         <td>UPPER-SECOND</td>
    </tr> 
    <td>2.7-3.4</td>
         <td>LOWER-SECOND</td>
         <td>2.7-3.4</td>
         <td>LOWER-SECOND</td>
         <td>2.0-2.9</td>
         <td>LOWER-SECOND</td>
    </tr> 
</table> -->

</div>

 </body>
</html>