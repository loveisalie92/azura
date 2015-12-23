<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">Issues for {{$area->stringName}}</div>
        <div class="panel-body issues">
            <table class="table table-hover" id="issuesTable" data-areaID="{{$area->ID}}">
            <tbody>
                @foreach($issues as $issue)
                    <tr onclick='Issue.getDetail(this,"{{route('issues.show',['id'=>$issue->ID])}}?role={{$role}}")'>
                        <td data-id="{{$issue->ID}}">{{ $issue->ownerComment }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
