<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('code','Examination Code') !!}
                {!! Form::text('code', old('code'), ['placeholder' => 'Examination Code eg SE,CA,T1,T2','class' => 'form-control','id'=>'code']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name','Examination Type') !!}
                {!! Form::text('name', old('name'), ['placeholder' => 'Examination Type Name','class' => 'form-control','id'=>'exam_id']) !!}
            </div>
        </div>
        {{-- <div class="row mb-4">
            <div class="col-md-12">
                <div class="icheck-primary m-3 pull-right">
                    {{Form::radio('type','CA',null,['id'=>'ca'])}}
                    {!! Form::label('ca','Continuous Assessment') !!}

                </div>
            </div>
        </div> --}}
        
        {{-- <div class="row mb-4">
            <div class="col-md-12">
                <div class="icheck-primary m-3 pull-right">
                    {{Form::radio('type','ESE',null,['id'=>'ese'])}}
                    {!! Form::label('ese','Semester Examination') !!}

                </div>
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::button('Submit',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
            </div>
        </div>
</div>
