<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quizion – Öğrenmek Artık Çok Daha Eğlenceli!</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@400;600;700;800&display=swap" rel="stylesheet" />
<style>
/* ============================================================
   CSS VARIABLES & RESET
   ============================================================ */
:root {
  --purple-deep: #3d1a8e;
  --purple-mid:  #6c35de;
  --purple-light:#9b6dff;
  --purple-pale: #ede7ff;
  --orange:      #f5a623;
  --orange-dark: #e08c00;
  --white:       #ffffff;
  --text-dark:   #1e0e4b;
  --text-mid:    #5a4a7a;
  --card-bg:     #ffffff;
  --sidebar-w:   300px;
  --navbar-h:    68px;
  --transition:  0.35s cubic-bezier(.4,0,.2,1);
  --glass-bg:    rgba(255,255,255,0.12);
  --glass-border:rgba(255,255,255,0.25);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: smooth; }

body {
  font-family: 'Nunito', sans-serif;
  background: #f4f0ff;
  color: var(--text-dark);
  overflow-x: hidden;
}

/* ============================================================
   NAVBAR
   ============================================================ */
.navbar {
  position: fixed;
  top: 0; left: 0; right: 0;
  height: var(--navbar-h);
  background: rgba(61,26,142,0.92);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  border-bottom: 1px solid var(--glass-border);
  display: flex;
  align-items: center;
  padding: 0 24px;
  gap: 12px;
  z-index: 1000;
  box-shadow: 0 4px 32px rgba(61,26,142,0.35);
}

.hamburger-btn {
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  color: #fff;
  width: 42px; height: 42px;
  border-radius: 12px;
  font-size: 20px;
  cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  transition: var(--transition);
  flex-shrink: 0;
}
.hamburger-btn:hover { background: rgba(255,255,255,0.22); transform: scale(1.06); }

.navbar-logo {
  font-family: 'Baloo 2', cursive;
  font-weight: 800;
  font-size: 1.6rem;
  color: #fff;
  letter-spacing: -0.5px;
  flex-shrink: 0;
  margin-right: 8px;
}
.navbar-logo span { color: var(--orange); }

.navbar-links {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 2px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  list-style: none;
}

.navbar-links li a {
  display: flex;
  align-items: center;
  gap: 6px;
  color: rgba(255,255,255,0.80);
  text-decoration: none;
  font-family: 'Nunito', sans-serif;
  font-size: 0.9rem;
  font-weight: 700;
  padding: 8px 16px;
  border-radius: 10px;
  transition: var(--transition);
  white-space: nowrap;
  position: relative;
  letter-spacing: 0.2px;
}

.navbar-links li a::after {
  content: '';
  position: absolute;
  bottom: 3px;
  left: 50%;
  transform: translateX(-50%) scaleX(0);
  width: 60%;
  height: 2px;
  background: var(--orange);
  border-radius: 2px;
  transition: transform 0.25s ease;
}

.navbar-links li a:hover {
  color: var(--orange);
  background: rgba(245,166,35,0.08);
  text-shadow: 0 0 12px rgba(245,166,35,0.5);
}
.navbar-links li a:hover::after { transform: translateX(-50%) scaleX(1); }

.navbar-links li a.active {
  color: var(--orange);
  font-weight: 800;
}
.navbar-links li a.active::after { transform: translateX(-50%) scaleX(1); }

.navbar-links li a .nav-emoji { font-size: 1rem; }

.navbar-right {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-left: auto;
  flex-shrink: 0;
}

/* Role Toggle */
.role-toggle {
  display: flex;
  background: rgba(255,255,255,0.1);
  border-radius: 10px;
  overflow: hidden;
  border: 1px solid var(--glass-border);
}
.role-toggle button {
  background: none;
  border: none;
  color: rgba(255,255,255,0.7);
  font-family: 'Nunito', sans-serif;
  font-size: 0.8rem;
  font-weight: 700;
  padding: 6px 14px;
  cursor: pointer;
  transition: var(--transition);
}
.role-toggle button.active-role {
  background: var(--orange);
  color: #fff;
  border-radius: 8px;
}

.btn-giris {
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.3);
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 10px;
  cursor: pointer;
  transition: var(--transition);
}
.btn-giris:hover { background: rgba(255,255,255,0.25); }

.btn-kayit {
  background: linear-gradient(135deg, var(--orange), #ff6b35);
  border: none;
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 800;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 10px;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 4px 14px rgba(245,166,35,0.4);
}
.btn-kayit:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(245,166,35,0.5); }

/* ============================================================
   SIDEBAR OVERLAY
   ============================================================ */
.sidebar-overlay {
  position: fixed;
  inset: 0;
  z-index: 1099;
  background: rgba(10,0,40,0.55);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  opacity: 0;
  pointer-events: none;
  transition: opacity var(--transition);
}
.sidebar-overlay.open {
  opacity: 1;
  pointer-events: all;
}

/* ============================================================
   SIDEBAR
   ============================================================ */
