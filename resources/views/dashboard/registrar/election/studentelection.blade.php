@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Election</title>

@endsection


@section('content')
<style>
  .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
  </style>
  @if ($message = Session::get('status'))
  <div class="alert alert-danger">
      <p>{{ $message }}</p>
  </div>
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue"><i class="fa-fw fa fa-check"></i>
                        Election
                     </h2>

                   
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                             
                            </p>
                            <div class="table table-responsive justify-content-center">
                              <div class="card" style="width: 50rem;">
                                <div class="card-header">Filter and Vote</div>
                                <div class="card-body">
                  
                          <form class="" action="{{ route('election-voting') }}" method="POST">  
                            @csrf
                            <input type="hidden" name="reg_no" value="{{ Auth::user()->username }}" >
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Period:</label>
                                <div class="col-sm-10">
                                  <select class="form-control tag" name="period" required="required"  id="period">
                                   <option value="">Select Period</option>
                                    @foreach($ayear as $y)
                                   <option value="{{ $y->year }}">{{ $y->year }}</option>
                                    @endforeach
                                  </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3"  class="col-sm-2 col-form-label">Post:</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="post" required="required" >
                                    <option value="" >--Select post--</option>
                                    @foreach($post as $y)
                                   <option value="{{ $y->id }}">{{ $y->post }}</option>
                                    @endforeach
                                  </select>
                                 </div> 
                              </div>
                             
                            <div class="form-group row candidate">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Candidate</label>
                              <div class="col-sm-10">
                                <select class="form-control tag" name="candidate" id="exampleFormControlSelect1" required="required" >
                                  
                                  <option value="">Select Candidate</option>
                                     
                                </select>
                              </div>
                            </div>
                             
                            <div class="form-group ">
                              <div class="col-sm-12 ">
                                <button type="submit" name="sub" value="1" class="btn btn-primary pull-left">Submit</button>
                             </div>
                          </form>

                                </div>
                              </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
      $(document).ready(function() {
		$('.tag').select2();
});
 

$(document).ready(function() { 

    $('.candidate').hide();

          var period;
  
          $('#period').on('change', function (e) {
     period =  $(this).val();
       });
          
          

      
        $('select[name="post"]').on('change', function() {

            var stateID = $(this).val();
           
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/',
                    data:{
                        id:stateID,
                        year:period
                    },
                     type: "GET",
                    dataType: "json",
                    success:function(data) {
                 
                        $('.candidate').show();
                        console.log(data);
                        $('select[name="candidate"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="candidate"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="candidate"]').empty();
            }
        });
    });
        
    </script>
@endsection