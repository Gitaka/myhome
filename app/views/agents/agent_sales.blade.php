 <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
 @extends('agents.agent')
 @section('container')
<h2>hey for sale</h2>
@foreach(array_chunk($buys->all(),3) as $row)
<div class="row">
	
      @foreach($row as $buy)
     <article class="col-md-4">
     {{HTML::image('agent/b_img/'.$buy->id)}}</br>
     {{$buy->price}}</br>
     {{$buy->name}}</br>
     {{$buy->location}}</br>

	</article>
	@endforeach

</div>
@endforeach
<?php
for($number=1;$number<=$total_pages;$number++){
  echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

	}
?>
@stop