.sidebar {
  position: fixed;
  top: 0; left: 0;
  width: var(--sidebar-w);
  height: 100vh;
  z-index: 1100;
  background: linear-gradient(160deg,
    rgba(61,26,142,0.96) 0%,
    rgba(108,53,222,0.94) 50%,
    rgba(61,26,142,0.97) 100%);
  backdrop-filter: blur(28px);
  -webkit-backdrop-filter: blur(28px);
  border-right: 1px solid rgba(255,255,255,0.18);
  box-shadow: 8px 0 48px rgba(61,26,142,0.5);
  transform: translateX(-100%);
  transition: transform 0.4s cubic-bezier(.4,0,.2,1);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}
.sidebar.open { transform: translateX(0); }

/* Decorative blobs inside sidebar */
.sidebar::before {
  content:'';
  position: absolute;
  top: -80px; right: -60px;
  width: 220px; height: 220px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(155,109,255,0.3) 0%, transparent 70%);
  pointer-events: none;
}
.sidebar::after {
  content:'';
  position: absolute;
  bottom: -60px; left: -40px;
  width: 180px; height: 180px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(245,166,35,0.2) 0%, transparent 70%);
  pointer-events: none;
}

.sidebar-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 20px 16px;
  border-bottom: 1px solid rgba(255,255,255,0.12);
}
.sidebar-logo {
  font-family: 'Baloo 2', cursive;
  font-weight: 800;
  font-size: 1.4rem;
  color: #fff;
}
.sidebar-logo span { color: var(--orange); }

.sidebar-close {
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  color: #fff;
  width: 34px; height: 34px;
  border-radius: 9px;
  font-size: 18px;
  cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  transition: var(--transition);
}
.sidebar-close:hover { background: rgba(255,255,255,0.2); }

/* User profile card in sidebar */
.sidebar-profile {
  margin: 14px 16px;
  padding: 14px 16px;
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.18);
  border-radius: 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  position: relative;
  overflow: hidden;
}
.sidebar-profile::before {
  content:'';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(255,255,255,0.08), transparent);
  pointer-events: none;
}
.profile-avatar {
  width: 46px; height: 46px;
  border-radius: 14px;
  background: linear-gradient(135deg, var(--orange), #ff6b35);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem;
  font-weight: 900;
  color: #fff;
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(245,166,35,0.4);
}
.profile-info { flex: 1; min-width: 0; }
.profile-name {
  font-weight: 800;
  font-size: 0.95rem;
  color: #fff;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.profile-role {
  font-size: 0.75rem;
  font-weight: 600;
  color: rgba(255,255,255,0.7);
  display: flex;
  align-items: center;
  gap: 4px;
  margin-top: 2px;
}
.role-badge {
  background: var(--orange);
  color: #fff;
  font-size: 0.65rem;
  font-weight: 800;
  padding: 2px 8px;
  border-radius: 20px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.role-badge.teacher { background: #5cc8a8; }

/* Sidebar nav */
.sidebar-nav { flex: 1; overflow-y: auto; padding: 8px 12px; }
.sidebar-nav::-webkit-scrollbar { width: 4px; }
.sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 4px; }

.sidebar-section-label {
  font-size: 0.7rem;
  font-weight: 800;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: rgba(255,255,255,0.45);
  padding: 12px 10px 6px;
}

.sidebar-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 14px;
  border-radius: 13px;
  color: rgba(255,255,255,0.82);
  text-decoration: none;
  font-weight: 700;
  font-size: 0.92rem;
  cursor: pointer;
  transition: var(--transition);
  margin-bottom: 3px;
  position: relative;
  overflow: hidden;
}
.sidebar-item:hover {
  background: rgba(255,255,255,0.12);
  color: #fff;
  transform: translateX(3px);
}
.sidebar-item.active {
  background: linear-gradient(135deg, rgba(245,166,35,0.25), rgba(255,107,53,0.15));
  color: #fff;
  border: 1px solid rgba(245,166,35,0.3);
}
.sidebar-item.active::before {
  content: '';
  position: absolute;
  left: 0; top: 20%; bottom: 20%;
  width: 3px;
  background: var(--orange);
  border-radius: 2px;
}
.sidebar-item-icon {
  width: 36px; height: 36px;
  border-radius: 10px;
  background: rgba(255,255,255,0.1);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem;
  flex-shrink: 0;
  transition: var(--transition);
}
.sidebar-item:hover .sidebar-item-icon,
.sidebar-item.active .sidebar-item-icon {
  background: rgba(255,255,255,0.18);
  transform: scale(1.08);
}
.sidebar-item-text { flex: 1; }
.sidebar-item-badge {
  background: var(--orange);
  color: #fff;
  font-size: 0.7rem;
  font-weight: 800;
  min-width: 20px;
  height: 20px;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  padding: 0 6px;
}

.sidebar-divider {
  height: 1px;
  background: rgba(255,255,255,0.1);
  margin: 8px 10px;
}

.sidebar-footer {
  padding: 14px 16px;
  border-top: 1px solid rgba(255,255,255,0.1);
}
.sidebar-footer-btn {
  width: 100%;
  background: linear-gradient(135deg, var(--orange), #ff6b35);
  border: none;
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 800;
  font-size: 0.9rem;
  padding: 12px;
  border-radius: 13px;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 4px 16px rgba(245,166,35,0.4);
}
.sidebar-footer-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(245,166,35,0.5); }

/* ============================================================
   MAIN CONTENT WRAPPER
   ============================================================ */
.main-wrapper {
  padding-top: var(--navbar-h);
  transition: filter var(--transition);
}
.main-wrapper.blurred {
  filter: blur(4px) brightness(0.85);
  pointer-events: none;
  user-select: none;
}

/* ============================================================
   HERO SECTION
   ============================================================ */
.hero {
  background: linear-gradient(135deg, #3d1a8e 0%, #6c35de 55%, #9b6dff 100%);
  min-height: 560px;
  display: flex;
  align-items: center;
  padding: 60px 8% 80px;
  position: relative;
  overflow: hidden;
}

/* Decorative blobs */
.hero::before {
  content: '';
  position: absolute;
  top: -100px; right: -100px;
  width: 500px; height: 500px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(255,150,50,0.18) 0%, transparent 65%);
}
.hero::after {
  content: '';
  position: absolute;
  bottom: -80px; left: 20%;
  width: 350px; height: 350px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(155,109,255,0.25) 0%, transparent 65%);
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.25);
  color: #fff;
  font-size: 0.83rem;
  font-weight: 700;
  padding: 8px 18px;
  border-radius: 30px;
  margin-bottom: 24px;
  backdrop-filter: blur(8px);
}

