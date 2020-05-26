
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Advertisements</h1>
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            <form method="post" action="{{url('upload/store')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
             @csrf
           </form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($advertisementimages))
  @foreach($advertisementimages as $adimg)
    <tr>
     <td>{{$loop->iteration}}</td> 
     <td><img src="advertisements/{{$adimg->img_name}}" style="width:300px;height:200px;"></td> 
     <td><button type="button" class="btn btn-danger"><a href="{{URL::to('/ad_destroy'.'/'.$adimg->id)}}" style="text-decoration:none;color:white" >Delete</a></button></td> 
    </tr>
@endforeach 
@endif
  </tbody>
</table>


@push('scripts')

<script type="text/javascript">
        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function (file) {
                    var name = file.upload.filename;
                    $.ajax({
                
                        type: 'POST',
                        url: '{{ url("delete") }}',
                        data: {"_token": "{{ csrf_token() }}",filename: name},
                        success: function (data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };
    </script>
    @endpush
    
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    @endsection


