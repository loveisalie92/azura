
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
                    <div class="clearfix">
                        <img src='{{ asset("$currentIssue->photo") }}' alt="" class="img-responsive" >
                    </div>
                    <h4 style="margin-top: 20px;margin-bottom: 10px;">Owner comment:</h4>
                    @if ($role == 'owner')
                    <textarea name="ownerComment" id="input" class="form-control" rows="5" placeholder="Leave your comment here">{{ $currentIssue->ownerComment }}</textarea>
                    @else
                    <textarea name="ownerComment" id="input" class="form-control" rows="5" placeholder="Leave your comment here" disabled>{{ $currentIssue->ownerComment }}</textarea>
                    @endif
                    <h4 style="margin-top: 20px;margin-bottom: 10px;">Builder solution:</h4>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-6">
                            <select name="solution" id="" class="form-control">
                                <option @if($currentIssue->solution == 'Blank' || !$currentIssue->solution) selected="selected" @endif>Blank</option>
                                <option value="Replace" @if($currentIssue->solution == 'Replace') selected="selected" @endif>Replace</option>
                                <option value="Repair" @if($currentIssue->solution == 'Repair') selected="selected" @endif>Repair</option>
                                <option value="Not Accepted" @if($currentIssue->solution == 'Not Accepted') selected="selected" @endif>Not Accepted</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="builderDatetime" id="input" class="form-control datepicker" value="{{date('m/d/Y')}}">
                        </div>
                    </div>
                    <textarea  name="builderComment" id="input" class="form-control" rows="5" placeholder="Leave your comment here">{{ $currentIssue->builderComment }}</textarea>
                    <div class="clearfix issueActions">
                        <button type="submit" class="btn btn-primary  pull-right">Submit</button>
                        @if ($role == 'owner')
                        <button type="button" class="btn btn-danger  pull-right" onclick="Issue.delete('{{route('issues.destroy', ['id' => $currentIssue->ID])}}')">Delete</button>
                        @endif
                        <button type="button" class="btn btn-default  pull-right" onclick="Issue.closeDetailPanel()" >Cancel</button>
                    </div>

              </div>
          </form>
        </div>
</div>