.hero-left { flex: 1; max-width: 540px; position: relative; z-index: 2; }

.hero-title {
  font-family: 'Baloo 2', cursive;
  font-weight: 800;
  font-size: clamp(2.2rem, 4vw, 3.2rem);
  color: #fff;
  line-height: 1.2;
  margin-bottom: 20px;
}
.hero-title .highlight { color: var(--orange); }

.hero-desc {
  color: rgba(255,255,255,0.85);
  font-size: 1rem;
  line-height: 1.7;
  margin-bottom: 32px;
  max-width: 460px;
}

.hero-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 40px; }

.btn-primary {
  background: linear-gradient(135deg, var(--orange), #ff6b35);
  border: none;
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 800;
  font-size: 1rem;
  padding: 14px 28px;
  border-radius: 14px;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 6px 20px rgba(245,166,35,0.45);
}
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(245,166,35,0.55); }

.btn-secondary {
  background: rgba(255,255,255,0.12);
  border: 1.5px solid rgba(255,255,255,0.35);
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
  font-size: 1rem;
  padding: 14px 28px;
  border-radius: 14px;
  cursor: pointer;
  transition: var(--transition);
  backdrop-filter: blur(8px);
}
.btn-secondary:hover { background: rgba(255,255,255,0.22); }

.hero-stats {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}
.hero-stat-chip {
  display: flex;
  align-items: center;
  gap: 6px;
  background: rgba(255,255,255,0.12);
  border: 1px solid rgba(255,255,255,0.2);
  color: rgba(255,255,255,0.9);
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 14px;
  border-radius: 20px;
  backdrop-filter: blur(6px);
}

/* Hero card */
.hero-right {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 2;
}

.perf-card {
  background: rgba(255,255,255,0.97);
  border-radius: 22px;
  padding: 24px;
  width: 360px;
  box-shadow: 0 24px 60px rgba(61,26,142,0.35);
  position: relative;
}

.perf-card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 18px;
}
.perf-card-title {
  font-family: 'Baloo 2', cursive;
  font-weight: 700;
  font-size: 1rem;
  color: var(--text-dark);
}
.perf-badge {
  background: #fff3e0;
  color: #e67e00;
  font-size: 0.75rem;
  font-weight: 800;
  padding: 4px 10px;
  border-radius: 8px;
}

