<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quizion – Online Sınav Sistemi</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --navy: #0b1437;
      --blue: #1a6bff;
      --blue-light: #3d8bff;
      --accent: #00d4aa;
      --white: #ffffff;
      --gray: #f4f6fb;
      --text: #1a1f36;
      --muted: #6b7a99;
      --card-shadow: 0 4px 24px rgba(26,107,255,0.10);
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--white);
      color: var(--text);
      overflow-x: hidden;
    }

    /* ── PAGE ROUTER ── */
    .page { display: none; }
    .page.active { display: block; }

    /* ── AUTH PAGES ── */
    .auth-page {
      min-height: 100vh;
      display: flex;
      background: var(--white);
    }
    .auth-left {
      width: 45%;
      background: linear-gradient(145deg, #0b1437 0%, #1a3170 60%, #0d2460 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px 50px;
      position: relative;
      overflow: hidden;
    }
    .auth-left::before {
      content: '';
      position: absolute; top: -80px; right: -80px;
      width: 400px; height: 400px;
      background: radial-gradient(circle, rgba(26,107,255,0.3) 0%, transparent 65%);
      border-radius: 50%;
    }
    .auth-left::after {
      content: '';
      position: absolute; bottom: -60px; left: -40px;
      width: 280px; height: 280px;
      background: radial-gradient(circle, rgba(0,212,170,0.18) 0%, transparent 65%);
      border-radius: 50%;
    }
    .auth-left-content { position: relative; z-index: 1; text-align: center; color: white; }
    .auth-left-content .auth-logo {
      display: inline-flex; align-items: center; gap: 10px;
      text-decoration: none; margin-bottom: 48px;
    }
    .auth-left-content .logo-icon {
      width: 42px; height: 42px; background: var(--blue); border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      color: white; font-size: 1.2rem;
    }
    .auth-left-content .logo-text {
      font-family: 'Syne', sans-serif; font-size: 1.4rem; font-weight: 800; color: white;
    }
    .auth-left-content .logo-text span { color: var(--accent); }
    .auth-left h2 {
      font-family: 'Syne', sans-serif; font-size: 1.9rem; font-weight: 800;
      line-height: 1.25; margin-bottom: 18px;
    }
    .auth-left h2 span { color: var(--accent); }
    .auth-left p { color: rgba(255,255,255,0.65); font-size: .95rem; line-height: 1.7; max-width: 320px; margin: 0 auto 40px; }
    .auth-features { display: flex; flex-direction: column; gap: 14px; text-align: left; }
    .auth-feature-item {
      display: flex; align-items: center; gap: 12px;
      background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1);
      border-radius: 12px; padding: 14px 18px;
    }
    .auth-feature-icon {
      width: 38px; height: 38px; border-radius: 10px; background: rgba(26,107,255,0.3);
      display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;
    }
    .auth-feature-text strong { display: block; color: white; font-size: .88rem; font-weight: 600; }
    .auth-feature-text span { color: rgba(255,255,255,0.55); font-size: .78rem; }

    .auth-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px 40px;
    }
    .auth-form-box { width: 100%; max-width: 420px; }
    .auth-form-box .back-btn {
      display: inline-flex; align-items: center; gap: 6px;
      color: var(--muted); font-size: .85rem; text-decoration: none;
      background: none; border: none; cursor: pointer; margin-bottom: 36px;
      padding: 0; font-family: 'DM Sans', sans-serif;
      transition: color .2s;
    }
    .auth-form-box .back-btn:hover { color: var(--blue); }
    .auth-form-box h2 {
      font-family: 'Syne', sans-serif; font-size: 1.75rem; font-weight: 800;
      color: var(--navy); margin-bottom: 8px;
    }
    .auth-form-box .auth-subtitle { color: var(--muted); font-size: .92rem; margin-bottom: 32px; line-height: 1.5; }
    .auth-form-box .auth-subtitle a { color: var(--blue); text-decoration: none; font-weight: 600; }
    .auth-form-box .auth-subtitle a:hover { text-decoration: underline; }

    .form-group { margin-bottom: 18px; }
    .form-group label {
      display: block; font-size: .85rem; font-weight: 600; color: var(--navy);
      margin-bottom: 7px;
    }
    .form-group input {
      width: 100%; padding: 12px 16px; border: 1.5px solid #e0e5f2; border-radius: 11px;
      font-size: .92rem; font-family: 'DM Sans', sans-serif; color: var(--text);
      background: var(--gray); transition: border-color .2s, box-shadow .2s;
      outline: none;
    }
    .form-group input:focus { border-color: var(--blue); background: white; box-shadow: 0 0 0 3px rgba(26,107,255,0.1); }
    .form-group input::placeholder { color: #b0b8cc; }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

    .form-options { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; }
    .checkbox-label { display: flex; align-items: center; gap: 8px; font-size: .85rem; color: var(--muted); cursor: pointer; }
    .checkbox-label input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--blue); cursor: pointer; }
    .forgot-link { font-size: .85rem; color: var(--blue); text-decoration: none; font-weight: 500; }
    .forgot-link:hover { text-decoration: underline; }

    .auth-submit-btn {
      width: 100%; padding: 13px; background: var(--blue); color: white;
      border: none; border-radius: 11px; font-size: .95rem; font-weight: 700;
      font-family: 'DM Sans', sans-serif; cursor: pointer; transition: all .25s;
      display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .auth-submit-btn:hover { background: var(--blue-light); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(26,107,255,0.35); }

    .auth-divider {
      display: flex; align-items: center; gap: 14px;
      color: var(--muted); font-size: .82rem; margin: 22px 0;
    }
    .auth-divider::before, .auth-divider::after {
      content: ''; flex: 1; height: 1px; background: #e0e5f2;
    }

    .social-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .social-btn {
      display: flex; align-items: center; justify-content: center; gap: 9px;
      padding: 11px 16px; border: 1.5px solid #e0e5f2; border-radius: 10px;
      background: white; font-size: .85rem; font-weight: 600; color: var(--navy);
      cursor: pointer; transition: all .2s; font-family: 'DM Sans', sans-serif;
    }
    .social-btn:hover { border-color: var(--blue); background: #f0f5ff; }
    .social-btn img { width: 18px; height: 18px; }

    .terms-text { font-size: .78rem; color: var(--muted); text-align: center; margin-top: 18px; line-height: 1.5; }
    .terms-text a { color: var(--blue); text-decoration: none; }

    .auth-error {
      background: #fff0f0; border: 1px solid #ffcccc; border-radius: 10px;
      padding: 11px 16px; font-size: .85rem; color: #c0392b; margin-bottom: 16px;
      display: none;
    }
    .auth-error.show { display: block; }

    .auth-success {
      background: #f0fff8; border: 1px solid #00d4aa44; border-radius: 10px;
      padding: 11px 16px; font-size: .85rem; color: #00856a; margin-bottom: 16px;
      display: none;
    }
    .auth-success.show { display: block; }

    .password-wrapper { position: relative; }
    .password-wrapper input { padding-right: 44px; }
    .toggle-pw {
      position: absolute; right: 13px; top: 50%; transform: translateY(-50%);
      background: none; border: none; cursor: pointer; color: var(--muted);
      font-size: 1rem; padding: 0;
    }

    /* ── LOGGED IN NAVBAR (Dashboard) ── */
    nav {
      position: sticky; top: 0; z-index: 100;
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(26,107,255,0.08);
      padding: 0 5%;
      display: flex; align-items: center; justify-content: space-between;
      height: 64px;
    }
    .logo { display: flex; align-items: center; gap: 10px; text-decoration: none; cursor: pointer; }
    .logo-icon {
      width: 36px; height: 36px; background: var(--blue); border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      color: white; font-size: 1.1rem;
    }
    .logo-text { font-family: 'Syne', sans-serif; font-size: 1.2rem; font-weight: 800; color: var(--navy); }
    .logo-text span { color: var(--blue); }
    .nav-links { display: flex; gap: 4px; list-style: none; }
    .nav-links a {
      text-decoration: none; color: var(--muted); font-size: .88rem; font-weight: 500;
      padding: 7px 14px; border-radius: 8px; transition: all .2s; display: flex; align-items: center; gap: 6px;
    }
    .nav-links a:hover { color: var(--blue); background: rgba(26,107,255,0.07); }
    .nav-links a.active { color: var(--blue); background: rgba(26,107,255,0.1); font-weight: 600; }
    .nav-right { display: flex; align-items: center; gap: 12px; }

    /* Guest navbar */
    .nav-guest-actions { display: flex; gap: 10px; }
    .btn-outline {
      padding: 8px 20px; border: 1.5px solid var(--blue); border-radius: 9px;
      background: transparent; color: var(--blue); font-size: .88rem; font-weight: 600;
      cursor: pointer; transition: all .2s; font-family: 'DM Sans', sans-serif;
    }
    .btn-outline:hover { background: var(--blue); color: white; }
    .btn-primary {
      padding: 9px 22px; border: none; border-radius: 9px;
      background: var(--blue); color: white; font-size: .88rem; font-weight: 600;
      cursor: pointer; transition: all .2s; font-family: 'DM Sans', sans-serif;
    }
    .btn-primary:hover { background: var(--blue-light); transform: translateY(-1px); }

    /* User avatar menu */
    .user-menu { position: relative; }
    .user-avatar-btn {
      display: flex; align-items: center; gap: 10px;
      background: var(--gray); border: 1.5px solid #e0e5f2; border-radius: 10px;
      padding: 6px 14px 6px 8px; cursor: pointer; transition: all .2s;
      font-family: 'DM Sans', sans-serif;
    }
    .user-avatar-btn:hover { border-color: var(--blue); background: #f0f5ff; }
    .avatar-circle {
      width: 30px; height: 30px; background: var(--blue); border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      color: white; font-weight: 700; font-size: .78rem;
    }
    .user-info { text-align: left; }
    .user-name { font-size: .82rem; font-weight: 600; color: var(--navy); display: block; }
    .user-role { font-size: .72rem; color: var(--muted); display: block; }
    .dropdown-arrow { color: var(--muted); font-size: .7rem; margin-left: 4px; }

    .user-dropdown {
      position: absolute; right: 0; top: calc(100% + 10px);
      background: white; border: 1.5px solid #e0e5f2; border-radius: 14px;
      padding: 8px; min-width: 200px; box-shadow: 0 12px 40px rgba(11,20,55,0.15);
      display: none; z-index: 200;
    }
    .user-dropdown.open { display: block; animation: dropDown .2s ease; }
    @keyframes dropDown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
    .dropdown-item {
      display: flex; align-items: center; gap: 10px; padding: 10px 14px;
      border-radius: 9px; font-size: .85rem; color: var(--text); cursor: pointer;
      transition: background .15s; border: none; background: none; width: 100%;
      font-family: 'DM Sans', sans-serif; text-decoration: none;
    }
    .dropdown-item:hover { background: var(--gray); }
    .dropdown-item.danger { color: #e53e3e; }
    .dropdown-item.danger:hover { background: #fff0f0; }
    .dropdown-sep { height: 1px; background: #f0f3fa; margin: 6px 0; }

    /* ── HERO ── */
    .hero {
      min-height: 88vh;
      background: linear-gradient(135deg, #0b1437 0%, #1a3170 55%, #0d2460 100%);
      display: flex; align-items: center;
      padding: 60px 5% 40px;
      position: relative; overflow: hidden;
    }
    .hero::before {
      content: '';
      position: absolute; top: -100px; right: -100px;
      width: 600px; height: 600px;
      background: radial-gradient(circle, rgba(26,107,255,0.25) 0%, transparent 65%);
      border-radius: 50%;
    }
    .hero::after {
      content: '';
      position: absolute; bottom: -60px; left: 10%;
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(0,212,170,0.15) 0%, transparent 65%);
      border-radius: 50%;
    }
    .hero-inner {
      max-width: 1200px; margin: 0 auto; width: 100%;
      display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;
      position: relative; z-index: 1;
    }
    .hero-text { color: white; }
    .hero-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(26,107,255,0.25); border: 1px solid rgba(26,107,255,0.4);
      padding: 6px 16px; border-radius: 50px; font-size: .8rem; font-weight: 600;
      color: #7eb5ff; margin-bottom: 24px; letter-spacing: .5px;
    }
    .hero h1 {
      font-family: 'Syne', sans-serif;
      font-size: clamp(2.2rem, 4vw, 3.2rem);
      font-weight: 800; line-height: 1.15;
      margin-bottom: 20px;
    }
    .hero h1 span { color: var(--accent); }
    .hero p { color: rgba(255,255,255,0.7); font-size: 1rem; line-height: 1.7; margin-bottom: 36px; max-width: 440px; }
    .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
    .hero-btn-main {
      padding: 13px 30px; border: none; border-radius: 11px;
      background: var(--blue); color: white; font-size: .95rem; font-weight: 600;
      cursor: pointer; transition: all .25s;
      display: flex; align-items: center; gap: 8px; font-family: 'DM Sans', sans-serif;
    }
    .hero-btn-main:hover { background: var(--blue-light); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(26,107,255,0.4); }
    .hero-btn-secondary {
      padding: 13px 26px; border: 1.5px solid rgba(255,255,255,0.25); border-radius: 11px;
      background: transparent; color: white; font-size: .95rem; font-weight: 500;
      cursor: pointer; transition: all .25s;
      display: flex; align-items: center; gap: 8px; font-family: 'DM Sans', sans-serif;
    }
    .hero-btn-secondary:hover { border-color: white; background: rgba(255,255,255,0.08); }
    .hero-trust { margin-top: 40px; display: flex; gap: 24px; flex-wrap: wrap; }
    .trust-item { display: flex; align-items: center; gap: 7px; color: rgba(255,255,255,0.65); font-size: .85rem; }
    .trust-item span { color: var(--accent); font-size: 1rem; }

    /* ── DASHBOARD MOCKUP ── */
    .hero-visual { position: relative; }
    .dashboard-card {
      background: white; border-radius: 18px;
      padding: 24px; box-shadow: 0 30px 80px rgba(0,0,0,0.35);
      animation: floatUp 3s ease-in-out infinite alternate;
    }
    @keyframes floatUp { from { transform: translateY(0); } to { transform: translateY(-12px); } }
    .dash-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
    .dash-title { font-family: 'Syne', sans-serif; font-weight: 700; color: var(--navy); font-size: .95rem; }
    .dash-greeting { color: var(--muted); font-size: .78rem; }
    .dash-stats { display: grid; grid-template-columns: repeat(4,1fr); gap: 10px; margin-bottom: 18px; }
    .stat-box { background: var(--gray); border-radius: 10px; padding: 12px; text-align: center; }
    .stat-num { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.1rem; color: var(--navy); }
    .stat-lbl { font-size: .68rem; color: var(--muted); margin-top: 2px; }
    .dash-chart { background: var(--gray); border-radius: 10px; height: 80px; display: flex; align-items: flex-end; gap: 6px; padding: 10px 14px; overflow: hidden; }
    .bar { border-radius: 4px 4px 0 0; flex: 1; background: var(--blue); opacity: .7; transition: opacity .2s; }
    .bar:hover { opacity: 1; }
    .bar.accent { background: var(--accent); }
    .float-badge {
      position: absolute; bottom: -16px; left: -24px;
      background: white; border-radius: 12px; padding: 10px 16px;
      box-shadow: 0 8px 28px rgba(0,0,0,0.15);
      display: flex; align-items: center; gap: 10px; font-size: .8rem;
    }
    .badge-icon { width: 32px; height: 32px; background: #e8f5ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; }
    .badge-text strong { display: block; font-weight: 700; color: var(--navy); font-size: .82rem; }
    .badge-text span { color: var(--muted); font-size: .72rem; }

    /* ── SECTIONS ── */
    section { padding: 80px 5%; }
    .section-center { text-align: center; max-width: 640px; margin: 0 auto 56px; }
    .section-tag { display: inline-block; color: var(--blue); font-size: .78rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 12px; }
    .section-title { font-family: 'Syne', sans-serif; font-size: clamp(1.7rem, 3vw, 2.4rem); font-weight: 800; color: var(--navy); line-height: 1.2; margin-bottom: 14px; }
    .section-desc { color: var(--muted); font-size: .97rem; line-height: 1.7; }

    /* ── FEATURES ── */
    .features { background: var(--gray); }
    .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; max-width: 1100px; margin: 0 auto; }
    .feature-card {
      background: white; border-radius: 16px; padding: 28px 24px;
      box-shadow: var(--card-shadow); transition: transform .25s, box-shadow .25s;
      cursor: pointer; border: 1.5px solid transparent;
    }
    .feature-card:hover { transform: translateY(-6px); box-shadow: 0 12px 36px rgba(26,107,255,0.15); border-color: rgba(26,107,255,0.2); }
    .feature-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 18px; }
    .fi-blue   { background: #e8f0ff; }
    .fi-green  { background: #e6faf5; }
    .fi-purple { background: #f0eaff; }
    .fi-orange { background: #fff4e6; }
    .feature-card h4 { font-family: 'Syne', sans-serif; font-weight: 700; color: var(--navy); font-size: 1rem; margin-bottom: 10px; }
    .feature-card p  { color: var(--muted); font-size: .88rem; line-height: 1.6; }

    /* ── STATS STRIP ── */
    .stats-strip { background: var(--navy); color: white; }
    .stats-inner { max-width: 1100px; margin: 0 auto; display: flex; gap: 16px; align-items: center; flex-wrap: wrap; justify-content: space-between; }
    .stats-left h2 { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; max-width: 260px; line-height: 1.3; }
    .stats-numbers { display: flex; gap: 40px; flex-wrap: wrap; }
    .stat-item { text-align: center; }
    .stat-item .num { font-family: 'Syne', sans-serif; font-size: 2rem; font-weight: 800; color: var(--accent); }
    .stat-item .lbl { font-size: .82rem; color: rgba(255,255,255,0.6); margin-top: 4px; }

    /* ── TOOLS GRID ── */
    .tools-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; max-width: 700px; margin: 0 auto; }
    .tool-card {
      background: white; border: 1.5px solid #e8ecf5; border-radius: 14px;
      padding: 28px 20px; text-align: center; cursor: pointer;
      transition: all .25s; box-shadow: var(--card-shadow);
    }
    .tool-card:hover { border-color: var(--blue); transform: translateY(-4px); box-shadow: 0 10px 32px rgba(26,107,255,0.13); }
    .tool-icon { font-size: 1.8rem; margin-bottom: 12px; }
    .tool-card h5 { font-family: 'Syne', sans-serif; font-weight: 700; color: var(--navy); font-size: .9rem; }

    /* ── CTA ── */
    .cta-section {
      background: linear-gradient(135deg, var(--navy), #1a3170);
      border-radius: 24px; max-width: 1100px; margin: 0 auto;
      padding: 60px 40px; display: flex; align-items: center;
      justify-content: space-between; gap: 30px; flex-wrap: wrap;
    }
    .cta-left { display: flex; align-items: center; gap: 24px; }
    .cta-icon { width: 72px; height: 72px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; flex-shrink: 0; }
    .cta-text h3 { font-family: 'Syne', sans-serif; font-size: 1.5rem; font-weight: 800; color: white; }
    .cta-text p  { color: rgba(255,255,255,0.65); font-size: .9rem; margin-top: 6px; }
    .cta-btns { display: flex; gap: 14px; flex-wrap: wrap; }
    .cta-btn-main {
      padding: 12px 26px; background: var(--blue); color: white; font-weight: 600;
      border: none; border-radius: 10px; cursor: pointer; font-size: .9rem; transition: all .2s; font-family: 'DM Sans', sans-serif;
    }
    .cta-btn-main:hover { background: var(--blue-light); }
    .cta-btn-outline {
      padding: 12px 26px; background: transparent; color: white; font-weight: 600;
      border: 1.5px solid rgba(255,255,255,0.3); border-radius: 10px; cursor: pointer; font-size: .9rem; transition: all .2s; font-family: 'DM Sans', sans-serif;
    }
    .cta-btn-outline:hover { border-color: white; background: rgba(255,255,255,0.08); }

    /* ── TESTIMONIALS ── */
    .testimonials { background: var(--gray); }
    .testi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; max-width: 1100px; margin: 0 auto; }
    .testi-card { background: white; border-radius: 16px; padding: 28px 24px; box-shadow: var(--card-shadow); }
    .testi-stars { color: #f4a419; font-size: 1rem; margin-bottom: 14px; }
    .testi-card p { color: #444; font-size: .9rem; line-height: 1.65; font-style: italic; margin-bottom: 20px; }
    .testi-author { display: flex; align-items: center; gap: 12px; }
    .testi-avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--blue); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: .85rem; }
    .testi-name strong { display: block; font-size: .88rem; color: var(--navy); }
    .testi-name span  { font-size: .78rem; color: var(--muted); }

    /* ── FOOTER ── */
    footer {
      background: var(--navy); color: rgba(255,255,255,0.7);
      padding: 60px 5% 28px;
    }
    .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 48px; }
    .footer-brand p { font-size: .85rem; line-height: 1.65; margin-top: 14px; max-width: 220px; }
    .footer-col h6 { font-family: 'Syne', sans-serif; font-weight: 700; color: white; font-size: .85rem; letter-spacing: .5px; margin-bottom: 16px; text-transform: uppercase; }
    .footer-col a  { display: block; text-decoration: none; color: rgba(255,255,255,0.6); font-size: .83rem; margin-bottom: 9px; transition: color .2s; }
    .footer-col a:hover { color: white; }
    .footer-bottom { border-top: 1px solid rgba(255,255,255,0.08); padding-top: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; font-size: .8rem; }

    /* ── DASHBOARD PAGE ── */
    .dashboard-page { background: var(--gray); min-height: calc(100vh - 64px); padding: 40px 5%; }
    .dashboard-page .page-header { margin-bottom: 32px; }
    .dashboard-page .page-header h1 { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; color: var(--navy); }
    .dashboard-page .page-header p { color: var(--muted); font-size: .92rem; margin-top: 4px; }
    .dash-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; margin-bottom: 32px; max-width: 1200px; }
    .dash-stat-card { background: white; border-radius: 14px; padding: 22px 20px; box-shadow: var(--card-shadow); }
    .dash-stat-card .icon { font-size: 1.6rem; margin-bottom: 12px; }
    .dash-stat-card .value { font-family: 'Syne', sans-serif; font-size: 1.7rem; font-weight: 800; color: var(--navy); }
    .dash-stat-card .label { color: var(--muted); font-size: .82rem; margin-top: 4px; }
    .quick-actions { max-width: 1200px; }
    .quick-actions h3 { font-family: 'Syne', sans-serif; font-size: 1.1rem; font-weight: 700; color: var(--navy); margin-bottom: 16px; }
    .qa-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; }
    .qa-card {
      background: white; border-radius: 14px; padding: 22px;
      box-shadow: var(--card-shadow); cursor: pointer; transition: all .25s;
      border: 1.5px solid transparent; display: flex; align-items: center; gap: 14px;
    }
    .qa-card:hover { transform: translateY(-4px); border-color: var(--blue); box-shadow: 0 10px 32px rgba(26,107,255,0.13); }
    .qa-icon { width: 44px; height: 44px; border-radius: 11px; background: #e8f0ff; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
    .qa-text h5 { font-family: 'Syne', sans-serif; font-size: .9rem; font-weight: 700; color: var(--navy); }
    .qa-text p { font-size: .8rem; color: var(--muted); margin-top: 3px; }

    /* ── LIBRARY PAGE ── */
    .library-page { background: var(--gray); min-height: calc(100vh - 64px); padding: 40px 5%; }
    .library-page .page-header { margin-bottom: 32px; }
    .library-page .page-header h1 { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; color: var(--navy); }
    .library-page .page-header p { color: var(--muted); font-size: .92rem; margin-top: 4px; }
    .library-search { display: flex; gap: 12px; margin-bottom: 28px; max-width: 1200px; }
    .library-search input {
      flex: 1; padding: 11px 18px; border: 1.5px solid #e0e5f2; border-radius: 10px;
      font-size: .9rem; font-family: 'DM Sans', sans-serif; background: white; outline: none;
      transition: border-color .2s;
    }
    .library-search input:focus { border-color: var(--blue); }
    .library-search button {
      padding: 11px 22px; background: var(--blue); color: white; border: none;
      border-radius: 10px; font-size: .9rem; font-weight: 600; cursor: pointer;
      font-family: 'DM Sans', sans-serif; transition: background .2s;
    }
    .library-search button:hover { background: var(--blue-light); }
    .quiz-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px,1fr)); gap: 20px; max-width: 1200px; }
    .quiz-card { background: white; border-radius: 14px; padding: 22px; box-shadow: var(--card-shadow); border: 1.5px solid #eef1f9; transition: all .25s; cursor: pointer; }
    .quiz-card:hover { transform: translateY(-4px); border-color: var(--blue); }
    .quiz-card-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 14px; }
    .quiz-type-badge { font-size: .72rem; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .badge-live { background: #ffe8e8; color: #c0392b; }
    .badge-test { background: #e8f4ff; color: #1a6bff; }
    .badge-hw { background: #e8fff5; color: #00856a; }
    .quiz-card h4 { font-family: 'Syne', sans-serif; font-size: .97rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .quiz-card p { font-size: .82rem; color: var(--muted); line-height: 1.5; margin-bottom: 16px; }
    .quiz-card-meta { display: flex; gap: 16px; font-size: .78rem; color: var(--muted); }
    .quiz-card-meta span { display: flex; align-items: center; gap: 5px; }

    /* ── KEŞFET PAGE ── */
    .explore-page { background: var(--gray); min-height: calc(100vh - 64px); padding: 40px 5%; }
    .explore-page .page-header { margin-bottom: 32px; }
    .explore-page .page-header h1 { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; color: var(--navy); }
    .explore-page .page-header p { color: var(--muted); font-size: .92rem; margin-top: 4px; }
    .category-tabs { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 28px; max-width: 1200px; }
    .cat-tab { padding: 8px 18px; border-radius: 20px; font-size: .85rem; font-weight: 600; border: 1.5px solid #e0e5f2; background: white; color: var(--muted); cursor: pointer; transition: all .2s; font-family: 'DM Sans', sans-serif; }
    .cat-tab:hover, .cat-tab.active { background: var(--blue); border-color: var(--blue); color: white; }
    .explore-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px,1fr)); gap: 20px; max-width: 1200px; }
    .explore-card { background: white; border-radius: 14px; overflow: hidden; box-shadow: var(--card-shadow); border: 1.5px solid #eef1f9; cursor: pointer; transition: all .25s; }
    .explore-card:hover { transform: translateY(-4px); border-color: var(--blue); }
    .explore-card-img { height: 110px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; }
    .ec-blue { background: linear-gradient(135deg, #e8f0ff, #c8d8ff); }
    .ec-green { background: linear-gradient(135deg, #e6faf5, #b8f0e0); }
    .ec-purple { background: linear-gradient(135deg, #f0eaff, #d8c8ff); }
    .ec-orange { background: linear-gradient(135deg, #fff4e6, #ffd8a8); }
    .explore-card-body { padding: 18px; }
    .explore-card-body h4 { font-family: 'Syne', sans-serif; font-size: .93rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
    .explore-card-body p { font-size: .8rem; color: var(--muted); line-height: 1.5; margin-bottom: 12px; }
    .explore-card-footer { display: flex; justify-content: space-between; align-items: center; }
    .explore-card-footer .count { font-size: .78rem; color: var(--muted); }
    .explore-card-footer .start-btn { padding: 6px 14px; background: var(--blue); color: white; border: none; border-radius: 7px; font-size: .78rem; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background .2s; }
    .explore-card-footer .start-btn:hover { background: var(--blue-light); }

    /* ── RESPONSIVE ── */
    @media (max-width: 900px) {
      .auth-left { display: none; }
      .hero-inner { grid-template-columns: 1fr; text-align: center; }
      .hero p { margin: 0 auto 36px; }
      .hero-btns { justify-content: center; }
      .hero-visual { margin-top: 40px; }
      .nav-links { display: none; }
      .footer-top { grid-template-columns: 1fr 1fr; }
      .dash-grid, .qa-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 500px) {
      .footer-top { grid-template-columns: 1fr; }
      .dash-grid, .qa-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <nav id="mainNav" style="display: none;">
    <a class="logo" onclick="showPage('home')">
      <div class="logo-icon">Q</div>
      <div class="logo-text">Quiz<span>ion</span></div>
    </a>
    
    <ul class="nav-links">
      <li><a href="javascript:void(0)" id="nav-home" class="active" onclick="showPage('home')"><span>🏠</span> Anasayfa</a></li>
      <li><a href="javascript:void(0)" id="nav-library" onclick="showPage('library')"><span>📚</span> Kütüphanem</a></li>
      <li><a href="javascript:void(0)" id="nav-quick" onclick="showPage('home')"><span>⚡</span> Hızlı Erişim</a></li>
      <li><a href="javascript:void(0)" id="nav-explore" onclick="showPage('explore')"><span>🌍</span> Keşfet</a></li>
    </ul>

    <div class="nav-right">
      <div id="navGuest" class="nav-guest-actions">
        <button class="btn-outline" onclick="showPage('login')">Giriş Yap</button>
        <button class="btn-primary" onclick="showPage('register')">Ücretsiz Başla</button>
      </div>
      <div id="navUser" class="user-menu" style="display: none;">
        <button class="user-avatar-btn" onclick="toggleDropdown()">
          <div class="avatar-circle" id="userInitial">U</div>
          <div class="user-info">
            <span class="user-name" id="userNameDisplay">Kullanıcı</span>
            <span class="user-role">Öğrenci</span>
          </div>
          <span class="dropdown-arrow">▼</span>
        </button>
        <div class="user-dropdown" id="userDropdown">
          <button class="dropdown-item" onclick="showPage('home')">👤 Profilim</button>
          <button class="dropdown-item" onclick="showPage('library')">📊 Raporlarım</button>
          <button class="dropdown-item">⚙️ Ayarlar</button>
          <div class="dropdown-sep"></div>
          <button class="dropdown-item danger" onclick="logout()">🚪 Çıkış Yap</button>
        </div>
      </div>
    </div>
  </nav>

  <div id="page-landing" class="page active">
    <header class="hero">
      <div class="hero-inner">
        <div class="hero-text">
          <div class="hero-badge">✨ Yeni Nesil Sınav Deneyimi</div>
          <h1>Geleceğin <span>Eğitim</span> Platformuna Hoş Geldiniz</h1>
          <p>Yapay zeka destekli analizler, interaktif soru bankaları ve gerçek zamanlı sınav simülasyonları ile başarınızı katlayın.</p>
          <div class="hero-btns">
            <button class="hero-btn-main" onclick="showPage('register')">Hemen Başla <span>🚀</span></button>
            <button class="hero-btn-secondary">Platformu Tanı</button>
          </div>
          <div class="hero-trust">
            <div class="trust-item"><span>✓</span> 10K+ Aktif Öğrenci</div>
            <div class="trust-item"><span>✓</span> 500+ Hazır Sınav</div>
            <div class="trust-item"><span>✓</span> 24/7 Destek</div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="dashboard-card">
            <div class="dash-header">
              <div class="dash-title">Haftalık Performans</div>
              <div class="dash-greeting">Harika gidiyorsun!</div>
            </div>
            <div class="dash-stats">
              <div class="stat-box">
                <div class="stat-num">12</div>
                <div class="stat-lbl">Sınav</div>
              </div>
              <div class="stat-box">
                <div class="stat-num">%88</div>
                <div class="stat-lbl">Başarı</div>
              </div>
              <div class="stat-box">
                <div class="stat-num">450</div>
                <div class="stat-lbl">Soru</div>
              </div>
              <div class="stat-box">
                <div class="stat-num">8s</div>
                <div class="stat-lbl">Süre</div>
              </div>
            </div>
            <div class="dash-chart">
              <div class="bar" style="height: 40%;"></div>
              <div class="bar" style="height: 60%;"></div>
              <div class="bar accent" style="height: 85%;"></div>
              <div class="bar" style="height: 50%;"></div>
              <div class="bar" style="height: 75%;"></div>
              <div class="bar" style="height: 95%;"></div>
              <div class="bar" style="height: 65%;"></div>
            </div>
            <div class="float-badge">
              <div class="badge-icon">🏆</div>
              <div class="badge-text">
                <strong>Yeni Başarı!</strong>
                <span>Matematik Ustası</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="features">
      <div class="section-center">
        <span class="section-tag">Özellikler</span>
        <h2 class="section-title">Eğitimi Daha Verimli Hale Getiriyoruz</h2>
        <p class="section-desc">Quizion, öğrenme sürecini kişiselleştirerek hedeflerinize daha hızlı ulaşmanızı sağlar.</p>
      </div>
      <div class="feature-grid">
        <div class="feature-card">
          <div class="feature-icon fi-blue">📊</div>
          <h4>Detaylı Analiz</h4>
          <p>Her sınav sonrası eksik olduğunuz konuları yapay zeka ile tespit edin.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon fi-green">⏱️</div>
          <h4>Canlı Sınavlar</h4>
          <p>Arkadaşlarınızla veya sınıfınızla aynı anda yarışın, sıralamanızı görün.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon fi-purple">📁</div>
          <h4>Zengin İçerik</h4>
          <p>Binlerce profesyonel soru ve konu anlatım materyaline anında erişin.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon fi-orange">📱</div>
          <h4>Her Yerde</h4>
          <p>Bilgisayar, tablet veya telefonunuzdan dilediğiniz zaman çalışın.</p>
        </div>
      </div>
    </section>

    <section class="stats-strip">
      <div class="stats-inner">
        <div class="stats-left">
          <h2>Rakamlarla Quizion Başarısı</h2>
        </div>
        <div class="stats-numbers">
          <div class="stat-item">
            <div class="num">50M+</div>
            <div class="lbl">Çözülen Soru</div>
          </div>
          <div class="stat-item">
            <div class="num">150K</div>
            <div class="lbl">Öğretmen</div>
          </div>
          <div class="stat-item">
            <div class="num">%95</div>
            <div class="lbl">Memnuniyet</div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="section-center">
        <span class="section-tag">Araçlar</span>
        <h2 class="section-title">Her Branşa Uygun Çözümler</h2>
      </div>
      <div class="tools-grid">
        <div class="tool-card">
          <div class="tool-icon">🧬</div>
          <h5>Fen Bilimleri</h5>
        </div>
        <div class="tool-card">
          <div class="tool-icon">📐</div>
          <h5>Matematik</h5>
        </div>
        <div class="tool-card">
          <div class="tool-icon">🌍</div>
          <h5>Sosyal Bilgiler</h5>
        </div>
        <div class="tool-card">
          <div class="tool-icon">📚</div>
          <h5>Edebiyat</h5>
        </div>
        <div class="tool-card">
          <div class="tool-icon">🇬🇧</div>
          <h5>Yabancı Dil</h5>
        </div>
        <div class="tool-card">
          <div class="tool-icon">🎨</div>
          <h5>Sanat</h5>
        </div>
      </div>
    </section>

    <section class="testimonials">
      <div class="section-center">
        <span class="section-tag">Yorumlar</span>
        <h2 class="section-title">Kullanıcılarımız Ne Diyor?</h2>
      </div>
      <div class="testi-grid">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <p>"YKS sürecinde en büyük yardımcım oldu. Analizler sayesinde hangi konuya çalışmam gerektiğini net görebiliyorum."</p>
          <div class="testi-author">
            <div class="testi-avatar">M</div>
            <div class="testi-name"><strong>Mert Yılmaz</strong><span>Lise Öğrencisi</span></div>
          </div>
        </div>
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <p>"Öğrencilerime ödev vermek ve gelişimlerini takip etmek artık çok daha kolay. Arayüzü harika."</p>
          <div class="testi-author">
            <div class="testi-avatar">A</div>
            <div class="testi-name"><strong>Ayşe Demir</strong><span>Matematik Öğretmeni</span></div>
          </div>
        </div>
      </div>
    </section>

    <div style="padding: 0 5% 80px;">
      <div class="cta-section">
        <div class="cta-left">
          <div class="cta-icon">🎁</div>
          <div class="cta-text">
            <h3>Hemen Ücretsiz Deneyin</h3>
            <p>İlk 14 gün tüm premium özellikler hediye!</p>
          </div>
        </div>
        <div class="cta-btns">
          <button class="cta-btn-main" onclick="showPage('register')">Hesap Oluştur</button>
          <button class="cta-btn-outline">Planları İncele</button>
        </div>
      </div>
    </div>

    <footer>
      <div class="footer-top">
        <div class="footer-brand">
          <div class="logo">
            <div class="logo-icon" style="background: white; color: var(--blue);">Q</div>
            <div class="logo-text" style="color: white;">Quiz<span>ion</span></div>
          </div>
          <p>Eğitimi teknolojiyle birleştirerek herkes için erişilebilir kılıyoruz.</p>
        </div>
        <div class="footer-col">
          <h6>Ürün</h6>
          <a href="#">Özellikler</a>
          <a href="#">Sınavlar</a>
          <a href="#">Kurumsal</a>
        </div>
        <div class="footer-col">
          <h6>Destek</h6>
          <a href="#">Yardım Merkezi</a>
          <a href="#">Topluluk</a>
          <a href="#">İletişim</a>
        </div>
        <div class="footer-col">
          <h6>Yasal</h6>
          <a href="#">Gizlilik</a>
          <a href="#">Kullanım Şartları</a>
          <a href="#">KVKK</a>
        </div>
        <div class="footer-col">
          <h6>Sosyal</h6>
          <a href="#">Instagram</a>
          <a href="#">Twitter</a>
          <a href="#">LinkedIn</a>
        </div>
      </div>
      <div class="footer-bottom">
        <div>© 2024 Quizion. Tüm Hakları Saklıdır.</div>
        <div style="display: flex; gap: 20px;">
          <span>Türkçe (TR)</span>
          <span>Güvenli Ödeme</span>
        </div>
      </div>
    </footer>
  </div>

  <div id="page-login" class="page">
    <div class="auth-page">
      <div class="auth-left">
        <div class="auth-left-content">
          <a href="#" class="auth-logo" onclick="showPage('landing')">
            <div class="logo-icon">Q</div>
            <div class="logo-text">Quiz<span>ion</span></div>
          </a>
          <h2>Öğrenmeye <span>Kaldığın Yerden</span> Devam Et</h2>
          <p>Binlerce öğrenci ve öğretmenin arasına katıl, başarıya bir adım daha yaklaş.</p>
          <div class="auth-features">
            <div class="auth-feature-item">
              <div class="auth-feature-icon">🛡️</div>
              <div class="auth-feature-text"><strong>Güvenli Giriş</strong><span>Verileriniz uçtan uca korunur</span></div>
            </div>
            <div class="auth-feature-item">
              <div class="auth-feature-icon">⚡</div>
              <div class="auth-feature-text"><strong>Hızlı Erişim</strong><span>Tüm cihazlardan anında senkronize</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="auth-right">
        <div class="auth-form-box">
          <button class="back-btn" onclick="showPage('landing')">← Anasayfaya Dön</button>
          <h2>Hoş Geldiniz!</h2>
          <p class="auth-subtitle">Hesabınız yok mu? <a href="#" onclick="showPage('register')">Hemen oluşturun</a></p>
          
          <div class="auth-error" id="loginError">E-posta veya şifre hatalı. Lütfen tekrar deneyin.</div>
          
          <form id="loginForm" onsubmit="handleLogin(event)">
            <div class="form-group">
              <label>E-Posta Adresi</label>
              <input type="email" id="loginEmail" placeholder="ornek@mail.com" required>
            </div>
            <div class="form-group">
              <label>Şifre</label>
              <div class="password-wrapper">
                <input type="password" id="loginPass" placeholder="••••••••" required>
                <button type="button" class="toggle-pw" onclick="togglePw('loginPass', this)">👁️</button>
              </div>
            </div>
            <div class="form-options">
              <label class="checkbox-label"><input type="checkbox"> Beni Hatırla</label>
              <a href="#" class="forgot-link">Şifremi Unuttum</a>
            </div>
            <button type="submit" class="auth-submit-btn">Giriş Yap</button>
          </form>

          <div class="auth-divider">veya şununla devam et</div>

          <div class="social-btns">
            <button class="social-btn" onclick="socialLogin('Google')">
              <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="G"> Google
            </button>
            <button class="social-btn" onclick="socialLogin('Apple')">
              <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="A"> Apple
            </button>
          </div>
          <p class="terms-text">Giriş yaparak <a href="#">Kullanım Şartları</a>'nı kabul etmiş olursunuz.</p>
        </div>
      </div>
    </div>
  </div>

  <div id="page-register" class="page">
    <div class="auth-page">
      <div class="auth-left">
        <div class="auth-left-content">
          <a href="#" class="auth-logo" onclick="showPage('landing')">
            <div class="logo-icon">Q</div>
            <div class="logo-text">Quiz<span>ion</span></div>
          </a>
          <h2>Geleceğin <span>Başarı Hikayesini</span> Birlikte Yazalım</h2>
          <p>Kişiselleştirilmiş eğitim araçlarıyla potansiyelini keşfetmeye hazır mısın?</p>
          <div class="auth-features">
            <div class="auth-feature-item">
              <div class="auth-feature-icon">🎁</div>
              <div class="auth-feature-text"><strong>Ücretsiz Başlangıç</strong><span>Kredi kartı gerektirmez</span></div>
            </div>
            <div class="auth-feature-item">
              <div class="auth-feature-icon">✨</div>
              <div class="auth-feature-text"><strong>Premium Özellikler</strong><span>İlk hafta tüm araçlar açık</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="auth-right">
        <div class="auth-form-box">
          <button class="back-btn" onclick="showPage('landing')">← Anasayfaya Dön</button>
          <h2>Hesap Oluştur</h2>
          <p class="auth-subtitle">Zaten üye misiniz? <a href="#" onclick="showPage('login')">Giriş yapın</a></p>
          
          <div class="auth-success" id="regSuccess">Hesabınız başarıyla oluşturuldu! Yönlendiriliyorsunuz...</div>

          <form id="regForm" onsubmit="handleRegister(event)">
            <div class="form-row">
              <div class="form-group">
                <label>Ad</label>
                <input type="text" id="regFirstName" placeholder="Can" required>
              </div>
              <div class="form-group">
                <label>Soyad</label>
                <input type="text" id="regLastName" placeholder="Yılmaz" required>
              </div>
            </div>
            <div class="form-group">
              <label>E-Posta Adresi</label>
              <input type="email" id="regEmail" placeholder="can@mail.com" required>
            </div>
            <div class="form-group">
              <label>Şifre</label>
              <div class="password-wrapper">
                <input type="password" id="regPass" placeholder="En az 8 karakter" required>
                <button type="button" class="toggle-pw" onclick="togglePw('regPass', this)">👁️</button>
              </div>
            </div>
            <button type="submit" class="auth-submit-btn">Ücretsiz Üye Ol</button>
          </form>

          <div class="auth-divider">veya şununla devam et</div>

          <div class="social-btns">
            <button class="social-btn" onclick="socialLogin('Google')">
              <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="G"> Google
            </button>
            <button class="social-btn" onclick="socialLogin('Apple')">
              <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="A"> Apple
            </button>
          </div>
          <p class="terms-text">Üye olarak <a href="#">KVKK Aydınlatma Metni</a>'ni okuduğunuzu kabul edersiniz.</p>
        </div>
      </div>
    </div>
  </div>

  <div id="page-home" class="page dashboard-page">
    <div class="page-header">
      <h1 id="dashWelcome">Merhaba, Kullanıcı 👋</h1>
      <p>Bugün yeni bir şeyler öğrenmek için harika bir gün!</p>
    </div>
    <div class="dash-grid">
      <div class="dash-stat-card">
        <div class="icon">📝</div>
        <div class="value">24</div>
        <div class="label">Tamamlanan Sınav</div>
      </div>
      <div class="dash-stat-card">
        <div class="icon">🎯</div>
        <div class="value">%92</div>
        <div class="label">Ortalama Başarı</div>
      </div>
      <div class="dash-stat-card">
        <div class="icon">🔥</div>
        <div class="value">5 Gün</div>
        <div class="label">Çalışma Serisi</div>
      </div>
      <div class="dash-stat-card">
        <div class="icon">💎</div>
        <div class="value">1,250</div>
        <div class="label">Quizion Puanı</div>
      </div>
    </div>

    <div class="quick-actions">
      <h3>Hızlı İşlemler</h3>
      <div class="qa-grid">
        <div class="qa-card" onclick="alert('Sınav oluşturma yakında!')">
          <div class="qa-icon">➕</div>
          <div class="qa-text"><h5>Sınav Oluştur</h5><p>Yeni bir test veya canlı yarışma başlat</p></div>
        </div>
        <div class="qa-card" onclick="showPage('explore')">
          <div class="qa-icon">🔍</div>
          <div class="qa-text"><h5>Sınav Keşfet</h5><p>Topluluğun oluşturduğu sınavlara göz at</p></div>
        </div>
        <div class="qa-card" onclick="showPage('library')">
          <div class="qa-icon">📊</div>
          <div class="qa-text"><h5>Raporlarım</h5><p>Gelişimini detaylı grafiklerle incele</p></div>
        </div>
      </div>
    </div>
  </div>

  <div id="page-library" class="page library-page">
    <div class="page-header">
      <h1>Kütüphanem</h1>
      <p>Tüm sınavların, ödevlerin ve kayıtlı içeriklerin burada.</p>
    </div>
    <div class="library-search">
      <input type="text" placeholder="Sınav başlığı veya konu ara...">
      <button>Ara</button>
    </div>
    <div class="quiz-list">
      <div class="quiz-card">
        <div class="quiz-card-top">
          <span class="quiz-type-badge badge-live">Canlı Sınav</span>
          <span style="font-size: .75rem; color: var(--muted);">Dün</span>
        </div>
        <h4>Matematik: Türev ve İntegral Giriş</h4>
        <p>15 Soru • 30 Dakika • Karma Zorluk</p>
        <div class="quiz-card-meta">
          <span>👥 45 Katılımcı</span>
          <span style="color: var(--accent);">⭐ %94 Başarı</span>
        </div>
      </div>
      <div class="quiz-card">
        <div class="quiz-card-top">
          <span class="quiz-type-badge badge-test">Deneme</span>
          <span style="font-size: .75rem; color: var(--muted);">3 Gün Önce</span>
        </div>
        <h4>TYT Türkçe Genel Deneme #4</h4>
        <p>40 Soru • 50 Dakika • Orta Seviye</p>
        <div class="quiz-card-meta">
          <span>👤 Bireysel</span>
          <span style="color: var(--blue);">⭐ %82 Başarı</span>
        </div>
      </div>
      <div class="quiz-card">
        <div class="quiz-card-top">
          <span class="quiz-type-badge badge-hw">Ödev</span>
          <span style="font-size: .75rem; color: var(--muted);">Geçen Hafta</span>
        </div>
        <h4>İngilizce: B2 Vocabulary Quiz</h4>
        <p>20 Soru • 15 Dakika • İleri Seviye</p>
        <div class="quiz-card-meta">
          <span>🏫 Sınıf A-1</span>
          <span style="color: #00856a;">⭐ %100 Başarı</span>
        </div>
      </div>
    </div>
  </div>

  <div id="page-explore" class="page explore-page">
    <div class="page-header">
      <h1>Sınav Keşfet</h1>
      <p>Binlerce içerik arasından sana uygun olanı seç ve hemen başla.</p>
    </div>
    <div class="category-tabs">
      <button class="cat-tab active" onclick="setTab(this)">Tümü</button>
      <button class="cat-tab" onclick="setTab(this)">YKS/LGS</button>
      <button class="cat-tab" onclick="setTab(this)">Dil Eğitimi</button>
      <button class="cat-tab" onclick="setTab(this)">Genel Kültür</button>
      <button class="cat-tab" onclick="setTab(this)">Kodlama</button>
    </div>
    <div class="explore-grid">
      <div class="explore-card">
        <div class="explore-card-img ec-blue">📐</div>
        <div class="explore-card-body">
          <h4>Geometri: Üçgenler</h4>
          <p>Tüm üçgen kurallarını kapsayan temel seviye sınavı.</p>
          <div class="explore-card-footer">
            <span class="count">1.2k Çözüm</span>
            <button class="start-btn">Başlat</button>
          </div>
        </div>
      </div>
      <div class="explore-card">
        <div class="explore-card-img ec-orange">🧬</div>
        <div class="explore-card-body">
          <h4>Biyoloji: Hücre</h4>
          <p>Organeller ve hücre yapısı üzerine detaylı test.</p>
          <div class="explore-card-footer">
            <span class="count">850 Çözüm</span>
            <button class="start-btn">Başlat</button>
          </div>
        </div>
      </div>
      <div class="explore-card">
        <div class="explore-card-img ec-purple">🌍</div>
        <div class="explore-card-body">
          <h4>Dünya Başkentleri</h4>
          <p>Eğlenceli bir genel kültür yarışmasına hazır mısın?</p>
          <div class="explore-card-footer">
            <span class="count">3.4k Çözüm</span>
            <button class="start-btn">Başlat</button>
          </div>
        </div>
      </div>
      <div class="explore-card">
        <div class="explore-card-img ec-green">💻</div>
        <div class="explore-card-body">
          <h4>Python Temelleri</h4>
          <p>Değişkenler, döngüler ve fonksiyonlar üzerine hızlı bir quiz.</p>
          <div class="explore-card-footer">
            <span class="count">2.1k Çözüm</span>
            <button class="start-btn">Başlat</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
  // ── ROUTER ──
  function showPage(pageId) {
    // Hide all
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    // Show target
    const target = document.getElementById('page-' + pageId);
    if (target) {
      target.classList.add('active');
      window.scrollTo(0, 0);
    }

    // Nav visibility
    const nav = document.getElementById('mainNav');
    if (pageId === 'landing' || pageId === 'login' || pageId === 'register') {
      nav.style.display = 'none';
    } else {
      nav.style.display = 'flex';
    }

    // Active link highlight
    document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
    const activeLink = document.getElementById('nav-' + pageId);
    if (activeLink) activeLink.classList.add('active');
  }

  // ── AUTH LOGIC ──
  function handleLogin(e) {
    e.preventDefault();
    const email = document.getElementById('loginEmail').value;
    // Mock user
    const mockUser = {
      firstName: 'Can',
      lastName: 'Yılmaz',
      email: email,
      role: 'Öğrenci'
    };
    loginSuccess(mockUser);
  }

  function handleRegister(e) {
    e.preventDefault();
    document.getElementById('regSuccess').classList.add('show');
    const mockUser = {
      firstName: document.getElementById('regFirstName').value,
      lastName: document.getElementById('regLastName').value,
      email: document.getElementById('regEmail').value,
      role: 'Öğrenci'
    };
    setTimeout(() => {
      loginSuccess(mockUser);
      document.getElementById('regSuccess').classList.remove('show');
    }, 1500);
  }

  function loginSuccess(user) {
    // UI Updates
    document.getElementById('navGuest').style.display = 'none';
    document.getElementById('navUser').style.display = 'block';
    document.getElementById('userNameDisplay').textContent = user.firstName + ' ' + user.lastName;
    document.getElementById('userInitial').textContent = user.firstName[0];
    document.getElementById('dashWelcome').textContent = 'Merhaba, ' + user.firstName + ' 👋';
    
    showPage('home');
  }

  function logout() {
    document.getElementById('navGuest').style.display = 'flex';
    document.getElementById('navUser').style.display = 'none';
    closeDropdown();
    showPage('landing');
  }

  function socialLogin(provider) {
    // Simulate social login
    const mockUser = { email: 'sosyal@quizion.com', password: '', firstName: provider, lastName: 'Kullanıcısı' };
    loginSuccess(mockUser);
  }

  // ── DROPDOWN ──
  function toggleDropdown() {
    document.getElementById('userDropdown').classList.toggle('open');
  }
  function closeDropdown() {
    document.getElementById('userDropdown').classList.remove('open');
  }
  document.addEventListener('click', function(e) {
    const menu = document.getElementById('userDropdown');
    const btn = document.querySelector('.user-avatar-btn');
    if (menu && !menu.contains(e.target) && !btn.contains(e.target)) closeDropdown();
  });

  // ── PASSWORD TOGGLE ──
  function togglePw(inputId, btn) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
      input.type = 'text';
      btn.textContent = '🙈';
    } else {
      input.type = 'password';
      btn.textContent = '👁️';
    }
  }
  // ── CATEGORY TABS ──
  function setTab(el) {
    document.querySelectorAll('.cat-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
  }

  // ── ENTER KEY ──
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
      const activePage = document.querySelector('.page.active');
      if (activePage.id === 'page-login') handleLogin(new Event('submit'));
    }
  });
  </script>

</body>
</html>