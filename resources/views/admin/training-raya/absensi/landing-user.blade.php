<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('select').selectize({
      sortField: 'text'
  });
});
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>
<body>
	<center>
	  <img src="{{ url('training-raya/logo_training_raya.png') }}" style="width: 30vw;">
	  <h2>Absensi {{ $materi->nama }}</h2>
	  <h3>Silahkan pilih nama anda, kemudian tekan tombol kirim</h3>
	  <form method="POST" action="{{ url('absensi/'.$idKategori.'/'.$materi->id.'/'.\Str::random(32)) }}">
	  	  @csrf
		  <select id="select-state" placeholder="Cari nama anda.." name="user_id">
		    @foreach($list_user as $user)
		    	<option value="{{ $user->id }}">{{ $user->name }}</option>
		    @endforeach
		  </select>
		  <br>
		  <button type="submit">Kirim</button>
	  </form>
	</center>
</body>
</html>