.perf-stats {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  margin-bottom: 20px;
}
.perf-stat {
  background: #f8f4ff;
  border-radius: 12px;
  padding: 10px 8px;
  text-align: center;
}
.perf-stat-val {
  font-family: 'Baloo 2', cursive;
  font-weight: 800;
  font-size: 1.1rem;
  color: var(--text-dark);
}
.perf-stat:nth-child(2) .perf-stat-val { color: var(--purple-mid); }
.perf-stat:nth-child(3) .perf-stat-val { color: #3acaaa; }
.perf-stat-label { font-size: 0.68rem; font-weight: 600; color: var(--text-mid); margin-top: 2px; }

/* Bar chart */
.bar-chart { display: flex; align-items: flex-end; gap: 6px; height: 70px; }
.bar {
  flex: 1;
  border-radius: 6px 6px 0 0;
  background: var(--purple-pale);
  animation: growBar 0.8s ease forwards;
}
.bar.highlight-bar { background: var(--orange); }
@keyframes growBar { from { transform: scaleY(0); transform-origin: bottom; } to { transform: scaleY(1); } }

/* Floating badge */
.floating-badge {
  position: absolute;
  bottom: -18px;
  left: -18px;
  background: #fff;
  border-radius: 14px;
  padding: 10px 16px;
  display: flex;
  align-items: center;
  gap: 10px;
  box-shadow: 0 10px 30px rgba(61,26,142,0.2);
  animation: floatBadge 3s ease-in-out infinite;
}
@keyframes floatBadge {
  0%,100% { transform: translateY(0); }
  50% { transform: translateY(-6px); }
}
.badge-icon { font-size: 1.5rem; }
.badge-text-main { font-weight: 800; font-size: 0.88rem; color: var(--text-dark); }
.badge-text-sub { font-size: 0.72rem; color: var(--text-mid); font-weight: 600; }

/* Score circle */
.score-circle {
  position: absolute;
  top: -22px;
  right: -18px;
  width: 56px; height: 56px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--orange), #ff6b35);
  display: flex; align-items: center; justify-content: center;
  flex-direction: column;
  color: #fff;
  font-weight: 800;
  font-size: 1rem;
  box-shadow: 0 6px 18px rgba(245,166,35,0.5);
  animation: pulse 2s ease-in-out infinite;
}
@keyframes pulse {
  0%,100% { box-shadow: 0 6px 18px rgba(245,166,35,0.5); }
  50% { box-shadow: 0 8px 28px rgba(245,166,35,0.7); }
}

/* ============================================================
   STATS BAND
   ============================================================ */
.stats-band {
  background: linear-gradient(90deg, #5a20c8 0%, #7c3aed 100%);
  padding: 32px 8%;
  display: flex;
  align-items: center;
  gap: 40px;
  flex-wrap: wrap;
}
.stats-band-left { flex: 1; min-width: 200px; }
.stats-band-left h3 {
  font-family: 'Baloo 2', cursive;
  font-weight: 700;
  color: #fff;
  font-size: 1.2rem;
}
.stats-band-left p { color: rgba(255,255,255,0.7); font-size: 0.85rem; margin-top: 4px; }

.stats-band-numbers { display: flex; gap: 40px; flex-wrap: wrap; }
.stat-item { text-align: center; }
.stat-num {
  font-family: 'Baloo 2', cursive;
  font-weight: 800;
  font-size: 2.2rem;
  color: var(--orange);
  line-height: 1;
}
.stat-label { font-size: 0.78rem; font-weight: 600; color: rgba(255,255,255,0.75); margin-top: 4px; }

/* ============================================================
   FEATURES SECTION
   ============================================================ */
.features {
  background: #f8f4ff;
  padding: 80px 8%;
}
.section-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: #ede7ff;
  color: var(--purple-mid);
  font-size: 0.75rem;
  font-weight: 800;
  letter-spacing: 1px;
  text-transform: uppercase;
  padding: 6px 16px;
  border-radius: 20px;
  margin-bottom: 18px;
}
.section-title {
  font-family: 'Baloo 2', cursive;
  font-weight: 800;
  font-size: clamp(1.8rem, 3vw, 2.6rem);
  color: var(--text-dark);
  margin-bottom: 12px;
}
.section-subtitle { color: var(--text-mid); font-size: 1rem; margin-bottom: 50px; }

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 20px;
}

.feature-card {
  background: var(--card-bg);
  border-radius: 20px;
  padding: 28px 24px;
  border: 1px solid #ede7ff;
  transition: var(--transition);
  box-shadow: 0 2px 12px rgba(61,26,142,0.06);
}
.feature-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(61,26,142,0.14);
  border-color: var(--purple-light);
}
.feature-icon-wrap {
  width: 52px; height: 52px;
  border-radius: 14px;
  background: var(--purple-pale);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.6rem;
  margin-bottom: 18px;
}
.feature-title {
  font-family: 'Baloo 2', cursive;
  font-weight: 700;
  font-size: 1rem;
  color: var(--purple-mid);
  margin-bottom: 8px;
}
.feature-desc { color: var(--text-mid); font-size: 0.88rem; line-height: 1.6; }

/* ============================================================
   SUBJECTS SECTION
   ============================================================ */
