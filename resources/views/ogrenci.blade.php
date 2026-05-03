<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion - Ana Sayfa</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --purple-dark: #2d1b6b;
    --purple-main: #4c2fb5;
    --purple-light: #6c47d4;
    --orange: #f59e0b;
    --orange-btn: #f97316;
    --green: #22c55e;
    --red: #ef4444;
    --bg: #f4f6fc;
    --white: #ffffff;
    --text-dark: #1e1e2e;
    --text-mid: #4b5563;
    --text-light: #9ca3af;
    --sidebar-w: 190px;
    --header-h: 60px;
    --radius: 14px;
    --shadow: 0 2px 12px rgba(76,47,181,0.10);
  }

  body {
    font-family: 'Nunito', sans-serif;
    background: var(--bg);
    color: var(--text-dark);
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* ─── TOPBAR ─── */
  .topbar {
    position: fixed; top: 0; left: 0; right: 0; z-index: 200;
    height: var(--header-h);
    background: var(--purple-dark);
    display: flex; align-items: center; padding: 0 20px;
    gap: 16px;
  }
  .hamburger {
    background: none; border: none; cursor: pointer;
    display: flex; flex-direction: column; gap: 5px; padding: 4px;
  }
  .hamburger span {
    display: block; width: 24px; height: 2.5px;
    background: #fff; border-radius: 2px;
    transition: all .3s;
  }
  .hamburger.open span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); }
  .hamburger.open span:nth-child(2) { opacity: 0; }
  .hamburger.open span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); }

  .logo {
    font-size: 22px; font-weight: 900; color: #fff; letter-spacing: -0.5px;
    text-decoration: none; margin-right: 12px;
  }
  .logo span { color: var(--orange); }

  .nav-links {
    display: flex; align-items: center; gap: 4px; flex: 1; justify-content: center;
  }
  .nav-links a {
    color: rgba(255,255,255,.75); text-decoration: none;
    font-size: 14px; font-weight: 700; padding: 7px 14px; border-radius: 8px;
    display: flex; align-items: center; gap: 6px; transition: all .2s;
    white-space: nowrap;
  }
  .nav-links a.active { color: #fff; }
  .nav-links a.active::after {
    content: ''; display: block; position: absolute; bottom: -14px; left: 50%;
    transform: translateX(-50%); width: 60%; height: 3px;
    background: var(--orange); border-radius: 2px;
  }
  .nav-links a { position: relative; }
  .nav-links a:hover { color: #fff; background: rgba(255,255,255,.1); }

  .topbar-right {
    display: flex; align-items: center; gap: 14px; margin-left: auto;
  }
  .bell-btn {
    background: none; border: none; cursor: pointer; color: rgba(255,255,255,.8);
    font-size: 20px; padding: 4px; position: relative; transition: color .2s;
  }
  .bell-btn:hover { color: #fff; }
  .bell-badge {
    position: absolute; top: 2px; right: 2px; width: 8px; height: 8px;
    background: var(--orange); border-radius: 50%; border: 2px solid var(--purple-dark);
  }
  .user-info {
    display: flex; align-items: center; gap: 8px; cursor: pointer;
    padding: 4px 8px; border-radius: 8px; transition: background .2s;
  }
  .user-info:hover { background: rgba(255,255,255,.1); }
  .user-avatar {
    width: 34px; height: 34px; border-radius: 50%; background: #c7d2fe;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; overflow: hidden; border: 2px solid rgba(255,255,255,.3);
  }
  .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
  .user-text { color: #fff; }
  .user-text small { display: block; font-size: 11px; opacity: .7; }
  .user-text strong { font-size: 13px; font-weight: 800; }
  .user-caret { color: rgba(255,255,255,.6); font-size: 12px; }

  /* ─── SIDEBAR ─── */
  .sidebar {
    position: fixed; top: var(--header-h); left: 0; bottom: 0; z-index: 100;
    width: var(--sidebar-w);
    background: #fff; border-right: 1px solid #ede9f8;
    padding: 16px 0; overflow-y: auto;
    transition: transform .3s cubic-bezier(.4,0,.2,1);
    box-shadow: 2px 0 12px rgba(76,47,181,.07);
  }
  .sidebar.hidden { transform: translateX(-100%); }

  .sidebar a {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 18px; font-size: 13.5px; font-weight: 700;
    color: var(--text-mid); text-decoration: none; border-radius: 0;
    transition: all .18s; margin: 1px 8px; border-radius: 9px;
  }
  .sidebar a:hover { background: #f3efff; color: var(--purple-main); }
  .sidebar a.active { background: #f0eaff; color: var(--purple-main); }
  .sidebar a .ico { font-size: 17px; width: 22px; text-align: center; }
  .sidebar a.logout { color: #ef4444; margin-top: 12px; }
  .sidebar a.logout:hover { background: #fff1f1; }
  .sidebar-divider { height: 1px; background: #ede9f8; margin: 8px 16px; }

  /* ─── MAIN CONTENT ─── */
  .main {
    margin-top: var(--header-h);
    margin-left: var(--sidebar-w);
    padding: 28px 28px 40px;
    transition: margin-left .3s cubic-bezier(.4,0,.2,1);
    min-height: calc(100vh - var(--header-h));
  }
  .main.full { margin-left: 0; }

  /* ─── WELCOME + STATS ROW ─── */
  .top-row {
    display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr; gap: 16px;
    margin-bottom: 24px; align-items: stretch;
  }
  .welcome-card {
    grid-column: 1; background: #fff; border-radius: var(--radius);
    padding: 22px 20px; box-shadow: var(--shadow);
  }
  .welcome-card h2 { font-size: 22px; font-weight: 900; margin-bottom: 4px; }
  .welcome-card p { color: var(--text-mid); font-size: 13px; }

  .stat-card {
    background: #fff; border-radius: var(--radius); padding: 18px 16px;
    box-shadow: var(--shadow); display: flex; align-items: center; gap: 12px;
  }
  .stat-icon { font-size: 30px; flex-shrink: 0; }
  .stat-info small { font-size: 12px; color: var(--text-mid); font-weight: 600; }
  .stat-info strong { display: block; font-size: 22px; font-weight: 900; color: var(--text-dark); }
  .stat-card.green .stat-info strong { color: var(--green); }
  .stat-card.fire .stat-info strong { color: #f97316; }
  .stat-card.puan .stat-info strong { color: var(--purple-main); }

  /* ─── MIDDLE ROW ─── */
  .mid-row {
    display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 24px;
  }

  /* Test Çöz Card */
  .test-card {
    background: #fff; border-radius: var(--radius); padding: 22px 20px;
    box-shadow: var(--shadow); position: relative; overflow: hidden;
  }
  .test-card-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 6px; }
  .test-card h3 { font-size: 16px; font-weight: 900; color: var(--purple-main); }
  .test-card .clip-img { font-size: 52px; }
  .test-card p { color: var(--text-mid); font-size: 12.5px; margin-bottom: 16px; line-height: 1.5; }
  .subject-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 14px; }
  .subject-btn {
    display: flex; align-items: center; gap: 7px;
    padding: 9px 10px; border: 1.5px solid #ede9f8;
    border-radius: 9px; background: #fafafa; cursor: pointer;
    font-size: 12.5px; font-weight: 700; font-family: inherit;
    transition: all .2s; text-align: left; color: var(--text-dark);
  }
  .subject-btn:hover { border-color: var(--purple-main); background: #f3efff; color: var(--purple-main); }
  .subject-btn .sarrow { margin-left: auto; color: var(--text-light); font-size: 12px; }
  .subject-btn .sico { font-size: 18px; }
  .all-test-btn {
    width: 100%; padding: 12px; background: var(--purple-main); color: #fff;
    border: none; border-radius: 10px; font-size: 13px; font-weight: 800;
    font-family: inherit; cursor: pointer; transition: background .2s;
    display: flex; align-items: center; justify-content: center; gap: 6px;
  }
  .all-test-btn:hover { background: var(--purple-light); }

  /* Online Sınav Card */
  .exam-card {
    background: #fffbf0; border-radius: var(--radius); padding: 22px 20px;
    box-shadow: var(--shadow); display: flex; flex-direction: column;
  }
  .exam-card-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 10px; }
  .exam-card h3 { font-size: 16px; font-weight: 900; color: var(--orange-btn); }
  .exam-card p { color: var(--text-mid); font-size: 12.5px; margin-bottom: 16px; line-height: 1.5; }
  .exam-input {
    width: 100%; padding: 12px 14px; border: 1.5px solid #e5e7eb;
    border-radius: 10px; font-size: 14px; font-family: inherit; outline: none;
    margin-bottom: 10px; transition: border .2s; background: #fff;
  }
  .exam-input:focus { border-color: var(--orange-btn); }
  .exam-join-btn {
    width: 100%; padding: 13px; background: var(--orange-btn); color: #fff;
    border: none; border-radius: 10px; font-size: 14px; font-weight: 800;
    font-family: inherit; cursor: pointer; transition: background .2s;
    display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 12px;
  }
  .exam-join-btn:hover { background: #ea6c04; }
  .exam-note {
    display: flex; align-items: flex-start; gap: 8px; background: rgba(249,115,22,.07);
    border-radius: 9px; padding: 10px 12px; font-size: 12px; color: var(--text-mid); line-height: 1.5;
  }
  .exam-note .info-ico { font-size: 16px; flex-shrink: 0; margin-top: 1px; }

  /* Yaklaşan Sınavlar */
  .upcoming-card {
    background: #fff; border-radius: var(--radius); padding: 22px 20px;
    box-shadow: var(--shadow);
  }
  .upcoming-card-header {
    display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;
  }
  .upcoming-card h3 { font-size: 16px; font-weight: 900; color: var(--text-dark); display: flex; align-items: center; gap: 7px; }
  .see-all { font-size: 12.5px; color: var(--purple-main); font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 3px; }
  .see-all:hover { text-decoration: underline; }
  .upcoming-card > p { font-size: 12px; color: var(--text-light); margin-bottom: 14px; }
  .exam-item {
    display: flex; align-items: center; justify-content: space-between;
    padding: 13px 0; border-bottom: 1px solid #f3f4f6;
  }
  .exam-item:last-child { border-bottom: none; }
  .exam-item-left strong { font-size: 13.5px; font-weight: 800; }
  .exam-item-right { display: flex; align-items: center; gap: 8px; }
  .exam-date { display: flex; align-items: center; gap: 5px; font-size: 12px; color: var(--text-mid); }
  .exam-date .cal-ico { font-size: 15px; }
  .exam-arrow { color: var(--purple-main); font-size: 15px; cursor: pointer; transition: transform .2s; }
  .exam-arrow:hover { transform: translateX(3px); }

  /* ─── BOTTOM ROW ─── */
  .bottom-row {
    display: grid; grid-template-columns: 2fr 1fr; gap: 20px;
  }

  /* Son Testler */
  .recent-card {
    background: #fff; border-radius: var(--radius); padding: 22px 20px;
    box-shadow: var(--shadow);
  }
  .recent-card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
  .recent-card h3 { font-size: 16px; font-weight: 900; display: flex; align-items: center; gap: 8px; }
  table { width: 100%; border-collapse: collapse; }
  thead th {
    text-align: left; font-size: 12px; font-weight: 700; color: var(--text-light);
    padding-bottom: 8px; border-bottom: 1.5px solid #f3f4f6;
  }
  tbody tr { border-bottom: 1px solid #f9fafb; }
  tbody tr:hover { background: #fafafa; }
  tbody td { padding: 11px 0; font-size: 13px; }
  td.test-name { font-weight: 800; }
  td.doğru { color: var(--green); font-weight: 800; }
  td.yanlış { color: var(--red); font-weight: 800; }
  td.başarı { color: var(--green); font-weight: 900; }
  .result-btn {
    padding: 5px 12px; border: 1.5px solid #e5e7eb; border-radius: 7px;
    background: #fff; font-size: 12px; font-weight: 700; font-family: inherit;
    cursor: pointer; color: var(--text-mid); transition: all .2s; white-space: nowrap;
  }
  .result-btn:hover { border-color: var(--purple-main); color: var(--purple-main); background: #f3efff; }

  /* Başarım */
  .achievement-card {
    background: #fff; border-radius: var(--radius); padding: 22px 20px;
    box-shadow: var(--shadow);
  }
  .achievement-card h3 { font-size: 16px; font-weight: 900; margin-bottom: 4px; display: flex; align-items: center; gap: 8px; }
  .achievement-card > p { color: var(--text-mid); font-size: 12.5px; margin-bottom: 16px; }
  .badge-row { display: flex; align-items: center; gap: 8px; margin-bottom: 16px; flex-wrap: wrap; }
  .badge {
    width: 52px; height: 52px; border-radius: 50%; display: flex; align-items: center;
    justify-content: center; font-size: 26px; cursor: pointer;
    transition: transform .2s; position: relative;
  }
  .badge:hover { transform: scale(1.12); }
  .badge.purple { background: linear-gradient(135deg,#7c3aed,#4c1d95); }
  .badge.red    { background: linear-gradient(135deg,#ef4444,#b91c1c); }
  .badge.yellow { background: linear-gradient(135deg,#f59e0b,#b45309); }
  .badge.blue   { background: linear-gradient(135deg,#3b82f6,#1d4ed8); }
  .badge-more {
    width: 52px; height: 52px; border-radius: 50%; background: #f3efff;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 900; color: var(--purple-main); cursor: pointer;
  }
  .xp-section small { font-size: 12px; font-weight: 700; color: var(--text-mid); }
  .xp-row { display: flex; align-items: center; justify-content: space-between; margin: 6px 0 6px; }
  .xp-row span { font-size: 12px; color: var(--text-mid); font-weight: 700; }
  .xp-bar-bg {
    width: 100%; height: 10px; background: #e5e7eb; border-radius: 99px; overflow: hidden;
  }
  .xp-bar-fill {
    height: 100%; background: linear-gradient(90deg, var(--purple-main), var(--purple-light));
    border-radius: 99px; width: 60%; transition: width .6s ease;
  }

  /* ─── QUIZ PANEL (Full Screen Slide-in) ─── */
  .quiz-panel {
    position: fixed; inset: 0; z-index: 600;
    background: #f4f6fc;
    transform: translateX(100%);
    transition: transform .4s cubic-bezier(.4,0,.2,1);
    display: flex; flex-direction: column; overflow: hidden;
  }
  .quiz-panel.open { transform: translateX(0); }

  /* Setup screen */
  .qp-setup {
    flex: 1; display: flex; align-items: center; justify-content: center; padding: 24px;
  }
  .qp-setup-card {
    background: #fff; border-radius: 24px; padding: 40px 36px;
    width: 560px; max-width: 100%; box-shadow: 0 8px 40px rgba(76,47,181,.13);
  }
  .qp-setup-card .back-btn {
    background: none; border: none; cursor: pointer; font-size: 13px; font-weight: 700;
    color: var(--text-light); display: flex; align-items: center; gap: 5px; margin-bottom: 20px;
    padding: 0; font-family: inherit; transition: color .2s;
  }
  .qp-setup-card .back-btn:hover { color: var(--purple-main); }
  .qp-subject-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: #f0eaff; color: var(--purple-main); font-size: 13px; font-weight: 800;
    padding: 5px 14px; border-radius: 20px; margin-bottom: 16px;
  }
  .qp-setup-card h2 { font-size: 22px; font-weight: 900; margin-bottom: 4px; }
  .qp-setup-card > p { color: var(--text-mid); font-size: 13.5px; margin-bottom: 28px; }

  .setup-section { margin-bottom: 24px; }
  .setup-section label {
    display: block; font-size: 13px; font-weight: 800; color: var(--text-dark);
    margin-bottom: 10px; text-transform: uppercase; letter-spacing: .5px;
  }

  /* Soru sayısı butonları */
  .count-btns { display: flex; gap: 8px; flex-wrap: wrap; }
  .count-btn {
    padding: 9px 18px; border: 2px solid #e5e7eb; border-radius: 10px;
    background: #fff; font-size: 14px; font-weight: 800; font-family: inherit;
    cursor: pointer; color: var(--text-mid); transition: all .18s;
  }
  .count-btn.sel { border-color: var(--purple-main); background: #f0eaff; color: var(--purple-main); }
  .count-btn:hover:not(.sel) { border-color: #c4b5fd; background: #faf8ff; }

  /* Zorluk dağılımı */
  .diff-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; }
  .diff-box {
    border: 2px solid #e5e7eb; border-radius: 12px; padding: 14px 10px 10px;
    text-align: center; transition: border-color .18s; background: #fafafa;
  }
  .diff-box .diff-label { font-size: 12px; font-weight: 800; margin-bottom: 10px; }
  .diff-box.easy .diff-label { color: #16a34a; }
  .diff-box.medium .diff-label { color: #d97706; }
  .diff-box.hard .diff-label { color: #dc2626; }
  .diff-box.easy { border-color: #bbf7d0; background: #f0fdf4; }
  .diff-box.medium { border-color: #fde68a; background: #fffbeb; }
  .diff-box.hard { border-color: #fecaca; background: #fff1f1; }
  .diff-stepper { display: flex; align-items: center; justify-content: center; gap: 8px; }
  .diff-stepper button {
    width: 28px; height: 28px; border-radius: 50%; border: 2px solid #e5e7eb;
    background: #fff; font-size: 16px; font-weight: 900; cursor: pointer;
    display: flex; align-items: center; justify-content: center; line-height: 1;
    transition: all .15s; font-family: inherit;
  }
  .diff-stepper button:hover { border-color: var(--purple-main); color: var(--purple-main); }
  .diff-stepper span { font-size: 18px; font-weight: 900; min-width: 24px; text-align: center; }
  .diff-total { font-size: 12px; color: var(--text-light); margin-top: 10px; font-weight: 700; text-align: right; }
  .diff-total.over { color: var(--red); }

  .start-quiz-btn {
    width: 100%; padding: 15px; background: linear-gradient(135deg, var(--purple-main), var(--purple-light));
    color: #fff; border: none; border-radius: 12px; font-size: 15px; font-weight: 900;
    font-family: inherit; cursor: pointer; transition: opacity .2s; box-shadow: 0 4px 16px rgba(76,47,181,.3);
    display: flex; align-items: center; justify-content: center; gap: 8px;
  }
  .start-quiz-btn:hover { opacity: .9; }
  .start-quiz-btn:disabled { opacity: .4; cursor: not-allowed; }

  /* Active quiz screen */
  .qp-active {
    flex: 1; display: none; flex-direction: column;
  }
  .qp-active.show { display: flex; }

  .qp-topbar {
    background: #fff; padding: 16px 28px; display: flex; align-items: center;
    gap: 16px; border-bottom: 1px solid #ede9f8; box-shadow: 0 2px 8px rgba(76,47,181,.06);
    flex-shrink: 0;
  }
  .qp-close-btn {
    background: none; border: none; font-size: 20px; cursor: pointer;
    color: var(--text-light); padding: 4px; transition: color .2s; font-family: inherit;
  }
  .qp-close-btn:hover { color: var(--red); }
  .qp-subject-info { font-size: 13px; font-weight: 800; color: var(--text-mid); }
  .qp-subject-info strong { color: var(--purple-main); }
  .qp-progress-wrap { flex: 1; }
  .qp-progress-bar-bg {
    height: 8px; background: #e5e7eb; border-radius: 99px; overflow: hidden;
  }
  .qp-progress-bar-fill {
    height: 100%; background: linear-gradient(90deg, var(--purple-main), #a78bfa);
    border-radius: 99px; transition: width .4s ease;
  }
  .qp-counter { font-size: 13px; font-weight: 900; color: var(--text-mid); white-space: nowrap; }

  .qp-body {
    flex: 1; display: flex; align-items: center; justify-content: center;
    padding: 32px 24px; overflow-y: auto;
  }
  .qp-question-card {
    background: #fff; border-radius: 20px; padding: 36px 36px 28px;
    width: 640px; max-width: 100%; box-shadow: 0 4px 24px rgba(76,47,181,.10);
    animation: slideUp .35s cubic-bezier(.4,0,.2,1);
  }
  @keyframes slideUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .qp-diff-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11px; font-weight: 800; padding: 3px 10px; border-radius: 20px;
    margin-bottom: 14px; text-transform: uppercase; letter-spacing: .4px;
  }
  .qp-diff-badge.easy   { background: #dcfce7; color: #15803d; }
  .qp-diff-badge.medium { background: #fef9c3; color: #a16207; }
  .qp-diff-badge.hard   { background: #fee2e2; color: #b91c1c; }

  .qp-question-text {
    font-size: 17px; font-weight: 800; line-height: 1.6; margin-bottom: 24px; color: var(--text-dark);
  }
  .qp-options { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px; }
  .qp-option {
    padding: 14px 16px; border: 2px solid #e5e7eb; border-radius: 12px;
    cursor: pointer; font-size: 14px; font-weight: 700; font-family: inherit;
    background: #fafafa; text-align: left; transition: all .18s; color: var(--text-dark);
    display: flex; align-items: center; gap: 10px;
  }
  .qp-option .opt-letter {
    width: 28px; height: 28px; border-radius: 50%; background: #ede9f8;
    color: var(--purple-main); font-size: 12px; font-weight: 900;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    transition: all .18s;
  }
  .qp-option:hover:not(:disabled) { border-color: var(--purple-main); background: #f3efff; }
  .qp-option:hover:not(:disabled) .opt-letter { background: var(--purple-main); color: #fff; }
  .qp-option.correct { border-color: var(--green); background: #f0fdf4; color: #166534; }
  .qp-option.correct .opt-letter { background: var(--green); color: #fff; }
  .qp-option.wrong   { border-color: var(--red);   background: #fff1f1; color: #991b1b; }
  .qp-option.wrong .opt-letter   { background: var(--red); color: #fff; }
  .qp-option:disabled { cursor: default; }

  .qp-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding-top: 8px; border-top: 1px solid #f3f4f6; margin-top: 4px;
  }
  .qp-feedback { font-size: 13px; font-weight: 700; min-height: 20px; }
  .qp-feedback.ok  { color: var(--green); }
  .qp-feedback.err { color: var(--red); }
  .qp-next-btn {
    padding: 10px 24px; background: var(--purple-main); color: #fff;
    border: none; border-radius: 10px; font-size: 13px; font-weight: 800;
    font-family: inherit; cursor: pointer; transition: all .2s; opacity: 0;
    pointer-events: none; display: flex; align-items: center; gap: 6px;
  }
  .qp-next-btn.vis { opacity: 1; pointer-events: all; }
  .qp-next-btn:hover { background: var(--purple-light); transform: translateX(3px); }

  /* Score screen */
  .qp-score {
    flex: 1; display: none; align-items: center; justify-content: center; padding: 32px 24px;
  }
  .qp-score.show { display: flex; }
  .qp-score-card {
    background: #fff; border-radius: 24px; padding: 44px 40px;
    width: 560px; max-width: 100%; box-shadow: 0 8px 40px rgba(76,47,181,.13);
    text-align: center; animation: slideUp .4s ease;
  }
  .qp-score-emoji { font-size: 64px; margin-bottom: 12px; }
  .qp-score-title { font-size: 26px; font-weight: 900; margin-bottom: 6px; }
  .qp-score-sub { color: var(--text-mid); font-size: 14px; margin-bottom: 28px; }
  .qp-score-stats {
    display: grid; grid-template-columns: repeat(3,1fr); gap: 12px; margin-bottom: 28px;
  }
  .qp-score-stat {
    background: #f4f6fc; border-radius: 12px; padding: 14px 8px;
  }
  .qp-score-stat .s-num { font-size: 26px; font-weight: 900; }
  .qp-score-stat .s-lbl { font-size: 11px; color: var(--text-light); font-weight: 700; margin-top: 2px; }
  .qp-score-stat.green .s-num { color: var(--green); }
  .qp-score-stat.red .s-num   { color: var(--red); }
  .qp-score-stat.purple .s-num { color: var(--purple-main); }
  .qp-score-btns { display: flex; gap: 10px; }
  .qp-score-btns button {
    flex: 1; padding: 13px; border-radius: 11px; font-size: 14px; font-weight: 800;
    font-family: inherit; cursor: pointer; transition: all .2s; border: none;
  }
  .qp-retry-btn { background: linear-gradient(135deg,var(--purple-main),var(--purple-light)); color: #fff; box-shadow: 0 3px 12px rgba(76,47,181,.25); }
  .qp-retry-btn:hover { opacity: .9; }
  .qp-home-btn { background: #f3f4f6; color: var(--text-mid); }
  .qp-home-btn:hover { background: #e5e7eb; }

  /* ─── TOAST ─── */
  .toast {
    position: fixed; bottom: 28px; right: 28px; z-index: 9999;
    background: var(--purple-dark); color: #fff; padding: 13px 20px;
    border-radius: 12px; font-size: 14px; font-weight: 700;
    box-shadow: 0 4px 20px rgba(0,0,0,.2);
    transform: translateY(80px); opacity: 0; transition: all .35s;
    max-width: 320px;
  }
  .toast.show { transform: translateY(0); opacity: 1; }

  /* ─── RESPONSIVE ─── */
  @media (max-width: 1100px) {
    .top-row { grid-template-columns: 1fr 1fr 1fr; }
    .welcome-card { grid-column: 1 / -1; }
    .mid-row { grid-template-columns: 1fr 1fr; }
    .upcoming-card { grid-column: 1 / -1; }
  }
  @media (max-width: 768px) {
    .main { padding: 16px; }
    .mid-row { grid-template-columns: 1fr; }
    .bottom-row { grid-template-columns: 1fr; }
    .top-row { grid-template-columns: 1fr 1fr; }
    .nav-links { display: none; }
  }
</style>
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <button class="hamburger" id="hamburger" onclick="toggleSidebar()">
    <span></span><span></span><span></span>
  </button>
  <a class="logo" href="#">Quiz<span>ion</span></a>
  <nav class="nav-links">
    <a href="#" class="active">🏠 Anasayfa</a>
    <a href="#" onclick="showToast('Bilgi Çantası yakında!')">🎒 Bilgi Çantası</a>
    <a href="#" onclick="showToast('Efsaneler Ligi yakında!')">⭐ Efsaneler Ligi</a>
    <a href="#" onclick="showToast('Görev Panosu yakında!')">🧩 Görev Panosu</a>
  </nav>
  <div class="topbar-right">
    <button class="bell-btn" onclick="showToast('Yeni bildirim yok.')">
      🔔<span class="bell-badge"></span>
    </button>
    <div class="user-info" onclick="showToast('Profil sayfası yakında!')">
      <div class="user-avatar">👤</div>
      <div class="user-text">
        <small>Merhaba,</small>
        <strong id="topbarName">Ali Yılmaz</strong>
      </div>
      <span class="user-caret">▾</span>
    </div>
  </div>
</header>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <a href="#" class="active"><span class="ico">🏠</span> Ana Sayfa</a>
  <a href="#" onclick="showToast('Dersler sayfası yakında!')"><span class="ico">📋</span> Dersler</a>
  <a href="#" onclick="showToast('Online sınav için kod girin!')"><span class="ico">💻</span> Online Sınavlara Katıl</a>
  <a href="#" onclick="showToast('Takip ettikleriniz yakında!')"><span class="ico">⭐</span> Takip Ettiklerim</a>
  <div class="sidebar-divider"></div>
  <a href="#" onclick="showToast('Kazanımlarınız yakında!')"><span class="ico">🏅</span> Kazanımlar</a>
  <a href="#" onclick="showToast('Raporlarınız yakında!')"><span class="ico">📊</span> Raporlarım</a>
  <a href="#" onclick="openSubjectModal('Genel')"><span class="ico">⏱️</span> Soru Çöz</a>
  <a href="#" onclick="showToast('Rozetleriniz yakında!')"><span class="ico">🎖️</span> Rozetlerim</a>
  <a href="#" onclick="showToast('Başarılarınız yakında!')"><span class="ico">🏆</span> Başarılarım</a>
  <div class="sidebar-divider"></div>
  <a href="#" onclick="showToast('Ayarlar yakında!')"><span class="ico">⚙️</span> Ayarlar</a>
  <a href="#" class="logout" onclick="showToast('Çıkış işlemi ana sisteminizden yapılır.')"><span class="ico">🔴</span> Çıkış Yap</a>
</aside>

<!-- MAIN -->
<main class="main" id="main">

  <!-- TOP ROW -->
  <div class="top-row">
    <div class="welcome-card">
      <h2 id="welcomeName">Merhaba Ali! 👋</h2>
      <p>Bugün yeni şeyler öğrenmek için harika bir gün!</p>
    </div>
    <div class="stat-card puan">
      <div class="stat-icon">🏆</div>
      <div class="stat-info"><small>Toplam Puan</small><strong id="statPuan">0</strong></div>
    </div>
    <div class="stat-card">
      <div class="stat-icon">📚</div>
      <div class="stat-info"><small>Test Çözdün</small><strong id="statTest">0</strong></div>
    </div>
    <div class="stat-card green">
      <div class="stat-icon">📈</div>
      <div class="stat-info"><small>Başarı Oranın</small><strong id="statBasari">-%</strong></div>
    </div>
    <div class="stat-card fire">
      <div class="stat-icon">🔥</div>
      <div class="stat-info"><small>Günlük Seri</small><strong id="statSeri">0 gün</strong></div>
    </div>
  </div>

  <!-- MID ROW -->
  <div class="mid-row">

    <!-- Derslerde Test Çöz -->
    <div class="test-card">
      <div class="test-card-header">
        <div>
          <h3>Derslerde Test Çöz</h3>
          <p>Dilediğin dersi seç, konulara göre test oluştur<br>ve hemen çözmeye başla!</p>
        </div>
        <span class="clip-img">📋</span>
      </div>
      <div class="subject-grid">
        <button class="subject-btn" onclick="openSubjectModal('Matematik')">
          <span class="sico">📐</span> Matematik <span class="sarrow">›</span>
        </button>
        <button class="subject-btn" onclick="openSubjectModal('Fen Bilimleri')">
          <span class="sico">🔬</span> Fen Bilimleri <span class="sarrow">›</span>
        </button>
        <button class="subject-btn" onclick="openSubjectModal('Türkçe')">
          <span class="sico">📖</span> Türkçe <span class="sarrow">›</span>
        </button>
        <button class="subject-btn" onclick="openSubjectModal('Sosyal Bilgiler')">
          <span class="sico">🌍</span> Sosyal Bilgiler <span class="sarrow">›</span>
        </button>
        <button class="subject-btn" onclick="openSubjectModal('İngilizce')">
          <span class="sico" style="font-weight:900;font-size:13px;">GB</span> İngilizce <span class="sarrow">›</span>
        </button>
        <button class="subject-btn" onclick="openSubjectModal('Din Kültürü')">
          <span class="sico">🕌</span> Din Kültürü <span class="sarrow">›</span>
        </button>
      </div>
      <button class="all-test-btn" onclick="openSubjectModal('Tüm Dersler')">✨ Tüm Dersleri Kapsayan Test Oluştur</button>
    </div>

    <!-- Online Sınav -->
    <div class="exam-card">
      <div class="exam-card-header">
        <div>
          <h3>Online Sınava Katıl 🎯</h3>
          <p>Öğretmeninin verdiği sınav kodunu gir<br>ve sınava hemen katıl!</p>
        </div>
        <span style="font-size:44px;">📺</span>
      </div>
      <input class="exam-input" id="examCode" type="text" placeholder="Sınav kodunu gir">
      <button class="exam-join-btn" onclick="joinExam()">Sınava Katıl →</button>
      <div class="exam-note">
        <span class="info-ico">ℹ️</span>
        <span>Sınav kodunu öğretmenin seninle paylaştığı yerden alabilirsin.</span>
      </div>
    </div>

    <!-- Yaklaşan Sınavlar -->
    <div class="upcoming-card">
      <div class="upcoming-card-header">
        <h3>📅 Yaklaşan Sınavlar</h3>
        <a href="#" class="see-all" onclick="showToast('Tüm sınavlar yakında!')">Tümü →</a>
      </div>
      <p>Katılacağın sınavları kaçırma!</p>
      <div class="exam-item">
        <div class="exam-item-left"><strong>Matematik Deneme Sınavı</strong></div>
        <div class="exam-item-right">
          <div class="exam-date"><span class="cal-ico">📅</span><span>24 Mayıs 2024<br>20:00</span></div>
          <span class="exam-arrow">→</span>
        </div>
      </div>
      <div class="exam-item">
        <div class="exam-item-left"><strong>Fen Bilimleri 6. Sınıf</strong></div>
        <div class="exam-item-right">
          <div class="exam-date"><span class="cal-ico">📅</span><span>25 Mayıs 2024<br>19:30</span></div>
          <span class="exam-arrow">→</span>
        </div>
      </div>
      <div class="exam-item">
        <div class="exam-item-left"><strong>Türkçe Genel Tekrar</strong></div>
        <div class="exam-item-right">
          <div class="exam-date"><span class="cal-ico">📅</span><span>26 Mayıs 2024<br>18:00</span></div>
          <span class="exam-arrow">→</span>
        </div>
      </div>
    </div>

  </div>

  <!-- BOTTOM ROW -->
  <div class="bottom-row">

    <!-- Son Testler -->
    <div class="recent-card">
      <div class="recent-card-header">
        <h3>📋 Son Çözdüğün Testler</h3>
        <a href="#" class="see-all" onclick="showToast('Tüm testler yakında!')">Tümü →</a>
      </div>
      <table>
        <thead>
          <tr>
            <th>Test Adı</th>
            <th>Ders</th>
            <th>Tarih</th>
            <th>Doğru</th>
            <th>Yanlış</th>
            <th>Başarı</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="testsTableBody">
          <tr id="emptyRow"><td colspan="7" style="text-align:center;color:var(--text-light);padding:20px 0;font-size:13px;">Henüz test çözmediniz. Hadi başlayalım! 🚀</td></tr>
        </tbody>
      </table>
    </div>

    <!-- Başarım -->
    <div class="achievement-card">
      <h3>🏆 Başarım</h3>
      <p>Rozetlerini topla, seviyeni yükselt!</p>
      <div class="badge-row">
        <div class="badge purple" title="Süper Yıldız" onclick="showToast('Süper Yıldız rozeti!')">⭐</div>
        <div class="badge red"    title="Hedef Ustası" onclick="showToast('Hedef Ustası rozeti!')">🎯</div>
        <div class="badge yellow" title="Hızlı Çözücü" onclick="showToast('Hızlı Çözücü rozeti!')">⚡</div>
        <div class="badge blue"   title="Şampiyon"     onclick="showToast('Şampiyon rozeti!')">🏆</div>
        <div class="badge-more" onclick="showToast('Daha fazla rozet yakında!')">+12</div>
      </div>
      <div class="xp-section">
        <div class="xp-row">
          <span>Sonraki Seviye</span>
          <span id="xpText">0/200 XP</span>
        </div>
        <div class="xp-bar-bg"><div class="xp-bar-fill" id="xpBar" style="width:0%"></div></div>
      </div>
    </div>

  </div>
</main>

<!-- QUIZ PANEL -->
<div class="quiz-panel" id="quizPanel">

  <!-- SETUP SCREEN -->
  <div class="qp-setup" id="qpSetup">
    <div class="qp-setup-card">
      <button class="back-btn" onclick="closeQuizPanel()">← Geri Dön</button>
      <div class="qp-subject-badge" id="setupBadge">📐 Matematik</div>
      <h2>Test Ayarlarını Belirle</h2>
      <p>Kaç soru çözmek istediğini ve zorluk dağılımını seç.</p>

      <div class="setup-section">
        <label>Toplam Soru Sayısı</label>
        <div class="count-btns">
          <button class="count-btn" onclick="selectCount(5,this)">5</button>
          <button class="count-btn sel" onclick="selectCount(10,this)">10</button>
          <button class="count-btn" onclick="selectCount(15,this)">15</button>
          <button class="count-btn" onclick="selectCount(20,this)">20</button>
        </div>
      </div>

      <div class="setup-section">
        <label>Zorluk Dağılımı</label>
        <div class="diff-grid">
          <div class="diff-box easy">
            <div class="diff-label">🟢 Kolay</div>
            <div class="diff-stepper">
              <button onclick="changeDiff('easy',-1)">−</button>
              <span id="easyCount">4</span>
              <button onclick="changeDiff('easy',1)">+</button>
            </div>
          </div>
          <div class="diff-box medium">
            <div class="diff-label">🟡 Orta</div>
            <div class="diff-stepper">
              <button onclick="changeDiff('medium',-1)">−</button>
              <span id="mediumCount">4</span>
              <button onclick="changeDiff('medium',1)">+</button>
            </div>
          </div>
          <div class="diff-box hard">
            <div class="diff-label">🔴 Zor</div>
            <div class="diff-stepper">
              <button onclick="changeDiff('hard',-1)">−</button>
              <span id="hardCount">2</span>
              <button onclick="changeDiff('hard',1)">+</button>
            </div>
          </div>
        </div>
        <div class="diff-total" id="diffTotal">Toplam: 10 / 10 soru ✓</div>
      </div>

      <button class="start-quiz-btn" id="startQuizBtn" onclick="startQuiz()">
        🚀 Testi Başlat
      </button>
    </div>
  </div>

  <!-- ACTIVE QUIZ SCREEN -->
  <div class="qp-active" id="qpActive">
    <div class="qp-topbar">
      <button class="qp-close-btn" onclick="confirmClose()">✕</button>
      <div class="qp-subject-info">Ders: <strong id="qpSubjectName">Matematik</strong></div>
      <div class="qp-progress-wrap">
        <div class="qp-progress-bar-bg">
          <div class="qp-progress-bar-fill" id="qpProgressFill" style="width:0%"></div>
        </div>
      </div>
      <div class="qp-counter" id="qpCounter">1 / 10</div>
    </div>
    <div class="qp-body">
      <div class="qp-question-card" id="qpQuestionCard">
        <!-- rendered by JS -->
      </div>
    </div>
  </div>

  <!-- SCORE SCREEN -->
  <div class="qp-score" id="qpScore">
    <div class="qp-score-card">
      <div class="qp-score-emoji" id="scoreEmoji">🎉</div>
      <div class="qp-score-title" id="scoreTitle">Harika!</div>
      <div class="qp-score-sub" id="scoreSub">Tebrikler, testi tamamladın.</div>
      <div class="qp-score-stats">
        <div class="qp-score-stat green">
          <div class="s-num" id="scoreCorrect">0</div>
          <div class="s-lbl">Doğru</div>
        </div>
        <div class="qp-score-stat red">
          <div class="s-num" id="scoreWrong">0</div>
          <div class="s-lbl">Yanlış</div>
        </div>
        <div class="qp-score-stat purple">
          <div class="s-num" id="scorePct">%0</div>
          <div class="s-lbl">Başarı</div>
        </div>
      </div>
      <div class="qp-score-btns">
        <button class="qp-retry-btn" id="retryBtn" onclick="retryQuiz()">🔄 Tekrar Çöz</button>
        <button class="qp-home-btn" onclick="closeQuizPanel()">🏠 Ana Sayfa</button>
      </div>
    </div>
  </div>

</div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<script>
/* ─── STATE ─── */
let currentUser = 'Ali Yılmaz';
let sidebarOpen = true;
let quizData = {};
let currentQ = 0, score = 0, answered = false;
let totalDogru = 0, totalSoru = 0, totalXP = 0;
const XP_PER_LEVEL = 200;

// Setup state
let selectedSubject = '';
let selectedCount = 10;
let diffCounts = { easy: 4, medium: 4, hard: 2 };

/* ─── QUESTIONS DB (with difficulty) ─── */
const questions = {
  'Matematik': [
    { q: '2 + 2 kaçtır?', opts: ['3','4','5','6'], ans: 1, diff: 'easy' },
    { q: '10 - 3 kaçtır?', opts: ['5','6','7','8'], ans: 2, diff: 'easy' },
    { q: '5 × 4 kaçtır?', opts: ['16','20','24','18'], ans: 1, diff: 'easy' },
    { q: '15 ÷ 3 kaçtır?', opts: ['3','4','5','6'], ans: 2, diff: 'easy' },
    { q: '100\'ün yarısı kaçtır?', opts: ['25','40','50','60'], ans: 2, diff: 'easy' },
    { q: '3/4 + 1/2 işleminin sonucu nedir?', opts: ['1','5/4','7/4','4/6'], ans: 1, diff: 'medium' },
    { q: 'Bir üçgenin iç açıları toplamı kaç derecedir?', opts: ['90','270','180','360'], ans: 2, diff: 'medium' },
    { q: 'x + 7 = 15 ise x kaçtır?', opts: ['6','7','8','9'], ans: 2, diff: 'medium' },
    { q: '12 ile 18\'in OBEB\'i kaçtır?', opts: ['4','6','8','3'], ans: 1, diff: 'medium' },
    { q: 'Bir karenin alanı 36 cm² ise kenar uzunluğu kaçtır?', opts: ['4','5','6','9'], ans: 2, diff: 'medium' },
    { q: '2^5 kaçtır?', opts: ['10','16','32','64'], ans: 2, diff: 'hard' },
    { q: 'log₂(32) kaçtır?', opts: ['4','5','6','8'], ans: 1, diff: 'hard' },
    { q: 'x² - 5x + 6 = 0 denkleminin kökleri nedir?', opts: ['1,6','2,3','3,4','1,4'], ans: 1, diff: 'hard' },
    { q: 'Bir dairenin yarıçapı 5 cm ise alanı kaç cm²\'dir? (π≈3)', opts: ['50','60','75','90'], ans: 2, diff: 'hard' },
    { q: '∫x dx kaçtır?', opts: ['x','x²','x²/2 + C','2x'], ans: 2, diff: 'hard' },
  ],
  'Fen Bilimleri': [
    { q: 'Su hangi formülle gösterilir?', opts: ['CO2','H2O','O2','NaCl'], ans: 1, diff: 'easy' },
    { q: 'Güneş sistemimizdeki gezegen sayısı kaçtır?', opts: ['7','8','9','10'], ans: 1, diff: 'easy' },
    { q: 'Hangi hayvan uçamaz?', opts: ['Kartal','Güvercin','Penguen','Kırlangıç'], ans: 2, diff: 'easy' },
    { q: 'Gökkuşağında kaç renk vardır?', opts: ['5','6','7','8'], ans: 2, diff: 'easy' },
    { q: 'İnsan vücudunda kaç kemik vardır?', opts: ['186','206','226','246'], ans: 1, diff: 'easy' },
    { q: 'Fotosentez hangi organel ile gerçekleşir?', opts: ['Mitokondri','Ribozom','Kloroplast','Çekirdek'], ans: 2, diff: 'medium' },
    { q: 'Ses hangi ortamda yayılamaz?', opts: ['Hava','Su','Katı','Uzay (boşluk)'], ans: 3, diff: 'medium' },
    { q: 'Hangi gezegen güneş sisteminin en büyüğüdür?', opts: ['Satürn','Mars','Jüpiter','Neptün'], ans: 2, diff: 'medium' },
    { q: 'Maddenin hangi hali belirli hacim ama belirsiz şekle sahiptir?', opts: ['Katı','Sıvı','Gaz','Plazma'], ans: 1, diff: 'medium' },
    { q: 'DNA\'nın yapısında hangi baz çifti bulunmaz?', opts: ['Adenin-Timin','Guanin-Sitozin','Urasil-Adenin','Timin-Adenin'], ans: 2, diff: 'medium' },
    { q: 'Işığın vakumdaki hızı yaklaşık kaç km/s\'dir?', opts: ['150.000','300.000','450.000','600.000'], ans: 1, diff: 'hard' },
    { q: 'Atom numarası 6 olan element hangisidir?', opts: ['Azot','Oksijen','Karbon','Bor'], ans: 2, diff: 'hard' },
    { q: 'Newton\'un hangi yasası F = ma formülüyle ifade edilir?', opts: ['1. Yasa','2. Yasa','3. Yasa','4. Yasa'], ans: 1, diff: 'hard' },
    { q: 'Ozmoz olayı nedir?', opts: ['Işık geçirgenliği','Yarı geçirgen zardan su geçişi','Isı iletimi','Elektrik akımı'], ans: 1, diff: 'hard' },
    { q: 'Kuantum mekaniğinin temel ilkesi nedir?', opts: ['Enerji sürekliliği','Belirsizlik ilkesi','Kütle korunumu','Momentum korunumu'], ans: 1, diff: 'hard' },
  ],
  'Türkçe': [
    { q: '"Güzel" kelimesinin zıt anlamlısı nedir?', opts: ['Çirkin','İyi','Kötü','Büyük'], ans: 0, diff: 'easy' },
    { q: 'Aşağıdakilerden hangisi bir isimdir?', opts: ['Koşmak','Hızlı','Kitap','Güzelce'], ans: 2, diff: 'easy' },
    { q: '"Büyük" kelimesinin eş anlamlısı nedir?', opts: ['Küçük','İri','İnce','Uzun'], ans: 1, diff: 'easy' },
    { q: 'Türk alfabesinde kaç harf vardır?', opts: ['27','28','29','30'], ans: 2, diff: 'easy' },
    { q: 'Hangi sözcük sıfat değildir?', opts: ['Güzel','Hızlı','Koşmak','Büyük'], ans: 2, diff: 'easy' },
    { q: '"Ahmet kitap okudu." cümlesinde özne hangisidir?', opts: ['kitap','okudu','Ahmet','cümle yok'], ans: 2, diff: 'medium' },
    { q: 'Noktalama işareti olarak virgül ne zaman kullanılır?', opts: ['Cümle sonunda','Ara cümlelerde','Soru cümlelerinde','Ünlem cümlelerinde'], ans: 1, diff: 'medium' },
    { q: '"Elif erken kalktı." cümlesinde zarf tümleci hangisidir?', opts: ['Elif','erken','kalktı','tümleç yok'], ans: 1, diff: 'medium' },
    { q: 'Mecaz anlam taşıyan cümle hangisidir?', opts: ['Kapıyı kapattı','Kalbi sıkıştı','Su içtim','Eve gittim'], ans: 1, diff: 'medium' },
    { q: '"Yüksek" kelimesi hangi cümlede isim olarak kullanılmıştır?', opts: ['Yüksek dağlar','Yükseğe çıktı','Yüksek sesle bağırdı','Yüksek puan aldı'], ans: 1, diff: 'medium' },
    { q: 'Divan edebiyatında en çok kullanılan nazım birimi nedir?', opts: ['Dörtlük','Beyit','Üçlük','Beşlik'], ans: 1, diff: 'hard' },
    { q: 'Hangi edebi sanat "olmayan bir şeyi varmış gibi göstermek"tir?', opts: ['Teşbih','Mecaz-ı mürsel','Mübalağa','İstiare'], ans: 2, diff: 'hard' },
    { q: 'Cumhuriyet dönemi edebiyatının ilk romanı hangisidir?', opts: ['Yaprak Dökümü','Çalıkuşu','Aşk-ı Memnu','Araba Sevdası'], ans: 1, diff: 'hard' },
    { q: '"Gelmez oldum" yapısındaki fiil kipi nedir?', opts: ['Öğrenilen geçmiş','Geniş zaman','Şimdiki zaman','Gelecek zaman'], ans: 1, diff: 'hard' },
    { q: 'Anlatıcı bakış açısı türlerinden "ilahi bakış açısı"nın özelliği nedir?', opts: ['1. şahıs anlatım','Her şeyi bilen anlatıcı','Gözlemci anlatıcı','Kahraman anlatıcı'], ans: 1, diff: 'hard' },
  ],
  'Sosyal Bilgiler': [
    { q: 'Türkiye\'nin başkenti neresidir?', opts: ['İstanbul','İzmir','Ankara','Bursa'], ans: 2, diff: 'easy' },
    { q: 'Hangi şehir İstanbul\'dur?', opts: ['Kızıl Elma','Boğaziçi şehri','İki kıtalı şehir','Mavi şehir'], ans: 2, diff: 'easy' },
    { q: 'Türk bayrağında hangi renkler vardır?', opts: ['Mavi-beyaz','Kırmızı-beyaz','Sarı-kırmızı','Yeşil-beyaz'], ans: 1, diff: 'easy' },
    { q: 'Atatürk hangi yılda vefat etmiştir?', opts: ['1936','1937','1938','1939'], ans: 2, diff: 'easy' },
    { q: 'Nil Nehri hangi kıtada yer alır?', opts: ['Asya','Avrupa','Afrika','Amerika'], ans: 2, diff: 'easy' },
    { q: 'Cumhuriyet\'in ilanı hangi yılda gerçekleşmiştir?', opts: ['1919','1920','1923','1938'], ans: 2, diff: 'medium' },
    { q: 'Hangi ülke dünya\'nın en büyük ülkesidir?', opts: ['ABD','Çin','Rusya','Kanada'], ans: 2, diff: 'medium' },
    { q: 'Türkiye\'nin en kalabalık şehri hangisidir?', opts: ['Ankara','İstanbul','İzmir','Bursa'], ans: 1, diff: 'medium' },
    { q: 'İpek Yolu hangi iki bölgeyi birleştirmiştir?', opts: ['Afrika-Amerika','Asya-Avrupa','Avustralya-Asya','Kuzey-Güney Amerika'], ans: 1, diff: 'medium' },
    { q: 'Osmanlı İmparatorluğu ne zaman kurulmuştur?', opts: ['1099','1299','1453','1571'], ans: 1, diff: 'medium' },
    { q: 'Birinci Dünya Savaşı hangi yılda başlamıştır?', opts: ['1912','1914','1916','1918'], ans: 1, diff: 'hard' },
    { q: 'Fransız Devrimi hangi yılda gerçekleşmiştir?', opts: ['1776','1789','1804','1848'], ans: 1, diff: 'hard' },
    { q: 'Lozan Antlaşması hangi yıl imzalanmıştır?', opts: ['1920','1923','1925','1930'], ans: 1, diff: 'hard' },
    { q: 'Sanayi Devrimi hangi ülkede başlamıştır?', opts: ['Fransa','Almanya','İngiltere','ABD'], ans: 2, diff: 'hard' },
    { q: 'Marshall Planı\'nın amacı neydi?', opts: ['Asya\'nın kalkınması','Savaş sonrası Avrupa\'nın yeniden yapılanması','BM\'nin kurulması','NATO\'nun genişlemesi'], ans: 1, diff: 'hard' },
  ],
  'İngilizce': [
    { q: '"Apple" kelimesinin Türkçesi nedir?', opts: ['Armut','Elma','Portakal','Kiraz'], ans: 1, diff: 'easy' },
    { q: '"Red" rengi Türkçede nedir?', opts: ['Mavi','Yeşil','Sarı','Kırmızı'], ans: 3, diff: 'easy' },
    { q: '"Dog" ne demektir?', opts: ['Kedi','Kuş','Köpek','Balık'], ans: 2, diff: 'easy' },
    { q: '1\'den 5\'e kadar sayıları İngilizce söylersek son hangisi olur?', opts: ['Four','Five','Three','Six'], ans: 1, diff: 'easy' },
    { q: '"Hello" kelimesinin karşılığı nedir?', opts: ['Güle güle','Merhaba','Teşekkürler','Evet'], ans: 1, diff: 'easy' },
    { q: '"I ___ a student." cümlesinde boşluğa ne gelir?', opts: ['is','are','am','be'], ans: 2, diff: 'medium' },
    { q: '"Book" kelimesinin çoğulu nedir?', opts: ['Bookes','Books','Bookies','Booksen'], ans: 1, diff: 'medium' },
    { q: '"What time is it?" sorusunun Türkçesi nedir?', opts: ['Adın ne?','Saat kaç?','Nerelisin?','Nasılsın?'], ans: 1, diff: 'medium' },
    { q: '"She ___ to school every day." cümlesine uygun fiil?', opts: ['go','goes','going','gone'], ans: 1, diff: 'medium' },
    { q: 'Hangi cümle doğrudur?', opts: ['He don\'t like it','She doesn\'t likes it','They doesn\'t go','He doesn\'t like it'], ans: 3, diff: 'medium' },
    { q: '"If I ___ rich, I would travel." cümlesinde boşluğa ne gelir?', opts: ['am','was','were','be'], ans: 2, diff: 'hard' },
    { q: '"Despite" kelimesi nasıl kullanılır?', opts: ['Despite of the rain','Despite the rain','Despite raining of','Despite from rain'], ans: 1, diff: 'hard' },
    { q: 'Passive voice: "They built the house." cümlesini çevirin.', opts: ['The house was built','The house is built','The house has built','The house built'], ans: 0, diff: 'hard' },
    { q: '"Hardly" kelimesinin anlamı nedir?', opts: ['Sertçe','Neredeyse hiç','Zorlukla','Tamamen'], ans: 1, diff: 'hard' },
    { q: '"By the time she arrived, he ___ already left."', opts: ['has','had','have','was'], ans: 1, diff: 'hard' },
  ],
  'Din Kültürü': [
    { q: 'İslam\'ın kaç şartı vardır?', opts: ['3','4','5','6'], ans: 2, diff: 'easy' },
    { q: 'Ramazan ayında tutulan ibadete ne denir?', opts: ['Namaz','Oruç','Hac','Zekat'], ans: 1, diff: 'easy' },
    { q: 'Namaz günde kaç vakit kılınır?', opts: ['3','4','5','6'], ans: 2, diff: 'easy' },
    { q: 'Müslümanların ibadet yeri nedir?', opts: ['Kilise','Havra','Cami','Tapınak'], ans: 2, diff: 'easy' },
    { q: 'Kıble hangi yönü gösterir?', opts: ['Medine','Kudüs','Mekke (Kabe)','İstanbul'], ans: 2, diff: 'easy' },
    { q: 'Kuran-ı Kerim kaç sureden oluşur?', opts: ['110','114','120','99'], ans: 1, diff: 'medium' },
    { q: 'Ramazan ayı kaçıncı aydır?', opts: ['8.','9.','10.','11.'], ans: 1, diff: 'medium' },
    { q: 'Peygamberimizin (SAV) doğduğu şehir neresidir?', opts: ['Medine','İstanbul','Mekke','Kudüs'], ans: 2, diff: 'medium' },
    { q: 'Hicret hangi şehirden hangi şehre yapılmıştır?', opts: ['Mekke\'den Kudüs\'e','Mekke\'den Medine\'ye','Medine\'den Mekke\'ye','Kudüs\'ten Mekke\'ye'], ans: 1, diff: 'medium' },
    { q: 'İslamiyet\'te zekat kimlere verilmez?', opts: ['Fakirlere','Zenginlere','Yolculara','Borçlulara'], ans: 1, diff: 'medium' },
    { q: 'Kur\'an-ı Kerim hangi dilde indirilmiştir?', opts: ['Farsça','Türkçe','Arapça','İbranice'], ans: 2, diff: 'hard' },
    { q: 'İslam\'da "tevhid" kavramı ne anlama gelir?', opts: ['Oruç tutmak','Allah\'ın birliği','Namaz kılmak','Hac yapmak'], ans: 1, diff: 'hard' },
    { q: 'Kur\'an\'da en uzun sure hangisidir?', opts: ['Fatiha','Bakara','Al-i İmran','Yasin'], ans: 1, diff: 'hard' },
    { q: '"Ehl-i Sünnet" kavramı ne anlama gelir?', opts: ['Sünnilik','Şia','Selefilik','Alevilik'], ans: 0, diff: 'hard' },
    { q: 'İslam\'da "ibadet" kavramı yalnızca namazı mı kapsar?', opts: ['Evet','Hayır, tüm iyi ameller ibadettir','Sadece hac','Sadece oruç'], ans: 1, diff: 'hard' },
  ],
};

// Tüm dersler havuzu
questions['Tüm Dersler'] = Object.entries(questions)
  .filter(([k]) => k !== 'Tüm Dersler')
  .flatMap(([,v]) => v);

/* ─── SIDEBAR ─── */
function toggleSidebar() {
  sidebarOpen = !sidebarOpen;
  const sb = document.getElementById('sidebar');
  const mn = document.getElementById('main');
  const hb = document.getElementById('hamburger');
  sb.classList.toggle('hidden', !sidebarOpen);
  mn.classList.toggle('full', !sidebarOpen);
  hb.classList.toggle('open', !sidebarOpen);
}

/* ─── EXAM JOIN ─── */
function joinExam() {
  const code = document.getElementById('examCode').value.trim();
  if (!code) { showToast('Lütfen sınav kodunu girin!'); return; }
  showToast('Sınav kodu "' + code + '" ile bağlanılıyor...');
  document.getElementById('examCode').value = '';
}

/* ─── SETUP ─── */
const subjectIcons = {
  'Matematik':'📐','Fen Bilimleri':'🔬','Türkçe':'📖',
  'Sosyal Bilgiler':'🌍','İngilizce':'🇬🇧','Din Kültürü':'🕌','Tüm Dersler':'✨'
};

function openSubjectModal(subject) {
  selectedSubject = subject;
  // Reset setup
  selectedCount = 10;
  diffCounts = { easy: 4, medium: 4, hard: 2 };
  document.querySelectorAll('.count-btn').forEach(b => b.classList.remove('sel'));
  document.querySelectorAll('.count-btn')[1].classList.add('sel');
  document.getElementById('easyCount').textContent = 4;
  document.getElementById('mediumCount').textContent = 4;
  document.getElementById('hardCount').textContent = 2;
  document.getElementById('setupBadge').textContent = (subjectIcons[subject] || '📋') + ' ' + subject;
  updateDiffTotal();
  // Show panel setup
  document.getElementById('qpSetup').style.display = 'flex';
  document.getElementById('qpActive').classList.remove('show');
  document.getElementById('qpScore').classList.remove('show');
  document.getElementById('quizPanel').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function selectCount(n, btn) {
  selectedCount = n;
  document.querySelectorAll('.count-btn').forEach(b => b.classList.remove('sel'));
  btn.classList.add('sel');
  // Scale diff counts proportionally
  const ratio = n / (diffCounts.easy + diffCounts.medium + diffCounts.hard);
  diffCounts.easy   = Math.max(0, Math.round(diffCounts.easy * ratio));
  diffCounts.medium = Math.max(0, Math.round(diffCounts.medium * ratio));
  diffCounts.hard   = n - diffCounts.easy - diffCounts.medium;
  if (diffCounts.hard < 0) { diffCounts.medium += diffCounts.hard; diffCounts.hard = 0; }
  document.getElementById('easyCount').textContent = diffCounts.easy;
  document.getElementById('mediumCount').textContent = diffCounts.medium;
  document.getElementById('hardCount').textContent = diffCounts.hard;
  updateDiffTotal();
}

function changeDiff(level, delta) {
  const next = diffCounts[level] + delta;
  if (next < 0) return;
  diffCounts[level] = next;
  document.getElementById(level + 'Count').textContent = next;
  updateDiffTotal();
}

function updateDiffTotal() {
  const total = diffCounts.easy + diffCounts.medium + diffCounts.hard;
  const el = document.getElementById('diffTotal');
  el.textContent = 'Toplam: ' + total + ' / ' + selectedCount + ' soru ' + (total === selectedCount ? '✓' : '⚠');
  el.className = 'diff-total' + (total !== selectedCount ? ' over' : '');
  document.getElementById('startQuizBtn').disabled = (total !== selectedCount || total === 0);
}

function startQuiz() {
  const pool = questions[selectedSubject] || [];
  const byDiff = { easy: pool.filter(q => q.diff === 'easy'), medium: pool.filter(q => q.diff === 'medium'), hard: pool.filter(q => q.diff === 'hard') };
  const pick = (arr, n) => [...arr].sort(() => Math.random() - .5).slice(0, n);
  const qs = [
    ...pick(byDiff.easy, diffCounts.easy),
    ...pick(byDiff.medium, diffCounts.medium),
    ...pick(byDiff.hard, diffCounts.hard),
  ].sort(() => Math.random() - .5);

  quizData = { subject: selectedSubject, qs };
  currentQ = 0; score = 0; answered = false;

  document.getElementById('qpSubjectName').textContent = selectedSubject;
  document.getElementById('qpSetup').style.display = 'none';
  document.getElementById('qpActive').classList.add('show');
  document.getElementById('qpScore').classList.remove('show');
  renderQPQuestion();
}

/* ─── ACTIVE QUIZ ─── */
function renderQPQuestion() {
  const { qs } = quizData;
  const total = qs.length;
  const q = qs[currentQ];
  answered = false;

  // progress
  const pct = (currentQ / total) * 100;
  document.getElementById('qpProgressFill').style.width = pct + '%';
  document.getElementById('qpCounter').textContent = (currentQ + 1) + ' / ' + total;

  const diffLabels = { easy: '🟢 Kolay', medium: '🟡 Orta', hard: '🔴 Zor' };
  document.getElementById('qpQuestionCard').innerHTML = `
    <span class="qp-diff-badge ${q.diff}">${diffLabels[q.diff]}</span>
    <div class="qp-question-text">${q.q}</div>
    <div class="qp-options">
      ${q.opts.map((opt, i) => `
        <button class="qp-option" onclick="selectQPOption(${i})">
          <span class="opt-letter">${String.fromCharCode(65+i)}</span>
          <span>${opt}</span>
        </button>`).join('')}
    </div>
    <div class="qp-footer">
      <div class="qp-feedback" id="qpFeedback"></div>
      <button class="qp-next-btn" id="qpNextBtn" onclick="nextQPQuestion()">
        ${currentQ + 1 < total ? 'Sonraki →' : 'Sonuçları Gör →'}
      </button>
    </div>
  `;
}

function selectQPOption(i) {
  if (answered) return;
  answered = true;
  const q = quizData.qs[currentQ];
  const btns = document.querySelectorAll('.qp-option');
  btns.forEach(b => b.disabled = true);
  const fb = document.getElementById('qpFeedback');
  if (i === q.ans) {
    btns[i].classList.add('correct');
    fb.textContent = '✓ Doğru!'; fb.className = 'qp-feedback ok';
    score++;
  } else {
    btns[i].classList.add('wrong');
    btns[q.ans].classList.add('correct');
    fb.textContent = '✗ Yanlış — doğru: ' + String.fromCharCode(65 + q.ans);
    fb.className = 'qp-feedback err';
  }
  document.getElementById('qpNextBtn').classList.add('vis');
}

function nextQPQuestion() {
  currentQ++;
  if (currentQ >= quizData.qs.length) { showQPScore(); return; }
  renderQPQuestion();
}

/* ─── SCORE ─── */
function showQPScore() {
  const total = quizData.qs.length;
  const pct = Math.round(score / total * 100);
  document.getElementById('qpProgressFill').style.width = '100%';
  document.getElementById('qpActive').classList.remove('show');
  document.getElementById('qpScore').classList.add('show');

  const emoji = pct >= 80 ? '🎉' : pct >= 60 ? '😊' : pct >= 40 ? '🤔' : '😅';
  const title = pct >= 80 ? 'Harika!' : pct >= 60 ? 'İyi İş!' : pct >= 40 ? 'Fena Değil' : 'Daha Çok Çalış!';
  document.getElementById('scoreEmoji').textContent = emoji;
  document.getElementById('scoreTitle').textContent = title;
  document.getElementById('scoreSub').textContent = selectedSubject + ' testini tamamladın!';
  document.getElementById('scoreCorrect').textContent = score;
  document.getElementById('scoreWrong').textContent = total - score;
  document.getElementById('scorePct').textContent = '%' + pct;

  // Update dashboard
  totalDogru += score; totalSoru += total; totalXP += score * 10;
  const prevTest = parseInt(document.getElementById('statTest').textContent) || 0;
  document.getElementById('statTest').textContent = prevTest + 1;
  document.getElementById('statPuan').textContent = totalXP;
  document.getElementById('statBasari').textContent = '%' + Math.round(totalDogru / totalSoru * 100);
  const prevSeri = parseInt(document.getElementById('statSeri').textContent) || 0;
  document.getElementById('statSeri').textContent = (prevSeri + 1) + ' gün';
  const xpInLevel = totalXP % XP_PER_LEVEL;
  document.getElementById('xpText').textContent = xpInLevel + '/' + XP_PER_LEVEL + ' XP';
  document.getElementById('xpBar').style.width = (xpInLevel / XP_PER_LEVEL * 100) + '%';
  addToTable(selectedSubject, score, total - score, pct);
}

function retryQuiz() { startQuiz(); }

function closeQuizPanel() {
  document.getElementById('quizPanel').classList.remove('open');
  document.body.style.overflow = '';
}

function confirmClose() {
  if (answered !== undefined && currentQ > 0) {
    if (!confirm('Testi bırakmak istediğine emin misin? İlerleme kaydedilmeyecek.')) return;
  }
  closeQuizPanel();
}

/* ─── TABLE ─── */
function addToTable(ders, dogru, yanlis, pct) {
  const tbody = document.getElementById('testsTableBody');
  const emptyRow = document.getElementById('emptyRow');
  if (emptyRow) emptyRow.remove();
  const today = new Date();
  const aylar = ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'];
  const dateStr = today.getDate() + ' ' + aylar[today.getMonth()] + ' ' + today.getFullYear();
  const row = document.createElement('tr');
  row.innerHTML = `
    <td class="test-name">${ders} Testi</td>
    <td>${ders}</td>
    <td>${dateStr}</td>
    <td class="doğru">${dogru}</td>
    <td class="yanlış">${yanlis}</td>
    <td class="başarı">%${pct}</td>
    <td><button class="result-btn" onclick="showToast('Sonuçlar görüntüleniyor...')">Sonuçları Gör</button></td>
  `;
  tbody.insertBefore(row, tbody.firstChild);
}

/* ─── TOAST ─── */
let toastTimer;
function showToast(msg) {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3000);
}
</script>
</body>
</html>