<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Jawaban</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <b> {{ \DB::table('users')->find($list_jawaban[0]->user_id)->name ?? '-' }}</b>
            <br>
            <b> {{ \Carbon\Carbon::parse($list_jawaban[0]->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') ?? '-' }}</b>
            <table class="table">
                @foreach($list_jawaban as $jawaban)
                <tr>
                    <td width="20%"><b>{{ \DB::table('training_raya_question_test')->where('tipe', 'final')->where('id', $jawaban->training_raya_question_test_id)->first()->pertanyaan ?? '-' }}</b></td>
                    <td>:</td>
                    <td>{!! $jawaban->jawaban !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>