.subjects { background: #fff; padding: 80px 8%; }
.subjects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
  gap: 16px;
}
.subject-card {
  background: #f8f4ff;
  border-radius: 18px;
  padding: 30px 20px;
  text-align: center;
  border: 1.5px solid #ede7ff;
  transition: var(--transition);
  cursor: pointer;
}
.subject-card:hover {
  background: linear-gradient(135deg, #ede7ff, #f3eeff);
  border-color: var(--purple-light);
  transform: translateY(-3px);
  box-shadow: 0 8px 24px rgba(108,53,222,0.15);
}
.subject-emoji { font-size: 2.4rem; margin-bottom: 12px; }
.subject-name { font-weight: 800; font-size: 0.92rem; color: var(--purple-mid); }

/* ============================================================
   TESTIMONIALS SECTION
   ============================================================ */
.testimonials { background: #f8f4ff; padding: 80px 8%; }
.testimonials-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
}
.testimonial-card {
  background: #fff;
  border-radius: 20px;
  padding: 28px;
  border: 1px solid #ede7ff;
  box-shadow: 0 2px 12px rgba(61,26,142,0.06);
  transition: var(--transition);
}
.testimonial-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(61,26,142,0.12); }
.stars { color: var(--orange); font-size: 1.1rem; letter-spacing: 2px; margin-bottom: 14px; }
.testimonial-text {
  color: var(--text-mid);
  font-size: 0.9rem;
  line-height: 1.7;
  margin-bottom: 18px;
  font-style: italic;
}
.testimonial-author { display: flex; align-items: center; gap: 12px; }
.author-avatar {
  width: 42px; height: 42px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  color: #fff;
  font-weight: 800;
  font-size: 1rem;
}
.author-name { font-weight: 800; font-size: 0.9rem; color: var(--text-dark); }
.author-role { font-size: 0.75rem; color: var(--text-mid); font-weight: 600; }

/* ============================================================
   CTA SECTION
   ============================================================ */
.cta-section {
  padding: 60px 8%;
  background: #fff;
}
.cta-card {
  background: linear-gradient(135deg, #5a20c8 0%, #7c3aed 50%, #9b6dff 100%);
  border-radius: 24px;
  padding: 50px 50px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 30px;
  flex-wrap: wrap;
  position: relative;
  overflow: hidden;
}
.cta-card::before {
  content: '';
  position: absolute;
  top: -60px; right: 5%;
  width: 300px; height: 300px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 60%);
}
.cta-icon {
  width: 64px; height: 64px;
  background: rgba(255,255,255,0.15);
  border-radius: 18px;
  display: flex; align-items: center; justify-content: center;
  font-size: 2rem;
  flex-shrink: 0;
}
.cta-text h2 {
  font-family: 'Baloo 2', cursive;
  font-weight: 800;
  font-size: 1.8rem;
  color: #fff;
  margin-bottom: 8px;
}
.cta-text p { color: rgba(255,255,255,0.8); font-size: 0.95rem; }
.cta-btns { display: flex; gap: 12px; flex-shrink: 0; flex-wrap: wrap; }
.btn-cta-primary {
  background: var(--orange);
  border: none;
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 800;
  font-size: 1rem;
  padding: 14px 28px;
  border-radius: 14px;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 6px 20px rgba(245,166,35,0.4);
  display: flex; align-items: center; gap: 8px;
}
.btn-cta-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(245,166,35,0.55); }

.btn-cta-secondary {
  background: rgba(255,255,255,0.15);
  border: 1.5px solid rgba(255,255,255,0.3);
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
  font-size: 1rem;
  padding: 14px 28px;
  border-radius: 14px;
  cursor: pointer;
  transition: var(--transition);
}
.btn-cta-secondary:hover { background: rgba(255,255,255,0.25); }

/* ============================================================
   FOOTER
   ============================================================ */
.footer {
  background: #1e0e4b;
  color: rgba(255,255,255,0.6);
  text-align: center;
  padding: 24px;
  font-size: 0.85rem;
}
.footer strong { color: var(--orange); }

/* ============================================================
   SIDEBAR ANIMATIONS – staggered items
   ============================================================ */
.sidebar-item {
  opacity: 0;
  transform: translateX(-12px);
  transition: opacity 0.3s ease, transform 0.3s ease, background var(--transition), color var(--transition);
}
.sidebar.open .sidebar-item:nth-child(1)  { animation: slideIn 0.3s 0.05s forwards; }
.sidebar.open .sidebar-item:nth-child(2)  { animation: slideIn 0.3s 0.10s forwards; }
.sidebar.open .sidebar-item:nth-child(3)  { animation: slideIn 0.3s 0.15s forwards; }
.sidebar.open .sidebar-item:nth-child(4)  { animation: slideIn 0.3s 0.20s forwards; }
.sidebar.open .sidebar-item:nth-child(5)  { animation: slideIn 0.3s 0.25s forwards; }
.sidebar.open .sidebar-item:nth-child(6)  { animation: slideIn 0.3s 0.30s forwards; }
.sidebar.open .sidebar-item:nth-child(7)  { animation: slideIn 0.3s 0.35s forwards; }
.sidebar.open .sidebar-item:nth-child(8)  { animation: slideIn 0.3s 0.40s forwards; }
.sidebar.open .sidebar-item:nth-child(9)  { animation: slideIn 0.3s 0.45s forwards; }
.sidebar.open .sidebar-item:nth-child(10) { animation: slideIn 0.3s 0.50s forwards; }

@keyframes slideIn {
  to { opacity: 1; transform: translateX(0); }
}

/* Sidebar profile animation */
.sidebar-profile {
  opacity: 0;
  transform: translateY(-8px);
  transition: opacity 0.3s ease, transform 0.3s ease;
}
.sidebar.open .sidebar-profile { animation: fadeDown 0.35s 0.02s forwards; }
@keyframes fadeDown { to { opacity: 1; transform: translateY(0); } }

