<tr>
    <td class="text-justify">2.</td>
    <th class="text-left">STUDY LEVEL</th>
    <td class="text-center">
        @foreach($permission as $value)
            @if(strpos($value->name, 'study_level') !== false)
                @if(strpos($value->name, 'study_level-index') !== false)
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
            @if(strpos($value->name, 'study_level') !== false)
                @if(strpos($value->name, 'study_level-add') !== false)
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
            @if(strpos($value->name, 'study_level') !== false)
                @if(strpos($value->name, 'study_level-edit') !== false)
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
            @if(strpos($value->name, 'study_level') !== false)
                @if(strpos($value->name, 'study_level-delete') !== false)
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
