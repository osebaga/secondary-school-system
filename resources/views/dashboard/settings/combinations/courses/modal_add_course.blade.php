<div class="row">
    <div class="col-sm-12">

        <div id="courseCombModal" class="modal-view">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title bg-primary text-center" id="grade_modal_title"></h4>
            <div class="card-body">
                <form action="{{ route('combination.add-course', [ 'id' => $combination->id])}}">
                    <div class="form-group">
                        <select name="course_id" class="form-control" required>
                            <option value="">---Select Course Code---</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{ $course->course_code}}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="year_of_study" class="form-control" required>
                            <option>---Select Year Of Study---</option>
                            <option value="1">First Year</option>
                            <option value="2">Second Year</option>
                            <option value="3">Third Year</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="semester" class="form-control" required>
                            <option value="">---Select Semester---</option>
                            @foreach ($semesters as $semester )
                                <option value="{{ $semester->semester}}">{{ $semester->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="year_id" class="form-control" required>
                            <option>---Select Academic Year---</option>
                            @foreach ($academic_years as $academic_year)
                                <option value="{{ $academic_year->id}}">{{ $academic_year->year }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    
                    
                    <div class="fom-group">
                        <input class="btn btn-success btn-block" type="submit" value="Add Course">
                    </div>
                </form> 
            </div>
            {{-- <div class="modal-body content-body" style="text-align: left;"> --}}

            </div>
        </div>


    </div>
</div>
