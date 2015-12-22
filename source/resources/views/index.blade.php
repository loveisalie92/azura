@extends('master')

@section('content')
<div class="map">
    @foreach($areas as $area)

        <div class="{{ $area->name }} area" style="{{ $area->position }}">
            <form class="dropzone" id="upload{{$area->ID}}" action="{{ route('photoUpload') }}" method="post" style="width:100%;height:100%;">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{ $area->ID }}">
            </form>
        </div>

    @endforeach

    <div id="preview" style="display:none">

    </div>
</div>
@stop

@section('js')
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script type="text/javascript">
    @foreach($areas as $area)
        Dropzone.options.upload{{$area->ID}} = {
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            previewsContainer: '#preview',
            clickable: false,
            success: function (file, response) {
            },
            error: function (file, response) {
            }
        };
    @endforeach
    function onDragImage() {
        $('body').on('dragover','.map > div.are', function() {
            $(this).css('background', 'black');
        });
    }

    $(document).ready(function (){
        onDragImage();
    });
    </script>
@endsection
