
<div class="col-md-12">
        <div class="panel panel-info">
            <form onsubmit="Area.update(this);return false;" action="{{ route('issue.update', [ 'id' => $currentIssue->ID ]) }}" method=post>
                {!! csrf_field() !!}
              <div class="panel-heading">
                <input type="checkbox" name="complete" value="1"
                @if($currentIssue->state == 1)
                    checked
                @endif
                >Complete
              </div>
              <div class="panel-body">
                    <img src='{{ asset("$currentIssue->photo") }}' alt="" width="800px">
                    <h4>Owner comment:</h4>
                    <textarea name="ownerComment" id="input" class="form-control" rows="5" placeholder="Leave your comment here">{{ $currentIssue->ownerComment }}</textarea>
                    <h4>Builder solution:</h4>
                    <div class="col-md-6 nopadding">
                        <br>
                        <select name="solution" id="" class="form-control">
                            <option value="Blank" disabled="" selected="">Blank</option>
                            <option value="Replace">Replace</option>
                            <option value="Repair">Repair</option>
                            <option value="Not Accepted">Not Accepted</option>
                        </select>
                    </div>

                    <div class="col-md-6 nopadding">
                        <br>
                        <input type="text" name="builderDatetime" id="input" class="form-control datepicker" value="">
                    </div>

                    <textarea name="builderComment" id="input" class="form-control" rows="5" placeholder="Leave your comment here">{{ $currentIssue->builderComment }}</textarea>

                    <div class="col-md-4 nopadding"><button type="button" class="btn btn-danger btn-block">Delete</button></div>
                    <div class="col-md-4 nopadding"><button type="button" class="btn btn-info btn-block">Cancel</button></div>
                    <div class="col-md-4 nopadding"><button type="submit" class="btn btn-primary btn-block">Submit</button></div>

              </div>
          </form>
        </div>
</div>