/* ============================================================
   RESPONSIVE
   ============================================================ */
@media (max-width: 900px) {
  .hero { flex-direction: column; padding: 50px 6%; gap: 40px; }
  .hero-right { width: 100%; }
  .perf-card { width: 100%; max-width: 380px; }
  .navbar-links { display: none; }
  :root { --sidebar-w: 280px; }
}

@media (max-width: 640px) {
  .stats-band-numbers { gap: 20px; }
  .cta-card { padding: 32px 24px; }
  .cta-card .cta-text h2 { font-size: 1.4rem; }
}
</style>
</head>
<body>

<!-- ============================================================
     SIDEBAR OVERLAY
     ============================================================ -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- ============================================================
     SIDEBAR
     ============================================================ -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="sidebar-logo">Quiz<span>ion</span></div>
    <button class="sidebar-close" onclick="closeSidebar()">✕</button>
  </div>

  <!-- Profile -->
  <div class="sidebar-profile">
    <div class="profile-avatar" id="profileInitial">A</div>
    <div class="profile-info">
      <div class="profile-name" id="profileName">Ahmet Yılmaz</div>
      <div class="profile-role">
        <span id="profileRoleText">8. Sınıf Öğrencisi</span>
        <span class="role-badge" id="profileBadge">Öğrenci</span>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav class="sidebar-nav" id="sidebarNav">
    <!-- Injected by JS -->
  </nav>

  <div class="sidebar-footer">
    <button class="sidebar-footer-btn">⚡ Sınava Hemen Gir!</button>
  </div>
</aside>

<!-- ============================================================
     NAVBAR
     ============================================================ -->
<nav class="navbar">
  <button class="hamburger-btn" id="hamburgerBtn" onclick="openSidebar()">☰</button>
  <div class="navbar-logo">Quiz<span>ion</span></div>

  <ul class="navbar-links">
    <li><a href="#hero" class="active"><span class="nav-emoji">🏠</span> Anasayfa</a></li>
    <li><a href="#knowledge-bag"><span class="nav-emoji">🎒</span> Bilgi Çantası</a></li>
    <li><a href="#legends-league"><span class="nav-emoji">🌟</span> Efsaneler Ligi</a></li>
    <li><a href="#mission-board"><span class="nav-emoji">🧩</span> Görev Panosu</a></li>
  </ul>

  <div class="navbar-right">
    <div class="role-toggle">
      <button id="roleStudent" class="active-role" onclick="setRole('student')">Öğrenci</button>
      <button id="roleTeacher" onclick="setRole('teacher')">Öğretmen</button>
    </div>
    <button class="btn-giris">Giriş Yap</button>
    <button class="btn-kayit">Ücretsiz Başla 🚀</button>
  </div>
