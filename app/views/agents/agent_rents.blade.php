 <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
<h2>hey for rent</h2>

@foreach(array_chunk($rents->all(),3) as $row)
 <div class='row'>
    @foreach($row as $rent)
	<article class="col-md-4">
	{{$rent->name}}</br>
	{{$rent->location}}</br>
	{{HTML::image('agent/r_img/'.$rent->id)}}</br>
	{{$rent->description}}</br>
	</article>
	@endforeach
 </div>
@endforeach




<?php
for($number=1;$number<=$total_pages;$number++){
  echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

	}
?>



