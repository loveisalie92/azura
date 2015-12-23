
<div class="col-md-12">
        <div class="panel panel-info">
            <form onsubmit="Area.update(this);return false;" action="{{ route('issue.update', [ 'id' => $currentIssue->ID ]) }}" method=post>
                {!! csrf_field() !!}
               @if($role == 'owner')
              <div class="panel-heading">
                <input type="checkbox" name="complete" value="1" @if($currentIssue->state == 1) checked @endif /> Complete
              </div>
               @endif
              <div class="panel-body">
                    <img src='{{ asset("$currentIssue->photo") }}' alt="" width="800px">
                    <h4 style="margin-top: 20px;margin-bottom: 10px;">Owner comment:</h4>
                    <textarea name="ownerComment" id="input" class="form-control" rows="5" placeholder="Leave your comment here">{{ $currentIssue->ownerComment }}</textarea>
                    <h4 style="margin-top: 20px;margin-bottom: 10px;">Builder solution:</h4>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-6">
                            <select name="solution" id="" class="form-control">
                                <option value="Blank" disabled="" selected="">Blank</option>
                                <option value="Replace">Replace</option>
                                <option value="Repair">Repair</option>
                                <option value="Not Accepted">Not Accepted</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="builderDatetime" id="input" class="form-control datepicker" value="">
                        </div>
                    </div>
                    <textarea  name="builderComment" id="input" class="form-control" rows="5" placeholder="Leave your comment here">{{ $currentIssue->builderComment }}</textarea>
                    <div class="clearfix issueActions">
                        <button type="submit" class="btn btn-primary  pull-right">Submit</button>
                        <button type="button" class="btn btn-danger  pull-right">Delete</button>
                        <button type="button" class="btn btn-default  pull-right" onclick="Area.hideIssueForm()">Cancel</button>
                    </div>

              </div>
          </form>
        </div>
</div>
