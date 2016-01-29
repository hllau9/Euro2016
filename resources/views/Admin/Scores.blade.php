@extends('layouts.app')

@section('content')

<br/>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<table class="table table-borderedx table-stripedx table-hover">
<caption class="info" style="font-weight: bolder; font-size: 2em; color: white;">Score Board</caption>
<thead>
<tr class="info"><td>Player</td><td>Score</td></tr>
</thead>
<tbody>
@foreach ($ScoreTable as $id => $score)
<tr><td> {{ $id }} </td><td> {{ $score }} </td><tr/>
@endforeach
</tbody>
</table>
</div>


<p/>
</div>
@endsection

