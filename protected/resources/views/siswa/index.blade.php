@extends('layouts/siswa_baru')
@section('title', 'Dashboard Siswa')
@section('breadcrumb')
  <li><a href="{{ url('/siswa') }}">Home</a></li>
  <li class="active">Dashboard</li>
@endsection
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

.siswa-wrap { padding: 10px 0 30px; font-family: 'Inter', sans-serif; }

/* ===== WELCOME CARD ===== */
.welcome-card {
  background: linear-gradient(135deg, #1d4ed8 0%, #3b82f6 60%, #60a5fa 100%);
  border-radius: 20px;
  padding: 32px 36px;
  color: #fff;
  margin-bottom: 24px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 8px 32px rgba(59,130,246,0.35);
}
.welcome-card::before {
  content: '';
  position: absolute;
  top: -60px; right: -60px;
  width: 220px; height: 220px;
  background: rgba(255,255,255,0.06);
  border-radius: 50%;
}
.welcome-card::after {
  content: '';
  position: absolute;
  bottom: -40px; right: 80px;
  width: 140px; height: 140px;
  background: rgba(255,255,255,0.04);
  border-radius: 50%;
}
.welcome-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.25);
  border-radius: 100px;
  padding: 4px 14px;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 14px;
}
.welcome-badge-dot {
  width: 6px; height: 6px;
  background: #fbbf24;
  border-radius: 50%;
  box-shadow: 0 0 6px #fbbf24;
  animation: blink 2s ease-in-out infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

.welcome-greeting {
  font-size: 13px;
  opacity: 0.8;
  margin-bottom: 4px;
}
.welcome-name {
  font-size: 26px;
  font-weight: 800;
  margin-bottom: 10px;
  letter-spacing: 0.3px;
}
.welcome-text {
  font-size: 13px;
  opacity: 0.75;
  line-height: 1.6;
  max-width: 480px;
}

/* ===== MENU CARDS ===== */
.menu-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin-bottom: 24px;
}
.menu-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 12px;
  padding: 28px 16px;
  border-radius: 16px;
  text-decoration: none;
  transition: all 0.25s cubic-bezier(.4,0,.2,1);
  position: relative;
  overflow: hidden;
  border: 1px solid transparent;
}
.menu-card:hover {
  transform: translateY(-4px);
  text-decoration: none;
  box-shadow: 0 12px 32px rgba(0,0,0,0.12);
}
.menu-card:active { transform: translateY(-2px); }

/* Soal Ujian - Biru */
.menu-card-soal {
  background: linear-gradient(135deg, #eff6ff, #dbeafe);
  border-color: #bfdbfe;
}
.menu-card-soal:hover { background: linear-gradient(135deg, #dbeafe, #bfdbfe); }
.menu-card-soal .menu-icon { background: linear-gradient(135deg, #1d4ed8, #3b82f6); }
.menu-card-soal .menu-label { color: #1e3a8a; }
.menu-card-soal .menu-desc { color: #3b82f6; }

/* Latihan Materi - Kuning */
.menu-card-latihan {
  background: linear-gradient(135deg, #fffbeb, #fef3c7);
  border-color: #fde68a;
}
.menu-card-latihan:hover { background: linear-gradient(135deg, #fef3c7, #fde68a); }
.menu-card-latihan .menu-icon { background: linear-gradient(135deg, #d97706, #f59e0b); }
.menu-card-latihan .menu-label { color: #92400e; }
.menu-card-latihan .menu-desc { color: #d97706; }

/* Hasil Ujian - Hijau */
.menu-card-hasil {
  background: linear-gradient(135deg, #f0fdf4, #dcfce7);
  border-color: #bbf7d0;
}
.menu-card-hasil:hover { background: linear-gradient(135deg, #dcfce7, #bbf7d0); }
.menu-card-hasil .menu-icon { background: linear-gradient(135deg, #15803d, #22c55e); }
.menu-card-hasil .menu-label { color: #14532d; }
.menu-card-hasil .menu-desc { color: #16a34a; }

.menu-icon {
  width: 54px; height: 54px;
  border-radius: 16px;
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.menu-icon i { font-size: 26px; color: #fff; }
.menu-label {
  font-size: 13px;
  font-weight: 700;
  text-align: center;
  letter-spacing: 0.2px;
}
.menu-desc {
  font-size: 11px;
  text-align: center;
  font-weight: 500;
  opacity: 0.8;
}

/* ===== INFO CARD ===== */
.info-card {
  background: rgba(255,255,255,0.8);
  border: 1px solid #e0e7ff;
  border-radius: 14px;
  padding: 16px 20px;
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 16px;
  backdrop-filter: blur(8px);
}
.info-card-icon {
  width: 38px; height: 38px;
  border-radius: 10px;
  background: linear-gradient(135deg, #eff6ff, #dbeafe);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.info-card-icon i { font-size: 18px; color: #3b82f6; }
.info-card-text { font-size: 12.5px; color: #475569; line-height: 1.5; }
.info-card-text b { color: #1e3a8a; }

@media (max-width: 600px) {
  .menu-grid { grid-template-columns: 1fr 1fr; }
  .welcome-name { font-size: 20px; }
  .welcome-card { padding: 24px 20px; }
}
</style>

<div class="col-md-12 siswa-wrap">

  <!-- WELCOME CARD -->
  <div class="welcome-card">
    <div class="welcome-badge">
      <span class="welcome-badge-dot"></span>
      Selamat Datang
    </div>
    <div class="welcome-greeting">Assalamu'alaikum,</div>
    <div class="welcome-name">{{ Auth::user()->nama }}</div>
    <div class="welcome-text">
      Aplikasi CBT ini dirancang untuk memudahkan proses ujian berbasis komputer.
      Ikutilah instruksi Guru untuk mengoperasikan aplikasi dengan benar.
    </div>
  </div>

  <!-- MENU GRID -->
  <div class="menu-grid">

    <a href="{{ url('/soal-siswa') }}" class="menu-card menu-card-soal">
      <div class="menu-icon">
        <i class="fa fa-list-alt"></i>
      </div>
      <div class="menu-label">Soal Ujian</div>
      <div class="menu-desc">Mulai ujian sekarang</div>
    </a>

    <a href="{{ url('/latihan') }}" class="menu-card menu-card-latihan">
      <div class="menu-icon">
        <i class="fa fa-pencil-square-o"></i>
      </div>
      <div class="menu-label">Latihan Materi</div>
      <div class="menu-desc">Persiapkan dirimu</div>
    </a>

    <a href="{{ url('/hasil-siswa') }}" class="menu-card menu-card-hasil">
      <div class="menu-icon">
        <i class="fa fa-book"></i>
      </div>
      <div class="menu-label">Hasil Ujian</div>
      <div class="menu-desc">Lihat nilai kamu</div>
    </a>

  </div>

  <!-- INFO -->
  <div class="info-card">
    <div class="info-card-icon">
      <i class="fa fa-info-circle"></i>
    </div>
    <div class="info-card-text">
      <b>Petunjuk:</b> Pastikan koneksi internet stabil sebelum memulai ujian.
      Jangan menutup browser atau menekan tombol F5 saat ujian berlangsung.
    </div>
  </div>

</div>
@endsection
