@extends('layouts.app')

@section('content')
<br/>
<div class="row header-rowx"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center" style="font-size: 2em;"> Your score: {{ $totalscore }} </div></div>
<br/>
<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Group Stage</div></div>
@foreach ($matches as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModal1">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right">{{ $match->CountryHomeName }}</div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left">{{ $match->CountryAwayName }}</div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
</div>
@endforeach
<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Group of 16</div></div>
@foreach ($matches16 as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModal1">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right">{{ $match->CountryHomeName }}</div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left">{{ $match->CountryAwayName }}</div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
</div>
@endforeach

<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Quarter Finals</div></div>
@foreach ($matches8 as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModal1">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right">{{ $match->CountryHomeName }}</div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left">{{ $match->CountryAwayName }}</div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
</div>
@endforeach

<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Semi Finals</div></div>
@foreach ($matches4 as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModal1">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right">{{ $match->CountryHomeName }}</div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left">{{ $match->CountryAwayName }}</div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
</div>
@endforeach

<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Final</div></div>
@foreach ($matches2 as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModal1">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right">{{ $match->CountryHomeName }}</div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left">{{ $match->CountryAwayName }}</div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
</div>
@endforeach


<br/>
<br/>
<br/>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter your prediction</h4>
      </div>
      <div class="modal-body">
	<form role="form" id="scoreform">
	{{ Form::token() }}
	<input type="hidden" id="matchid" name="matchid">
	<div class="row">
	<span id="ScoreEntryErrors" style="color: #ffbbaa;"></span><br/>
	<div class="col-md-6">
            <label for="CountryHomeLabel" id="CountryHomeLabel" class="control-label">Home:</label>
	</div>
	<div class="col-md-6">
            <label for="CountryAwayLabel" id="CountryAwayLabel" class="control-label">Away:</label>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
            <input type="text" class="form-control" id="CountryHomeScore" name="CountryHomeScore"/>
	</div>
	<div class="col-md-6">
            <input type="text" class="form-control" id="CountryAwayScore" name="CountryAwayScore">
	</div>
	</div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closemodal">Close</button>
        <button type="button" class="btn btn-primary" id="submitscore">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Test Modal -->
<div class="modal fade" id="myModalTest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter your prediction</h4>
      </div>
      <div class="modal-body">
	<form role="form" id="scoreform">
	{{ Form::token() }}
	<input type="hidden" id="matchid" name="matchid">
	<div class="row">
	<span id="ScoreEntryErrors" style="color: #ffbbaa;"></span><br/>
	<div class="col-md-6">
            <label for="CountryHomeLabel" id="CountryHomeLabel" class="control-label">Home:</label>
	</div>
	<div class="col-md-6">
            <label for="CountryAwayLabel" id="CountryAwayLabel" class="control-label">Away:</label>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
            <input type="text" class="form-control" id="CountryHomeScore" name="CountryHomeScore"/>
	</div>
	<div class="col-md-6">
            <input type="text" class="form-control" id="CountryAwayScore" name="CountryAwayScore">
	</div>
	</div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closemodal">Close</button>
        <button type="button" class="btn btn-primary" id="submitscore">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->




<script>
 $(function() {
//twitter bootstrap script
	$("button#submitscore").click(function(){
	        $.ajax({
    		type: "POST",
		url: "Game/SubmitScore",
		data: $("#scoreform").serialize(),
        	success: function(msg){
			var score_json = $.parseJSON(msg);
			$("#ScoreEntryErrors").empty();
			$("#CountryHomeScoreLabel" + score_json.matchid).html(score_json.CountryHomeScore);
			$("#CountryAwayScoreLabel" + score_json.matchid).html(score_json.CountryAwayScore);
 		       	$("#myModal").modal('hide')	
 		        },
		error: function(msg){
			var errors = msg.responseJSON;
			$("#ScoreEntryErrors").empty();
			if(typeof errors["CountryHomeScore"] != "undefined") { $("#ScoreEntryErrors").append(errors["CountryHomeScore"] + "<br/>") }
			if(typeof errors["CountryAwayScore"] != "undefined") { $("#ScoreEntryErrors").append(errors["CountryAwayScore"] + "<br/>") }
			}
      		});
	});

	$("button#closemodal").click(function(){
		$("#ScoreEntryErrors").empty()
	});
});

$(function() {
	$(".match-row").click(function() {
		var matchtimestring = $(this).find('div:eq(7)').text();
		matchtimestring = matchtimestring.replace(/-/g, ' ');
		var matchtime = new Date(matchtimestring);
		var currenttime = new Date();

		if(currenttime < matchtime)
		{
			$("#myModal").modal('show');	
		}
		else
		{
			alert("Oooops, I'm sorry, you're late. \nPlease be early for the remaning matches.");
		}
	});

	$(".match-row").click(function() {
		var homename = $(this).find('div:eq(1)').text();
		var awayname = $(this).find('div:eq(6)').text();
		var matchid = $(this).find('div:eq(0)').text();
		var homescore = $(this).find('div:eq(3)').text();
		var awayscore = $(this).find('div:eq(4)').text();
		$("#CountryHomeLabel").html(homename);
		$("#CountryAwayLabel").html(awayname);
		$("#matchid").val(matchid);
		$("#CountryHomeScore").val(homescore);
		$("#CountryAwayScore").val(awayscore);
	});
});

</script>

@endsection

