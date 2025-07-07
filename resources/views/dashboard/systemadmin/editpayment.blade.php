@extends('layouts.dashboard')
<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="row">
            <div class="col-md-8">
	        <div class="box" >
	            <div class="box-header"> Edit Payment Type
	            </div>
	            <div class="box box-body">
	               <form role="form" method="POST" action="{{url('payments/'.$payment->id)}}">
			         @csrf  {{method_field('patch')}}
			          <div class="col-md-12">
		                	 <div class="form-group">
		                        <label for="name">Payment Name</label>
		                        <input type="text" class="form-control" value="{{$payment->name}}" name="name"  />
		                    </div>
		                </div>


		                <div class="col-md-12">
		                    <div class="form-group">
		                        <label for="status">Status</label>
		                         <select class="form-control" name="status">
		                            <option value="active">Activate</option>
		                            <option value="Disabled">Disable</option>
		                        </select>
		                    </div>
		                </div>

		                 <div class="col-md-12">
			                <div class="form-group">
			                     <button class="btn btn-primary">Update</button>
			                </div>
			            </div>
			      </form>
	                </div>
	            </div>
	        </div>
        </div>
	</div>


@endsection
