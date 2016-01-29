@extends('layouts.app')

@section('content')
<div>
<br/>&nbsp;<br/>
<div class="row">
<div class="col-lg-2"></div>
	
<div class="col-lg-8">

<div>
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab" aria-expanded="false">Rules & Regulations</a></li>
  <li class=""><a href="#profile" data-toggle="tab" aria-expanded="true">Prizes</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="home">
    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
  </div>
  <div class="tab-pane fade active in" id="profile">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  <div class="tab-pane fade" id="dropdown1">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
  <div class="tab-pane fade" id="dropdown2">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
<br/>&nbsp;<br/>
</div>
</div> <!-- nav tabs end -->
	
	
<!-- Score Table DIV Begin-->	
<div class="row">
<div class="col-md-8 col-md-offset-2">
<table class="table table-borderedx table-stripedx table-hover" style="font-size: 1.2em;">
<caption class="info" style="font-weight: bolder; font-size: 2em; color: white;">Score Board</caption>
<thead>
<tr class="active"><td>Player</td><td>Score</td></tr>
</thead>
<tbody>
@foreach ($ScoreTable as $id => $score)
<tr><td> {{ $id }} </td><td> {{ $score }} </td><tr/>
@endforeach
</tbody>
</table>
</div>	
<!-- Score Table DIV End-->
		
	
</div> <!-- class="col-lg-6" -->

<div class="col-lg-2"></div>	
	
</div> <!-- row div -->
</div> <!-- container div -->


@endsection
