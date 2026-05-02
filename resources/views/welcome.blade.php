

  <style>
  /* ══════════════════════════════════════════
     DESIGN TOKENS — Ortaokul Teması
     Mor + Turuncu + Sarı + Yeşil aksanlar
  ══════════════════════════════════════════ */
  :root {
    --purple:       #7c3aed;
    --purple-light: #a855f7;
    --purple-pale:  #f3e8ff;
    --purple-dark:  #4c1d95;
    --orange:       #f97316;
    --orange-light: #fb923c;
    --orange-pale:  #fff7ed;
    --yellow:       #fbbf24;
    --yellow-pale:  #fffbeb;
    --green:        #10b981;
    --green-pale:   #ecfdf5;
    --pink:         #ec4899;
    --pink-pale:    #fdf2f8;
    --sky:          #0ea5e9;
    --sky-pale:     #f0f9ff;
    --white:        #ffffff;
    --off-white:    #fafafa;
    --gray-50:      #f9fafb;
    --gray-100:     #f3f4f6;
    --gray-200:     #e5e7eb;
    --gray-400:     #9ca3af;
    --gray-500:     #6b7280;
    --gray-700:     #374151;
    --gray-900:     #111827;
    --text:         #1e1b4b;
    --card-shadow:  0 4px 20px rgba(124,58,237,0.12);
    --card-shadow-hover: 0 12px 36px rgba(124,58,237,0.22);
    --radius-xl:    20px;
    --radius-2xl:   28px;
    --radius-full:  9999px;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }

  body {
    font-family: 'Nunito', sans-serif;
    background: var(--white);
    color: var(--text);
    overflow-x: hidden;
  }

  /* Page Router */
  .page { display: none; }
  .page.active { display: block; }

  /* ══════════════════════════════════════════
     NAVBAR
  ══════════════════════════════════════════ */
  .navbar {
    position: sticky; top: 0; z-index: 200;
    height: 70px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 2px solid var(--purple-pale);
    display: flex; align-items: center;
    padding: 0 5%;
    gap: 16px;
    transition: box-shadow .3s;
  }
  .navbar.scrolled {
    box-shadow: 0 4px 24px rgba(124,58,237,0.12);
  }

  /* Logo */
  .nav-logo {
    display: flex; align-items: center; gap: 10px;
    text-decoration: none; cursor: pointer; flex-shrink: 0;
    margin-right: 8px;
  }
  .nav-logo-icon {
    width: 42px; height: 42px;
    background: linear-gradient(135deg, var(--purple), var(--purple-light));
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    color: white; font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.3rem;
    box-shadow: 0 4px 14px rgba(124,58,237,0.4);
    transition: transform .25s;
    position: relative;
  }
  .nav-logo-icon::after {
    content: '✦';
    position: absolute; top: -5px; right: -5px;
    font-size: .5rem; color: var(--yellow);
    animation: twinkle 2s ease-in-out infinite;
  }
  @keyframes twinkle {
    0%,100% { opacity:1; transform:scale(1); }
    50% { opacity:.4; transform:scale(1.4); }
  }
  .nav-logo:hover .nav-logo-icon { transform: rotate(-8deg) scale(1.08); }
  .nav-logo-text {
    font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.35rem;
    color: var(--purple-dark); line-height: 1;
  }
  .nav-logo-text span { color: var(--orange); }

  /* Desktop nav links */
  .nav-links {
    display: flex; align-items: center; gap: 2px;
    list-style: none; flex: 1;
  }
  .nav-links a {
    display: flex; align-items: center; gap: 6px;
    padding: 7px 14px; border-radius: var(--radius-full);
    font-size: .875rem; font-weight: 700; color: var(--gray-500);
    text-decoration: none; transition: all .2s; white-space: nowrap;
  }
  .nav-links a .nav-emoji { font-size: 1rem; transition: transform .2s; }
  .nav-links a:hover { color: var(--purple); background: var(--purple-pale); }
  .nav-links a:hover .nav-emoji { transform: scale(1.25) rotate(-8deg); }
  .nav-links a.active {
    color: var(--purple); background: var(--purple-pale); font-weight: 800;
  }

  /* Nav right */
  .nav-right { display: flex; align-items: center; gap: 10px; margin-left: auto; }

  /* Nav Buttons */
  .nav-btn-login {
    padding: 8px 20px; border-radius: var(--radius-full);
    border: 2px solid var(--purple); color: var(--purple);
    background: transparent; font-size: .875rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif; transition: all .2s;
  }
  .nav-btn-login:hover { background: var(--purple); color: white; transform: translateY(-1px); }

  .nav-btn-register {
    padding: 9px 22px; border-radius: var(--radius-full);
    border: none;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; font-size: .875rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif;
    box-shadow: 0 4px 14px rgba(124,58,237,0.35);
    transition: all .25s;
  }
  .nav-btn-register:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(124,58,237,0.45); }

  /* User avatar */
  .user-menu { position: relative; }
  .user-avatar-btn {
    display: flex; align-items: center; gap: 10px;
    background: var(--purple-pale); border: 2px solid var(--purple-pale);
    border-radius: var(--radius-full); padding: 6px 16px 6px 8px;
    cursor: pointer; transition: all .2s; font-family: 'Nunito', sans-serif;
  }
  .user-avatar-btn:hover { border-color: var(--purple); background: white; }
  .avatar-circle {
    width: 34px; height: 34px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 900; font-size: .8rem;
  }
  .user-info-text { text-align: left; }
  .user-name-text { font-size: .82rem; font-weight: 800; color: var(--purple-dark); display: block; }
  .user-role-text { font-size: .7rem; color: var(--gray-400); display: block; }

  .user-dropdown {
    position: absolute; right: 0; top: calc(100% + 12px);
    background: white; border: 2px solid var(--purple-pale); border-radius: var(--radius-xl);
    padding: 8px; min-width: 220px;
    box-shadow: 0 16px 48px rgba(124,58,237,0.18);
    display: none; z-index: 300; animation: dropIn .2s ease;
  }
  .user-dropdown.open { display: block; }
  @keyframes dropIn { from { opacity:0; transform:translateY(-10px); } to { opacity:1; transform:translateY(0); } }

  .dd-item {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 14px; border-radius: 12px;
    font-size: .875rem; font-weight: 700; color: var(--gray-700);
    cursor: pointer; transition: all .15s;
    border: none; background: none; width: 100%; font-family: 'Nunito', sans-serif;
  }
  .dd-item:hover { background: var(--purple-pale); color: var(--purple); }
  .dd-item.danger { color: #ef4444; }
  .dd-item.danger:hover { background: #fef2f2; }
  .dd-sep { height: 1px; background: var(--gray-100); margin: 6px 4px; }

  /* Hamburger button */
  .ham-btn {
    width: 42px; height: 42px; border-radius: 12px;
    background: var(--purple-pale); border: 2px solid var(--purple-pale);
    display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 5px;
    cursor: pointer; transition: all .2s; padding: 10px; flex-shrink: 0;
  }
  .ham-btn:hover { background: white; border-color: var(--purple); }
  .ham-btn span {
    display: block; width: 18px; height: 2px;
    background: var(--purple); border-radius: 4px; transition: all .3s;
  }

  /* ══════════════════════════════════════════
     HAMBURGER PANEL
  ══════════════════════════════════════════ */
  .ham-overlay {
    position: fixed; inset: 0;
    background: rgba(76,29,149,0.35); backdrop-filter: blur(6px);
    z-index: 400; opacity: 0; pointer-events: none; transition: opacity .3s;
  }
  .ham-overlay.open { opacity: 1; pointer-events: all; }

  .ham-panel {
    position: fixed; top: 0; right: 0; height: 100vh; width: 300px;
    background: white; z-index: 500;
    transform: translateX(100%);
    transition: transform .35s cubic-bezier(.4,0,.2,1);
    display: flex; flex-direction: column;
    box-shadow: -12px 0 48px rgba(124,58,237,0.18);
    border-left: 3px solid var(--purple-pale);
  }
  .ham-panel.open { transform: translateX(0); }

  .ham-top {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 20px 16px;
    border-bottom: 2px solid var(--purple-pale);
    background: linear-gradient(135deg, var(--purple-pale), #fdf4ff);
  }
  .ham-logo { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: 1.15rem; }
  .ham-logo span { color: var(--orange); }
  .ham-close {
    width: 36px; height: 36px; border-radius: 10px;
    background: white; border: 2px solid var(--purple-pale);
    cursor: pointer; font-size: 1rem; color: var(--purple);
    display: flex; align-items: center; justify-content: center; transition: all .2s;
  }
  .ham-close:hover { background: #fef2f2; border-color: #fca5a5; color: #ef4444; }

  .ham-body { flex: 1; overflow-y: auto; padding: 14px 12px; }

  .ham-section {
    font-size: .7rem; font-weight: 900; color: var(--purple-light);
    letter-spacing: 2px; text-transform: uppercase;
    padding: 0 12px; margin: 6px 0 8px;
  }

  .ham-item {
    display: flex; align-items: center; gap: 12px;
    padding: 11px 14px; border-radius: 14px; margin-bottom: 3px;
    font-size: .9rem; font-weight: 700; color: var(--gray-700);
    cursor: pointer; transition: all .18s;
    border: none; background: none; width: 100%; font-family: 'Nunito', sans-serif;
    text-align: left;
  }
  .ham-item:hover { background: var(--purple-pale); color: var(--purple); }
  .ham-item:hover .ham-item-icon { transform: scale(1.2) rotate(-5deg); }

  .ham-item-icon {
    width: 40px; height: 40px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; flex-shrink: 0; transition: transform .2s;
  }
  .hi-purple { background: var(--purple-pale); }
  .hi-orange { background: var(--orange-pale); }
  .hi-green  { background: var(--green-pale); }
  .hi-yellow { background: var(--yellow-pale); }
  .hi-pink   { background: var(--pink-pale); }
  .hi-sky    { background: var(--sky-pale); }

  .ham-item-info strong { display: block; font-size: .88rem; font-weight: 800; color: var(--gray-900); }
  .ham-item-info span   { display: block; font-size: .73rem; color: var(--gray-400); margin-top: 1px; }

  .ham-sep { height: 2px; background: var(--purple-pale); border-radius: 2px; margin: 12px 4px; }

  .ham-footer {
    padding: 16px; border-top: 2px solid var(--purple-pale);
    display: flex; flex-direction: column; gap: 10px;
    background: linear-gradient(135deg, var(--purple-pale), #fdf4ff);
  }
  .ham-footer-btn-login {
    width: 100%; padding: 12px; border-radius: var(--radius-full);
    border: 2px solid var(--purple); color: var(--purple); background: white;
    font-size: .9rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .ham-footer-btn-login:hover { background: var(--purple); color: white; }
  .ham-footer-btn-reg {
    width: 100%; padding: 12px; border-radius: var(--radius-full);
    border: none;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; font-size: .9rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif;
    box-shadow: 0 4px 14px rgba(124,58,237,0.3); transition: all .25s;
  }
  .ham-footer-btn-reg:hover { transform: translateY(-2px); }

  /* ══════════════════════════════════════════
     AUTH MODal
  ══════════════════════════════════════════ */
  .auth-modal-bg {
    position: fixed; inset: 0;
    background: rgba(76,29,149,0.45); backdrop-filter: blur(8px);
    z-index: 600; display: none; align-items: center; justify-content: center; padding: 20px;
  }
  .auth-modal-bg.open { display: flex; }

  .auth-modal-box {
    background: white; border-radius: var(--radius-2xl); padding: 44px 36px;
    max-width: 420px; width: 100%; position: relative;
    box-shadow: 0 24px 80px rgba(124,58,237,0.28);
    animation: modalPop .35s cubic-bezier(.34,1.56,.64,1);
    border: 3px solid var(--purple-pale);
  }
  @keyframes modalPop {
    from { opacity:0; transform:scale(.85) translateY(28px); }
    to   { opacity:1; transform:scale(1)   translateY(0); }
  }
  .modal-x {
    position: absolute; top: 16px; right: 16px;
    width: 34px; height: 34px; border-radius: 50%;
    background: var(--purple-pale); border: none; cursor: pointer;
    font-size: .95rem; color: var(--purple);
    display: flex; align-items: center; justify-content: center; transition: all .2s;
  }
  .modal-x:hover { background: #fef2f2; color: #ef4444; }

  .modal-sticker {
    width: 80px; height: 80px;
    background: linear-gradient(135deg, var(--purple-pale), var(--orange-pale));
    border-radius: 24px;
    display: flex; align-items: center; justify-content: center;
    font-size: 2.5rem; margin: 0 auto 20px;
    animation: wobble 3s ease-in-out infinite;
  }
  @keyframes wobble {
    0%,100% { transform:rotate(0deg) scale(1); }
    25% { transform:rotate(-6deg) scale(1.05); }
    75% { transform:rotate(6deg)  scale(1.05); }
  }
  .auth-modal-box h2 {
    font-family: 'Baloo 2', cursive; font-size: 1.65rem; font-weight: 800;
    color: var(--purple-dark); text-align: center; margin-bottom: 8px;
  }
  .auth-modal-box .modal-sub {
    color: var(--gray-500); font-size: .9rem; text-align: center; line-height: 1.65; margin-bottom: 28px;
    font-weight: 600;
  }
  .modal-btn-main {
    width: 100%; padding: 14px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .95rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s; margin-bottom: 10px;
  }
  .modal-btn-main:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(124,58,237,0.35); }
  .modal-btn-sec {
    width: 100%; padding: 13px;
    background: white; color: var(--purple);
    border: 2px solid var(--purple); border-radius: var(--radius-full);
    font-size: .95rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .modal-btn-sec:hover { background: var(--purple); color: white; }
  .modal-note {
    font-size: .76rem; color: var(--gray-400); text-align: center; margin-top: 14px; font-weight: 600;
  }

  /* ══════════════════════════════════════════
     AUTH PAGES (Login / Register)
  ══════════════════════════════════════════ */
  .auth-page { min-height: 100vh; display: flex; }
  .auth-left {
    width: 44%;
    background: linear-gradient(160deg, var(--purple-dark) 0%, var(--purple) 50%, #6d28d9 100%);
    display: flex; flex-direction: column; justify-content: center; align-items: center;
    padding: 60px 44px; position: relative; overflow: hidden;
  }
  /* decorative blobs */
  .auth-left::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 380px; height: 380px; border-radius: 50%;
    background: radial-gradient(circle, rgba(251,191,36,0.25) 0%, transparent 65%);
  }
  .auth-left::after {
    content: ''; position: absolute; bottom: -60px; left: -40px;
    width: 260px; height: 260px; border-radius: 50%;
    background: radial-gradient(circle, rgba(236,72,153,0.22) 0%, transparent 65%);
  }
  /* floating emojis decoration */
  .auth-deco {
    position: absolute; font-size: 2rem; opacity: .25;
    animation: floatDeco 4s ease-in-out infinite alternate;
  }
  .auth-deco:nth-child(1) { top:15%; left:10%; animation-delay:0s; }
  .auth-deco:nth-child(2) { top:30%; right:8%; animation-delay:.8s; font-size:1.5rem; }
  .auth-deco:nth-child(3) { bottom:20%; left:8%; animation-delay:1.6s; font-size:1.8rem; }
  .auth-deco:nth-child(4) { bottom:35%; right:12%; animation-delay:2.4s; font-size:1.2rem; }
  @keyframes floatDeco {
    from { transform:translateY(0) rotate(0deg); }
    to   { transform:translateY(-16px) rotate(12deg); }
  }

  .auth-left-content { position: relative; z-index: 1; text-align: center; color: white; }
  .auth-brand { display: inline-flex; align-items: center; gap: 10px; text-decoration: none; margin-bottom: 40px; }
  .auth-brand-icon {
    width: 46px; height: 46px; border-radius: 16px;
    background: rgba(255,255,255,0.2);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.4rem; color: white;
    border: 2px solid rgba(255,255,255,0.3);
  }
  .auth-brand-name { font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.4rem; color: white; }
  .auth-brand-name span { color: var(--yellow); }

  .auth-left h2 {
    font-family: 'Baloo 2', cursive; font-size: 1.9rem; font-weight: 800;
    line-height: 1.25; margin-bottom: 14px;
  }
  .auth-left h2 span { color: var(--yellow); }
  .auth-left-desc { color: rgba(255,255,255,0.75); font-size: .95rem; line-height: 1.75; max-width: 310px; margin: 0 auto 36px; font-weight: 600; }

  .auth-perks { display: flex; flex-direction: column; gap: 12px; text-align: left; }
  .auth-perk {
    display: flex; align-items: center; gap: 12px;
    background: rgba(255,255,255,0.10); border: 1.5px solid rgba(255,255,255,0.18);
    border-radius: 16px; padding: 14px 16px;
    transition: background .2s;
  }
  .auth-perk:hover { background: rgba(255,255,255,0.16); }
  .auth-perk-icon {
    width: 40px; height: 40px; border-radius: 12px;
    background: rgba(255,255,255,0.18);
    display: flex; align-items: center; justify-content: center; font-size: 1.15rem; flex-shrink: 0;
  }
  .auth-perk strong { display: block; color: white; font-size: .88rem; font-weight: 800; }
  .auth-perk span   { color: rgba(255,255,255,0.6); font-size: .77rem; font-weight: 600; }

  .auth-right { flex: 1; display: flex; align-items: center; justify-content: center; padding: 60px 40px; background: var(--gray-50); }
  .auth-box { width: 100%; max-width: 430px; }

  .back-btn {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--gray-400); font-size: .85rem; font-weight: 700;
    background: none; border: none; cursor: pointer; margin-bottom: 28px;
    font-family: 'Nunito', sans-serif; transition: color .2s; padding: 0;
  }
  .back-btn:hover { color: var(--purple); }

  .auth-box h2 {
    font-family: 'Baloo 2', cursive; font-size: 1.85rem; font-weight: 800;
    color: var(--purple-dark); margin-bottom: 6px;
  }
  .auth-sub { color: var(--gray-400); font-size: .9rem; font-weight: 600; margin-bottom: 28px; line-height: 1.5; }
  .auth-sub a { color: var(--purple); text-decoration: none; font-weight: 800; }
  .auth-sub a:hover { text-decoration: underline; }

  .form-group { margin-bottom: 16px; }
  .form-group label { display: block; font-size: .84rem; font-weight: 800; color: var(--gray-700); margin-bottom: 7px; }
  .form-group input {
    width: 100%; padding: 13px 18px; border: 2px solid var(--gray-200); border-radius: 14px;
    font-size: .92rem; font-family: 'Nunito', sans-serif; color: var(--text); font-weight: 600;
    background: white; transition: border-color .2s, box-shadow .2s; outline: none;
  }
  .form-group input:focus { border-color: var(--purple); box-shadow: 0 0 0 4px rgba(124,58,237,0.10); }
  .form-group input::placeholder { color: #c4b5fd; }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .form-options { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
  .check-label { display: flex; align-items: center; gap: 7px; font-size: .84rem; font-weight: 600; color: var(--gray-500); cursor: pointer; }
  .check-label input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--purple); }
  .forgot-link { font-size: .84rem; color: var(--purple); text-decoration: none; font-weight: 700; }
  .forgot-link:hover { text-decoration: underline; }

  .pw-wrap { position: relative; }
  .pw-wrap input { padding-right: 46px; }
  .pw-toggle {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer; font-size: .95rem; padding: 0; color: var(--purple-light);
  }

  .auth-submit {
    width: 100%; padding: 14px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .97rem; font-weight: 800; font-family: 'Nunito', sans-serif;
    cursor: pointer; transition: all .25s;
    box-shadow: 0 6px 18px rgba(124,58,237,0.32);
    display: flex; align-items: center; justify-content: center; gap: 8px;
  }
  .auth-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(124,58,237,0.42); }

  .auth-divider {
    display: flex; align-items: center; gap: 14px;
    color: var(--gray-400); font-size: .8rem; font-weight: 700; margin: 20px 0;
  }
  .auth-divider::before, .auth-divider::after { content:''; flex:1; height:1.5px; background:var(--gray-200); }

  .social-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
  .social-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    padding: 11px 14px; border: 2px solid var(--gray-200); border-radius: 14px;
    background: white; font-size: .85rem; font-weight: 700; color: var(--gray-700);
    cursor: pointer; transition: all .2s; font-family: 'Nunito', sans-serif;
  }
  .social-btn:hover { border-color: var(--purple); background: var(--purple-pale); color: var(--purple); }
  .social-btn img { width: 18px; height: 18px; }

  .terms-note { font-size: .77rem; color: var(--gray-400); text-align: center; margin-top: 16px; line-height: 1.5; font-weight: 600; }
  .terms-note a { color: var(--purple); text-decoration: none; font-weight: 800; }

  .auth-msg {
    border-radius: 12px; padding: 11px 16px; font-size: .85rem; font-weight: 700; margin-bottom: 14px; display: none;
  }
  .auth-msg.error { background: #fef2f2; border: 1.5px solid #fca5a5; color: #dc2626; }
  .auth-msg.success { background: var(--green-pale); border: 1.5px solid #6ee7b7; color: #065f46; }
  .auth-msg.show { display: block; }

  /* ══════════════════════════════════════════
     HERO
  ══════════════════════════════════════════ */
  .hero {
    background: linear-gradient(160deg, var(--purple-dark) 0%, #6d28d9 45%, #7c3aed 70%, #8b5cf6 100%);
    min-height: 92vh; display: flex; align-items: center;
    padding: 60px 5% 50px; position: relative; overflow: hidden;
  }

  /* Geometric shapes background */
  .hero-shape-1 {
    position: absolute; top: -60px; right: -60px;
    width: 500px; height: 500px; border-radius: 50%;
    background: radial-gradient(circle, rgba(251,191,36,0.18) 0%, transparent 65%);
    pointer-events: none;
  }
  .hero-shape-2 {
    position: absolute; bottom: -80px; left: 0%;
    width: 400px; height: 400px; border-radius: 50%;
    background: radial-gradient(circle, rgba(236,72,153,0.18) 0%, transparent 65%);
    pointer-events: none;
  }
  .hero-shape-3 {
    position: absolute; top: 40%; right: 10%;
    width: 180px; height: 180px; border-radius: 50%;
    background: rgba(255,255,255,0.04);
    border: 2px dashed rgba(255,255,255,0.15);
    pointer-events: none;
    animation: spin 20s linear infinite;
  }
  @keyframes spin { from { transform:rotate(0deg); } to { transform:rotate(360deg); } }

  /* Floating emojis */
  .hero-float {
    position: absolute; font-size: 2rem; pointer-events: none;
    animation: heroFloat 5s ease-in-out infinite alternate;
    opacity: .55;
  }
  .hero-float:nth-child(4) { top:15%; left:3%;  animation-delay:0s;    font-size:1.8rem; }
  .hero-float:nth-child(5) { top:25%; right:5%; animation-delay:1.2s;  font-size:2.2rem; }
  .hero-float:nth-child(6) { bottom:20%; left:4%; animation-delay:2.4s; font-size:1.5rem; }
  .hero-float:nth-child(7) { bottom:30%; right:3%; animation-delay:.6s; font-size:2rem; }
  @keyframes heroFloat {
    from { transform:translateY(0) rotate(-5deg); }
    to   { transform:translateY(-20px) rotate(8deg); }
  }

  .hero-inner {
    max-width: 1200px; margin: 0 auto; width: 100%;
    display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;
    position: relative; z-index: 1;
  }
  .hero-text { color: white; }

  .hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.25);
    padding: 7px 18px; border-radius: var(--radius-full);
    font-size: .8rem; font-weight: 800; color: rgba(255,255,255,0.95);
    margin-bottom: 22px; letter-spacing: .5px;
    backdrop-filter: blur(8px);
  }

  .hero h1 {
    font-family: 'Baloo 2', cursive;
    font-size: clamp(2.2rem, 4vw, 3.2rem);
    font-weight: 800; line-height: 1.15; margin-bottom: 20px;
  }
  .hero h1 .h1-accent { color: var(--yellow); }
  .hero h1 .h1-accent2 { color: #fb923c; }

  .hero-desc {
    color: rgba(255,255,255,0.78); font-size: 1rem; line-height: 1.75;
    margin-bottom: 36px; max-width: 440px; font-weight: 600;
  }

  .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
  .hero-cta {
    padding: 14px 32px; border: none; border-radius: var(--radius-full);
    background: linear-gradient(135deg, var(--orange), var(--yellow));
    color: white; font-size: 1rem; font-weight: 800; cursor: pointer;
    font-family: 'Nunito', sans-serif;
    box-shadow: 0 6px 20px rgba(249,115,22,0.45);
    transition: all .25s; display: flex; align-items: center; gap: 8px;
  }
  .hero-cta:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(249,115,22,0.55); }
  .hero-ghost {
    padding: 14px 28px; border: 2px solid rgba(255,255,255,0.35); border-radius: var(--radius-full);
    background: transparent; color: white; font-size: 1rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif; transition: all .25s;
    display: flex; align-items: center; gap: 8px;
  }
  .hero-ghost:hover { border-color: rgba(255,255,255,.85); background: rgba(255,255,255,.1); }

  .hero-trust { margin-top: 36px; display: flex; gap: 20px; flex-wrap: wrap; }
  .trust-pill {
    display: flex; align-items: center; gap: 7px;
    background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
    padding: 6px 14px; border-radius: var(--radius-full);
    font-size: .82rem; font-weight: 700; color: rgba(255,255,255,0.9);
  }

  /* Hero Card */
  .hero-card-wrap { position: relative; }
  .hero-card {
    background: white; border-radius: var(--radius-2xl); padding: 26px;
    box-shadow: 0 32px 80px rgba(76,29,149,0.35);
    animation: floatCard 4s ease-in-out infinite alternate;
    border: 3px solid rgba(255,255,255,0.8);
  }
  @keyframes floatCard {
    from { transform: translateY(0) rotate(-1deg); }
    to   { transform: translateY(-16px) rotate(1deg); }
  }
  .hc-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
  .hc-title { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .97rem; }
  .hc-badge {
    background: var(--green-pale); color: var(--green); border-radius: var(--radius-full);
    padding: 4px 12px; font-size: .74rem; font-weight: 800;
  }
  .hc-stats { display: grid; grid-template-columns: repeat(4,1fr); gap: 10px; margin-bottom: 16px; }
  .hc-stat { border-radius: 14px; padding: 12px 8px; text-align: center; }
  .hcs-1 { background: var(--purple-pale); }
  .hcs-2 { background: var(--orange-pale); }
  .hcs-3 { background: var(--green-pale); }
  .hcs-4 { background: var(--yellow-pale); }
  .hc-stat .hc-val { font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.1rem; color: var(--purple-dark); }
  .hc-stat .hc-lbl { font-size: .65rem; color: var(--gray-400); margin-top: 2px; font-weight: 700; }
  .hc-chart { background: var(--gray-50); border-radius: 14px; height: 80px; display: flex; align-items: flex-end; gap: 7px; padding: 10px 14px; overflow: hidden; }
  .hc-bar { border-radius: 6px 6px 0 0; flex: 1; transition: opacity .2s; }
  .hc-bar:hover { opacity: 1 !important; }
  .bar-p { background: linear-gradient(to top, var(--purple), var(--purple-light)); opacity: .7; }
  .bar-o { background: linear-gradient(to top, var(--orange), var(--yellow)); opacity: .85; }

  /* Floating sticker on card */
  .card-sticker {
    position: absolute; bottom: -18px; left: -28px;
    background: white; border-radius: 18px; padding: 11px 16px;
    box-shadow: 0 8px 32px rgba(124,58,237,0.2);
    border: 2px solid var(--purple-pale);
    display: flex; align-items: center; gap: 10px;
    animation: floatCard 3s ease-in-out infinite alternate;
    animation-delay: 2s;
  }
  .sticker-icon { width: 38px; height: 38px; background: var(--yellow-pale); border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; }
  .sticker-text strong { display: block; font-weight: 800; color: var(--purple-dark); font-size: .83rem; }
  .sticker-text span { color: var(--gray-400); font-size: .72rem; font-weight: 600; }

  /* Score badge */
  .score-sticker {
    position: absolute; top: -18px; right: -18px;
    background: linear-gradient(135deg, var(--orange), var(--yellow));
    border-radius: 18px; padding: 10px 16px;
    box-shadow: 0 8px 24px rgba(249,115,22,0.35);
    color: white; font-weight: 800; font-size: .82rem; font-family: 'Baloo 2', cursive;
    animation: floatCard 3.5s ease-in-out infinite alternate;
    animation-delay: 1s;
  }
  .score-sticker span { font-size: 1.4rem; display: block; line-height: 1; }

  /* ══════════════════════════════════════════
     SECTIONS
  ══════════════════════════════════════════ */
  .section { padding: 80px 5%; }
  .section-gray { background: var(--gray-50); }

  .section-head { text-align: center; max-width: 640px; margin: 0 auto 52px; }
  .section-tag {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--purple-pale); color: var(--purple);
    font-size: .76rem; font-weight: 900; letter-spacing: 2px;
    text-transform: uppercase; padding: 6px 16px; border-radius: var(--radius-full);
    margin-bottom: 14px;
  }
  .section-title {
    font-family: 'Baloo 2', cursive; font-size: clamp(1.75rem, 3vw, 2.4rem);
    font-weight: 800; color: var(--purple-dark); line-height: 1.2; margin-bottom: 14px;
  }
  .section-desc { color: var(--gray-500); font-size: .97rem; line-height: 1.72; font-weight: 600; }

  /* Feature Cards */
  .features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px,1fr)); gap: 24px; max-width: 1100px; margin: 0 auto; }
  .feat-card {
    background: white; border-radius: var(--radius-xl); padding: 30px 24px;
    box-shadow: var(--card-shadow); border: 2px solid transparent;
    transition: all .28s; cursor: pointer;
  }
  .feat-card:hover { transform: translateY(-8px); box-shadow: var(--card-shadow-hover); border-color: var(--purple-pale); }
  .feat-card:hover .feat-icon { transform: scale(1.15) rotate(-8deg); }
  .feat-icon-wrap {
    width: 56px; height: 56px; border-radius: 18px;
    display: flex; align-items: center; justify-content: center; font-size: 1.7rem;
    margin-bottom: 18px; transition: transform .25s;
  }
  .fi-p { background: var(--purple-pale); }
  .fi-o { background: var(--orange-pale); }
  .fi-g { background: var(--green-pale); }
  .fi-y { background: var(--yellow-pale); }
  .fi-k { background: var(--pink-pale); }
  .fi-s { background: var(--sky-pale); }
  .feat-card h4 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: 1.05rem; margin-bottom: 9px; }
  .feat-card p  { color: var(--gray-500); font-size: .88rem; line-height: 1.67; font-weight: 600; }

  /* Stats */
  .stats-band { background: linear-gradient(135deg, var(--purple-dark), var(--purple), #8b5cf6); padding: 72px 5%; }
  .stats-inner { max-width: 1100px; margin: 0 auto; display: flex; gap: 24px; align-items: center; flex-wrap: wrap; justify-content: space-between; }
  .stats-left h2 { font-family: 'Baloo 2', cursive; font-size: 1.65rem; font-weight: 800; color: white; max-width: 250px; line-height: 1.3; }
  .stats-left p { color: rgba(255,255,255,0.65); font-size: .88rem; margin-top: 8px; max-width: 230px; font-weight: 600; }
  .stats-nums { display: flex; gap: 44px; flex-wrap: wrap; }
  .stat-num-item { text-align: center; }
  .stat-big {
    font-family: 'Baloo 2', cursive; font-size: 2.6rem; font-weight: 800;
    color: var(--yellow); display: block; min-width: 80px; line-height: 1;
  }
  .stat-lbl { font-size: .82rem; color: rgba(255,255,255,0.65); margin-top: 6px; font-weight: 700; }

  /* Subjects */
  .subjects-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; max-width: 700px; margin: 0 auto; }
  .subj-card {
    background: white; border: 2.5px solid var(--gray-100); border-radius: var(--radius-xl);
    padding: 30px 16px; text-align: center; cursor: pointer;
    transition: all .28s; box-shadow: var(--card-shadow);
    position: relative; overflow: hidden;
  }
  .subj-card::before {
    content: ''; position: absolute; inset: 0; opacity: 0;
    background: linear-gradient(135deg, var(--purple-pale), var(--orange-pale));
    transition: opacity .28s;
  }
  .subj-card:hover::before { opacity: 1; }
  .subj-card:hover { border-color: var(--purple); transform: translateY(-6px); box-shadow: var(--card-shadow-hover); }
  .subj-emoji {
    font-size: 2.2rem; display: block; margin-bottom: 12px;
    transition: transform .28s; position: relative; z-index: 1;
  }
  .subj-card:hover .subj-emoji { transform: scale(1.2) rotate(-8deg); }
  .subj-card h5 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .92rem; position: relative; z-index: 1; }

  /* Testimonials */
  .testi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px,1fr)); gap: 22px; max-width: 1100px; margin: 0 auto; }
  .testi-card {
    background: white; border-radius: var(--radius-xl); padding: 28px 24px;
    box-shadow: var(--card-shadow); border: 2px solid transparent; transition: border-color .2s;
  }
  .testi-card:hover { border-color: var(--purple-pale); }
  .testi-stars { color: var(--yellow); font-size: 1rem; margin-bottom: 14px; letter-spacing: 3px; }
  .testi-quote { color: var(--gray-500); font-size: .92rem; line-height: 1.72; font-style: italic; margin-bottom: 20px; font-weight: 600; }
  .testi-author { display: flex; align-items: center; gap: 12px; }
  .testi-ava {
    width: 44px; height: 44px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 900; font-size: .9rem; flex-shrink: 0;
  }
  .av-purple { background: linear-gradient(135deg, var(--purple), var(--purple-light)); }
  .av-orange { background: linear-gradient(135deg, var(--orange), var(--yellow)); }
  .av-green  { background: linear-gradient(135deg, var(--green), #34d399); }
  .testi-name strong { display: block; font-size: .88rem; color: var(--purple-dark); font-weight: 800; }
  .testi-name span   { font-size: .77rem; color: var(--gray-400); font-weight: 600; }

  /* CTA Banner */
  .cta-wrap { padding: 0 5% 80px; }
  .cta-box {
    max-width: 1100px; margin: 0 auto;
    background: linear-gradient(135deg, var(--purple-dark), var(--purple), #8b5cf6);
    border-radius: var(--radius-2xl); padding: 56px 48px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 28px; flex-wrap: wrap; position: relative; overflow: hidden;
  }
  .cta-box::before {
    content: ''; position: absolute; right: -50px; top: -50px;
    width: 280px; height: 280px; border-radius: 50%;
    background: radial-gradient(circle, rgba(251,191,36,0.2) 0%, transparent 65%);
  }
  .cta-box::after {
    content: ''; position: absolute; left: 40%; bottom: -60px;
    width: 220px; height: 220px; border-radius: 50%;
    background: radial-gradient(circle, rgba(236,72,153,0.18) 0%, transparent 65%);
  }
  .cta-left { display: flex; align-items: center; gap: 22px; position: relative; z-index: 1; }
  .cta-icon {
    width: 74px; height: 74px; border-radius: 24px;
    background: rgba(255,255,255,0.15); border: 2px solid rgba(255,255,255,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 2.2rem; flex-shrink: 0;
    animation: wobble 4s ease-in-out infinite;
  }
  .cta-text h3 { font-family: 'Baloo 2', cursive; font-size: 1.5rem; font-weight: 800; color: white; }
  .cta-text p  { color: rgba(255,255,255,0.7); font-size: .92rem; margin-top: 6px; font-weight: 600; }
  .cta-btns { display: flex; gap: 12px; flex-wrap: wrap; position: relative; z-index: 1; }
  .cta-btn-main {
    padding: 13px 28px; background: linear-gradient(135deg, var(--orange), var(--yellow));
    color: white; font-weight: 800; border: none; border-radius: var(--radius-full);
    cursor: pointer; font-size: .93rem; font-family: 'Nunito', sans-serif;
    box-shadow: 0 6px 20px rgba(249,115,22,0.4); transition: all .2s;
  }
  .cta-btn-main:hover { transform: translateY(-2px); }
  .cta-btn-ghost {
    padding: 13px 26px; background: rgba(255,255,255,0.12);
    color: white; font-weight: 800; border: 2px solid rgba(255,255,255,0.3);
    border-radius: var(--radius-full); cursor: pointer; font-size: .93rem;
    font-family: 'Nunito', sans-serif; transition: all .2s;
  }
  .cta-btn-ghost:hover { background: rgba(255,255,255,0.22); border-color: rgba(255,255,255,.8); }

  /* ══════════════════════════════════════════
     FOOTER
  ══════════════════════════════════════════ */
  footer {
    background: var(--purple-dark);
    color: rgba(255,255,255,0.65); padding: 60px 5% 28px;
  }
  .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 44px; }
  .footer-brand p { font-size: .85rem; line-height: 1.72; margin-top: 14px; max-width: 215px; font-weight: 600; }
  .footer-col h6 {
    font-family: 'Baloo 2', cursive; font-weight: 800; color: white;
    font-size: .82rem; letter-spacing: .8px; margin-bottom: 16px; text-transform: uppercase;
  }
  .footer-col a {
    display: block; text-decoration: none; color: rgba(255,255,255,0.55);
    font-size: .83rem; margin-bottom: 10px; transition: color .2s; cursor: pointer; font-weight: 600;
  }
  .footer-col a:hover { color: var(--yellow); }
  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.10); padding-top: 22px;
    display: flex; justify-content: space-between; align-items: center;
    flex-wrap: wrap; gap: 8px; font-size: .8rem; font-weight: 600;
  }
  .footer-logo { display: flex; align-items: center; gap: 9px; margin-bottom: 14px; }
  .footer-logo-icon {
    width: 40px; height: 40px; border-radius: 13px;
    background: rgba(255,255,255,0.12); border: 2px solid rgba(255,255,255,0.2);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Baloo 2', cursive; font-weight: 800; color: white; font-size: 1.1rem;
  }
  .footer-logo-name { font-family: 'Baloo 2', cursive; font-weight: 800; color: white; font-size: 1.2rem; }
  .footer-logo-name span { color: var(--yellow); }

  /* ══════════════════════════════════════════
     INNER PAGES (Dashboard / Library / Explore)
  ══════════════════════════════════════════ */
  .inner-page { background: var(--gray-50); min-height: calc(100vh - 70px); padding: 40px 5%; }
  .page-title { font-family: 'Baloo 2', cursive; font-size: 1.65rem; font-weight: 800; color: var(--purple-dark); }
  .page-sub   { color: var(--gray-400); font-size: .9rem; margin-top: 4px; font-weight: 600; }
  .page-header { margin-bottom: 30px; }

  .dash-stats-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 18px; margin-bottom: 30px; max-width: 1200px; }
  .dash-stat {
    background: white; border-radius: var(--radius-xl); padding: 22px 20px;
    box-shadow: var(--card-shadow); border: 2px solid transparent;
    transition: all .25s; cursor: pointer;
  }
  .dash-stat:hover { border-color: var(--purple-pale); transform: translateY(-4px); box-shadow: var(--card-shadow-hover); }
  .dash-stat .ds-icon { font-size: 1.8rem; margin-bottom: 10px; }
  .dash-stat .ds-val { font-family: 'Baloo 2', cursive; font-size: 1.85rem; font-weight: 800; color: var(--purple-dark); }
  .dash-stat .ds-lbl { color: var(--gray-400); font-size: .8rem; margin-top: 3px; font-weight: 700; }

  .qa-section { max-width: 1200px; }
  .qa-section h3 { font-family: 'Baloo 2', cursive; font-size: 1.1rem; font-weight: 800; color: var(--purple-dark); margin-bottom: 14px; }
  .qa-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; }
  .qa-card {
    background: white; border-radius: var(--radius-xl); padding: 20px;
    box-shadow: var(--card-shadow); cursor: pointer; transition: all .25s;
    border: 2px solid transparent; display: flex; align-items: center; gap: 14px;
  }
  .qa-card:hover { transform: translateY(-4px); border-color: var(--purple); box-shadow: var(--card-shadow-hover); }
  .qa-icon {
    width: 48px; height: 48px; border-radius: 14px; background: var(--purple-pale);
    display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0;
    transition: transform .25s;
  }
  .qa-card:hover .qa-icon { transform: scale(1.15) rotate(-6deg); }
  .qa-card h5 { font-family: 'Baloo 2', cursive; font-size: .92rem; font-weight: 800; color: var(--purple-dark); }
  .qa-card p  { font-size: .79rem; color: var(--gray-400); margin-top: 3px; font-weight: 600; }

  /* Library */
  .lib-search { display: flex; gap: 10px; margin-bottom: 26px; max-width: 1200px; }
  .lib-search input {
    flex: 1; padding: 12px 18px; border: 2px solid var(--gray-200); border-radius: var(--radius-full);
    font-size: .9rem; font-family: 'Nunito', sans-serif; background: white; outline: none;
    transition: border-color .2s; font-weight: 600;
  }
  .lib-search input:focus { border-color: var(--purple); }
  .lib-search button {
    padding: 12px 24px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .9rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .lib-search button:hover { transform: translateY(-1px); }
  .quiz-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(290px,1fr)); gap: 18px; max-width: 1200px; }
  .quiz-card { background: white; border-radius: var(--radius-xl); padding: 22px; box-shadow: var(--card-shadow); border: 2px solid var(--gray-100); transition: all .25s; cursor: pointer; }
  .quiz-card:hover { transform: translateY(-5px); border-color: var(--purple-pale); box-shadow: var(--card-shadow-hover); }
  .quiz-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
  .q-badge { font-size: .72rem; font-weight: 800; padding: 5px 12px; border-radius: var(--radius-full); }
  .qb-live  { background: #fef2f2; color: #ef4444; }
  .qb-test  { background: var(--purple-pale); color: var(--purple); }
  .qb-hw    { background: var(--green-pale); color: var(--green); }
  .quiz-card h4 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .97rem; margin-bottom: 7px; }
  .quiz-card p  { font-size: .82rem; color: var(--gray-400); margin-bottom: 14px; font-weight: 600; }
  .quiz-meta { display: flex; gap: 14px; font-size: .78rem; color: var(--gray-400); font-weight: 700; }

  /* Explore */
  .cat-tabs { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 26px; max-width: 1200px; }
  .cat-tab {
    padding: 8px 18px; border-radius: var(--radius-full); font-size: .84rem; font-weight: 800;
    border: 2px solid var(--gray-200); background: white; color: var(--gray-500);
    cursor: pointer; transition: all .2s; font-family: 'Nunito', sans-serif;
  }
  .cat-tab:hover, .cat-tab.active {
    background: linear-gradient(135deg, var(--purple), var(--orange));
    border-color: transparent; color: white;
  }
  .explore-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap: 18px; max-width: 1200px; }
  .exp-card { background: white; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--card-shadow); border: 2px solid var(--gray-100); cursor: pointer; transition: all .25s; }
  .exp-card:hover { transform: translateY(-5px); border-color: var(--purple-pale); box-shadow: var(--card-shadow-hover); }
  .exp-img { height: 112px; display: flex; align-items: center; justify-content: center; font-size: 2.8rem; }
  .ei-p { background: linear-gradient(135deg, #f3e8ff, #ddd6fe); }
  .ei-o { background: linear-gradient(135deg, #fff7ed, #fed7aa); }
  .ei-g { background: linear-gradient(135deg, #ecfdf5, #a7f3d0); }
  .ei-y { background: linear-gradient(135deg, #fffbeb, #fde68a); }
  .exp-body { padding: 18px; }
  .exp-body h4 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .94rem; margin-bottom: 6px; }
  .exp-body p  { font-size: .8rem; color: var(--gray-400); margin-bottom: 12px; font-weight: 600; line-height: 1.55; }
  .exp-foot { display: flex; justify-content: space-between; align-items: center; }
  .exp-count { font-size: .78rem; color: var(--gray-400); font-weight: 700; }
  .start-btn {
    padding: 7px 16px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .79rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .start-btn:hover { transform: scale(1.06); }

  /* S.S.S. */
  .faq-item { background: white; border-radius: var(--radius-xl); margin-bottom: 10px; border: 2px solid var(--gray-100); overflow: hidden; transition: border-color .2s; }
  .faq-item:hover { border-color: var(--purple-pale); }
  details[open].faq-item { border-color: var(--purple-pale); }
  .faq-q { display: flex; align-items: center; justify-content: space-between; padding: 18px 22px; cursor: pointer; font-weight: 800; color: var(--purple-dark); font-size: .92rem; list-style: none; user-select: none; }
  .faq-q::-webkit-details-marker { display: none; }
  .faq-arr { color: var(--purple-light); font-size: .8rem; transition: transform .3s; flex-shrink: 0; }
  details[open] .faq-arr { transform: rotate(180deg); }
  .faq-a { padding: 14px 22px 18px; color: var(--gray-500); font-size: .88rem; line-height: 1.72; border-top: 2px solid var(--gray-100); font-weight: 600; }

  /* Contact */
  .contact-form-box { background: white; border-radius: var(--radius-2xl); padding: 36px; box-shadow: var(--card-shadow); border: 2px solid var(--purple-pale); max-width: 560px; margin: 0 auto; }
  .contact-form-box textarea {
    width: 100%; padding: 13px 18px; border: 2px solid var(--gray-200); border-radius: 14px;
    font-size: .9rem; font-family: 'Nunito', sans-serif; color: var(--text); font-weight: 600;
    background: var(--gray-50); transition: border-color .2s; outline: none; resize: vertical; min-height: 120px;
  }
  .contact-form-box textarea:focus { border-color: var(--purple); }

  /* ══════════════════════════════════════════
     SCROLL REVEAL
  ══════════════════════════════════════════ */
  .reveal { opacity: 0; transform: translateY(28px); transition: opacity .6s ease, transform .6s ease; }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* ══════════════════════════════════════════
     RESPONSIVE
  ══════════════════════════════════════════ */
  @media (max-width: 980px) {
    .auth-left { display: none; }
    .hero-inner { grid-template-columns: 1fr; text-align: center; }
    .hero-desc { margin: 0 auto 34px; }
    .hero-btns { justify-content: center; }
    .hero-card-wrap { margin-top: 44px; }
    .nav-links { display: none; }
    .footer-top { grid-template-columns: 1fr 1fr; }
    .dash-stats-grid, .qa-grid { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 540px) {
    .footer-top { grid-template-columns: 1fr; }
    .dash-stats-grid { grid-template-columns: 1fr 1fr; }
    .qa-grid { grid-template-columns: 1fr; }
    .subjects-grid { grid-template-columns: repeat(2,1fr); }
  }
  </style>
</head>
<body>

<!-- ══════════════════════════════════════════
     NAVBAR
══════════════════════════════════════════ -->
<nav class="navbar" id="mainNav" style="display:none;">

  <!-- Logo -->
  <a class="nav-logo" onclick="showPage('landing')">
    <div class="nav-logo-icon">Q</div>
    <div class="nav-logo-text">Quiz<span>ion</span></div>
  </a>

  <!-- Desktop Links -->
  <ul class="nav-links">
    <li>
      <a href="#" id="nav-landing" class="active" onclick="showPage('landing')">
        <span class="nav-emoji">🏠</span> Anasayfa
      </a>
    </li>
    <li>
      <a href="#" id="nav-library" onclick="authRequired('library')">
        <span class="nav-emoji">📚</span> Kütüphanem
      </a>
    </li>
    <li>
      <a href="#" id="nav-quick" onclick="authRequired('quick')">
        <span class="nav-emoji">⚡</span> Hızlı Erişim
      </a>
    </li>
    <li>
      <a href="#" id="nav-explore" onclick="authRequired('explore')">
        <span class="nav-emoji">🌍</span> Keşfet
      </a>
    </li>
    <li>
      <a href="#" onclick="showPage('login')">
        <span class="nav-emoji">🔑</span> Giriş Yap
      </a>
    </li>
  </ul>

  <!-- Right Side -->
  <div class="nav-right">

    <!-- Guest -->
    <div id="navGuest" style="display:flex;gap:8px;">
      <button class="nav-btn-login"    onclick="showPage('login')">Giriş Yap</button>
      <button class="nav-btn-register" onclick="showPage('register')">🚀 Ücretsiz Başla</button>
    </div>

    <!-- Logged-in User -->
    <div id="navUser" class="user-menu" style="display:none;">
      <button class="user-avatar-btn" onclick="toggleDrop()">
        <div class="avatar-circle" id="userInitial">U</div>
        <div class="user-info-text">
          <span class="user-name-text" id="userNameDisplay">Kullanıcı</span>
          <span class="user-role-text">Öğrenci</span>
        </div>
        <span style="color:var(--purple-light);font-size:.7rem;margin-left:4px;">▼</span>
      </button>
      <div class="user-dropdown" id="userDropdown">
        <button class="dd-item" onclick="showPage('home')">👤 Profilim</button>
        <button class="dd-item" onclick="showPage('library')">📚 Kütüphanem</button>
        <button class="dd-item" onclick="showPage('explore')">🌍 Keşfet</button>
        <div class="dd-sep"></div>
        <button class="dd-item danger" onclick="logout()">🚪 Çıkış Yap</button>
      </div>
    </div>

    <!-- Hamburger -->
    <button class="ham-btn" onclick="openHam()" aria-label="Menü">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- ══════════════════════════════════════════
     HAMBURGER PANEL
══════════════════════════════════════════ -->
<div class="ham-overlay" id="hamOverlay" onclick="closeHam()"></div>
<aside class="ham-panel" id="hamPanel">
  <div class="ham-top">
    <span class="ham-logo">Quiz<span>ion</span></span>
    <button class="ham-close" onclick="closeHam()">✕</button>
  </div>
  <div class="ham-body">

    <div class="ham-section">📌 Sayfalar</div>

    <button class="ham-item" onclick="showPage('landing');closeHam()">
      <div class="ham-item-icon hi-purple">🏠</div>
      <div class="ham-item-info"><strong>Anasayfa</strong><span>Quizion'a dön</span></div>
    </button>
    <button class="ham-item" onclick="authRequired('library');closeHam()">
      <div class="ham-item-icon hi-orange">📚</div>
      <div class="ham-item-info"><strong>Kütüphanem</strong><span>Sınavlarım ve ödevlerim</span></div>
    </button>
    <button class="ham-item" onclick="authRequired('quick');closeHam()">
      <div class="ham-item-icon hi-yellow">⚡</div>
      <div class="ham-item-info"><strong>Hızlı Erişim</strong><span>Son aktivitelerin</span></div>
    </button>
    <button class="ham-item" onclick="authRequired('explore');closeHam()">
      <div class="ham-item-icon hi-green">🌍</div>
      <div class="ham-item-info"><strong>Keşfet</strong><span>Binlerce sınav seni bekliyor</span></div>
    </button>

    <div class="ham-sep"></div>
    <div class="ham-section">❓ Yardım</div>

    <button class="ham-item" onclick="showPage('faq');closeHam()">
      <div class="ham-item-icon hi-sky">💡</div>
      <div class="ham-item-info"><strong>S.S.S.</strong><span>Sıkça sorulan sorular</span></div>
    </button>
    <button class="ham-item" onclick="showPage('contact');closeHam()">
      <div class="ham-item-icon hi-pink">📩</div>
      <div class="ham-item-info"><strong>İletişim</strong><span>Bize ulaşın</span></div>
    </button>

  </div>
  <div class="ham-footer" id="hamFooter">
    <button class="ham-footer-btn-login" onclick="showPage('login');closeHam()">Giriş Yap</button>
    <button class="ham-footer-btn-reg"   onclick="showPage('register');closeHam()">🚀 Ücretsiz Başla</button>
  </div>
</aside>

<!-- ══════════════════════════════════════════
     AUTH MODAL
══════════════════════════════════════════ -->
<div class="auth-modal-bg" id="authModal" onclick="handleModalClick(event)">
  <div class="auth-modal-box">
    <button class="modal-x" onclick="closeModal()">✕</button>
    <div class="modal-sticker">🔐</div>
    <h2>Önce Giriş Yapmalısın!</h2>
    <p class="modal-sub">Bu içeriğe erişmek için üye olman gerekiyor.<br>Hemen ücretsiz hesap aç veya giriş yap! 🎉</p>
    <button class="modal-btn-main" onclick="closeModal();showPage('register')">🚀 Ücretsiz Hesap Oluştur</button>
    <button class="modal-btn-sec"  onclick="closeModal();showPage('login')">Zaten Hesabım Var</button>
    <p class="modal-note">✅ Üyelik tamamen ücretsiz · Kredi kartı gerekmez</p>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: LANDING
══════════════════════════════════════════ -->
<div id="page-landing" class="page active">

  <!-- HERO -->
  <section class="hero">
    <div class="hero-shape-1"></div>
    <div class="hero-shape-2"></div>
    <div class="hero-shape-3"></div>
    <!-- floating decorations -->
    <span class="hero-float">🎯</span>
    <span class="hero-float">📖</span>
    <span class="hero-float">⭐</span>
    <span class="hero-float">🎉</span>

    <div class="hero-inner">
      <!-- LEFT: Text -->
      <div class="hero-text">
        <div class="hero-badge">✨ Ortaokul Öğrencilerine Özel Platform</div>
        <h1>
          Öğrenmek <span class="h1-accent">Artık</span><br>
          Çok Daha <span class="h1-accent2">Eğlenceli!</span>
        </h1>
        <p class="hero-desc">Yapay zeka destekli analizler, eğlenceli sınavlar ve gerçek zamanlı yarışmalarla derslerinde süper kahraman ol! 🦸</p>
        <div class="hero-btns">
          <button class="hero-cta" onclick="showPage('register')">Hemen Başla 🚀</button>
          <button class="hero-ghost">▶ Nasıl Çalışır?</button>
        </div>
        <div class="hero-trust">
          <div class="trust-pill">🎓 10K+ Öğrenci</div>
          <div class="trust-pill">📝 500+ Sınav</div>
          <div class="trust-pill">🏆 24/7 Destek</div>
        </div>
      </div>

      <!-- RIGHT: Card Visual -->
      <div class="hero-card-wrap">
        <div class="score-sticker"><span>%96</span>Başarı!</div>
        <div class="hero-card">
          <div class="hc-head">
            <div class="hc-title">🏅 Haftalık Performans</div>
            <div class="hc-badge">🔥 Harika!</div>
          </div>
          <div class="hc-stats">
            <div class="hc-stat hcs-1"><div class="hc-val">12</div><div class="hc-lbl">Sınav</div></div>
            <div class="hc-stat hcs-2"><div class="hc-val">%88</div><div class="hc-lbl">Başarı</div></div>
            <div class="hc-stat hcs-3"><div class="hc-val">450</div><div class="hc-lbl">Soru</div></div>
            <div class="hc-stat hcs-4"><div class="hc-val">8s</div><div class="hc-lbl">Çalışma</div></div>
          </div>
          <div class="hc-chart">
            <div class="hc-bar bar-p" style="height:38%"></div>
            <div class="hc-bar bar-p" style="height:56%"></div>
            <div class="hc-bar bar-o" style="height:82%"></div>
            <div class="hc-bar bar-p" style="height:47%"></div>
            <div class="hc-bar bar-p" style="height:70%"></div>
            <div class="hc-bar bar-o" style="height:95%"></div>
            <div class="hc-bar bar-p" style="height:60%"></div>
          </div>
        </div>
        <div class="card-sticker">
          <div class="sticker-icon">🏆</div>
          <div class="sticker-text">
            <strong>Yeni Rozet!</strong>
            <span>Matematik Dehası</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ÖZELLİKLER -->
  <section class="section section-gray">
    <div class="section-head reveal">
      <div class="section-tag">⚡ Özellikler</div>
      <h2 class="section-title">Öğrenmeyi Süper Güce Dönüştür!</h2>
      <p class="section-desc">Quizion ile dersler eğlenceye, başarı alışkanlığa dönüşüyor.</p>
    </div>
    <div class="features-grid">
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-p"><span class="feat-icon">📊</span></div>
        <h4>Akıllı Analiz</h4>
        <p>Yapay zeka hangi konuların üzerinde durman gerektiğini sana söylüyor. Boşuna çalışma bitti!</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-o"><span class="feat-icon">⚡</span></div>
        <h4>Canlı Yarışmalar</h4>
        <p>Sınıf arkadaşlarınla aynı anda yarış, sıralamada zirveye çık! En hızlı kim?</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-g"><span class="feat-icon">🎯</span></div>
        <h4>Konu Takibi</h4>
        <p>Hangi konuları bitirdiğini gör, ilerleme çubukları seni motive ediyor.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-y"><span class="feat-icon">🏆</span></div>
        <h4>Rozetler & Ödüller</h4>
        <p>Her başarın için özel rozet kazan, puan topla ve arkadaşlarına göster!</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-k"><span class="feat-icon">📱</span></div>
        <h4>Her Yerden Çalış</h4>
        <p>Tablet, telefon, bilgisayar — dilediğin cihazdan, dilediğin yerde çalış.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-s"><span class="feat-icon">👨‍👩‍👧</span></div>
        <h4>Aile Takibi</h4>
        <p>Annene babana gelişimini göster. Onlar da seninle gurur duysun!</p>
      </div>
    </div>
  </section>

  <!-- İSTATİSTİK SAYACI -->
  <section class="stats-band">
    <div class="stats-inner">
      <div class="stats-left reveal">
        <h2>Rakamlarla Quizion</h2>
        <p>Türkiye'nin en sevilen ortaokul sınav platformu.</p>
      </div>
      <div class="stats-nums">
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="50000000" data-suffix="">0</span>
          <div class="stat-lbl">Çözülen Soru</div>
        </div>
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="150000" data-suffix="">0</span>
          <div class="stat-lbl">Öğretmen</div>
        </div>
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="95" data-suffix="%">0</span>
          <div class="stat-lbl">Memnuniyet</div>
        </div>
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="10000" data-suffix="+">0</span>
          <div class="stat-lbl">Aktif Öğrenci</div>
        </div>
      </div>
    </div>
  </section>

  <!-- DERSLER -->
  <section class="section">
    <div class="section-head reveal">
      <div class="section-tag">📚 Dersler</div>
      <h2 class="section-title">Hangi Derste Zayıfsın?</h2>
      <p class="section-desc">Tüm ortaokul derslerine özel hazırlanmış binlerce soru seni bekliyor!</p>
    </div>
    <div class="subjects-grid">
      <div class="subj-card reveal"><span class="subj-emoji">🧬</span><h5>Fen Bilimleri</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">📐</span><h5>Matematik</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🌍</span><h5>Sosyal Bilgiler</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">📖</span><h5>Türkçe</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🇬🇧</span><h5>İngilizce</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🕌</span><h5>Din Kültürü</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🎨</span><h5>Görsel Sanatlar</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🎵</span><h5>Müzik</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">💻</span><h5>Bilişim</h5></div>
    </div>
  </section>

  <!-- YORUMLAR -->
  <section class="section section-gray testimonials">
    <div class="section-head reveal">
      <div class="section-tag">💬 Yorumlar</div>
      <h2 class="section-title">Onlar Anlatsın!</h2>
    </div>
    <div class="testi-grid">
      <div class="testi-card reveal">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-quote">"LGS'ye hazırlanırken en çok bu uygulamayı kullandım. Matematik notum 55'ten 90'a çıktı! Gerçekten işe yarıyor."</p>
        <div class="testi-author">
          <div class="testi-ava av-purple">M</div>
          <div class="testi-name"><strong>Mert Yılmaz</strong><span>8. Sınıf Öğrencisi</span></div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-quote">"Öğrencilerimin ödevlerini takip etmek çok kolaylaştı. Hangi konularda eksik olduklarını anında görüyorum."</p>
        <div class="testi-author">
          <div class="testi-ava av-orange">A</div>
          <div class="testi-name"><strong>Ayşe Demir</strong><span>Matematik Öğretmeni</span></div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-quote">"Canlı yarışmalar süper! Arkadaşlarımla yarışmak çok eğlenceli, ders çalışmak artık sıkıcı gelmiyor 😄"</p>
        <div class="testi-author">
          <div class="testi-ava av-green">Z</div>
          <div class="testi-name"><strong>Zeynep Kaya</strong><span>7. Sınıf Öğrencisi</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="cta-wrap">
    <div class="cta-box reveal">
      <div class="cta-left">
        <div class="cta-icon">🎁</div>
        <div class="cta-text">
          <h3>14 Gün Ücretsiz Dene!</h3>
          <p>Kredi kartı yok, taahhüt yok. Sadece öğren ve eğlen!</p>
        </div>
      </div>
      <div class="cta-btns">
        <button class="cta-btn-main" onclick="showPage('register')">🚀 Hemen Başla</button>
        <button class="cta-btn-ghost">Planları İncele</button>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="footer-top">
      <div class="footer-brand">
        <div class="footer-logo">
          <div class="footer-logo-icon">Q</div>
          <div class="footer-logo-name">Quiz<span>ion</span></div>
        </div>
        <p>Ortaokul öğrencileri için en eğlenceli ve akıllı sınav platformu. Başarı yolculuğunda yanındayız!</p>
      </div>
      <div class="footer-col">
        <h6>Platform</h6>
        <a href="#">Özellikler</a><a href="#">Sınavlar</a><a href="#">Rozetler</a>
      </div>
      <div class="footer-col">
        <h6>Destek</h6>
        <a onclick="showPage('faq')">S.S.S.</a>
        <a href="#">Topluluk</a>
        <a onclick="showPage('contact')">İletişim</a>
      </div>
      <div class="footer-col">
        <h6>Yasal</h6>
        <a href="#">Gizlilik</a><a href="#">Kullanım Şartları</a><a href="#">KVKK</a>
      </div>
      <div class="footer-col">
        <h6>Sosyal</h6>
        <a href="#">Instagram</a><a href="#">YouTube</a><a href="#">TikTok</a>
      </div>
    </div>
    <div class="footer-bottom">
      <div>© 2024 Quizion. Tüm Hakları Saklıdır. 💜</div>
      <div style="display:flex;gap:20px;"><span>Türkçe 🇹🇷</span><span>🔒 Güvenli</span></div>
    </div>
  </footer>

</div><!-- /landing -->


<!-- ══════════════════════════════════════════
     SAYFA: GİRİŞ
══════════════════════════════════════════ -->
<div id="page-login" class="page">
  <div class="auth-page">
    <div class="auth-left">
      <span class="auth-deco">🎯</span>
      <span class="auth-deco">⭐</span>
      <span class="auth-deco">📚</span>
      <span class="auth-deco">🏆</span>
      <div class="auth-left-content">
        <a href="#" class="auth-brand" onclick="showPage('landing')">
          <div class="auth-brand-icon">Q</div>
          <div class="auth-brand-name">Quiz<span>ion</span></div>
        </a>
        <h2>Tekrar <span>Hoş Geldin!</span></h2>
        <p class="auth-left-desc">Kaldığın yerden devam et, sıralamada yüksel ve yeni rozetler kazan! 🏅</p>
        <div class="auth-perks">
          <div class="auth-perk">
            <div class="auth-perk-icon">🛡️</div>
            <div><strong>Güvenli Giriş</strong><span>Verileriniz uçtan uca korunur</span></div>
          </div>
          <div class="auth-perk">
            <div class="auth-perk-icon">⚡</div>
            <div><strong>Hızlı Senkronize</strong><span>Her cihazdan anında erişim</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="auth-right">
      <div class="auth-box">
        <button class="back-btn" onclick="showPage('landing')">← Anasayfaya Dön</button>
        <h2>Giriş Yap 👋</h2>
        <p class="auth-sub">Hesabın yok mu? <a href="#" onclick="showPage('register')">Ücretsiz kaydol!</a></p>
        <div class="auth-msg error" id="loginErr">E-posta veya şifre hatalı.</div>
        <form onsubmit="handleLogin(event)">
          <div class="form-group">
            <label>E-Posta Adresi</label>
            <input type="email" id="loginEmail" placeholder="ornek@mail.com" required>
          </div>
          <div class="form-group">
            <label>Şifre</label>
            <div class="pw-wrap">
              <input type="password" id="loginPass" placeholder="••••••••" required>
              <button type="button" class="pw-toggle" onclick="togglePw('loginPass',this)">👁️</button>
            </div>
          </div>
          <div class="form-options">
            <label class="check-label"><input type="checkbox"> Beni Hatırla</label>
            <a href="#" class="forgot-link">Şifremi Unuttum</a>
          </div>
          <button type="submit" class="auth-submit">Giriş Yap 🚀</button>
        </form>
        <div class="auth-divider">veya şununla devam et</div>
        <div class="social-btns">
          <button class="social-btn" onclick="socialLogin('Google')"><img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="G"> Google</button>
          <button class="social-btn" onclick="socialLogin('Apple')"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="A"> Apple</button>
        </div>
        <p class="terms-note">Giriş yaparak <a href="#">Kullanım Şartları</a>'nı kabul etmiş olursunuz.</p>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: KAYIT
══════════════════════════════════════════ -->
<div id="page-register" class="page">
  <div class="auth-page">
    <div class="auth-left">
      <span class="auth-deco">🚀</span>
      <span class="auth-deco">🌟</span>
      <span class="auth-deco">🎉</span>
      <span class="auth-deco">💪</span>
      <div class="auth-left-content">
        <a href="#" class="auth-brand" onclick="showPage('landing')">
          <div class="auth-brand-icon">Q</div>
          <div class="auth-brand-name">Quiz<span>ion</span></div>
        </a>
        <h2>Başarı <span>Yolculuğuna</span> Başla!</h2>
        <p class="auth-left-desc">Binlerce öğrencinin katıldığı platformda yerine hazır, sadece sen eksiktin!</p>
        <div class="auth-perks">
          <div class="auth-perk">
            <div class="auth-perk-icon">🎁</div>
            <div><strong>Tamamen Ücretsiz</strong><span>Kredi kartı gerektirmez</span></div>
          </div>
          <div class="auth-perk">
            <div class="auth-perk-icon">✨</div>
            <div><strong>İlk Hafta Premium</strong><span>Tüm özellikler açık!</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="auth-right">
      <div class="auth-box">
        <button class="back-btn" onclick="showPage('landing')">← Anasayfaya Dön</button>
        <h2>Hesap Oluştur 🎉</h2>
        <p class="auth-sub">Zaten üye misin? <a href="#" onclick="showPage('login')">Giriş yap!</a></p>
        <div class="auth-msg success" id="regSuccess">Hesabın oluşturuldu! Yönlendiriliyorsun... 🚀</div>
        <form onsubmit="handleRegister(event)">
          <div class="form-row">
            <div class="form-group"><label>Ad</label><input type="text" id="regFirstName" placeholder="Adın" required></div>
            <div class="form-group"><label>Soyad</label><input type="text" id="regLastName" placeholder="Soyadın" required></div>
          </div>
          <div class="form-group"><label>E-Posta</label><input type="email" id="regEmail" placeholder="ornek@mail.com" required></div>
          <div class="form-group">
            <label>Şifre</label>
            <div class="pw-wrap">
              <input type="password" id="regPass" placeholder="En az 8 karakter" required>
              <button type="button" class="pw-toggle" onclick="togglePw('regPass',this)">👁️</button>
            </div>
          </div>
          <button type="submit" class="auth-submit">Ücretsiz Üye Ol 🎉</button>
        </form>
        <div class="auth-divider">veya şununla devam et</div>
        <div class="social-btns">
          <button class="social-btn" onclick="socialLogin('Google')"><img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="G"> Google</button>
          <button class="social-btn" onclick="socialLogin('Apple')"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="A"> Apple</button>
        </div>
        <p class="terms-note">Üye olarak <a href="#">KVKK Aydınlatma Metni</a>'ni okuduğunu kabul ediyorsun.</p>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: DASHBOARD
══════════════════════════════════════════ -->
<div id="page-home" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title" id="dashWelcome">Merhaba, Kahraman! 👋</h1>
    <p class="page-sub">Bugün ne öğreneceksin? Her doğru cevap seni zirveye yaklaştırıyor! 🚀</p>
  </div>
  <div class="dash-stats-grid">
    <div class="dash-stat"><div class="ds-icon">📝</div><div class="ds-val">24</div><div class="ds-lbl">Tamamlanan Sınav</div></div>
    <div class="dash-stat"><div class="ds-icon">🎯</div><div class="ds-val">%92</div><div class="ds-lbl">Ortalama Başarı</div></div>
    <div class="dash-stat"><div class="ds-icon">🔥</div><div class="ds-val">5 Gün</div><div class="ds-lbl">Çalışma Serisi</div></div>
    <div class="dash-stat"><div class="ds-icon">💎</div><div class="ds-val">1,250</div><div class="ds-lbl">Quizion Puanı</div></div>
  </div>
  <div class="qa-section">
    <h3>🚀 Hızlı İşlemler</h3>
    <div class="qa-grid">
      <div class="qa-card" onclick="alert('Sınav oluşturma yakında! 🚧')">
        <div class="qa-icon">➕</div>
        <div><h5>Sınav Oluştur</h5><p>Yeni test veya canlı yarışma başlat</p></div>
      </div>
      <div class="qa-card" onclick="showPage('explore')">
        <div class="qa-icon">🔍</div>
        <div><h5>Sınav Keşfet</h5><p>Hazır sınavlara göz at</p></div>
      </div>
      <div class="qa-card" onclick="showPage('library')">
        <div class="qa-icon">📊</div>
        <div><h5>Raporlarım</h5><p>Gelişimini detaylı gör</p></div>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: KÜTÜPHANEİM
══════════════════════════════════════════ -->
<div id="page-library" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title">📚 Kütüphanem</h1>
    <p class="page-sub">Tüm sınavların, ödevlerin ve kayıtlı içerikler burada.</p>
  </div>
  <div class="lib-search">
    <input type="text" placeholder="🔍 Sınav başlığı veya konu ara...">
    <button>Ara</button>
  </div>
  <div class="quiz-list">
    <div class="quiz-card">
      <div class="quiz-top"><span class="q-badge qb-live">🔴 Canlı Sınav</span><span style="font-size:.74rem;color:var(--gray-400);font-weight:700;">Dün</span></div>
      <h4>Matematik: Kesirler ve Ondalıklar</h4>
      <p>15 Soru • 30 Dakika • Orta Seviye</p>
      <div class="quiz-meta"><span>👥 45 Katılımcı</span><span style="color:var(--green);">⭐ %94 Başarı</span></div>
    </div>
    <div class="quiz-card">
      <div class="quiz-top"><span class="q-badge qb-test">💜 Deneme</span><span style="font-size:.74rem;color:var(--gray-400);font-weight:700;">3 Gün Önce</span></div>
      <h4>Türkçe: Paragraf ve Anlam</h4>
      <p>40 Soru • 50 Dakika • Orta Seviye</p>
      <div class="quiz-meta"><span>👤 Bireysel</span><span style="color:var(--purple);">⭐ %82 Başarı</span></div>
    </div>
    <div class="quiz-card">
      <div class="quiz-top"><span class="q-badge qb-hw">🟢 Ödev</span><span style="font-size:.74rem;color:var(--gray-400);font-weight:700;">Geçen Hafta</span></div>
      <h4>İngilizce: School Vocabulary</h4>
      <p>20 Soru • 15 Dakika • Kolay</p>
      <div class="quiz-meta"><span>🏫 6/A Sınıfı</span><span style="color:var(--green);">⭐ %100 Başarı</span></div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: KEŞFET
══════════════════════════════════════════ -->
<div id="page-explore" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title">🌍 Sınav Keşfet</h1>
    <p class="page-sub">Binlerce sınav seni bekliyor! Hangisinde kendini sınayacaksın?</p>
  </div>
  <div class="cat-tabs">
    <button class="cat-tab active" onclick="setTab(this)">Tümü</button>
    <button class="cat-tab" onclick="setTab(this)">Matematik</button>
    <button class="cat-tab" onclick="setTab(this)">Fen Bilimleri</button>
    <button class="cat-tab" onclick="setTab(this)">Türkçe</button>
    <button class="cat-tab" onclick="setTab(this)">İngilizce</button>
    <button class="cat-tab" onclick="setTab(this)">Sosyal</button>
  </div>
  <div class="explore-grid">
    <div class="exp-card"><div class="exp-img ei-p">📐</div><div class="exp-body"><h4>Geometri: Üçgenler</h4><p>Tüm üçgen kurallarını kapsayan temel seviye sınavı.</p><div class="exp-foot"><span class="exp-count">🔥 1.2k Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
    <div class="exp-card"><div class="exp-img ei-o">🧬</div><div class="exp-body"><h4>Biyoloji: Hücre</h4><p>Organeller ve hücre yapısı üzerine detaylı test.</p><div class="exp-foot"><span class="exp-count">🔥 850 Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
    <div class="exp-card"><div class="exp-img ei-g">🌎</div><div class="exp-body"><h4>Dünya Başkentleri</h4><p>Eğlenceli genel kültür yarışmasına hazır mısın?</p><div class="exp-foot"><span class="exp-count">🔥 3.4k Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
    <div class="exp-card"><div class="exp-img ei-y">📖</div><div class="exp-body"><h4>Türkçe: Atasözleri</h4><p>Bilmece gibi sorularla Türkçe'ni güçlendir!</p><div class="exp-foot"><span class="exp-count">🔥 2.1k Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: HIZLI ERİŞİM
══════════════════════════════════════════ -->
<div id="page-quick" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title">⚡ Hızlı Erişim</h1>
    <p class="page-sub">Son aktivitelerin ve favorilerin hemen burada!</p>
  </div>
  <div class="dash-stats-grid">
    <div class="dash-stat"><div class="ds-icon">🕐</div><div class="ds-val">3</div><div class="ds-lbl">Son Açılan</div></div>
    <div class="dash-stat"><div class="ds-icon">⭐</div><div class="ds-val">12</div><div class="ds-lbl">Favorilerim</div></div>
    <div class="dash-stat"><div class="ds-icon">📌</div><div class="ds-val">5</div><div class="ds-lbl">Devam Eden Ödev</div></div>
    <div class="dash-stat"><div class="ds-icon">🔔</div><div class="ds-val">2</div><div class="ds-lbl">Bildirimler</div></div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: S.S.S.
══════════════════════════════════════════ -->
<div id="page-faq" class="page inner-page">
  <div style="max-width:700px;margin:0 auto;">
    <div class="section-head" style="margin-bottom:36px;">
      <div class="section-tag">💡 Destek</div>
      <h2 class="section-title">Sıkça Sorulan Sorular</h2>
      <p class="section-desc">Aklına takılan her şeyin cevabı burada!</p>
    </div>
    <details class="faq-item"><summary class="faq-q">Quizion ücretsiz mi? <span class="faq-arr">▼</span></summary><div class="faq-a">Evet! Temel özellikler tamamen ücretsizdir. Premium plan ile gelişmiş analizler ve sınırsız içeriklere erişebilirsin. İlk 14 gün tüm premium özellikler açık!</div></details>
    <details class="faq-item"><summary class="faq-q">Kaç yaşındakiler kullanabilir? <span class="faq-arr">▼</span></summary><div class="faq-a">Quizion özellikle 10-15 yaş arası ortaokul öğrencileri için tasarlanmıştır. 5., 6., 7. ve 8. sınıf müfredatına uygun soru bankaları mevcuttur.</div></details>
    <details class="faq-item"><summary class="faq-q">Nasıl sınav oluşturabilirim? <span class="faq-arr">▼</span></summary><div class="faq-a">Hesap oluşturduktan sonra dashboard'dan "Sınav Oluştur" butonuna tıklayarak yeni sınav, test veya canlı yarışma oluşturabilirsin. Çok kolay!</div></details>
    <details class="faq-item"><summary class="faq-q">Verilerim güvende mi? <span class="faq-arr">▼</span></summary><div class="faq-a">Evet! Tüm veriler uçtan uca şifrelenerek korunuyor. KVKK kapsamında veriler üçüncü taraflarla paylaşılmaz. Güvenlik birinci önceliğimiz!</div></details>
    <details class="faq-item"><summary class="faq-q">Öğretmenler de kullanabilir mi? <span class="faq-arr">▼</span></summary><div class="faq-a">Evet! Öğretmenler ödev verebilir, sınıf oluşturabilir ve öğrenci gelişimini takip edebilir. Kurumsal paket için bizimle iletişime geç.</div></details>
    <div style="text-align:center;margin-top:32px;">
      <p style="color:var(--gray-400);font-size:.88rem;margin-bottom:14px;font-weight:600;">Sorun hâlâ çözülmedi mi? 🤔</p>
      <button onclick="showPage('contact')" class="nav-btn-register">📩 Bize Yaz</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: İLETİŞİM
══════════════════════════════════════════ -->
<div id="page-contact" class="page inner-page">
  <div style="max-width:560px;margin:0 auto;">
    <div class="section-head" style="margin-bottom:32px;">
      <div class="section-tag">📩 İletişim</div>
      <h2 class="section-title">Bize Ulaşın!</h2>
      <p class="section-desc">Her türlü soru, öneri veya sorun için buradayız. En hızlı şekilde yanıt veririz!</p>
    </div>
    <div class="contact-form-box">
      <div class="form-row">
        <div class="form-group"><label>Ad</label><input type="text" placeholder="Adın"></div>
        <div class="form-group"><label>Soyad</label><input type="text" placeholder="Soyadın"></div>
      </div>
      <div class="form-group"><label>E-Posta</label><input type="email" placeholder="ornek@mail.com"></div>
      <div class="form-group"><label>Konu</label><input type="text" placeholder="Mesajının konusu"></div>
      <div class="form-group">
        <label>Mesaj</label>
        <textarea placeholder="Mesajını buraya yaz..."></textarea>
      </div>
      <button class="auth-submit" onclick="alert('Mesajın gönderildi! En kısa sürede dönüş yapacağız ✅')">Gönder 📤</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════ -->
<script>
// ─── STATE ───────────────────────────────────
let isLoggedIn = false;

// ─── SAYFA YÖNLENDİRİCİ ─────────────────────
function showPage(id) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  const el = document.getElementById('page-' + id);
  if (el) { el.classList.add('active'); window.scrollTo({ top:0, behavior:'smooth' }); }

  // Navbar göster/gizle
  const nav = document.getElementById('mainNav');
  const hideFor = ['landing','login','register'];
  nav.style.display = hideFor.includes(id) ? 'none' : 'flex';

  // Aktif link
  document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
  const lnk = document.getElementById('nav-' + id);
  if (lnk) lnk.classList.add('active');

  // Ham footer
  const hf = document.getElementById('hamFooter');
  if (hf) hf.style.display = isLoggedIn ? 'none' : 'flex';

  // Landing → scroll reveal
  if (id === 'landing') setTimeout(initReveal, 120);
}

// ─── AUTH KORUMA ─────────────────────────────
function authRequired(pageId) {
  isLoggedIn ? showPage(pageId) : openModal();
}

// ─── LOGIN ───────────────────────────────────
function handleLogin(e) {
  e.preventDefault();
  loginSuccess({ firstName:'Can', lastName:'Yılmaz', email: document.getElementById('loginEmail').value });
}

// ─── REGISTER ────────────────────────────────
function handleRegister(e) {
  e.preventDefault();
  const s = document.getElementById('regSuccess');
  s.classList.add('show');
  const user = {
    firstName: document.getElementById('regFirstName').value,
    lastName:  document.getElementById('regLastName').value,
    email:     document.getElementById('regEmail').value
  };
  setTimeout(() => { loginSuccess(user); s.classList.remove('show'); }, 1500);
}

// ─── LOGIN SUCCESS ───────────────────────────
function loginSuccess(user) {
  isLoggedIn = true;
  document.getElementById('navGuest').style.display = 'none';
  document.getElementById('navUser').style.display  = 'block';
  document.getElementById('userNameDisplay').textContent = user.firstName + ' ' + user.lastName;
  document.getElementById('userInitial').textContent     = user.firstName[0].toUpperCase();
  document.getElementById('dashWelcome').textContent     = 'Merhaba, ' + user.firstName + '! 👋';
  const hf = document.getElementById('hamFooter');
  if (hf) hf.style.display = 'none';
  showPage('home');
}

// ─── LOGOUT ──────────────────────────────────
function logout() {
  isLoggedIn = false;
  document.getElementById('navGuest').style.display = 'flex';
  document.getElementById('navUser').style.display  = 'none';
  const hf = document.getElementById('hamFooter');
  if (hf) hf.style.display = 'flex';
  closeDrop();
  showPage('landing');
}

// ─── SOCIAL ──────────────────────────────────
function socialLogin(p) {
  loginSuccess({ firstName:p, lastName:'Kullanıcısı', email:'sosyal@quizion.com' });
}

// ─── DROPDOWN ────────────────────────────────
function toggleDrop() { document.getElementById('userDropdown').classList.toggle('open'); }
function closeDrop()  { document.getElementById('userDropdown').classList.remove('open'); }
document.addEventListener('click', e => {
  const dd  = document.getElementById('userDropdown');
  const btn = document.querySelector('.user-avatar-btn');
  if (dd && btn && !dd.contains(e.target) && !btn.contains(e.target)) closeDrop();
});

// ─── HAMBURGER ───────────────────────────────
function openHam() {
  document.getElementById('hamPanel').classList.add('open');
  document.getElementById('hamOverlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeHam() {
  document.getElementById('hamPanel').classList.remove('open');
  document.getElementById('hamOverlay').classList.remove('open');
  document.body.style.overflow = '';
}

// ─── AUTH MODAL ──────────────────────────────
function openModal() {
  document.getElementById('authModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeModal() {
  document.getElementById('authModal').classList.remove('open');
  document.body.style.overflow = '';
}
function handleModalClick(e) {
  if (e.target === document.getElementById('authModal')) closeModal();
}

// ─── PASSWORD TOGGLE ─────────────────────────
function togglePw(id, btn) {
  const el = document.getElementById(id);
  el.type  = el.type === 'password' ? 'text' : 'password';
  btn.textContent = el.type === 'password' ? '👁️' : '🙈';
}

// ─── CATEGORY TABS ───────────────────────────
function setTab(el) {
  document.querySelectorAll('.cat-tab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
}

// ─── NAVBAR SCROLL ───────────────────────────
window.addEventListener('scroll', () => {
  const nav = document.getElementById('mainNav');
  if (nav) nav.classList.toggle('scrolled', window.scrollY > 20);
});

// ════════════════════════════════════════════
// İSTATİSTİK SAYACI ANİMASYONU
// ════════════════════════════════════════════
function formatNum(v, s) {
  if (v >= 1000000) return (v/1000000).toFixed(0) + 'M' + s;
  if (v >= 1000)    return (v/1000).toFixed(0)    + 'K' + s;
  return v + s;
}

function animateCounter(el) {
  const target   = parseInt(el.dataset.target);
  const suffix   = el.dataset.suffix || '';
  const duration = 2400;
  const t0 = performance.now();

  (function tick(now) {
    const p = Math.min((now - t0) / duration, 1);
    const e = 1 - Math.pow(1 - p, 3); // ease-out cubic
    el.textContent = formatNum(Math.floor(e * target), suffix);
    if (p < 1) requestAnimationFrame(tick);
    else el.textContent = formatNum(target, suffix);
  })(t0);
}

// ─── SCROLL REVEAL + COUNTER ─────────────────
function initReveal() {
  // Sayaçlar
  document.querySelectorAll('.counter').forEach(el => {
    if (el._obs) return;
    el._obs = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.dataset.done) {
          entry.target.dataset.done = '1';
          animateCounter(entry.target);
        }
      });
    }, { threshold: 0.4 });
    el._obs.observe(el);
  });

  // Reveal
  document.querySelectorAll('.reveal').forEach((el, i) => {
    if (el._robs) return;
    el._robs = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('visible'), 70 * (i % 5));
          el._robs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.10 });
    el._robs.observe(el);
  });
}

document.addEventListener('DOMContentLoaded', initReveal);
</script>


</body>
</html>