</nav>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="main-wrapper" id="mainWrapper">

  <!-- HERO -->
  <section class="hero" id="hero">
    <div class="hero-left">
      <div class="hero-badge">✨ Ortaokul Öğrencilerine Özel Platform</div>
      <h1 class="hero-title">
        Öğrenmek <span class="highlight">Artık</span><br>
        Çok Daha <span class="highlight">Eğlenceli!</span>
      </h1>
      <p class="hero-desc">
        Yapay zeka destekli analizler, eğlenceli sınavlar ve gerçek zamanlı yarışmalarla derslerinde süper kahraman ol! 🦸
      </p>
      <div class="hero-cta">
        <button class="btn-primary">Hemen Başla 🚀</button>
        <button class="btn-secondary">▶ Nasıl Çalışır?</button>
      </div>
      <div class="hero-stats">
        <div class="hero-stat-chip">🎓 10K+ Öğrenci</div>
        <div class="hero-stat-chip">📋 500+ Sınav</div>
        <div class="hero-stat-chip">🏆 24/7 Destek</div>
      </div>
    </div>

    <div class="hero-right">
      <div class="perf-card">
        <div class="perf-card-header">
          <div class="perf-card-title">🏅 Haftalık Performans</div>
          <div class="perf-badge">🔥 Harika!</div>
        </div>
        <div class="perf-stats">
          <div class="perf-stat">
            <div class="perf-stat-val">12</div>
            <div class="perf-stat-label">Sınav</div>
          </div>
          <div class="perf-stat">
            <div class="perf-stat-val">%88</div>
            <div class="perf-stat-label">Başarı</div>
          </div>
          <div class="perf-stat">
            <div class="perf-stat-val">450</div>
            <div class="perf-stat-label">Soru</div>
          </div>
          <div class="perf-stat">
            <div class="perf-stat-val">8s</div>
            <div class="perf-stat-label">Çalışma</div>
          </div>
        </div>
        <div class="bar-chart">
          <div class="bar" style="height:45%"></div>
          <div class="bar" style="height:60%"></div>
          <div class="bar highlight-bar" style="height:85%"></div>
          <div class="bar" style="height:55%"></div>
          <div class="bar" style="height:70%"></div>
          <div class="bar highlight-bar" style="height:95%"></div>
          <div class="bar" style="height:50%"></div>
        </div>
        <div class="floating-badge">
          <div class="badge-icon">🏆</div>
          <div>
            <div class="badge-text-main">Yeni Rozet!</div>
            <div class="badge-text-sub">Matematik Dehası</div>
          </div>
        </div>
        <div class="score-circle">%96</div>
      </div>
    </div>
  </section>

  <!-- STATS BAND -->
  <section class="stats-band">
    <div class="stats-band-left">
      <h3>Rakamlarla Quizion</h3>
      <p>Türkiye'nin en sevilen ortaokul sınav platformu.</p>
    </div>
    <div class="stats-band-numbers">
      <div class="stat-item"><div class="stat-num">50M</div><div class="stat-label">Çözülen Soru</div></div>
      <div class="stat-item"><div class="stat-num">150K</div><div class="stat-label">Öğretmen</div></div>
      <div class="stat-item"><div class="stat-num">95%</div><div class="stat-label">Memnuniyet</div></div>
      <div class="stat-item"><div class="stat-num">10K+</div><div class="stat-label">Aktif Öğrenci</div></div>
    </div>
  </section>

  <!-- FEATURES -->
  <section class="features" id="knowledge-bag">
    <div class="section-tag">⚡ ÖZELLİKLER</div>
    <h2 class="section-title">Öğrenmeyi Süper Güce Dönüştür!</h2>
    <p class="section-subtitle">Quizion ile dersler eğlenceye, başarı alışkanlığa dönüşüyor.</p>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon-wrap">📊</div>
        <div class="feature-title">Akıllı Analiz</div>
        <div class="feature-desc">Yapay zeka hangi konuların üzerinde durman gerektiğini sana söylüyor. Boşuna çalışma bitti!</div>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">⚡</div>
        <div class="feature-title">Canlı Yarışmalar</div>
        <div class="feature-desc">Sınıf arkadaşlarınla aynı anda yarış, sıralamada zirveye çık! En hızlı kim?</div>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">🎯</div>
        <div class="feature-title">Konu Takibi</div>
        <div class="feature-desc">Hangi konuları bitirdiğini gör, ilerleme çubukları seni motive ediyor.</div>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">🏆</div>
        <div class="feature-title">Rozetler & Ödüller</div>
        <div class="feature-desc">Her başarın için özel rozet kazan, puan topla ve arkadaşlarına göster!</div>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">📱</div>
        <div class="feature-title">Her Yerden Çalış</div>
        <div class="feature-desc">Tablet, telefon, bilgisayar — dilediğin cihazdan, dilediğin yerde çalış.</div>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">👨‍👩‍👧</div>
        <div class="feature-title">Aile Takibi</div>
        <div class="feature-desc">Annene babana gelişimini göster. Onlar da seninle gurur duysun!</div>
      </div>
    </div>
  </section>

  <!-- SUBJECTS -->
  <section class="subjects" id="legends-league">
    <div style="text-align:center; margin-bottom: 20px;">
      <div class="section-tag">📚 DERSLER</div>
      <h2 class="section-title">Hangi Derste Zayıfsın?</h2>
      <p class="section-subtitle">Tüm ortaokul derslerine özel hazırlanmış binlerce soru seni bekliyor!</p>
    </div>
    <div class="subjects-grid">
      <div class="subject-card"><div class="subject-emoji">🧬</div><div class="subject-name">Fen Bilimleri</div></div>
      <div class="subject-card"><div class="subject-emoji">📐</div><div class="subject-name">Matematik</div></div>
      <div class="subject-card"><div class="subject-emoji">🌍</div><div class="subject-name">Sosyal Bilgiler</div></div>
      <div class="subject-card"><div class="subject-emoji">📖</div><div class="subject-name">Türkçe</div></div>
      <div class="subject-card"><div class="subject-emoji" style="font-size:1.8rem; font-weight:800; color:var(--purple-mid);">GB</div><div class="subject-name">İngilizce</div></div>
      <div class="subject-card"><div class="subject-emoji">🕌</div><div class="subject-name">Din Kültürü</div></div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section class="testimonials" id="mission-board">
    <div style="text-align:center; margin-bottom: 40px;">
      <h2 class="section-title">Onlar Anlatsın!</h2>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial-card">
        <div class="stars">★★★★★</div>
        <div class="testimonial-text">"LGS'ye hazırlanırken en çok bu uygulamayı kullandım. Matematik notum 55'ten 90'a çıktı! Gerçekten işe yarıyor."</div>
        <div class="testimonial-author">
          <div class="author-avatar" style="background: linear-gradient(135deg,#7c3aed,#9b6dff);">M</div>
          <div>
            <div class="author-name">Mert Yılmaz</div>
            <div class="author-role">8. Sınıf Öğrencisi</div>
          </div>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="stars">★★★★★</div>
        <div class="testimonial-text">"Öğrencilerimin ödevlerini takip etmek çok kolaylaştı. Hangi konularda eksik olduklarını anında görüyorum."</div>
        <div class="testimonial-author">
          <div class="author-avatar" style="background: linear-gradient(135deg,#f5a623,#ff6b35);">A</div>
          <div>
            <div class="author-name">Ayşe Demir</div>
            <div class="author-role">Matematik Öğretmeni</div>
          </div>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="stars">★★★★★</div>
        <div class="testimonial-text">"Canlı yarışmalar süper! Arkadaşlarımla yarışmak çok eğlenceli, ders çalışmak artık sıkıcı gelmiyor 😍"</div>
        <div class="testimonial-author">
          <div class="author-avatar" style="background: linear-gradient(135deg,#3acaaa,#1da18a);">Z</div>
          <div>
            <div class="author-name">Zeynep Kaya</div>
            <div class="author-role">7. Sınıf Öğrencisi</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="cta-card">
      <div class="cta-icon">🎁</div>
      <div class="cta-text">
        <h2>14 Gün Ücretsiz Dene!</h2>
        <p>Kredi kartı yok, taahhüt yok. Sadece öğren ve eğlen!</p>
      </div>
      <div class="cta-btns">
        <button class="btn-cta-primary">🚀 Hemen Başla</button>
        <button class="btn-cta-secondary">Planları İncele</button>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    © 2026 <strong>Quizion</strong>. Tüm hakları saklıdır. Ortaokul öğrencileri için ❤️ ile yapıldı.
  </footer>

