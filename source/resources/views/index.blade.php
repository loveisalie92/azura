@extends('master')

@section('content')
<div class="map">
    @foreach($areas as $area)
        <div class="{{ $area->name }}" style="{{ $area->position }}">
        </div>
    @endforeach
</div>
@stop
