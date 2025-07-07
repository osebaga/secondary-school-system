 <html>

 <head></head>

 <body>

     <table style="width:100%">
         <tr>
             <th rowspan="2">#</th>
             <th rowspan="2" class="">Name</th>
             <th rowspan="2">Sex</th>
             <th rowspan="2">RegNo</th>
             @foreach ($coz ?? '' as $cr)
                 <th colspan="4">{{ $cr->course_code }}({{ $cr->unit }})</< /th>
             @endforeach
             <th rowspan=""></th>
             <th rowspan=""></th>
             <th rowspan=""></th>
         <tr>

             <?php  
                        $count = $coz->count();
                        
                        for($i=1; $i<=$count; $i++) { 
                        ?>

             <th>CA</th>
             <th>ESE</th>
             <th>Total</th>
             <th>GD</th>
             <?php } ?>
             <th rowspan="">GPA</th>
             <th rowspan="">AWARD</th>
             <th rowspan="">REMARK</th>
         </tr>
         <?php $i = 1; ?>
         @foreach ($student as $m)
             <tr>
                 <td><?php echo $i++; ?></td>
                 <td class="">{{ $m->first_name }} {{ $m->last_name }}</td>
                 <td>{{ $m->gender }}</td>
                 <td>{{ $m->reg_no }}</td>
                 @foreach ($coz as $c)
                     @foreach ($semesterresult as $se)
                         @if ($se->reg_no == $m->reg_no && $se->course_id == $c->id)
                             <td>{{ $se->ca_score ?? '-' }}</td>
                             <td>{{ $se->se_score ?? '-' }}</td>
                             <td>{{ $se->total_score ?? '-' }}</td>
                             @if ($se->grade == 'D' || $se->grade == 'F')
                                 <td bgcolor="gray">
                                     <span>{{ $se->grade }}
                             </td> @else<td> {{ $se->grade }}</td>
                             @endif
                         @endif
                     @endforeach
                 @endforeach

                 @foreach ($semesterresult as $se)
                     @if ($se->reg_no == $m->reg_no)
                         <td>{{ $se->gpa ?? '-' }}</td>
                         <td>{{ $se->remarks ?? '-' }}</td>
                         <td>
                             @if ($se->gpa < 2)
                                 SUPP
                             @else
                                 {{ $se->classification ?? '-' }}
                             @endif
                         </td>
                     @break
                 @endif
             @endforeach

         </tr>
     @endforeach

 </table>




</body>

</html>
