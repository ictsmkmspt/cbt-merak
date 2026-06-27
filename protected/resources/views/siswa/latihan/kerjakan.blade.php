<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts/siswa_baru')
@section('title', 'Kerjakan Latihan')
@section('breadcrumb')
  <li><a href="{{ url('/siswa') }}">Home</a></li>
  <li><a href="{{ url('/latihan') }}">Latihan</a></li>
  <li class="active">Kerjakan: {{ $soal->paket }}</li>
@endsection
@section('content')
<style type="text/css" media="screen">
  .benar{
    padding: 15px;
    background: #045ff2;
    color: #fff;
  }
  input[type=radio]{
    margin-top: 5px;
  }
  .pagination { background: #fff; color: #000 !important; }
  .page {
    display: inline-block;
    padding: 0px 9px;
    margin: 8px 4px 0 0;
    border-radius: 3px;
    border: solid 1px #c0c0c0;
    background: #e9e9e9;
    box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
    font-size: .875em;
    font-weight: bold;
    text-decoration: none;
    color: #717171;
  }
  .page.gradient:hover { background: #fefefe; }
  .page.active {
    border: none;
    background: #616161;
    color: #f0f0f0;
  }
</style>

<div class="col-md-12">
  <div class="row">
    <div class="col-md-12" style="background: #1d4ed8; padding:14px 18px; border-radius: 10px; margin-bottom: 16px;">
      <div class="row">
        <div class="col-md-8" style="color: #fff;">
          <b>{{ $soal->paket }}</b> &mdash; Hai {{ $user->nama }}, ini latihan untuk persiapan ujian. Jawaban tersimpan otomatis setiap kamu memilih.
        </div>
        <div class="col-md-4" style="text-align: right; color: #fff;">
          KKM: {{ $soal->kkm }}
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <input type="hidden" id="id_soal_utama" value="{{ $soal->id }}">

  <div class="row">
    <div class="col-md-8 col-sm-12" style="border:solid thin #e3e9f2; background: #fff; padding:10px" id="wrap-soal">
      @if($detailsoals->count())
        <?php $first = $detailsoals->first(); ?>
        <div id="loader-soal-pertama" data-id="{{ $first->id }}"></div>
        <p style="text-align:center; color:#94a3b8; padding: 30px 0;">Memuat soal pertama...</p>
      @else
        <div class="alert alert-warning" style="margin: 0">
          Belum ada soal pada paket latihan ini.
        </div>
      @endif
    </div>

    <div class="col-md-4 col-sm-12">
      <div class="card">
        <div class="card-header bg-white">
          <div class="media">
            <div class="media-body">
              <h4 class="card-title">Nomor Soal</h4>
            </div>
          </div>
        </div>
        <div style="padding: 0 15px">
          <ul class="pagination">
            <?php $no = 1; ?>
            @if($detailsoals->count())
            @foreach($detailsoals as $d)
              <input type="hidden" id="id{{ $d->id }}" value="{{ $d->id }}">
              <a href="#" style="text-decoration: none;" class="page gradient" id="get-soal{{ $d->id }}">{{ $no++ }}</a>
            @endforeach
            @endif
          </ul>
          <hr>
          <a href="{{ url('/latihan') }}" class="btn btn-default" style="margin-bottom: 8px;">Kembali</a>
          <input type="button" id="selesai" value="Selesai Latihan" class="btn btn-primary" style="float: right">
          <br style="clear: both;">
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ url('/assets/assets/vendor/jquery.min.js') }}"></script>
<script>
jQuery.noConflict()(function ($) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function muatSoal(id) {
    $.ajax({
      type: "POST",
      url: "{{ url('/get-soal') }}/" + id,
      data: { id: id },
      success: function (data) {
        $("#wrap-soal").hide().html(data).fadeIn(250);
        $(".page").removeClass('page active').addClass('page gradient');
        $("#get-soal" + id).removeClass('page gradient').addClass('page active');
      },
      error: function () {
        alert('Gagal memuat soal, silakan coba lagi.');
      }
    });
  }

  $(document).ready(function () {
    // muat soal pertama otomatis saat halaman dibuka
    var firstId = $("#loader-soal-pertama").data('id');
    if (firstId) {
      muatSoal(firstId);
    }

    // klik nomor soal di sidebar
    $(document).on('click', '[id^="get-soal"]', function (e) {
      e.preventDefault();
      var id = $(this).attr('id').replace('get-soal', '');
      muatSoal(id);
    });

    // tombol selesai latihan
    $("#selesai").click(function () {
      if (!confirm('Selesaikan latihan ini? Jawaban yang sudah dipilih akan disimpan sebagai hasil akhir.')) return false;
      var id_soal = $("#id_soal_utama").val();
      $.ajax({
        url: "{{ url('/kirimjawaban') }}",
        type: 'POST',
        data: { id_soal: id_soal },
        success: function () {
          window.location.href = "{{ url('/hasil-siswa') }}";
        },
        error: function () {
          alert('Gagal mengirim jawaban, silakan coba lagi.');
        }
      });
    });
  });
});
</script>
@endsection
