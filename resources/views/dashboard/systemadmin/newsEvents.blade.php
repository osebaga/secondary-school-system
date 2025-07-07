@extends('layouts.dashboard')

@section('content')

<div class="container-fluid" style="margin-right: 10px; margin-left: 10px; margin-bottom:50px;">
    @can('admins')
    <div class="col-sm">

        <a class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;" data-toggle="modal" data-target="#modalContactForm"
              >
                <b>Add</b>
            </a>
    </div>
@endcan
    @if(count($events)>0)
    @foreach($events as $e)
    <div class="box" >
        <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                <h3>{{$e->topic}}</h3>
                <h5>from <b> {{$e->sender}} </b> </h5>
                <p>{{$e->description}}</p>
              </div>
              <hr>
             <p>{{$e->date}}</p>
            </div>
            <!--/.tab-content-->
          </div>
    </div>
    @endforeach
    @else
    <div class="box" >
        <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                <h4 style="text-align: center">There is no Event or news for now</h4>
              </div>
            </div>
            <!--/.tab-content-->
          </div>
    </div>
    @endif

</div>



    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{route('event.add')}}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Tittle</p>
                        <input type="text" class="form-control" id="message" name="topic"  required oninvalid="this.setCustomValidity('Must Enter Message')"
                               oninput="this.setCustomValidity('')"  >
                    </div>
                    <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Description</p>
                        <input type="textarea" class="form-control" id="message" name="description"  required oninvalid="this.setCustomValidity('Must Enter Message')"
                               oninput="this.setCustomValidity('')"  >
                    </div>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;"> POST </button>
                </div>
            </div>
        </form>
    </div>
</div>

    <script type="text/javascript">
        function getTableRowId(id){
            let url = "{{ route('Campus/Details', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;    }
    </script>
@endsection
