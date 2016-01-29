@extends('layouts.app')

@section('content')

<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Group Stage</div></div>
@foreach ($matches as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModal">
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
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModalFinals">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right"><span id="{{ $match->CountryHomeNameLabel }}">{{ $match->CountryHomeName }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryHomeImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryAwayImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left"><span id="{{ $match->CountryAwayNameLabel }}">{{ $match->CountryAwayName }}</span></div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
<div class="hidden">{{ $match->CountryHomeID }}</div>
<div class="hidden">{{ $match->CountryAwayID }}</div>
</div>
@endforeach

<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Quarter Finals</div></div>
@foreach ($matches8 as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModalFinals">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right"><span id="{{ $match->CountryHomeNameLabel }}">{{ $match->CountryHomeName }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryHomeImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryAwayImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left"><span id="{{ $match->CountryAwayNameLabel }}">{{ $match->CountryAwayName }}</span></div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
<div class="hidden">{{ $match->CountryHomeID }}</div>
<div class="hidden">{{ $match->CountryAwayID }}</div>
</div>
@endforeach

<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Semi Finals</div></div>
@foreach ($matches4 as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModalFinals">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right"><span id="{{ $match->CountryHomeNameLabel }}">{{ $match->CountryHomeName }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryHomeImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryAwayImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left"><span id="{{ $match->CountryAwayNameLabel }}">{{ $match->CountryAwayName }}</span></div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
<div class="hidden">{{ $match->CountryHomeID }}</div>
<div class="hidden">{{ $match->CountryAwayID }}</div>
</div>
@endforeach

<div class="row header-row"><div class="col-md-offset-4 col-md-4 col-md-offset-4 text-center">Final</div></div>
@foreach ($matches2 as $match)
<div class="row custom-row match-row" data-toggle="modal" data-target="#myModalFinals">
<div class="col-md-2">{{ $match->MatchID }}</div>
<div class="col-md-2 CountryHomeDiv text-right"><span id="{{ $match->CountryHomeNameLabel }}">{{ $match->CountryHomeName }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryHomeImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryHomeFlag.'.png' }}"/></div>
<div class="col-md-1"><span id="{{ $match->CountryHomeScoreLabel }}">{{ $match->CountryHomeScore }}</span></div>
<div class="col-md-1"><span id="{{ $match->CountryAwayScoreLabel }}">{{ $match->CountryAwayScore }}</span></div>
<div class="col-md-1"><img id="{{ 'CountryAwayImage'.$match->MatchID }}" src="../images/smallflags/{{ $match->CountryAwayFlag.'.png' }}"/></div>
<div class="col-md-2 CountryAwayDiv text-left"><span id="{{ $match->CountryAwayNameLabel }}">{{ $match->CountryAwayName }}</span></div>
<div class="col-md-2">{{ $match->TimeAndDate }}</div>
<div class="hidden">{{ $match->CountryHomeID }}</div>
<div class="hidden">{{ $match->CountryAwayID }}</div>
</div>
@endforeach


<span id="xid" style="color: red;"></span>


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

<!-- Modal Finals -->
<div class="modal fade" id="myModalFinals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter your prediction</h4>
      </div>
      <div class="modal-body">
	<form role="form" id="scoreformfinal">
	{{ Form::token() }}
	<input type="hidden" id="matchidfinal" name="matchid">
	 <div class="form-group">
	    <span id="ScoreEntryErrorsFinal" style="color: #ffbbaa;"></span><br/>
		<div class="row">
			<div class="col-md-2">	
				<label for="CountryHomeLabel" id="CountryHomeLabel" class="control-label" style="padding: 10px;">Home:</label>
			</div>
			<div class="col-md-5">	
				<select class="form-control" id="CountryHomeID" name="CountryHomeID">
				@foreach ($countrydropdown as $country)
				<option value="{{ $country['CountryID'] }}">{{ $country['CountryName'] }}</option>
				@endforeach
				</select>
				</div>
			<div class="col-md-5">	
				<input type="text" class="form-control" id="CountryHomeScoreFinal" name="CountryHomeScore">
			</div>
		</div>
          </div>
          <div class="form-group">
		<div class="row">
			<div class="col-md-2">	
		            <label for="CountryAwayLabel" id="CountryAwayLabel" class="control-label" style="padding: 10px;">Away:</label>
			</div>
			<div class="col-md-5">	
				<select class="form-control" id="CountryAwayID" name="CountryAwayID">
				@foreach ($countrydropdown as $country)
				<option value="{{ $country['CountryID'] }}">{{ $country['CountryName'] }}</option>
				@endforeach
				</select>
			</div>
			<div class="col-md-5">	
            			<input type="text" class="form-control" id="CountryAwayScoreFinal" name="CountryAwayScore">
			</div>
          	</div>
	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closemodalfinal">Close</button>
        <button type="button" class="btn btn-primary" id="submitscorefinal">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<script>
 $(function() {
	 
	//Group stage score
	$("button#submitscore").click(function(){
	        $.ajax({
    		type: "POST",
		url: "Admin/SubmitScore",
		data: $("#scoreform").serialize(),
        	success: function(msg){
			var score_json = $.parseJSON(msg);
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
	 
	 
	//Final stage score  
	$("button#submitscorefinal").click(function(){
	        $.ajax({
    		type: "POST",
		cache: false,
		url: "Admin/SubmitScoreFinal",
		data: $("#scoreformfinal").serialize(),
        	success: function(msg){
			var score_json = $.parseJSON(msg);
			$("#CountryHomeScoreLabel" + score_json.matchid).html(score_json.CountryHomeScore);
			$("#CountryAwayScoreLabel" + score_json.matchid).html(score_json.CountryAwayScore);
			$("#xid").html(score_json.CountryHomeID + '&nbsp;' + score_json.CountryAwayID);
			$("#CountryHomeNameLabel" + score_json.matchid).html(score_json.CountryHomeID);
			$("#CountryAwayNameLabel" + score_json.matchid).html(score_json.CountryAwayID);
		//	$("#C" + score_json.matchid).html(score_json.CountryHomeID);
		//	$("#C" + score_json.matchid).html(score_json.CountryAwayID);
			var homeimg = "../images/smallflags/" + score_json.CountryHomeImage + ".png";
			var awayimg = "../images/smallflags/" + score_json.CountryAwayImage + ".png";
			$("#CountryHomeImage" + score_json.matchid).attr("src", homeimg);
			$("#CountryAwayImage" + score_json.matchid).attr("src", awayimg);
 		       	$("#myModalFinals").modal('hide');
 		        },
		error: function(msg){
			var errors = msg.responseJSON;
			$("#ScoreEntryErrorsFinal").empty();
			if(typeof errors["CountryHomeScore"] != "undefined") { $("#ScoreEntryErrorsFinal").append(errors["CountryHomeScore"] + "<br/>") }
			if(typeof errors["CountryAwayScore"] != "undefined") { $("#ScoreEntryErrorsFinal").append(errors["CountryAwayScore"] + "<br/>") }
			}
      		});
	});	 

	$("button#closemodalfinal").click(function(){
		$("#ScoreEntryErrorsFinal").empty()
	});
});

$(function() {
	$(".match-row").click(function() {
		var homename = $(this).find('div:eq(1)').text();
		var awayname = $(this).find('div:eq(6)').text();
		var matchid = $(this).find('div:eq(0)').text();
		var homescore = $(this).find('div:eq(3)').text();
		var awayscore = $(this).find('div:eq(4)').text();
		var homeid = $(this).find('div:eq(8)').text();
		var awayid = $(this).find('div:eq(9)').text();
		$("#CountryHomeLabel").html(homename);
		$("#CountryAwayLabel").html(awayname);
		$("#matchid").val(matchid);
		$("#matchidfinal").val(matchid);
		$("#CountryHomeScore").val(homescore);
		$("#CountryAwayScore").val(awayscore);
		$("#CountryHomeScoreFinal").val(homescore);
		$("#CountryAwayScoreFinal").val(awayscore);
		$("#CountryHomeID").val(homeid);
		$("#CountryAwayID").val(awayid);
	});
});
</script>

@endsection