</div><!-- /main-wrapper -->

<!-- ============================================================
     JAVASCRIPT
     ============================================================ -->
<script>
/* ---- Role-based sidebar content ---- */
const MENUS = {
  student: {
    name: "Ahmet Yılmaz",
    initial: "A",
    roleText: "8. Sınıf Öğrencisi",
    badge: "Öğrenci",
    badgeClass: "",
    sections: [
      {
        label: "Öğrenci Paneli",
        items: [
          { icon: "✍️", text: "Sınava Gir", badge: null, active: true, href: "#" },
          { icon: "📜", text: "Başarı Kronolojisi", badge: null, active: false, href: "#" },
          { icon: "🏅", text: "Rozetlerim", badge: "2", active: false, href: "#" },
        ]
      }
    ]
  },
  teacher: {
    name: "Fatma Kaya",
    initial: "F",
    roleText: "Matematik Öğretmeni",
    badge: "Öğretmen",
    badgeClass: "teacher",
    sections: [
      {
        label: "Hoca Akademisi",
        items: [
          { icon: "🧠", text: "Soru Üretim Merkezi", badge: null, active: true, href: "#" },
          { icon: "📋", text: "Sınav Mimarı", badge: "1", active: false, href: "#" },
          { icon: "📊", text: "Analiz Odası", badge: null, active: false, href: "#" },
        ]
      }
    ]
  }
};

let currentRole = 'student';

function buildSidebarNav(role) {
  const data = MENUS[role];
  // Update profile
  document.getElementById('profileInitial').textContent = data.initial;
  document.getElementById('profileName').textContent = data.name;
  document.getElementById('profileRoleText').textContent = data.roleText;
  const badge = document.getElementById('profileBadge');
  badge.textContent = data.badge;
  badge.className = 'role-badge' + (data.badgeClass ? ' ' + data.badgeClass : '');

  // Build nav HTML
  const nav = document.getElementById('sidebarNav');
  let html = '';
  data.sections.forEach(section => {
    html += `<div class="sidebar-section-label">${section.label}</div>`;
    section.items.forEach(item => {
      html += `
        <a class="sidebar-item${item.active ? ' active' : ''}" href="${item.href}" onclick="closeSidebar()">
          <div class="sidebar-item-icon">${item.icon}</div>
          <div class="sidebar-item-text">${item.text}</div>
          ${item.badge ? `<div class="sidebar-item-badge">${item.badge}</div>` : ''}
        </a>`;
    });
    html += `<div class="sidebar-divider"></div>`;
  });
  nav.innerHTML = html;
}

function setRole(role) {
  currentRole = role;
  document.getElementById('roleStudent').classList.toggle('active-role', role === 'student');
  document.getElementById('roleTeacher').classList.toggle('active-role', role === 'teacher');
  buildSidebarNav(role);
}

/* ---- Sidebar open/close ---- */
function openSidebar() {
  buildSidebarNav(currentRole); // refresh in case role changed
  document.getElementById('sidebar').classList.add('open');
  document.getElementById('sidebarOverlay').classList.add('open');
  document.getElementById('mainWrapper').classList.add('blurred');
  document.body.style.overflow = 'hidden';
}

function closeSidebar() {
  document.getElementById('sidebar').classList.remove('open');
  document.getElementById('sidebarOverlay').classList.remove('open');
  document.getElementById('mainWrapper').classList.remove('blurred');
  document.body.style.overflow = '';
}

/* Close sidebar on Escape */
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeSidebar();
});

/* ---- Init ---- */
buildSidebarNav('student');
</script>
</body>
</html>
