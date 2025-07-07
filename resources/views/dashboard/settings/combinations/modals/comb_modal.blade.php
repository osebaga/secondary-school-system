<div class="row">
    <div class="col-sm-12">

        <div id="comb_modal" class="modal-view">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title bg-primary text-center" id="grade_modal_title"></h4>
            <div class="card-body">
                <form action="{{Route('combinations.create-combination')}}">
                    <div class="form-group">
                        <select name="programme_id" class="form-control" required>
                            <option value="">---Select Programme---</option>
                            @foreach ($programmes as $programme)
                                <option value="{{$programme->id}}">{{ $programme->program_acronym }} - {{$programme->program_name}}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" >
                        <input placeholder="Combination Code" type="text"  name="combination_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input placeholder="Combination Name" type="text" class="form-control" name="description" required>
                    </div>
                    <div class="fom-group">
                        <input class="btn btn-success btn-block" type="submit" value="Add Combination">
                    </div>
                </form>
            </div>
            {{-- <div class="modal-body content-body" style="text-align: left;"> --}}

            </div>
        </div>


    </div>
</div>
