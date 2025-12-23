<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
      :root{--blue:#2b8ef6;--fb:#1877f2;--tw:#1da1f2;--gm:#db4437}
      body{font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:#f3f4f6; margin:0; min-height:100vh; display:flex;align-items:center;justify-content:center}
      /* balanced modal spacing and gutters for both panels */
      .modal{width:760px;max-width:95%;min-height:320px;background:#fff;border-radius:10px;display:flex;overflow:hidden;box-shadow:0 12px 36px rgba(2,6,23,0.08);position:relative}
      .left{flex:1;padding:32px 44px;display:flex;flex-direction:column;justify-content:center}
      .form-wrapper{max-width:420px}
      .right{flex:0 0 320px;display:flex;align-items:center;justify-content:center;padding:20px;background:#f7f7f8}
      .right-inner{width:100%;height:100%;border-radius:8px;background-image:url('{{ asset("/images/pexels-tranmautritam-326503.jpg") }}');background-size:cover;background-position:center}
      .close{position:absolute;left:20px;top:20px;width:28px;height:28px;border-radius:50%;background:rgba(0,0,0,0.04);display:flex;align-items:center;justify-content:center;font-weight:700}
      h2{margin:0 0 8px;font-size:20px;color:#111827}
      p.lead{margin:0 0 12px;color:#6b7280}

      .field{display:flex;align-items:center;border:1px solid #e6e8eb;padding:10px;border-radius:6px;margin-bottom:12px;background:#fff}
      .field svg{width:20px;height:20px;margin-right:12px;opacity:.75;flex-shrink:0}
      .field input{border:0;outline:0;flex:1;font-size:14px}
      .password-wrap{position:relative}
      .toggle-pass{cursor:pointer;position:absolute;right:12px;top:50%;transform:translateY(-50%);opacity:.7}

      .actions{display:flex;align-items:center;justify-content:space-between;margin-top:8px}
      .remember{display:flex;align-items:center;gap:8px;color:#6b7280}
      .btn-primary{background:var(--blue);color:#fff;padding:10px 18px;border-radius:6px;border:0;cursor:pointer}
      .btn-full{display:block;width:100%;padding:10px 16px;border-radius:6px}

      .divider{display:flex;align-items:center;margin:18px 0;color:#9ca3af;font-size:13px}
      .divider:before,.divider:after{content:'';flex:1;height:1px;background:#e5e7eb;margin:0 12px}

      .socials{display:flex;flex-direction:column;gap:10px}
      .social{display:flex;align-items:center;gap:12px;padding:10px;border-radius:6px;color:#fff;text-decoration:none;font-weight:600}
      .fb{background:var(--fb)} .tw{background:var(--tw)} .gm{background:var(--gm)}

      .links{display:flex;gap:12px;margin-top:8px}
      .links a{color:#3b82f6;text-decoration:none;font-size:14px}

      .errors{color:#b91c1c;margin-bottom:8px}
    </style>
  </head>
  <body>
    <div style="position:relative">
      <div class="modal">
        <div class="left">
            <div style="display:flex;align-items:center;justify-content:space-between">
            <div>
              <h2>Sign in</h2>
              <p class="lead">Welcome back! Login to your account</p>
            </div>
            <div class="close">×</div>
          </div>

          @if(session('status'))
            <div style="color:green;margin-bottom:8px">{{ session('status') }}</div>
          @endif

          @if($errors->any())
            <div class="errors">
              <ul style="margin:0;padding-left:18px">
                @foreach($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="form-wrapper">
          <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <label class="field" for="email">
              {{-- clearer user icon for username/email field --}}
              <svg viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M6 20c1.5-3 4.5-4 6-4s4.5 1 6 4"/></svg>
              <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Username or email" required autofocus>
            </label>

            <label class="field password-wrap">
              <svg viewBox="0 0 24 24" fill="none"><path d="M12 15a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" stroke="#000" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M17 11V9a5 5 0 0 0-10 0v2" stroke="#000" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <input id="password" type="password" name="password" placeholder="Password" required>
              <span class="toggle-pass" onclick="togglePass()">👁️</span>
            </label>

            <div class="actions">
              <label class="remember"><input type="checkbox" name="remember"> Remember me</label>
            </div>

            <div style="margin-top:12px">
              <button class="btn-primary btn-full" type="submit">LOGIN</button>
            </div>
          </form>

          </div>
        </div>

        <div class="right"><div class="right-inner" aria-hidden="true"></div></div>
      </div>
    </div>

    <script>
      function togglePass(){
        var p = document.getElementById('password');
        if(p.type === 'password') p.type = 'text'; else p.type = 'password';
      }
    </script>
  </body>
</html>
