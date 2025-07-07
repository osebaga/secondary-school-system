<div class="row">
    <div class="col-lg-12 margin-tb">

        <p class="introtext">@lang('app.set_permissions')</p>
        <div class="table-responsive">
            <table id="roleTable" class="table table-bordered table-hover table-striped">
                <thead>
                {{-- <tr>
                   <th colspan="7" class="text-center"><i class="fa fa-registered"></i> <strong>{{$role->name?? ''}} @lang('app.permissions')</strong></th>
                </tr> --}}
                <tr>
                    <th rowspan="2" class="text-center">S/N</th>
                    <th rowspan="2"  class="text-left">@lang('app.module_name')</th>
                    <th colspan="7" class="text-center">@lang('app.permissions')</th>
                </tr>



                <tr>

                    <th class="text-center">@lang('app.view')</th>
                    <th class="text-center">@lang('app.add')</th>
                    <th class="text-center">@lang('app.edit')</th>
                    <th class="text-center">@lang('app.delete')</th>
                    <th class="text-center">@lang('app.misc')</th>
                </tr>
                </thead>
                <tbody>
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
                <tr>
                    <td class="text-justify">1.</td>
                    <th class="text-left">USER</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'user') !== false)
                                @if(strpos($value->name, 'user-index') !== false)
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
                            @if(strpos($value->name, 'user') !== false)
                                @if(strpos($value->name, 'user-add') !== false)
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
                            @if(strpos($value->name, 'user') !== false)
                                @if(strpos($value->name, 'user-edit') !== false)
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
                            @if(strpos($value->name, 'user') !== false)
                                @if(strpos($value->name, 'user-delete') !== false)
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
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">STAFF</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'staff') !== false)
                                @if(strpos($value->name, 'staff-index') !== false)
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
                            @if(strpos($value->name, 'staff') !== false)
                                @if(strpos($value->name, 'staff-add') !== false)
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
                            @if(strpos($value->name, 'staff') !== false)
                                @if(strpos($value->name, 'staff-edit') !== false)
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
                            @if(strpos($value->name, 'staff') !== false)
                                @if(strpos($value->name, 'staff-delete') !== false)
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
                <tr>
                    <td class="text-justify">3.</td>
                    <th class="text-left">ADMISSION</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'admission') !== false)
                                @if(strpos($value->name, 'admission-index') !== false)
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
                            @if(strpos($value->name, 'admission') !== false)
                                @if(strpos($value->name, 'admission-add') !== false)
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
                            @if(strpos($value->name, 'admission') !== false)
                                @if(strpos($value->name, 'admission-edit') !== false)
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
                            @if(strpos($value->name, 'admission') !== false)
                                @if(strpos($value->name, 'admission-delete') !== false)
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

                <tr>
                    <td class="text-justify">3.</td>
                    <th class="text-left">STUDENT</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'student') !== false)
                                @if(strpos($value->name, 'student-index') !== false)
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
                            @if(strpos($value->name, 'student') !== false)
                                @if(strpos($value->name, 'student-add') !== false)
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
                            @if(strpos($value->name, 'student') !== false)
                                @if(strpos($value->name, 'student-edit') !== false)
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
                            @if(strpos($value->name, 'student') !== false)
                                @if(strpos($value->name, 'student-delete') !== false)
                                    <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                        {{Form::label($value->id,' ')}}
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </td>

                    <td>
                        <table class="table-borderless">
                          
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        @foreach($permission as $value)
    
                                            @if(strpos($value->name, 'student') !== false)
                                                @if(strpos($value->name, 'student-search') !== false)
                                                    <div class="icheck-primary">
                                                        {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                        {{Form::label($value->id,' SEARCH STUDENT ')}}
                                                    </div>
    
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-left">
                                        @foreach($permission as $value)
                                            @if(strpos($value->name, 'student') !== false)
                                                @if(strpos($value->name, 'student-import') !== false)
                                                    <div class="icheck-primary">
                                                        {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                        {{Form::label($value->id,' IMPORT STUDENT ')}}
                                                    </div>
    
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>

                                </tr>
                            <tr>
                  
                       

                                <td class="text-left">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'student') !== false)
                                            @if(strpos($value->name, 'student-courses') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,' STUDENTS COURSES ')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-left">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'student') !== false)
                                            @if(strpos($value->name, 'student-results') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,' STUDENTS RESULTS ')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                              
                                <td class="text-left">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'student') !== false)
                                            @if(strpos($value->name, 'student-show_deleted') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,' SHOW DELETED STUDENTS ')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-left">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'student') !== false)
                                            @if(strpos($value->name, 'student-personal_info') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,'STUDENTS PERSONAL INFORMATION')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>  
                            </tr>
                            <tr>

                                <td class="text-left">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'student') !== false)
                                            @if(strpos($value->name, 'student-bank_info') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,'STUDENTS BANK INFORMATION')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-left">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'student') !== false)
                                            @if(strpos($value->name, 'student-background_info') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,'STUDENTS BACKGROUND INFORMATION')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>

                        </table>



                    </td>


                </tr>

                <tr>
                    <td class="text-justify">3.</td>
                    <th class="text-left">CLASS</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'class') !== false)
                                @if(strpos($value->name, 'class-index') !== false)
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
                            @if(strpos($value->name, 'class') !== false)
                                @if(strpos($value->name, 'class-add') !== false)
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
                            @if(strpos($value->name, 'class') !== false)
                                @if(strpos($value->name, 'class-edit') !== false)
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
                            @if(strpos($value->name, 'class') !== false)
                                @if(strpos($value->name, 'class-delete') !== false)
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




                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">ROLE</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'role') !== false)
                                @if(strpos($value->name, 'role-index') !== false)
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
                            @if(strpos($value->name, 'role') !== false)
                                @if(strpos($value->name, 'role-add') !== false)
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
                            @if(strpos($value->name, 'role') !== false)
                                @if(strpos($value->name, 'role-edit') !== false)
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
                            @if(strpos($value->name, 'role') !== false)
                                @if(strpos($value->name, 'role-delete') !== false)
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



                <tr>
                    <td class="text-justify">3.</td>
                    <th class="text-left">DATABASE </th>

                    <td colspan="4"></td>
                    <td>
                        <table class="table-bordered">
  
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                            @foreach($permission as $value)
                                                @if(strpos($value->name, 'import_data') !== false)
                                                    @if(strpos($value->name, 'import_data-index') !== false)
                                                        <div class="icheck-primary">
                                                            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                            {{Form::label($value->id,'IMPORT DATA')}}
                                                        </div>

                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-left">
                                            @foreach($permission as $value)
                                                @if(strpos($value->name, 'clean_db') !== false)
                                                    @if(strpos($value->name, 'clean_db-index') !== false)
                                                        <div class="icheck-primary">
                                                            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                            {{Form::label($value->id,'CLEAN DB')}}
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                        
                                        <td class="text-left">
                                            @foreach($permission as $value)
                                                @if(strpos($value->name, 'unknown_students') !== false)
                                                    @if(strpos($value->name, 'unknown_students-index') !== false)
                                                        <div class="icheck-primary">
                                                            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                            {{Form::label($value->id,'UNKNOWN STUDENT')}}
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">
                                            @foreach($permission as $value)
                                                @if(strpos($value->name, 'index_students') !== false)
                                                    @if(strpos($value->name, 'index_students-index') !== false)
                                                        <div class="icheck-primary">
                                                            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                            {{Form::label($value->id,'INDEX STUDENT')}}
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-left">
                                            @foreach($permission as $value)
                                                @if(strpos($value->name, 'query_db') !== false)
                                                    @if(strpos($value->name, 'query_db-index') !== false)
                                                        <div class="icheck-primary">
                                                            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                            {{Form::label($value->id,'QUERY DB')}}
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-left">
                                            @foreach($permission as $value)
                                                @if(strpos($value->name, 'check_conn') !== false)
                                                    @if(strpos($value->name, 'check_conn-index') !== false)
                                                        <div class="icheck-primary">
                                                            {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                            {{Form::label($value->id,'CHECK CONN')}}
                                                        </div>
                                                    @endif
                                                @endif
                                             @endforeach
                                        </td>
                                </tr>
                            </tbody>

                        </table>


                    </td>



                </tr>

                <tr>
                    <td class="text-justify">4.</td>
                    <th class="text-left">MESSAGE COMMUNICATION</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'message') !== false)
                                @if(strpos($value->name, 'message-index') !== false)
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
                            @if(strpos($value->name, 'message') !== false)
                                @if(strpos($value->name, 'message-add') !== false)
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
                            @if(strpos($value->name, 'message') !== false)
                                @if(strpos($value->name, 'message-edit') !== false)
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
                            @if(strpos($value->name, 'message') !== false)
                                @if(strpos($value->name, 'message-delete') !== false)
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
                <tr>
                    <td class="text-justify">5.</td>
                    <th class="text-left">NEWS AND EVENTS COMMUNICATION</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'news_event') !== false)
                                @if(strpos($value->name, 'news_event-index') !== false)
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
                            @if(strpos($value->name, 'news_event') !== false)
                                @if(strpos($value->name, 'news_event-add') !== false)
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
                            @if(strpos($value->name, 'news_event') !== false)
                                @if(strpos($value->name, 'news_event-edit') !== false)
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
                            @if(strpos($value->name, 'news_event') !== false)
                                @if(strpos($value->name, 'news_event-delete') !== false)
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

                <tr>
                    <td class="text-justify">6.</td>
                    <th class="text-left">SECURITY POLICY</th>

                    <td colspan="4"></td>
                    <td>
                        <table class="table-bordered">
                            
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'password') !== false)
                                            @if(strpos($value->name, 'password-change') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,'CHANGE PASSWORD')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @foreach($permission as $value)
                                        @if(strpos($value->name, 'login_history') !== false)
                                            @if(strpos($value->name, 'login_history-index') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,'LOGIN HISTORY')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>


                            </tr>
                            </tbody>

                        </table>


                    </td>



                </tr>
                <tr>
                    <td class="text-justify">1.</td>
                    <th class="text-left">SYSTEM LOGS</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'log') !== false)
                                @if(strpos($value->name, 'log-index') !== false)
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
                            @if(strpos($value->name, 'log') !== false)
                                @if(strpos($value->name, 'log-add') !== false)
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
                            @if(strpos($value->name, 'log') !== false)
                                @if(strpos($value->name, 'log-edit') !== false)
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
                            @if(strpos($value->name, 'log') !== false)
                                @if(strpos($value->name, 'log-delete') !== false)
                                    <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                        {{Form::label($value->id,' ')}}
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </td>
                    <td>

                        <table class="table-bordered">
                            {{-- <thead>
                            <th class="text-center"></th>
                            </thead> --}}
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    @foreach($permission as $value)

                                        @if(strpos($value->name, 'log') !== false)
                                            @if(strpos($value->name, 'log-restore') !== false)
                                                <div class="icheck-primary">
                                                    {{ Form::checkbox('permission[]', $value->id,  $role_permission->contains($value->id) ? true : false, ['class' => 'form-control','id'=>$value->id]) }}
                                                    {{Form::label($value->id,' LOGS RESTORE ')}}
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </td>

                            </tr>
                            </tbody>

                        </table>


                    </td>



                </tr>
                <tr>
                    <td class="text-justify">1.</td>
                    <th class="text-left">HOSTELS</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'hostel') !== false)
                                @if(strpos($value->name, 'hostel-index') !== false)
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
                            @if(strpos($value->name, 'hostel') !== false)
                                @if(strpos($value->name, 'hostel-add') !== false)
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
                            @if(strpos($value->name, 'hostel') !== false)
                                @if(strpos($value->name, 'hostel-edit') !== false)
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
                            @if(strpos($value->name, 'hostel') !== false)
                                @if(strpos($value->name, 'hostel-delete') !== false)
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
{{--                institution module--}}
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">INSTITUTION</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'institution') !== false)
                                @if(strpos($value->name, 'institution-index') !== false)
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
                            @if(strpos($value->name, 'institution') !== false)
                                @if(strpos($value->name, 'institution-add') !== false)
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
                            @if(strpos($value->name, 'institution') !== false)
                                @if(strpos($value->name, 'institution-edit') !== false)
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
                            @if(strpos($value->name, 'institution') !== false)
                                @if(strpos($value->name, 'institution-delete') !== false)
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
{{--                campus module--}}
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">CAMPUSES</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'campus') !== false)
                                @if(strpos($value->name, 'campus-index') !== false)
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
                            @if(strpos($value->name, 'campus') !== false)
                                @if(strpos($value->name, 'campus-add') !== false)
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
                            @if(strpos($value->name, 'campus') !== false)
                                @if(strpos($value->name, 'campus-edit') !== false)
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
                            @if(strpos($value->name, 'campus') !== false)
                                @if(strpos($value->name, 'campus-delete') !== false)
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
{{--                 faculty module--}}
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">FACULTY</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'faculty') !== false)
                                @if(strpos($value->name, 'faculty-index') !== false)
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
                            @if(strpos($value->name, 'faculty') !== false)
                                @if(strpos($value->name, 'faculty-add') !== false)
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
                            @if(strpos($value->name, 'faculty') !== false)
                                @if(strpos($value->name, 'faculty-edit') !== false)
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
                            @if(strpos($value->name, 'faculty') !== false)
                                @if(strpos($value->name, 'faculty-delete') !== false)
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
{{--                departments module--}}

                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">DEPARTMENT</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'department') !== false)
                                @if(strpos($value->name, 'department-index') !== false)
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
                            @if(strpos($value->name, 'department') !== false)
                                @if(strpos($value->name, 'department-add') !== false)
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
                            @if(strpos($value->name, 'department') !== false)
                                @if(strpos($value->name, 'department-edit') !== false)
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
                            @if(strpos($value->name, 'department') !== false)
                                @if(strpos($value->name, 'department-delete') !== false)
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
{{--   SPONSOR MODULE--}}
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">SPONSOR</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'sponsor') !== false)
                                @if(strpos($value->name, 'sponsor-index') !== false)
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
                            @if(strpos($value->name, 'sponsor') !== false)
                                @if(strpos($value->name, 'sponsor-add') !== false)
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
                            @if(strpos($value->name, 'sponsor') !== false)
                                @if(strpos($value->name, 'sponsor-edit') !== false)
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
                            @if(strpos($value->name, 'sponsor') !== false)
                                @if(strpos($value->name, 'sponsor-delete') !== false)
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

