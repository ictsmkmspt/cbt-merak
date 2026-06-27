@extends('layouts/siswa_baru')
@section('title', 'Latihan')
@section('breadcrumb')
  <li><a href="{{ url('/siswa') }}">Home</a></li>
  <li><a href="{{ url('/latihan') }}">Latihan</a></li>
  <li class="active">Detail: {{ $materi->judul }}</li>
@endsection
@section('content')
<style type="text/css" media="screen">
  .hideGambar{
    overflow:hidden; height:100px
  }
  .showGambar{
    text-align: center;
    background: #d6dbd7;
    padding: 15px 0;
    cursor: pointer;
  }
  .showGambar:hover{
    background: #c4c4c4;
  }

  /* ===== PAKET SOAL LATIHAN - redesign ===== */
  .paket-soal-section-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    color: #92400e;
    margin-bottom: 14px;
  }
  .paket-soal-section-title i { color: #f59e0b; }

  .paket-soal-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #fff;
    border: 1px solid #eef0f4;
    border-radius: 14px;
    padding: 16px 18px;
    margin-bottom: 12px;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
  }
  .paket-soal-card:hover {
    text-decoration: none;
    border-color: #fde68a;
    box-shadow: 0 6px 16px rgba(245,158,11,0.12);
    transform: translateY(-1px);
  }
  .paket-soal-icon {
    flex-shrink: 0;
    width: 48px; height: 48px;
    border-radius: 12px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 10px rgba(217,119,6,0.3);
  }
  .paket-soal-icon i { color: #fff; font-size: 20px; }
  .paket-soal-body { flex: 1; min-width: 0; }

  /* Nama materi: diperbesar, diletakkan di atas nama soal */
  .paket-soal-materi {
    font-size: 12px;
    font-weight: 700;
    color: #92400e;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    margin-bottom: 4px;
  }
  .paket-soal-judul {
    font-size: 16px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 6px;
    line-height: 1.3;
  }
  .paket-soal-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 12px;
    font-size: 12px;
    color: #94a3b8;
  }
  .paket-soal-meta span { display: inline-flex; align-items: center; gap: 5px; }
  .paket-soal-meta i { font-size: 12px; }
  .paket-soal-badge {
    flex-shrink: 0;
    background: #fef3c7;
    color: #92400e;
    font-size: 11px;
    font-weight: 700;
    padding: 5px 14px;
    border-radius: 100px;
    white-space: nowrap;
  }
  .paket-soal-arrow {
    flex-shrink: 0;
    color: #cbd5e1;
    font-size: 18px;
  }
</style>
<h1 class="page-heading h2">{{ $materi->judul }}</h1>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <?php if ($materi->gambar != "") { ?>
        <div class="hideGambar" id="wrap-gambar">
          <img src="{{ url('/img/materi/'.$materi->gambar) }}" alt="img" style="width:100%;">
        </div>
        <div class="showGambar">Tampil Gambar</div>
      <?php } ?>
      <div class="card-block">
        {!! $materi->isi !!}
        <hr>
        <?php if ($soal_latihans != "EM") { ?>
          <div class="row">
            <div class="col-md-12">
            <div class="paket-soal-section-title">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Paket Soal Latihan
            </div>
            @if($soal_latihans->count())
            @foreach($soal_latihans as $soal)
              <a href="{{ url('/latihan/kerjakan/'.$soal->id) }}" class="paket-soal-card">
                <div class="paket-soal-icon">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </div>
                <div class="paket-soal-body">
                  <div class="paket-soal-materi">{{ $materi->judul }}</div>
                  <div class="paket-soal-judul">{{ $soal->paket }}</div>
                  <div class="paket-soal-meta">
                    <span><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->nama }}</span>
                    <?php if (!empty($soal->waktu)) { ?>
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ round($soal->waktu / 60) }} menit</span>
                    <?php } ?>
                    <?php if (!empty($soal->kkm)) { ?>
                    <span><i class="fa fa-flag-checkered" aria-hidden="true"></i> KKM: {{ $soal->kkm }}</span>
                    <?php } ?>
                  </div>
                </div>
                <span class="paket-soal-badge">{{ $materi->judul }}</span>
                <i class="fa fa-chevron-right paket-soal-arrow" aria-hidden="true"></i>
              </a>
            @endforeach
            @else
              <div class="alert alert-danger" style="margin-bottom: 0">
                Belum ada soal latihan.
              </div>
            @endif
            </div>
          </div>
        <?php } ?>
        <hr class="clearfix">
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header bg-white">
        <div class="media">
          <?php if ($materi->gambar_user != "") { ?>
            <div class="media-left media-middle">
              <img src="{{ url('/img/'.$materi->gambar_user) }}" alt="img" width="50" class="img-circle">
            </div>
          <?php } ?>
          <div class="media-body media-middle">
            <h4 class="card-title"><a href="#">{{ Auth::user()->nama }}</a></h4>
            <p class="card-subtitle">
              <?php if ($materi->jenis_user == 'A') {
                echo "Admin";
              }else{
                echo "Guru";
              } ?>
            </p>
          </div>
        </div>
      </div>
      <div class="card-block">
        <!-- <p>Having over 12 years exp. Adrian is one of the lead UI designers in the industry Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, aut.</p> -->
      </div>
    </div>
  </div>
</div>
<script src="{{ url('/assets/assets/vendor/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $(".showGambar").click(function(){
    $(this).hide();
    $("#wrap-gambar").removeClass('hideGambar').hide().fadeIn(350);
  });
});
</script>
@endsection
