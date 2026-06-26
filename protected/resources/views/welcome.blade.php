<?php use Carbon\Carbon; ?>
@extends('layouts/welcome')
@section('content')
<?php
include(app_path() . '/functions/koneksi.php');
$conn = new mysqli($hostdb, $userdb, $passdb, $namedb);
$sql = "SELECT * FROM schools";
$result = $conn->query($sql);
$namasekolah = ""; $logosekolah = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $namasekolah = $row["nama"];
        $logosekolah = $row['logo'];
    }
}
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body, .cbt-page { min-height: 100vh; font-family: 'Inter','Segoe UI',sans-serif; background: #f0f4ff; }
.cbt-page { position: relative; display: flex; flex-direction: column; min-height: 100vh; overflow: hidden; }

/* BLOBS */
.blob { position: fixed; border-radius: 50%; filter: blur(80px); opacity: 0.5; pointer-events: none; z-index: 0; }
.blob-1 { width:500px;height:500px;background:radial-gradient(circle,#bfdbfe,#dbeafe);top:-150px;left:-150px;animation:float1 10s ease-in-out infinite; }
.blob-2 { width:400px;height:400px;background:radial-gradient(circle,#fef9c3,#fef3c7);bottom:-100px;right:-100px;animation:float2 12s ease-in-out infinite; }
.blob-3 { width:300px;height:300px;background:radial-gradient(circle,#e0e7ff,#c7d2fe);top:50%;right:10%;animation:float1 9s ease-in-out infinite reverse; }
@keyframes float1{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(30px,20px) scale(1.05)}}
@keyframes float2{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(-20px,-30px) scale(1.05)}}

/* NAVBAR */
.cbt-nav{position:relative;z-index:100;display:flex;align-items:center;justify-content:space-between;padding:18px 40px;background:rgba(255,255,255,0.7);backdrop-filter:blur(20px);border-bottom:1px solid rgba(99,102,241,0.08);box-shadow:0 1px 20px rgba(99,102,241,0.06)}
.cbt-nav-brand{display:flex;align-items:center;gap:10px;font-size:15px;font-weight:700;color:#1e3a8a}
.cbt-nav-brand img{width:32px;height:32px;border-radius:8px;object-fit:cover}
.cbt-nav-links{display:flex;align-items:center;gap:8px}
.cbt-nav-link{padding:7px 16px;border-radius:8px;font-size:13px;font-weight:500;color:#475569;text-decoration:none;transition:all 0.2s;cursor:pointer;border:none;background:none;font-family:inherit}
.cbt-nav-link:hover{background:rgba(99,102,241,0.08);color:#3730a3;text-decoration:none}

/* MAIN */
.cbt-main{position:relative;z-index:10;flex:1;display:flex;align-items:center;justify-content:center;padding:40px 20px}

/* CARD */
.cbt-card{background:rgba(255,255,255,0.85);backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,0.9);border-radius:28px;padding:52px 48px;text-align:center;max-width:460px;width:100%;box-shadow:0 4px 6px rgba(99,102,241,0.04),0 20px 60px rgba(99,102,241,0.1),0 0 0 1px rgba(255,255,255,0.6) inset}

/* LOGO */
.cbt-logo-wrap{position:relative;display:inline-flex;align-items:center;justify-content:center;margin-bottom:28px}
.cbt-logo{position:relative;z-index:2;width:100px;height:100px;border-radius:50%;object-fit:cover;border:3px solid #fff;box-shadow:0 4px 20px rgba(99,102,241,0.2)}
.cbt-logo-fallback{position:relative;z-index:2;width:100px;height:100px;border-radius:50%;background:linear-gradient(135deg,#dbeafe,#e0e7ff);border:3px solid #fff;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 20px rgba(99,102,241,0.2)}
.cbt-logo-fallback i{font-size:44px;color:#3b82f6}

/* BADGE */
.cbt-badge{display:inline-flex;align-items:center;gap:6px;background:linear-gradient(135deg,#eff6ff,#fefce8);border:1px solid #bfdbfe;border-radius:100px;padding:5px 16px;margin-bottom:16px;font-size:11px;font-weight:600;color:#1d4ed8;letter-spacing:1.2px;text-transform:uppercase}
.cbt-badge-dot{width:6px;height:6px;background:#f59e0b;border-radius:50%;box-shadow:0 0 6px #f59e0b;animation:blink 2s ease-in-out infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:0.2}}

.cbt-school{font-size:19px;font-weight:800;color:#1e3a8a;margin-bottom:6px;line-height:1.3}
.cbt-subtitle{font-size:12.5px;color:#94a3b8;margin-bottom:32px}

.cbt-divider{display:flex;align-items:center;gap:12px;margin-bottom:24px}
.cbt-divider-line{flex:1;height:1px;background:linear-gradient(90deg,transparent,#e2e8f0,transparent)}
.cbt-divider-text{font-size:11px;color:#cbd5e1;font-weight:500;letter-spacing:1px;text-transform:uppercase;white-space:nowrap}

/* TOMBOL */
.cbt-btn-group{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:24px}
.cbt-btn{position:relative;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;padding:20px 16px;border-radius:16px;border:none;cursor:pointer;text-decoration:none;font-family:inherit;transition:all 0.25s cubic-bezier(.4,0,.2,1)}
.cbt-btn:hover{transform:translateY(-3px);text-decoration:none}
.cbt-btn:active{transform:translateY(-1px)}
.cbt-btn-guru{background:linear-gradient(135deg,#1d4ed8,#3b82f6);box-shadow:0 4px 15px rgba(59,130,246,0.3);color:#fff}
.cbt-btn-guru:hover{box-shadow:0 8px 25px rgba(59,130,246,0.45);color:#fff}
.cbt-btn-guru .cbt-btn-icon{background:rgba(255,255,255,0.2);color:#fff}
.cbt-btn-siswa{background:linear-gradient(135deg,#d97706,#f59e0b);box-shadow:0 4px 15px rgba(245,158,11,0.3);color:#fff}
.cbt-btn-siswa:hover{box-shadow:0 8px 25px rgba(245,158,11,0.45);color:#fff}
.cbt-btn-siswa .cbt-btn-icon{background:rgba(255,255,255,0.2);color:#fff}
.cbt-btn-icon{width:42px;height:42px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:2px}
.cbt-btn-label{font-size:12px;font-weight:700;letter-spacing:1px;text-transform:uppercase}
.cbt-btn-desc{font-size:10px;opacity:0.8;font-weight:400}

.cbt-info{display:flex;align-items:center;justify-content:center;gap:6px;background:linear-gradient(135deg,#eff6ff,#fefce8);border:1px solid #e0e7ff;border-radius:10px;padding:10px 16px;font-size:11.5px;color:#475569}
.cbt-info i{font-size:14px;color:#3b82f6}
.cbt-footer{position:relative;z-index:10;text-align:center;padding:20px;font-size:11px;color:#94a3b8}

/* ============ MODAL ============ */
.modal-overlay{display:none;position:fixed;inset:0;z-index:999;background:rgba(15,23,60,0.45);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);align-items:center;justify-content:center}
.modal-overlay.active{display:flex;animation:fadeIn 0.2s ease}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}

.login-card{background:rgba(255,255,255,0.97);backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,0.9);border-radius:24px;padding:40px 36px;width:100%;max-width:380px;box-shadow:0 20px 60px rgba(30,58,138,0.15);animation:slideUp 0.25s cubic-bezier(.4,0,.2,1);position:relative}
@keyframes slideUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}

.login-close{position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:8px;border:none;background:rgba(99,102,241,0.08);color:#64748b;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px;transition:all 0.2s}
.login-close:hover{background:rgba(239,68,68,0.1);color:#ef4444}

.login-header{text-align:center;margin-bottom:28px}
.login-icon{width:56px;height:56px;border-radius:16px;display:inline-flex;align-items:center;justify-content:center;margin-bottom:14px}
.login-icon-guru{background:linear-gradient(135deg,#1d4ed8,#3b82f6);box-shadow:0 4px 15px rgba(59,130,246,0.35)}
.login-icon-siswa{background:linear-gradient(135deg,#d97706,#f59e0b);box-shadow:0 4px 15px rgba(245,158,11,0.35)}
.login-icon i{font-size:26px;color:#fff}

.login-title-guru{font-size:18px;font-weight:800;color:#1e3a8a;margin-bottom:4px}
.login-title-siswa{font-size:18px;font-weight:800;color:#92400e;margin-bottom:4px}
.login-subtitle{font-size:12px;color:#94a3b8}

.login-form-group{margin-bottom:16px}
.login-label{display:block;font-size:12px;font-weight:600;color:#475569;margin-bottom:6px;letter-spacing:0.3px}
.login-input{width:100%;padding:11px 14px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:14px;color:#1e293b;background:#f8fafc;font-family:inherit;transition:all 0.2s;outline:none}
.login-input:focus{border-color:#3b82f6;background:#fff;box-shadow:0 0 0 3px rgba(59,130,246,0.1)}
.login-input-siswa:focus{border-color:#f59e0b;box-shadow:0 0 0 3px rgba(245,158,11,0.1)}
.login-input::placeholder{color:#cbd5e1}

.login-remember{display:flex;align-items:center;gap:8px;margin-bottom:20px;cursor:pointer;font-size:13px;color:#64748b}
.login-remember input[type="checkbox"]{width:15px;height:15px;cursor:pointer}
.login-remember input[type="checkbox"].guru-check{ accent-color:#3b82f6}
.login-remember input[type="checkbox"].siswa-check{ accent-color:#f59e0b}

.login-error{display:none;background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:10px 14px;font-size:12px;color:#dc2626;margin-bottom:16px}

.login-submit{width:100%;padding:13px;border-radius:12px;border:none;color:#fff;font-size:14px;font-weight:700;font-family:inherit;cursor:pointer;transition:all 0.25s;letter-spacing:0.3px}
.login-submit-guru{background:linear-gradient(135deg,#1d4ed8,#3b82f6);box-shadow:0 4px 15px rgba(59,130,246,0.3)}
.login-submit-guru:hover{box-shadow:0 6px 20px rgba(59,130,246,0.45);transform:translateY(-1px)}
.login-submit-siswa{background:linear-gradient(135deg,#d97706,#f59e0b);box-shadow:0 4px 15px rgba(245,158,11,0.3)}
.login-submit-siswa:hover{box-shadow:0 6px 20px rgba(245,158,11,0.45);transform:translateY(-1px)}
.login-submit:active{transform:translateY(0)}

.login-footer{text-align:center;margin-top:16px;font-size:12px;color:#94a3b8}

/* Tab switcher */
.login-tabs{display:flex;background:#f1f5f9;border-radius:12px;padding:4px;margin-bottom:24px;gap:4px}
.login-tab{flex:1;padding:8px;border:none;border-radius:9px;font-size:12px;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.2s;background:transparent;color:#94a3b8}
.login-tab.active-guru{background:#fff;color:#1d4ed8;box-shadow:0 2px 8px rgba(59,130,246,0.15)}
.login-tab.active-siswa{background:#fff;color:#d97706;box-shadow:0 2px 8px rgba(245,158,11,0.15)}

.pw-wrap{position:relative}
.pw-toggle{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#94a3b8;display:flex;align-items:center;padding:0}

@media(max-width:480px){
  .cbt-card{padding:36px 20px}
  .cbt-btn-group{grid-template-columns:1fr}
  .cbt-nav{padding:14px 20px}
  .cbt-nav-links{display:none}
  .login-card{padding:32px 24px;margin:0 16px}
}
</style>

<div class="cbt-page">
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>

  <!-- NAVBAR -->
 <!-- 
  <nav class="cbt-nav">
    <div class="cbt-nav-brand">
      @if($logosekolah)
        <img src="{{ url('img/'.$logosekolah) }}" alt="Logo">
      @endif
      {{ $namasekolah ?: 'CBT Online' }}
    </div>
    <div class="cbt-nav-links">
      <button class="cbt-nav-link" onclick="openModal('guru')">🔑 Guru</button>
      <button class="cbt-nav-link" onclick="openModal('siswa')">🎓 Siswa</button>
    </div>
  </nav>
-->

  <!-- KONTEN UTAMA -->
  <div class="cbt-main">
    <div class="cbt-card">

      <div class="cbt-logo-wrap">
        @if($logosekolah)
          <img src=" https://cdn-sdotid.adg.id/images/cc7d170c-fd31-4d63-9c70-251e720ea688_640x640.png " alt="Logo" class="cbt-logo">
        @else
          <div class="cbt-logo-fallback">
            <i class="material-icons">school</i>
          </div>
        @endif
      </div>

      <!-- <div class="cbt-badge">
        <span class="cbt-badge-dot"></span>
        Sistem Aktif
      </div> -->

      <div class="cbt-school">{{ $namasekolah ?: 'CBT Online' }}</div>
      <div class="cbt-subtitle">Computer Based Test &mdash; Ujian Berbasis Komputer</div>

      <div class="cbt-divider">
        <div class="cbt-divider-line"></div>
        <div class="cbt-divider-text">Masuk sebagai</div>
        <div class="cbt-divider-line"></div>
      </div>

      <div class="cbt-btn-group">
        <button onclick="openModal('guru')" class="cbt-btn cbt-btn-guru">
          <div class="cbt-btn-icon">
            <i class="material-icons" style="font-size:22px;">admin_panel_settings</i>
          </div>
          <span class="cbt-btn-label">Guru</span>
          <span class="cbt-btn-desc">Administrator</span>
        </button>
        <button onclick="openModal('siswa')" class="cbt-btn cbt-btn-siswa">
          <div class="cbt-btn-icon">
            <i class="material-icons" style="font-size:22px;">school</i>
          </div>
          <span class="cbt-btn-label">Siswa</span>
          <span class="cbt-btn-desc">Peserta Ujian</span>
        </button>
      </div>

      <div class="cbt-info">
        <i class="material-icons">info_outline</i>
        Gunakan email dan password yang diberikan oleh administrator
      </div>

    </div>
  </div>

  <div class="cbt-footer">
    &copy; {{ date('Y') }} {{ $namasekolah ?: 'CBT System' }} &mdash; CBT v1.4.5
  </div>
</div>

<!-- ============ MODAL LOGIN ============ -->
<div class="modal-overlay" id="modalLogin" onclick="closeOnOverlay(event)">
  <div class="login-card">

    <button class="login-close" onclick="closeModal()">
      <i class="material-icons" style="font-size:18px;">close</i>
    </button>

    <!-- TAB SWITCHER -->
    <div class="login-tabs">
      <button class="login-tab" id="tab-guru" onclick="switchTab('guru')">
        🔑 &nbsp;Login Guru
      </button>
      <button class="login-tab" id="tab-siswa" onclick="switchTab('siswa')">
        🎓 &nbsp;Login Siswa
      </button>
    </div>

    <!-- HEADER -->
    <div class="login-header">
      <div class="login-icon" id="modal-icon">
        <i class="material-icons" id="modal-icon-i">admin_panel_settings</i>
      </div>
      <div id="modal-title" class="login-title-guru">Login Guru</div>
      <div class="login-subtitle">Masukkan email dan password Anda</div>
    </div>

    <!-- ERROR -->
    <div class="login-error" id="loginError">
      <i class="material-icons" style="font-size:14px;vertical-align:middle;">error_outline</i>
      Email atau password salah. Silakan coba lagi.
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ url('/auth/login') }}" id="formLogin">
      {!! csrf_field() !!}
      <input type="hidden" name="role" id="inputRole" value="guru">

      <div class="login-form-group">
        <label class="login-label">Email</label>
        <input type="email" name="email" id="inputEmail" class="login-input" placeholder="contoh@email.com" required>
      </div>

      <div class="login-form-group">
        <label class="login-label">Password</label>
        <div class="pw-wrap">
          <input type="password" name="password" id="inputPassword" class="login-input" placeholder="••••••••" required style="padding-right:44px;">
          <button type="button" class="pw-toggle" onclick="togglePw()">
            <i class="material-icons" id="eyeIcon" style="font-size:18px;">visibility</i>
          </button>
        </div>
      </div>

      <label class="login-remember">
        <input type="checkbox" name="remember" id="chkRemember" value="1" class="guru-check">
        Ingat saya
      </label>

      <button type="submit" class="login-submit login-submit-guru" id="btnSubmit">
        Masuk &rarr;
      </button>
    </form>

    <div class="login-footer">Lupa password? Hubungi administrator</div>
  </div>
</div>

<script>
var currentTab = 'guru';

function openModal(role) {
  currentTab = role;
  document.getElementById('modalLogin').classList.add('active');
  applyTab(role);
  setTimeout(function(){ document.getElementById('inputEmail').focus(); }, 150);
}

function closeModal() {
  document.getElementById('modalLogin').classList.remove('active');
}

function closeOnOverlay(e) {
  if (e.target === document.getElementById('modalLogin')) closeModal();
}

document.addEventListener('keydown', function(e){
  if (e.key === 'Escape') closeModal();
});

function switchTab(role) {
  currentTab = role;
  applyTab(role);
}

function applyTab(role) {
  var isGuru = (role === 'guru');

  // Tab aktif
  document.getElementById('tab-guru').className  = 'login-tab' + (isGuru ? ' active-guru' : '');
  document.getElementById('tab-siswa').className = 'login-tab' + (!isGuru ? ' active-siswa' : '');

  // Icon
  document.getElementById('modal-icon').className = 'login-icon ' + (isGuru ? 'login-icon-guru' : 'login-icon-siswa');
  document.getElementById('modal-icon-i').textContent = isGuru ? 'admin_panel_settings' : 'school';

  // Title
  document.getElementById('modal-title').className = isGuru ? 'login-title-guru' : 'login-title-siswa';
  document.getElementById('modal-title').textContent = isGuru ? 'Login Guru' : 'Login Siswa';

  // Input focus color
  var inp = document.getElementById('inputPassword');
  inp.className = 'login-input' + (!isGuru ? ' login-input-siswa' : '');
  document.getElementById('inputEmail').className = 'login-input' + (!isGuru ? ' login-input-siswa' : '');

  // Checkbox
  document.getElementById('chkRemember').className = isGuru ? 'guru-check' : 'siswa-check';

  // Submit button
  document.getElementById('btnSubmit').className = 'login-submit ' + (isGuru ? 'login-submit-guru' : 'login-submit-siswa');

  // Role hidden input
  document.getElementById('inputRole').value = role;
}

function togglePw() {
  var inp  = document.getElementById('inputPassword');
  var icon = document.getElementById('eyeIcon');
  if (inp.type === 'password') {
    inp.type = 'text';
    icon.textContent = 'visibility_off';
  } else {
    inp.type = 'password';
    icon.textContent = 'visibility';
  }
}

@if(session('login_error') || (isset($errors) && $errors->has('email')))
  window.addEventListener('DOMContentLoaded', function(){
    openModal('guru');
    document.getElementById('loginError').style.display = 'block';
  });
@endif
</script>
@endsection
