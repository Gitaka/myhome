@foreach($logo as $logo)
<img src="{{asset($logo->logo_path)}}" title="logo" /></br></br>
{{$logo->logo_path}}
@endforeach