{{-- STUDY LEVEL --}}
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
{{--                  COURESE/MODULES--}}
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">COURSE/MODULES</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'course') !== false)
                                @if(strpos($value->name, 'course-index') !== false)
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
                            @if(strpos($value->name, 'course') !== false)
                                @if(strpos($value->name, 'course-add') !== false)
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
                            @if(strpos($value->name, 'course') !== false)
                                @if(strpos($value->name, 'course-edit') !== false)
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
                            @if(strpos($value->name, 'course') !== false)
                                @if(strpos($value->name, 'course-delete') !== false)
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
{{-- PROGRAMS MODULE--}}
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">PROGRAMMES</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'program') !== false)
                                @if(strpos($value->name, 'program-index') !== false)
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
                            @if(strpos($value->name, 'program') !== false)
                                @if(strpos($value->name, 'program-add') !== false)
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
                            @if(strpos($value->name, 'program') !== false)
                                @if(strpos($value->name, 'program-edit') !== false)
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
                            @if(strpos($value->name, 'program') !== false)
                                @if(strpos($value->name, 'program-delete') !== false)
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
{{--                GRADING MODULE--}}
                <tr>
                    <td class="text-justify">2.</td>
                    <th class="text-left">GRADING</th>
                    <td class="text-center">
                        @foreach($permission as $value)
                            @if(strpos($value->name, 'grade') !== false)
                                @if(strpos($value->name, 'grade-index') !== false)
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
                            @if(strpos($value->name, 'grade') !== false)
                                @if(strpos($value->name, 'grade-add') !== false)
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
                            @if(strpos($value->name, 'grade') !== false)
                                @if(strpos($value->name, 'grade-edit') !== false)
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
                            @if(strpos($value->name, 'grade') !== false)
                                @if(strpos($value->name, 'grade-delete') !== false)
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

                </tbody>
            </table>
        </div>
    </div>

</div>
