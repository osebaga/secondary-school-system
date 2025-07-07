<tr>
    <td class="text-justify">2.</td>
    <th class="text-left">ACADEMIC YEAR</th>
    <td class="text-center">
        @foreach($permission as $value)
        @if(strpos($value->name, 'academic_year') !== false)
        @if(strpos($value->name, 'academic_year-index') !== false)
        <div class="icheck-primary">
            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
            {{Form::label($value->id,' ')}}
        </div>

        @endif
        @endif
        @endforeach
    </td>
    <td class="text-center">
        @foreach($permission as $value)
        @if(strpos($value->name, 'academic_year') !== false)
        @if(strpos($value->name, 'academic_year-add') !== false)
        <div class="icheck-primary">
            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
            {{Form::label($value->id,' ')}}
        </div>
        @endif
        @endif
        @endforeach
    </td>
    <td class="text-center">
        @foreach($permission as $value)
        @if(strpos($value->name, 'academic_year') !== false)
        @if(strpos($value->name, 'academic_year-edit') !== false)
        <div class="icheck-primary">
            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
            {{Form::label($value->id,' ')}}
        </div>
        @endif
        @endif
        @endforeach
    </td>
    <td class="text-center">
        @foreach($permission as $value)
        @if(strpos($value->name, 'academic_year') !== false)
        @if(strpos($value->name, 'academic_year-delete') !== false)
        <div class="icheck-primary">
            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
            {{Form::label($value->id,' ')}}
        </div>
        @endif
        @endif
        @endforeach
    </td>
    <td></td>



</tr>
