<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">Issues:</div>
        <div class="panel-body issues">
            <table class="table table-hover" id="issuesTable" data-areaID="{{$areaID}}">
            <tbody>
                @foreach($issues as $issue)
                    <tr onclick='Issue.getDetail(this,"{{route('issues.show',['id'=>$issue->ID])}}")'>
                        <td>{{ $issue->ownerComment }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
