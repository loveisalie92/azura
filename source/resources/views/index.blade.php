@extends('master')

@section('content')
<div class="map">
    @foreach($areas as $area)

        <div class="{{ $area->name }} area" style="{{ $area->position }}" onclick="Area.getIssues('{{route('issues.index').'?areaID='.$area->ID}}')">
            <form class="dropzone" id="upload{{$area->ID}}" action="{{ route('photoUpload') }}" method="post" style="width:100%;height:100%;">
                {!! csrf_field() !!}
                @if($area->issuesCount)
                <label class="number-isuees">{{$area->issuesCount}}</label>
                @endif
                <input type="hidden" name="id" value="{{ $area->ID }}">
            </form>
        </div>

    @endforeach

    <div id="preview" style="display:none">

    </div>
</div>
<div class="row issuesList" id="issuesListWrapper">

</div>
<div id="infoContent">
</div>
</div>
<div class="container">
    <div class="row info"  id="issueDetail">
    </div>
</div>
<script type="text/template" id="trIssuesTableTemplate">
    <tr onclick='Issue.getDetail(this,"{{route('issue.show')}}")'>
        <td>[OWNER_COMMENT]</td>
    </tr>
</script>
@stop

@section('js')


    <script type="text/javascript">
    @foreach($areas as $area)
        Dropzone.options.upload{{$area->ID}} = {
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            previewsContainer: '#preview',
            clickable: false,
            success: function (file, response) {
                $('#infoContent').html('');
                $('#infoContent').append(response);
                Area.updateIssuesList('#upload{{$area->ID}}',{{$area->ID}});
            },
            error: function (file, response) {
            }
        };
    @endforeach
    </script>
@endsection
