<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="https://cdn-sdotid.adg.id/images/cc7d170c-fd31-4d63-9c70-251e720ea688_640x640.png">
  <title>{{ $namasekolah ?? 'CBT Online' }}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ url('/assets/mdl/material.min.css') }}">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #f0f4ff; min-height: 100vh; }
  </style>
</head>
<body>
  @yield('content')
  <script src="{{ url('/assets/assets/vendor/jquery.min.js') }}"></script>
  <script src="{{ url('/assets/mdl/material.min.js') }}"></script>
</body>
</html>
