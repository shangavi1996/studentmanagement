<!-- Course Id Field -->




<div class="form-group col-sm-6">
  <label for="course_id">Select course</label>
  <select class="form-control" id="course_id" name="course_id">
  @foreach($courses as $course)
    <option value="{{$course->id}}">{{$course->course_name}}__{{$course->course_code}}</option>
  @endforeach
  </select>

</div>

<!-- Level Id Field -->
<div class="form-group col-sm-6">
  <label for="level_id">Select Level</label>
  <select class="form-control" id="level_id" name="level_id">
  @foreach($levels as $level)
    <option value="{{$level->id}}">{{$level->level_name}}</option>
 @endforeach
  </select>

</div>

<!-- Shift Id Field -->


<div class="form-group col-sm-6">
  <label for="course_id">Select Shifts</label>
  <select class="form-control" id="shift_id" name="shift_id">
  @foreach($shifts as $shift)
    <option value="{{$shift->id}}">{{$shift->shift}}</option>
 @endforeach
  </select>
</div>


<!-- Classroom Id Field -->

<div class="form-group col-sm-6">
  <label for="classroom_id">Select Classrooms</label>
  <select class="form-control" id="classroom_id" name="classroom_id">
  @foreach($classrooms as $classroom)
    <option value="{{$classroom->id}}">{{$classroom->name}}</option>
 @endforeach
  </select>
</div>


<!-- Batch Id Field -->

<div class="form-group col-sm-6">
  <label for="batch_id">Select batches</label>
  <select class="form-control" id="batch_id" name="batch_id">
  @foreach($batches as $batch)
    <option value="{{$batch->id}}">{{$batch->batch}}</option>
 @endforeach
  </select>
</div>

<!-- Day Id Field -->
<div class="form-group col-sm-6">
  <label for="day_id">Select days</label>
  <select class="form-control" id="batch_id" name="day_id">
  @foreach($days as $day)
    <option value="{{$day->id}}">{{$day->name}}</option>
 @endforeach
  </select>
</div>


<!-- Time Id Field -->
<div class="form-group col-sm-6">
  <label for="time_id">Select time</label>
  <select class="form-control" id="time_id" name="time_id">
  @foreach($times as $time)
    <option value="{{$time->id}}">{{$time->time}}</option>
 @endforeach
  </select>
</div>

<!-- Teacher Id Field -->

<div class="form-group col-sm-6">
  <label for="teacher_id">Select terms</label>
  <select class="form-control" id="term_id" name="term_id">
  @foreach($terms as $term)
    <option value="{{$term->id}}">{{$term->term_name}}</option>
 @endforeach
  </select>
</div>


<!-- Starttime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('startDate', 'StartDate:') !!}
    {!! Form::text('starttime', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

<!-- Endtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('EndDate', 'Enddate:') !!}
    {!! Form::text('endtime', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>




@push('scripts')
    <script type="text/javascript">
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
           
        })
    </script>
@endpush




@push('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
          
        })
    </script>
@endpush



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('classSchedules.index') }}" class="btn btn-default">Cancel</a>
</div>
