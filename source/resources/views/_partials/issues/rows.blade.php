@foreach($issues as $issue)
    <tr onclick='Issue.getDetail(this,"{{route('issue.show',['id'=>$issue->ID])}}")'>
        <td>{{ $issue->ownerComment }}</td>
    </tr>
@endforeach