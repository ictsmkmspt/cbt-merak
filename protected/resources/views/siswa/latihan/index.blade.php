@extends('layouts/siswa_baru')
@section('title', 'Latihan Materi')
@section('breadcrumb')
  <li><a href="{{ url('/siswa') }}">Home</a></li>
  <li class="active">Latihan Materi</li>
@endsection
@section('content')
<style type="text/css" media="screen">
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

.latihan-wrap { font-family: 'Inter', sans-serif; }

/* ===== HEADER BANNER ===== */
.latihan-header {
  background: linear-gradient(135deg, #1d4ed8 0%, #3b82f6 60%, #60a5fa 100%);
  border-radius: 16px;
  padding: 26px 32px;
  color: #fff;
  margin-bottom: 28px;
  box-shadow: 0 8px 24px rgba(59,130,246,0.3);
}
.latihan-header-title {
  font-size: 22px;
  font-weight: 800;
  margin-bottom: 6px;
}
.latihan-header-title i { margin-right: 8px; }
.latihan-header-desc {
  font-size: 13px;
  opacity: 0.85;
}

/* ===== SECTION TITLE ===== */
.latihan-section-title {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  margin: 0 0 16px;
  padding-bottom: 12px;
  border-bottom: 1px solid #e5e9f2;
}
.latihan-section-title.soal { color: #92400e; }
.latihan-section-title.soal i { color: #f59e0b; }
.latihan-section-title.materi { color: #1e3a8a; }
.latihan-section-title.materi i { color: #3b82f6; }

/* ===== PAKET SOAL LATIHAN CARD ===== */
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

/* ===== MATERI PEMBELAJARAN GRID ===== */
.materi-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 18px;
  margin-bottom: 24px;
}
.materi-card {
  display: block;
  background: #fff;
  border: 1px solid #eef0f4;
  border-radius: 14px;
  overflow: hidden;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
.materi-card:hover {
  text-decoration: none;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  transform: translateY(-2px);
}
.materi-thumb {
  height: 140px;
  background: linear-gradient(135deg, #eff6ff, #dbeafe);
  display: flex; align-items: center; justify-content: center;
  overflow: hidden;
}
.materi-thumb img { width: 100%; height: 100%; object-fit: cover; }
.materi-thumb i { font-size: 36px; color: #93c5fd; }
.materi-body { padding: 14px 16px; }
.materi-judul {
  font-size: 15px;
  font-weight: 700;
  color: #1f2937;
  margin-bottom: 4px;
}
.materi-author {
  font-size: 12px;
  color: #94a3b8;
  display: flex; align-items: center; gap: 5px;
}

.latihan-empty {
  background: #fff;
  border: 1px dashed #dbe1ea;
  border-radius: 12px;
  padding: 18px;
  color: #94a3b8;
  font-size: 13px;
  text-align: center;
  margin-bottom: 24px;
}
</style>

<div class="col-md-12 latihan-wrap">

  <!-- HEADER -->
  <div class="latihan-header">
    <div class="latihan-header-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Latihan Materi</div>
    <div class="latihan-header-desc">Baca materi dan kerjakan soal latihan untuk mempersiapkan diri sebelum ujian.</div>
  </div>

  <!-- PAKET SOAL LATIHAN -->
  <div class="latihan-section-title soal">
    <i class="fa fa-list-alt" aria-hidden="true"></i> Paket Soal Latihan
  </div>
  @if($soal_latihans->count())
    @foreach($soal_latihans as $soal)
      <a href="{{ url('/latihan/kerjakan/'.$soal->id) }}" class="paket-soal-card">
        <div class="paket-soal-icon">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </div>
        <div class="paket-soal-body">
          <?php if (!empty($soal->judul_materi)) { ?>
          <div class="paket-soal-materi">{{ $soal->judul_materi }}</div>
          <?php } ?>
          <div class="paket-soal-judul">{{ $soal->paket }}</div>
          <div class="paket-soal-meta">
            <span><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $soal->nama_guru }}</span>
            <?php if (!empty($soal->waktu)) { ?>
            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ round($soal->waktu / 60) }} menit</span>
            <?php } ?>
            <?php if (!empty($soal->kkm)) { ?>
            <span><i class="fa fa-flag-checkered" aria-hidden="true"></i> KKM: {{ $soal->kkm }}</span>
            <?php } ?>
          </div>
        </div>
        <?php if (!empty($soal->judul_materi)) { ?>
        <span class="paket-soal-badge">{{ $soal->judul_materi }}</span>
        <?php } ?>
        <i class="fa fa-chevron-right paket-soal-arrow" aria-hidden="true"></i>
      </a>
    @endforeach
  @else
    <div class="latihan-empty">
      <i class="fa fa-info-circle" aria-hidden="true"></i> Belum ada paket soal latihan.
    </div>
  @endif

  <!-- MATERI PEMBELAJARAN -->
  <div class="latihan-section-title materi">
    <i class="fa fa-book" aria-hidden="true"></i> Materi Pembelajaran
  </div>
  @if($materis->count())
    <div class="materi-grid">
    @foreach($materis as $materi)
      <a href="{{ url('/latihan/read/'.$materi->id.'/'.str_slug($materi->judul)) }}" class="materi-card">
        <div class="materi-thumb">
          <?php if ($materi->gambar != "") { ?>
            <img src="{{ url('/img/materi/'.$materi->gambar) }}" alt="img">
          <?php }else{ ?>
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
          <?php } ?>
        </div>
        <div class="materi-body">
          <div class="materi-judul">{{ $materi->judul }}</div>
          <div class="materi-author"><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;</div>
        </div>
      </a>
    @endforeach
    </div>
    @if ($materis->lastPage() > 1)
    <ul class="pagination pagination-sm">
      <li class="{{ ($materis->currentPage() == 1) ? ' page-item disabled' : 'page-item' }}">
        <a class="page-link" href="{{ $materis->url(1) }}">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      @for ($i = 1; $i <= $materis->lastPage(); $i++)
        <li class="{{ ($materis->currentPage() == $i) ? ' page-item active' : 'page-item' }}">
          <a class="page-link" href="{{ $materis->url($i) }}">{{ $i }}</a>
        </li>
      @endfor
      <li class="{{ ($materis->currentPage() == $materis->lastPage()) ? ' page-item disabled' : 'page-item' }}">
        <a class="page-link" href="{{ $materis->url($materis->currentPage()+1) }}">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
    @endif
  @else
    <div class="latihan-empty">
      <i class="fa fa-info-circle" aria-hidden="true"></i> Belum ada materi pembelajaran.
    </div>
  @endif

</div>
@endsection
