<body onload="window.print()">
	<center>
		<div class="visible-print text-center">
			<h1>Absensi Peserta</h1>
		    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(500)->generate(url('/absensi/'.$materi->training_raya_kategori_id.'/'.$materi->id.'/'.\Str::random(32))); !!}
		    <h2>{{ $materi->nama }}</h2>
		    <h3>
		    	@if($materi->training_raya_kategori_id == 1)
		    		Latihan Kader Kohati
		    	@elseif($materi->training_raya_kategori_id == 2)
		    		Latihan Khusus Kohati
		    	@elseif($materi->training_raya_kategori_id == 3)
		    		Senior Course
		    	@endif
		    </h3>
		    <p>Training Raya HMI Cakaba @php echo date('Y') @endphp</p>
		</div>
	</center>
</body>