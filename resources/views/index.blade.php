@extends('master')

@section('content')
<div class="map">
    <div class="clearfix">
        <a class="btn btn-primary pull-right" href="{{route('report')}}"><i class="glyphicon glyphicon-stats"></i> Report</a>
    </div>
    @foreach($areas as $area)

        <div class="{{ $area->name }} area" style="{{ $area->position }}" onclick="Area.getIssues('{{route('issues.index').'?areaID='.$area->ID.'&role='.$role}}')">
            <form class="@if($role == 'owner') dropzone @endif" id="upload{{$area->ID}}" action="{{ route('photoUpload') }}" method="post" style="width:100%;height:100%;">
                {!! csrf_field() !!}
                @if($area->issuesCount && 0)
                <label class="number-isuees">{{$area->issuesCount}}</label>
                @endif
                <input type="hidden" name="role" value="{{ $role }}">
                <input type="hidden" name="id" value="{{ $area->ID }}">
                <div class="dz-message" data-dz-message><span></span></div>
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

    @if($role == 'owner')
    <script type="text/javascript">
    @foreach($areas as $area)
        Dropzone.options.upload{{$area->ID}} = {
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 7, // MB
            previewsContainer: '#preview',
            clickable: false,
            success: function (file, response) {
                $('#issueDetail').html('');
                $('#issueDetail').append(response);
                Area.updateIssuesList('#upload{{$area->ID}}',{{$area->ID}});
                $.wait(function(){
                    Issue.bindDatepicker(Issue.getDetailDom().find('.datepicker'));
                    Issue.goToOwnerComment();
                    $(window).hover(function(event) {
                    if (event.fromElement) {
                        console.log("inactive");
                    } else {
                        console.log("active");
                    }
                    });
                },0.5)
            },
            error: function (file, response) {
            }
        };
    @endforeach
    </script>
    @endif
@endsection
