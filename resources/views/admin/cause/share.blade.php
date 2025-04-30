<h2>tes</h2>
<hr>
<h2>{{ $data['title'] }}</h2>
<img src="{{ asset('logo.png') }}" style="width: 350px; height: 350px; object-fit: cover;" alt="">
<p>{{ $data['description'] }}</p>

{!! $shareButtons !!}
