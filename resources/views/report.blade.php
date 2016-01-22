@extends('master')

@section('content')
<div style="width: 680px;margin: auto" id="report">
    <h1 class="text-center"><a href="{{url('/')}}"><i class="glyphicon glyphicon-home pull-left"></i></a>Report</h1>
    @foreach($areas as $area)
    <?php $count = count($area->issues); ?> 
    @if($count)
    <h3>{{$area->name}} ({{$count}})</h3>
    <ul class="list-unstyled">
            @foreach($area->issues as $issue)
            <li>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="{{url('/')}}?role={{$role}}&issue={{$issue->ID}}&area={{$area->ID}}"><img src="{{asset($issue->photo)}}" class="img-thumbnail img-responsive" /></a>
                    </div>
                    <div class="col-sm-9">
                        <p><label>Owner Comment : </label> {{$issue->ownerComment}}</p>
                        <p><label>Builer Comment : </label> {{$issue->builderComment}}</p>
                        <?php
                            $status = "";
                            switch ($issue->state) {
                                case 0 : $status = "Waiting";
                                        break;
                                case -1 : $status = "Deleted";
                                    break;
                                default : $status = "Completed";
                                    break;
                            }
                        ?>
                        <p>
                            Status :  <span class="badge">{{$status}}</span>, 
                            Building solution : <span class="badge">{{$issue->solution}}</span>
                        </p>
                    </div>
                </div>
            </li>
            @endforeach
    </ul>
    @else 
    <h3>{{$area->name}}</h3>
    <ul class="list-unstyled">
        <li class="text-center"> No issue </li>
    </ul>
    @endif
    @endforeach
</div>
@stop