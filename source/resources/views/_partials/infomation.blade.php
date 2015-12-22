<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <div class="panel panel-info">
            <div class="panel-heading">Issues:</div>
            <div class="panel-body issues">
                <table class="table table-hover">
                <tbody>
                    @foreach($issues as $issue)
                        <tr data-id="{{$issue->ID}}">
                            <td>{{ $issue->ownerComment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>

    </div>
</div>

<div class="row info">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-info">
              <div class="panel-heading">
                <input type="checkbox" name="complete">Complete
              </div>
              <div class="panel-body">
                    <img src="{{ $currentIssue->photo }}" alt="" width="100%" height="250px">

                    <h4>Owner comment:</h4>
                    <textarea name="" id="input" class="form-control" rows="5" placeholder="Leave your comment here">{{ $currentIssue->ownerComment }}</textarea>
                    <h4>Builder solution:</h4>
                    <div class="col-md-6 nopadding">
                        <br>
                        <select name="" id="" class="form-control">
                            <option value="Replace">Replace</option>
                            <option value="Repair">Repair</option>
                            <option value="Not Accepted">Not Accepted</option>
                        </select>

                    </div>

                    <div class="col-md-6 nopadding">
                        <br>
                        <input type="text" name="" id="input" class="form-control datepicker" value="">
                    </div>

                    <textarea name="" id="input" class="form-control" rows="5" placeholder="Leave your comment here"></textarea>

                    <div class="col-md-4 nopadding"><button type="button" class="btn btn-danger btn-block">Delete</button></div>
                    <div class="col-md-4 nopadding"><button type="button" class="btn btn-info btn-block">Cancel</button></div>
                    <div class="col-md-4 nopadding"><button type="button" class="btn btn-primary btn-block">Submit</button></div>

              </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function onClickIssuesList() {
        $('.issues tr').on('click', function () {
            var id =$(this).attr('data-id');
            var url = '{{ route('issue.show') }}';
            $.ajax({
                url : url.replace(/\%7Bid\%7D/,id),
                method : 'get',
                success : function (response) {
                    $('.info').html('');
                    $('.info').append(response);
                }
            });
        });
    }

    $(document).ready(function () {
        onClickIssuesList();
    });
</script>
