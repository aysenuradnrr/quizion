<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Quizion – Öğrenmek Artık Çok Daha Eğlenceli!</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@400;600;700;800&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
:root{
  --pu:#3d1a8e;--pm:#6c35de;--pl:#9b6dff;--pp:#ede7ff;
  --or:#f5a623;--gr:#3acaaa;--re:#f04848;--bl:#3b82f6;
  --td:#1e0e4b;--tm:#5a4a7a;--tl:#8878aa;
  --cb:#fff;--bg:#f4f0ff;--bs:#f8f4ff;--bd:#ede7ff;
  --nh:64px;
  --tr:.3s cubic-bezier(.4,0,.2,1);
  --gb:rgba(255,255,255,.12);--gbd:rgba(255,255,255,.22);
  --s1:0 2px 12px rgba(61,26,142,.07);
  --s2:0 8px 28px rgba(61,26,142,.13);
  --s3:0 20px 60px rgba(61,26,142,.22);
}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--td);overflow-x:hidden}
.rv{opacity:0;transform:translateY(26px);transition:opacity .6s ease,transform .6s ease}
.rv.in{opacity:1;transform:none}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}.d4{transition-delay:.32s}

/* NAV */
.nav{position:fixed;top:0;left:0;right:0;height:var(--nh);background:rgba(40,8,100,.96);backdrop-filter:blur(22px);border-bottom:1px solid var(--gbd);display:flex;align-items:center;padding:0 28px;gap:12px;z-index:1000;box-shadow:0 4px 28px rgba(20,0,60,.45)}
.nav-logo{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.6rem;color:#fff;letter-spacing:-.5px;flex-shrink:0;text-decoration:none}
.nav-logo span{color:var(--or)}
.nav-links{display:flex;align-items:center;gap:2px;position:absolute;left:50%;transform:translateX(-50%);list-style:none;white-space:nowrap}
.nav-links li a{color:rgba(255,255,255,.78);text-decoration:none;font-size:.88rem;font-weight:700;padding:7px 15px;border-radius:10px;transition:var(--tr);position:relative;display:flex;align-items:center}
.nav-links li a::after{content:'';position:absolute;bottom:3px;left:50%;transform:translateX(-50%) scaleX(0);width:55%;height:2px;background:var(--or);border-radius:2px;transition:transform .22s ease}
.nav-links li a:hover{color:var(--or);background:rgba(245,166,35,.08)}
.nav-links li a:hover::after,.nav-links li a.ac::after{transform:translateX(-50%) scaleX(1)}
.nav-links li a.ac{color:var(--or);font-weight:800}
.nav-right{display:flex;align-items:center;gap:10px;margin-left:auto}
.btn-in{background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);color:#fff;font-family:'Nunito',sans-serif;font-weight:700;font-size:.84rem;padding:8px 18px;border-radius:9px;cursor:pointer;transition:var(--tr)}
.btn-in:hover{background:rgba(255,255,255,.24)}
.btn-up{background:linear-gradient(135deg,var(--or),#ff6b35);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.84rem;padding:8px 18px;border-radius:9px;cursor:pointer;transition:var(--tr);box-shadow:0 4px 14px rgba(245,166,35,.42)}
.btn-up:hover{transform:translateY(-1px);box-shadow:0 6px 18px rgba(245,166,35,.55)}

/* MODAL */
.modal-bg{position:fixed;inset:0;background:rgba(6,0,22,.75);backdrop-filter:blur(12px);z-index:2000;display:flex;align-items:center;justify-content:center;opacity:0;pointer-events:none;transition:opacity .3s}
.modal-bg.open{opacity:1;pointer-events:all}
.modal{background:#fff;border-radius:24px;padding:36px;width:100%;max-width:460px;margin:16px;box-shadow:var(--s3);transform:scale(.93) translateY(16px);transition:transform .32s cubic-bezier(.4,0,.2,1);position:relative;max-height:92vh;overflow-y:auto}
.modal-bg.open .modal{transform:scale(1) translateY(0)}
.modal-x{position:absolute;top:14px;right:14px;background:var(--bs);border:none;color:var(--tm);width:30px;height:30px;border-radius:8px;font-size:15px;cursor:pointer;display:flex;align-items:center;justify-content:center}
.modal-x:hover{background:var(--pp);color:var(--pm)}
.modal-logo{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.5rem;color:var(--pm);text-align:center;margin-bottom:2px}
.modal-logo span{color:var(--or)}
.modal-tabs{display:flex;background:var(--bs);border-radius:11px;padding:3px;margin-bottom:16px}
.m-tab{flex:1;background:none;border:none;font-family:'Nunito',sans-serif;font-weight:700;font-size:.88rem;color:var(--tm);padding:8px;border-radius:9px;cursor:pointer;transition:var(--tr)}
.m-tab.ac{background:#fff;color:var(--pm);box-shadow:0 2px 8px rgba(61,26,142,.1)}
.fp{display:none}.fp.ac{display:block}
.fg{margin-bottom:12px}
.fl{display:block;font-size:.79rem;font-weight:700;color:var(--tm);margin-bottom:5px}
.fi{width:100%;padding:10px 13px;border:1.5px solid var(--bd);border-radius:10px;font-family:'Nunito',sans-serif;font-size:.88rem;color:var(--td);background:var(--bs);outline:none;transition:var(--tr)}
.fi:focus{border-color:var(--pl);background:#fff;box-shadow:0 0 0 3px rgba(155,109,255,.12)}
.fi::placeholder{color:var(--tl)}
.frow{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.btn-submit{width:100%;background:linear-gradient(135deg,var(--pm),var(--pu));border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.92rem;padding:12px;border-radius:11px;cursor:pointer;transition:var(--tr);box-shadow:0 4px 14px rgba(108,53,222,.3);margin-top:4px}
.btn-submit:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(108,53,222,.4)}
.fdiv{text-align:center;color:var(--tl);font-size:.76rem;font-weight:600;margin:12px 0;position:relative}
.fdiv::before,.fdiv::after{content:'';position:absolute;top:50%;width:40%;height:1px;background:var(--bd)}
.fdiv::before{left:0}.fdiv::after{right:0}
.btn-google{width:100%;padding:10px;background:#fff;border:1.5px solid var(--bd);border-radius:11px;cursor:pointer;font-family:'Nunito',sans-serif;font-weight:700;font-size:.86rem;color:var(--td);display:flex;align-items:center;justify-content:center;gap:8px;transition:var(--tr)}
.btn-google:hover{background:var(--bs);border-color:var(--pl)}
.alert-err{background:#fff0f0;border:1.5px solid #ffcece;border-radius:10px;padding:10px 14px;font-size:.83rem;font-weight:700;color:var(--re);margin-bottom:12px}
.reg-role-sel{display:flex;gap:10px;margin-bottom:14px}
.reg-role-card{flex:1;padding:12px 8px;background:var(--bs);border:2px solid var(--bd);border-radius:14px;text-align:center;cursor:pointer;transition:var(--tr)}
.reg-role-card:hover{border-color:var(--pl);background:#f0eaff}
.reg-role-card.sel{border-color:var(--pm);background:linear-gradient(135deg,rgba(108,53,222,.09),rgba(155,109,255,.04))}
.rrc-icon{font-size:1.6rem;margin-bottom:5px}
.rrc-title{font-weight:800;font-size:.85rem;color:var(--pm)}
.rrc-sub{font-size:.68rem;color:var(--tm);margin-top:2px;font-weight:600}

/* TOAST */
.toast-wrap{position:fixed;bottom:22px;right:22px;z-index:3000;display:flex;flex-direction:column;gap:8px;pointer-events:none}
.toast{background:#fff;border-radius:13px;padding:12px 16px;display:flex;align-items:center;gap:9px;box-shadow:var(--s3);border-left:4px solid var(--pm);font-weight:700;font-size:.84rem;color:var(--td);animation:tin .35s ease forwards;max-width:300px}
.toast.ok{border-color:var(--gr)}.toast.err{border-color:var(--re)}.toast.warn{border-color:var(--or)}
@keyframes tin{from{opacity:0;transform:translateX(18px)}to{opacity:1;transform:translateX(0)}}
@keyframes tout{to{opacity:0;transform:translateX(18px)}}
.toast.out{animation:tout .28s ease forwards}

/* BTT */
.btt{position:fixed;bottom:22px;right:22px;width:44px;height:44px;border-radius:13px;background:linear-gradient(135deg,var(--pm),var(--pu));border:none;color:#fff;font-size:1.1rem;cursor:pointer;z-index:900;box-shadow:0 4px 14px rgba(61,26,142,.3);display:flex;align-items:center;justify-content:center;transition:var(--tr);opacity:0;transform:translateY(8px) scale(.9);pointer-events:none}
.btt.on{opacity:1;transform:translateY(0) scale(1);pointer-events:all}

.mw{padding-top:var(--nh)}

/* HERO */
.hero{background:linear-gradient(135deg,#2c0c70 0%,#5c22c0 55%,#8b5cf6 100%);min-height:580px;display:flex;align-items:center;padding:60px 8% 80px;position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;top:-90px;right:-90px;width:480px;height:480px;border-radius:50%;background:radial-gradient(circle,rgba(255,140,40,.15) 0%,transparent 65%)}
.hero::after{content:'';position:absolute;bottom:-70px;left:18%;width:320px;height:320px;border-radius:50%;background:radial-gradient(circle,rgba(140,100,255,.2) 0%,transparent 65%)}
.h-ptcl{position:absolute;inset:0;pointer-events:none;overflow:hidden}
.ptcl{position:absolute;border-radius:50%;background:rgba(255,255,255,.07);animation:pf linear infinite}
@keyframes pf{0%{transform:translateY(100%) rotate(0);opacity:0}10%{opacity:1}90%{opacity:1}100%{transform:translateY(-200px) rotate(360deg);opacity:0}}
.h-free{display:inline-flex;align-items:center;gap:7px;background:rgba(58,202,170,.18);border:1.5px solid rgba(58,202,170,.38);color:#d8fff7;font-size:.81rem;font-weight:800;padding:7px 16px;border-radius:30px;margin-bottom:16px;backdrop-filter:blur(8px);animation:bp .6s .2s both}
@keyframes bp{from{opacity:0;transform:scale(.82) translateY(8px)}to{opacity:1;transform:scale(1) translateY(0)}}
.h-badge{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);color:#fff;font-size:.8rem;font-weight:700;padding:7px 15px;border-radius:30px;margin-bottom:12px;backdrop-filter:blur(8px);animation:bp .6s .34s both}
.h-left{flex:1;max-width:540px;position:relative;z-index:2}
.h-title{font-family:'Baloo 2',cursive;font-weight:800;font-size:clamp(2.1rem,3.8vw,3.1rem);color:#fff;line-height:1.2;margin-bottom:18px;animation:hi .8s .15s both}
@keyframes hi{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.h-title .hl{color:var(--or)}
.h-desc{color:rgba(255,255,255,.82);font-size:.97rem;line-height:1.7;margin-bottom:28px;max-width:450px;animation:hi .8s .3s both}
.h-cta{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:36px;animation:hi .8s .42s both}
.btn-pri{background:linear-gradient(135deg,var(--or),#ff6b35);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.97rem;padding:13px 26px;border-radius:13px;cursor:pointer;transition:var(--tr);box-shadow:0 6px 18px rgba(245,166,35,.42)}
.btn-pri:hover{transform:translateY(-2px);box-shadow:0 10px 26px rgba(245,166,35,.52)}
.btn-sec{background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.3);color:#fff;font-family:'Nunito',sans-serif;font-weight:700;font-size:.97rem;padding:13px 26px;border-radius:13px;cursor:pointer;transition:var(--tr)}
.btn-sec:hover{background:rgba(255,255,255,.18)}
.h-chips{display:flex;gap:10px;flex-wrap:wrap;animation:hi .8s .55s both}
.h-chip{display:flex;align-items:center;gap:5px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.16);color:rgba(255,255,255,.87);font-size:.78rem;font-weight:700;padding:6px 12px;border-radius:20px}
.h-right{flex:1;display:flex;justify-content:center;align-items:center;position:relative;z-index:2;animation:ci .9s .35s both}
@keyframes ci{from{opacity:0;transform:translateX(38px)}to{opacity:1;transform:translateX(0)}}
.pcard{background:rgba(255,255,255,.97);border-radius:20px;padding:22px;width:340px;box-shadow:0 22px 55px rgba(20,0,70,.35);position:relative}
.pc-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.pc-title{font-family:'Baloo 2',cursive;font-weight:700;font-size:.97rem;color:var(--td)}
.pc-free{background:rgba(58,202,170,.12);color:#0f7a66;font-size:.72rem;font-weight:800;padding:3px 9px;border-radius:8px}
.pc-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-bottom:18px}
.ps{background:var(--bs);border-radius:11px;padding:9px 7px;text-align:center}
.ps-val{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.05rem;color:var(--td)}
.ps:nth-child(2) .ps-val{color:var(--pm)}.ps:nth-child(3) .ps-val{color:var(--gr)}
.ps-lbl{font-size:.65rem;font-weight:600;color:var(--tm);margin-top:2px}
.bars{display:flex;align-items:flex-end;gap:5px;height:64px}
.bar{flex:1;border-radius:5px 5px 0 0;background:var(--pp)}
.bar.hi{background:var(--or)}
.fl-badge{position:absolute;bottom:-16px;left:-16px;background:#fff;border-radius:13px;padding:9px 14px;display:flex;align-items:center;gap:9px;box-shadow:0 10px 28px rgba(20,0,60,.18);animation:fb 3s ease-in-out infinite}
@keyframes fb{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}
.fl-badge .bi{font-size:1.4rem}
.fl-badge .bm{font-weight:800;font-size:.84rem;color:var(--td)}
.fl-badge .bs2{font-size:.7rem;color:var(--tm);font-weight:600}
.sc{position:absolute;top:-20px;right:-16px;width:54px;height:54px;border-radius:50%;background:linear-gradient(135deg,var(--or),#ff6b35);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:.95rem;box-shadow:0 6px 16px rgba(245,166,35,.48);animation:pulse 2s ease-in-out infinite}
@keyframes pulse{0%,100%{box-shadow:0 6px 16px rgba(245,166,35,.48)}50%{box-shadow:0 8px 26px rgba(245,166,35,.7)}}

/* STATS BAND */
.sb2{background:linear-gradient(90deg,#4618b0 0%,#6d2fd4 100%);padding:30px 8%;display:flex;align-items:center;gap:36px;flex-wrap:wrap}
.sb2-l{flex:1;min-width:180px}
.sb2-l h3{font-family:'Baloo 2',cursive;font-weight:700;color:#fff;font-size:1.15rem}
.sb2-l p{color:rgba(255,255,255,.62);font-size:.83rem;margin-top:3px}
.sb2-nums{display:flex;gap:36px;flex-wrap:wrap}
.snum{text-align:center}
.sn-val{font-family:'Baloo 2',cursive;font-weight:800;font-size:2.1rem;color:var(--or);line-height:1}
.sn-lbl{font-size:.76rem;font-weight:600;color:rgba(255,255,255,.7);margin-top:3px}
.cu{display:inline-block}

/* SECTIONS */
.stag{display:inline-flex;align-items:center;gap:6px;background:var(--pp);color:var(--pm);font-size:.73rem;font-weight:800;letter-spacing:1px;text-transform:uppercase;padding:5px 14px;border-radius:20px;margin-bottom:16px}
.stitle{font-family:'Baloo 2',cursive;font-weight:800;font-size:clamp(1.7rem,2.8vw,2.5rem);color:var(--td);margin-bottom:10px}
.ssub{color:var(--tm);font-size:.97rem;margin-bottom:46px}

/* HOW IT WORKS */
.hiw{background:#fff;padding:80px 8%}
.steps{display:flex;gap:0;flex-wrap:wrap;margin-top:48px;position:relative}
.steps::before{content:'';position:absolute;top:34px;left:calc(12.5% + 22px);right:calc(12.5% + 22px);height:2px;background:linear-gradient(90deg,var(--pp),var(--pl),var(--or))}
.step{flex:1;min-width:150px;text-align:center;padding:0 14px;position:relative;z-index:1}
.step-n{width:54px;height:54px;border-radius:50%;background:linear-gradient(135deg,var(--pm),var(--pu));color:#fff;font-family:'Baloo 2',cursive;font-weight:800;font-size:1.15rem;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;box-shadow:0 4px 14px rgba(108,53,222,.28);transition:var(--tr)}
.step:hover .step-n{transform:scale(1.1)}
.step-em{font-size:1.3rem;margin-bottom:7px}
.step-t{font-family:'Baloo 2',cursive;font-weight:700;font-size:.92rem;color:var(--td);margin-bottom:5px}
.step-d{font-size:.78rem;color:var(--tm);line-height:1.5}

/* FEATURES */
.feat{background:var(--bs);padding:80px 8%}
.feat-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px}
.fc{background:#fff;border-radius:20px;padding:28px 24px;border:1px solid var(--bd);transition:var(--tr);box-shadow:var(--s1);cursor:pointer}
.fc:hover{transform:translateY(-5px);box-shadow:var(--s2);border-color:var(--pl)}
.fc-icon{width:50px;height:50px;border-radius:13px;background:var(--pp);display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:16px;transition:var(--tr)}
.fc:hover .fc-icon{transform:scale(1.1) rotate(-4deg)}
.fc-title{font-family:'Baloo 2',cursive;font-weight:700;font-size:.97rem;color:var(--pm);margin-bottom:7px}
.fc-desc{color:var(--tm);font-size:.85rem;line-height:1.6;margin-bottom:12px}
.fc-lock{display:inline-flex;align-items:center;gap:5px;background:linear-gradient(135deg,rgba(108,53,222,.1),rgba(155,109,255,.06));border:1px solid rgba(108,53,222,.18);border-radius:8px;padding:5px 12px;font-size:.76rem;font-weight:800;color:var(--pm);cursor:pointer}
.fc-free{display:inline-flex;align-items:center;gap:5px;background:rgba(58,202,170,.1);border:1px solid rgba(58,202,170,.25);border-radius:8px;padding:5px 12px;font-size:.76rem;font-weight:800;color:#0f7a66}

/* SUBJECTS */
.subj-sec{background:#fff;padding:80px 8%}
.subj-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(155px,1fr));gap:14px}
.sc2{background:var(--bs);border-radius:17px;padding:28px 18px;text-align:center;border:1.5px solid var(--bd);transition:var(--tr);cursor:pointer}
.sc2:hover{border-color:var(--pl);transform:translateY(-4px);box-shadow:var(--s2)}
.sc2-em{font-size:2.2rem;margin-bottom:10px;display:block;transition:var(--tr)}
.sc2:hover .sc2-em{transform:scale(1.14) rotate(-5deg)}
.sc2-name{font-weight:800;font-size:.9rem;color:var(--pm)}
.sc2-cnt{font-size:.72rem;color:var(--tl);font-weight:600;margin-top:3px}
.sc2-preview{margin-top:10px;font-size:.75rem;font-weight:700;color:var(--pm);background:var(--pp);padding:4px 10px;border-radius:8px;display:inline-block;transition:var(--tr)}
.sc2:hover .sc2-preview{background:var(--pm);color:#fff}

/* TESTIMONIALS */
.testi{background:var(--bs);padding:80px 8%}
.tgrid{display:grid;grid-template-columns:repeat(auto-fit,minmax(270px,1fr));gap:18px}
.tc{background:#fff;border-radius:18px;padding:26px;border:1px solid var(--bd);box-shadow:var(--s1);transition:var(--tr)}
.tc:hover{transform:translateY(-3px);box-shadow:var(--s2)}
.tc-new{border-color:rgba(108,53,222,.2);background:linear-gradient(135deg,rgba(108,53,222,.02),#fff)}
.stars{color:var(--or);font-size:1.05rem;letter-spacing:2px;margin-bottom:12px}
.tc-txt{color:var(--tm);font-size:.88rem;line-height:1.7;margin-bottom:16px;font-style:italic}
.tc-au{display:flex;align-items:center;gap:11px}
.tc-av{width:40px;height:40px;border-radius:11px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:.97rem}
.tc-name{font-weight:800;font-size:.88rem;color:var(--td)}
.tc-role{font-size:.73rem;color:var(--tm);font-weight:600}
.tc-empty{border:2px dashed var(--bd);background:var(--bs);display:flex;align-items:center;justify-content:center;flex-direction:column;gap:8px;padding:32px;text-align:center;border-radius:18px}

/* FAQ */
.faq{background:#fff;padding:80px 8%}
.faq-list{max-width:700px;margin:0 auto;display:flex;flex-direction:column;gap:10px}
.faq-item{background:var(--bs);border:1px solid var(--bd);border-radius:13px;overflow:hidden}
.faq-item.open{border-color:var(--pl)}
.faq-q{padding:16px 18px;display:flex;justify-content:space-between;align-items:center;font-weight:700;font-size:.92rem;color:var(--td);cursor:pointer;gap:10px}
.faq-q:hover,.faq-item.open .faq-q{color:var(--pm)}
.faq-arr{font-size:.95rem;transition:transform .3s ease;flex-shrink:0}
.faq-item.open .faq-arr{transform:rotate(180deg)}
.faq-ans{max-height:0;overflow:hidden;transition:max-height .32s ease}
.faq-item.open .faq-ans{max-height:260px}
.faq-ai{padding:0 18px 16px;font-size:.86rem;color:var(--tm);line-height:1.7}

/* CTA */
.cta-sec{padding:56px 8%;background:#fff}
.cta-card{background:linear-gradient(135deg,#4018a8 0%,#6a2dd2 50%,#8b5cf6 100%);border-radius:22px;padding:46px;display:flex;align-items:center;justify-content:space-between;gap:28px;flex-wrap:wrap;position:relative;overflow:hidden}
.cta-ico{width:62px;height:62px;background:rgba(255,255,255,.14);border-radius:17px;display:flex;align-items:center;justify-content:center;font-size:1.9rem;flex-shrink:0}
.cta-txt h2{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.75rem;color:#fff;margin-bottom:6px}
.cta-txt p{color:rgba(255,255,255,.76);font-size:.93rem}
.cta-btns{display:flex;gap:11px;flex-shrink:0;flex-wrap:wrap}
.btn-ca{background:var(--or);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.97rem;padding:13px 26px;border-radius:13px;cursor:pointer;transition:var(--tr);box-shadow:0 6px 18px rgba(245,166,35,.38);display:flex;align-items:center;gap:7px}
.btn-ca:hover{transform:translateY(-2px)}
.btn-cb{background:rgba(255,255,255,.14);border:1.5px solid rgba(255,255,255,.28);color:#fff;font-family:'Nunito',sans-serif;font-weight:700;font-size:.97rem;padding:13px 26px;border-radius:13px;cursor:pointer;transition:var(--tr)}
.btn-cb:hover{background:rgba(255,255,255,.22)}

/* FOOTER */
.footer{background:#160840;padding:56px 8% 28px}
.fg2{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:36px;margin-bottom:36px}
.fl-logo{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.5rem;color:#fff;margin-bottom:10px}
.fl-logo span{color:var(--or)}
.fl-desc{color:rgba(255,255,255,.48);font-size:.85rem;line-height:1.7;max-width:250px}
.fl-free{display:inline-flex;align-items:center;gap:5px;background:rgba(58,202,170,.14);border:1px solid rgba(58,202,170,.26);color:var(--gr);font-size:.75rem;font-weight:800;padding:4px 12px;border-radius:20px;margin-top:12px}
.f-soc{display:flex;gap:9px;margin-top:16px}
.soc-btn{width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);color:rgba(255,255,255,.62);display:flex;align-items:center;justify-content:center;font-size:.95rem;cursor:pointer;transition:var(--tr);text-decoration:none}
.soc-btn:hover{background:rgba(255,255,255,.16);color:#fff;transform:translateY(-2px)}
.fc2 h4{font-weight:800;font-size:.82rem;color:rgba(255,255,255,.88);margin-bottom:13px;letter-spacing:.4px;text-transform:uppercase}
.fc2 ul{list-style:none}
.fc2 ul li{margin-bottom:7px}
.fc2 ul li a{color:rgba(255,255,255,.43);text-decoration:none;font-size:.83rem;font-weight:600;cursor:pointer;transition:var(--tr)}
.fc2 ul li a:hover{color:var(--or)}
.f-bot{border-top:1px solid rgba(255,255,255,.08);padding-top:22px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px}
.f-bot-txt{color:rgba(255,255,255,.36);font-size:.8rem}
.f-bot-txt strong{color:var(--or)}
.f-bdgs{display:flex;gap:7px;flex-wrap:wrap}
.f-bdg{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.09);color:rgba(255,255,255,.42);font-size:.7rem;font-weight:700;padding:3px 9px;border-radius:7px}

/* FOOTER FEEDBACK */
.footer-feedback{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:16px;padding:24px;margin-bottom:36px}
.footer-feedback h3{font-family:'Baloo 2',cursive;font-weight:700;font-size:1.05rem;color:#fff;margin-bottom:4px}
.footer-feedback p{font-size:.8rem;color:rgba(255,255,255,.48);margin-bottom:14px}
.ff-role-sel{display:flex;gap:8px;margin-bottom:12px;flex-wrap:wrap}
.ff-role-btn{padding:6px 14px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);border-radius:9px;color:rgba(255,255,255,.6);font-family:'Nunito',sans-serif;font-size:.78rem;font-weight:700;cursor:pointer;transition:var(--tr)}
.ff-role-btn:hover{background:rgba(255,255,255,.1);color:#fff}
.ff-role-btn.sel{background:rgba(245,166,35,.18);border-color:rgba(245,166,35,.4);color:#ffd080}
.ff-star-row{display:flex;align-items:center;gap:4px;margin-bottom:12px}
.ff-star-lbl{font-size:.78rem;color:rgba(255,255,255,.5);font-weight:700;margin-right:6px}
.ff-star{font-size:1.4rem;cursor:pointer;filter:grayscale(1);opacity:.4;transition:var(--tr);background:none;border:none;color:#f5a623;padding:0}
.ff-star.active{filter:none;opacity:1}
.ff-grid{display:grid;grid-template-columns:1fr 1fr auto;gap:10px;align-items:center}
.ff-input{width:100%;padding:9px 12px;border:1.5px solid rgba(255,255,255,.12);border-radius:9px;font-family:'Nunito',sans-serif;font-size:.84rem;color:#fff;background:rgba(255,255,255,.07);outline:none;transition:var(--tr)}
.ff-input:focus{border-color:var(--pl);background:rgba(255,255,255,.12)}
.ff-input::placeholder{color:rgba(255,255,255,.3)}
.ff-btn{background:linear-gradient(135deg,var(--or),#ff6b35);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.84rem;padding:9px 20px;border-radius:9px;cursor:pointer;transition:var(--tr);white-space:nowrap}
.ff-btn:hover{transform:translateY(-1px);box-shadow:0 4px 12px rgba(245,166,35,.4)}
.ff-success{background:rgba(58,202,170,.12);border:1px solid rgba(58,202,170,.28);border-radius:10px;padding:14px 18px;color:#5effd8;font-size:.88rem;font-weight:700;margin-top:12px;display:none}
.ff-success.show{display:block}
.ff-err{color:#ff8080;font-size:.8rem;font-weight:700;margin-top:8px}

@media(max-width:900px){.hero{flex-direction:column;padding:48px 6%;gap:36px}.h-right{width:100%}.pcard{width:100%;max-width:360px}.nav-links{display:none}.steps::before{display:none}.ff-grid{grid-template-columns:1fr}.fg2{grid-template-columns:1fr 1fr}}
@media(max-width:640px){.sb2-nums{gap:18px}.cta-card{padding:28px 20px}.fg2{grid-template-columns:1fr;gap:24px}.nav-right .btn-in{display:none}.frow{grid-template-columns:1fr}}
</style>
</head>
<body>

<div class="toast-wrap" id="tw"></div>
<button class="btt" id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})">↑</button>

@if($errors->any())
<script>document.addEventListener('DOMContentLoaded',function(){openModal('{{ session("open_tab","login") }}');});</script>
@endif
@if(session('review_success'))
<script>document.addEventListener('DOMContentLoaded',function(){toast('🎉 Yorumunuz başarıyla gönderildi! Yorumlar bölümünde görünüyor.','ok');});</script>
@endif

<!-- AUTH MODAL -->
<div class="modal-bg" id="authModal" onclick="bgClick(event)">
  <div class="modal">
    <button class="modal-x" type="button" onclick="closeModal()">✕</button>
    <div class="modal-logo">Quiz<span>ion</span></div>
    <p style="text-align:center;font-size:.81rem;color:var(--tl);margin-bottom:14px;font-weight:600">Tamamen ücretsiz • Sınırsız içerik</p>
    <div class="modal-tabs">
      <button type="button" class="m-tab ac" id="tLogin" onclick="switchTab('login')">Giriş Yap</button>
      <button type="button" class="m-tab" id="tReg" onclick="switchTab('register')">Kayıt Ol</button>
    </div>
    <!-- GİRİŞ -->
    <div class="fp ac" id="pLogin">
      @if($errors->has('email') && session('open_tab','login')==='login')
        <div class="alert-err">⚠️ {{ $errors->first('email') }}</div>
      @endif
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="fg"><label class="fl">E-posta</label><input class="fi" type="email" name="email" placeholder="ornek@email.com" value="{{ old('email') }}" required/></div>
        <div class="fg"><label class="fl">Şifre</label><input class="fi" type="password" name="password" placeholder="••••••••" required/></div>
        <button type="submit" class="btn-submit">Giriş Yap 🚀</button>
      </form>
      <div class="fdiv">veya</div>
      <button type="button" class="btn-google" onclick="toast('🌐 Google girişi yakında!','warn')"><span>🌐</span> Google ile Devam Et</button>
      <p style="text-align:center;font-size:.77rem;color:var(--tl);margin-top:12px">Hesabın yok mu? <a href="#" onclick="switchTab('register');return false" style="color:var(--pm);font-weight:700">Kayıt Ol</a></p>
    </div>
    <!-- KAYIT -->
    <div class="fp" id="pReg">
      @if($errors->any() && session('open_tab')==='register')
        <div class="alert-err">⚠️ {{ $errors->first() }}</div>
      @endif
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="role" id="roleInput" value="ogrenci"/>
        <div class="fg">
          <label class="fl">Rolünüzü Seçin</label>
          <div class="reg-role-sel">
            <div class="reg-role-card sel" id="rrc-student" onclick="selectRegRole('ogrenci')"><div class="rrc-icon">🎓</div><div class="rrc-title">Öğrenci</div><div class="rrc-sub">Quiz çöz, yarış, kazan!</div></div>
            <div class="reg-role-card" id="rrc-teacher" onclick="selectRegRole('ogretmen')"><div class="rrc-icon">👩‍🏫</div><div class="rrc-title">Öğretmen</div><div class="rrc-sub">Sınıf yönet, analiz et!</div></div>
          </div>
        </div>
        <div class="frow">
          <div class="fg"><label class="fl">Ad</label><input class="fi" type="text" name="name" placeholder="Adın" value="{{ old('name') }}" required/></div>
          <div class="fg"><label class="fl">Soyad</label><input class="fi" type="text" name="surname" placeholder="Soyadın" value="{{ old('surname') }}" required/></div>
        </div>
        <div class="fg"><label class="fl">E-posta</label><input class="fi" type="email" name="email" placeholder="ornek@email.com" value="{{ old('email') }}" required/></div>
        <div class="fg"><label class="fl">Şifre</label><input class="fi" type="password" name="password" placeholder="En az 8 karakter" required/></div>
        <div class="fg" id="gradeWrap">
          <label class="fl">Sınıf</label>
          <select class="fi" name="grade" id="rgGrade">
            <option value="">Sınıfını seç</option>
            <option value="5. Sınıf">5. Sınıf</option>
            <option value="6. Sınıf">6. Sınıf</option>
            <option value="7. Sınıf">7. Sınıf</option>
            <option value="8. Sınıf">8. Sınıf</option>
          </select>
        </div>
        <div class="fg" id="branchWrap" style="display:none">
          <label class="fl">Branş</label>
          <select class="fi" name="branch" id="rgBranch">
            <option value="">Branşınızı seçin</option>
            <option value="Matematik">Matematik</option>
            <option value="Fen Bilimleri">Fen Bilimleri</option>
            <option value="Türkçe">Türkçe</option>
            <option value="Sosyal Bilgiler">Sosyal Bilgiler</option>
            <option value="İngilizce">İngilizce</option>
            <option value="Din Kültürü">Din Kültürü</option>
          </select>
        </div>
        <button type="submit" class="btn-submit">Kaydol 🎉</button>
      </form>
      <div class="fdiv">veya</div>
      <button type="button" class="btn-google" onclick="toast('🌐 Google girişi yakında!','warn')"><span>🌐</span> Google ile Kayıt Ol</button>
      <p style="text-align:center;font-size:.77rem;color:var(--tl);margin-top:12px">Zaten hesabın var mı? <a href="#" onclick="switchTab('login');return false" style="color:var(--pm);font-weight:700">Giriş Yap</a></p>
    </div>
  </div>
</div>

<!-- NAVBAR -->
<nav class="nav">
  <a class="nav-logo" href="/">Quiz<span>ion</span></a>
  <ul class="nav-links" id="navLinks">
    <li><a href="#hero" class="ac">Anasayfa</a></li>
    <li><a href="#features">Özellikler</a></li>
    <li><a href="#subjects">Dersler</a></li>
    <li><a href="#yorumlar">Yorumlar</a></li>
  </ul>
  <div class="nav-right">
    <button class="btn-in" type="button" onclick="openModal('login')">Giriş Yap</button>
    <button class="btn-up" type="button" onclick="openModal('register')">Kaydol 🚀</button>
  </div>
</nav>

<div class="mw">

<!-- HERO -->
<section class="hero" id="hero">
  <div class="h-ptcl" id="ptcl"></div>
  <div class="h-left">
    <div class="h-free">🎉 Tamamen Ücretsiz — Sonsuza Kadar!</div>
    <div class="h-badge">✨ Ortaokul Öğrencilerine Özel</div>
    <h1 class="h-title">Öğrenmek <span class="hl">Artık</span><br>Çok Daha <span class="hl">Eğlenceli!</span></h1>
    <p class="h-desc">Yapay zeka destekli analizler, eğlenceli sınavlar ve gerçek zamanlı yarışmalarla derslerinde süper kahraman ol! Tamamen ücretsiz. 🦸</p>
    <div class="h-cta">
      <button class="btn-pri" type="button" onclick="openModal('register')">Kaydol 🚀</button>
      <button class="btn-sec" type="button" onclick="document.getElementById('hiw').scrollIntoView({behavior:'smooth'})">▶ Nasıl Çalışır?</button>
    </div>
    <div class="h-chips">
      <div class="h-chip">🎓 10K+ Öğrenci</div>
      <div class="h-chip">📋 500+ Sınav</div>
      <div class="h-chip">✅ %100 Ücretsiz</div>
      <div class="h-chip">🏆 24/7 Destek</div>
    </div>
  </div>
  <div class="h-right">
    <div class="pcard">
      <div class="pc-head"><div class="pc-title">🏅 Haftalık Performans</div><div class="pc-free">🟢 Ücretsiz</div></div>
      <div class="pc-stats">
        <div class="ps"><div class="ps-val">12</div><div class="ps-lbl">Sınav</div></div>
        <div class="ps"><div class="ps-val">%88</div><div class="ps-lbl">Başarı</div></div>
        <div class="ps"><div class="ps-val">450</div><div class="ps-lbl">Soru</div></div>
        <div class="ps"><div class="ps-val">8s</div><div class="ps-lbl">Çalışma</div></div>
      </div>
      <div class="bars">
        <div class="bar" style="height:45%"></div><div class="bar" style="height:60%"></div>
        <div class="bar hi" style="height:85%"></div><div class="bar" style="height:55%"></div>
        <div class="bar" style="height:70%"></div><div class="bar hi" style="height:95%"></div>
        <div class="bar" style="height:50%"></div>
      </div>
      <div class="fl-badge"><div class="bi">🏆</div><div><div class="bm">Yeni Rozet!</div><div class="bs2">Matematik Dehası</div></div></div>
      <div class="sc">%96</div>
    </div>
  </div>
</section>

<!-- STATS BAND -->
<section class="sb2">
  <div class="sb2-l rv"><h3>Rakamlarla Quizion</h3><p>Türkiye'nin en sevilen ücretsiz ortaokul sınav platformu.</p></div>
  <div class="sb2-nums">
    <div class="snum rv d1"><div class="sn-val"><span class="cu" data-t="50">0</span>M</div><div class="sn-lbl">Çözülen Soru</div></div>
    <div class="snum rv d2"><div class="sn-val"><span class="cu" data-t="150">0</span>K</div><div class="sn-lbl">Öğretmen</div></div>
    <div class="snum rv d3"><div class="sn-val"><span class="cu" data-t="95">0</span>%</div><div class="sn-lbl">Memnuniyet</div></div>
    <div class="snum rv d4"><div class="sn-val"><span class="cu" data-t="10">0</span>K+</div><div class="sn-lbl">Aktif Öğrenci</div></div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="hiw" id="hiw">
  <div style="text-align:center">
    <div class="stag rv">🗺️ NASIL ÇALIŞIR?</div>
    <h2 class="stitle rv">4 Adımda Başla!</h2>
    <p class="ssub rv">Saniyeler içinde yerini al, öğrenmeye başla.</p>
  </div>
  <div class="steps">
    <div class="step rv d1"><div class="step-n">1</div><div class="step-em">📝</div><div class="step-t">Kaydol</div><div class="step-d">Ücretsiz hesabını oluştur, rolünü seç.</div></div>
    <div class="step rv d2"><div class="step-n">2</div><div class="step-em">🎯</div><div class="step-t">Dersini Seç</div><div class="step-d">Çalışmak istediğin konuyu belirle.</div></div>
    <div class="step rv d3"><div class="step-n">3</div><div class="step-em">⚡</div><div class="step-t">Çöz & Yarış</div><div class="step-d">Sorular çöz, canlı yarışmalara katıl.</div></div>
    <div class="step rv d4"><div class="step-n">4</div><div class="step-em">📊</div><div class="step-t">Gelişimini İzle</div><div class="step-d">Yapay zeka raporlarını incele.</div></div>
  </div>
</section>

<!-- FEATURES -->
<section class="feat" id="features">
  <div class="stag rv">⚡ ÖZELLİKLER</div>
  <h2 class="stitle rv">Öğrenmeyi Süper Güce Dönüştür!</h2>
  <p class="ssub rv">Quizion ile dersler eğlenceye, başarı alışkanlığa dönüşüyor.</p>
  <div class="feat-grid">
    <div class="fc rv d1"><div class="fc-icon">⚡</div><div class="fc-title">Canlı Yarışmalar</div><div class="fc-desc">Sınıf arkadaşlarınla gerçek zamanlı quiz yarışmasına gir. Her gün farklı konularda turnuvalar düzenleniyor.</div><span class="fc-lock" onclick="openModal('register')">🔓 Görmek için Kaydol →</span></div>
    <div class="fc rv d2"><div class="fc-icon">🎯</div><div class="fc-title">Konu Takibi</div><div class="fc-desc">Her dersin konularını ilerleme çubukları ile takip et. Tamamladığın konular işaretlenir.</div><span class="fc-lock" onclick="openModal('register')">🔓 Görmek için Kaydol →</span></div>
    <div class="fc rv d3"><div class="fc-icon">🏆</div><div class="fc-title">Rozetler & XP</div><div class="fc-desc">Her başarılı sınavda özel rozetler ile XP puan kazanırsın. Seviye atla, profilini özelleştir!</div><span class="fc-lock" onclick="openModal('register')">🔓 Rozetleri Keşfet →</span></div>
    <div class="fc rv d4"><div class="fc-icon">📱</div><div class="fc-title">Her Yerden Çalış</div><div class="fc-desc">Tablet, telefon veya bilgisayar — tüm cihazlardan erişebilirsin. Çalışmaların otomatik kaydedilir.</div><span class="fc-free">✅ Tamamen Ücretsiz</span></div>
  </div>
</section>

<!-- SUBJECTS -->
<section class="subj-sec" id="subjects">
  <div style="text-align:center;margin-bottom:20px">
    <div class="stag rv">📚 DERSLER</div>
    <h2 class="stitle rv">Hangi Derste Zayıfsın?</h2>
    <p class="ssub rv">Tüm ortaokul derslerine özel binlerce soru seni bekliyor!</p>
  </div>
  <div class="subj-grid">
    <div class="sc2 rv d1" onclick="openModal('register')"><span class="sc2-em">🧬</span><div class="sc2-name">Fen Bilimleri</div><div class="sc2-cnt">1.240 soru</div><div class="sc2-preview">Sınavlara Bak →</div></div>
    <div class="sc2 rv d2" onclick="openModal('register')"><span class="sc2-em">📐</span><div class="sc2-name">Matematik</div><div class="sc2-cnt">1.860 soru</div><div class="sc2-preview">Sınavlara Bak →</div></div>
    <div class="sc2 rv d3" onclick="openModal('register')"><span class="sc2-em">🌍</span><div class="sc2-name">Sosyal Bilgiler</div><div class="sc2-cnt">980 soru</div><div class="sc2-preview">Sınavlara Bak →</div></div>
    <div class="sc2 rv d4" onclick="openModal('register')"><span class="sc2-em">📖</span><div class="sc2-name">Türkçe</div><div class="sc2-cnt">1.120 soru</div><div class="sc2-preview">Sınavlara Bak →</div></div>
    <div class="sc2 rv d1" onclick="openModal('register')"><span class="sc2-em">🇬🇧</span><div class="sc2-name">İngilizce</div><div class="sc2-cnt">760 soru</div><div class="sc2-preview">Sınavlara Bak →</div></div>
    <div class="sc2 rv d2" onclick="openModal('register')"><span class="sc2-em">🕌</span><div class="sc2-name">Din Kültürü</div><div class="sc2-cnt">580 soru</div><div class="sc2-preview">Sınavlara Bak →</div></div>
  </div>
</section>

<!-- YORUMLAR — dinamik + sabit -->
<section class="testi" id="yorumlar">
  <div style="text-align:center;margin-bottom:36px">
    <div class="stag rv">💬 YORUMLAR</div>
    <h2 class="stitle rv">Kullanıcılarımız Ne Diyor?</h2>
    <p class="ssub rv" style="margin-bottom:0">Öğrenci ve öğretmenlerimizin gerçek deneyimleri.</p>
  </div>
  <div class="tgrid">
    {{-- Sabit 3 yorum --}}
    <div class="tc rv d1">
      <div class="stars">★★★★★</div>
      <div class="tc-txt">"LGS'ye hazırlanırken Matematik notum 55'ten 90'a çıktı! Gerçekten işe yarıyor."</div>
      <div class="tc-au"><div class="tc-av" style="background:linear-gradient(135deg,#7c3aed,#9b6dff)">M</div><div><div class="tc-name">Mert Yılmaz</div><div class="tc-role">8. Sınıf Öğrencisi</div></div></div>
    </div>
    <div class="tc rv d2">
      <div class="stars">★★★★★</div>
      <div class="tc-txt">"Öğrencilerimin hangi konularda eksik olduğunu anında görüyorum. Çok pratik!"</div>
      <div class="tc-au"><div class="tc-av" style="background:linear-gradient(135deg,#f5a623,#ff6b35)">A</div><div><div class="tc-name">Ayşe Demir</div><div class="tc-role">Matematik Öğretmeni</div></div></div>
    </div>
    <div class="tc rv d3">
      <div class="stars">★★★★★</div>
      <div class="tc-txt">"Canlı yarışmalar süper! Arkadaşlarımla yarışmak çok eğlenceli 😍"</div>
      <div class="tc-au"><div class="tc-av" style="background:linear-gradient(135deg,#3acaaa,#1da18a)">Z</div><div><div class="tc-name">Zeynep Kaya</div><div class="tc-role">7. Sınıf Öğrencisi</div></div></div>
    </div>

    {{-- Veritabanından gelen yorumlar --}}
    @forelse($reviews as $review)
    <div class="tc tc-new rv">
      <div class="stars">
        @for($i=1;$i<=5;$i++)
          {{ $i <= $review->star ? '★' : '☆' }}
        @endfor
      </div>
      <div class="tc-txt">"{{ $review->message }}"</div>
      <div class="tc-au">
        <div class="tc-av" style="background:linear-gradient(135deg,#6c35de,#9b6dff)">
          {{ strtoupper(substr($review->name,0,1)) }}
        </div>
        <div>
          <div class="tc-name">{{ $review->name }}</div>
          <div class="tc-role">{{ $review->role }}</div>
        </div>
      </div>
    </div>
    @empty
    <div class="tc-empty rv">
      <div style="font-size:2rem">✍️</div>
      <div style="font-weight:800;color:var(--pm);font-size:.9rem">İlk yorumu sen yap!</div>
      <div style="font-size:.78rem;color:var(--tl);margin-top:4px">Aşağıdaki formu doldur, yorumun burada görünsün.</div>
    </div>
    @endforelse
  </div>
</section>

<!-- FAQ -->
<section class="faq">
  <div style="text-align:center;margin-bottom:36px"><div class="stag rv">❓ SSS</div><h2 class="stitle rv">Sık Sorulan Sorular</h2></div>
  <div class="faq-list">
    <div class="faq-item rv"><div class="faq-q" onclick="toggleFaq(this)"><span>Quizion gerçekten tamamen ücretsiz mi?</span><span class="faq-arr">▼</span></div><div class="faq-ans"><div class="faq-ai">Evet! Tüm özellikler tamamen ücretsiz. Kredi kartı veya abonelik gerekmez.</div></div></div>
    <div class="faq-item rv d1"><div class="faq-q" onclick="toggleFaq(this)"><span>Öğrenci mi Öğretmen mi olarak kayıt olmalıyım?</span><span class="faq-arr">▼</span></div><div class="faq-ans"><div class="faq-ai">Kayıt formunda rolünüzü seçebilirsiniz. Her rol farklı panele yönlendirilir.</div></div></div>
    <div class="faq-item rv d2"><div class="faq-q" onclick="toggleFaq(this)"><span>Canlı yarışmalar ne zaman yapılıyor?</span><span class="faq-arr">▼</span></div><div class="faq-ans"><div class="faq-ai">Her gün belirli saatlerde otomatik yarışmalar başlamaktadır.</div></div></div>
    <div class="faq-item rv d3"><div class="faq-q" onclick="toggleFaq(this)"><span>Hangi sınıflar için uygundur?</span><span class="faq-arr">▼</span></div><div class="faq-ans"><div class="faq-ai">5. sınıftan 8. sınıfa kadar tüm ortaokul öğrencileri için uygundur.</div></div></div>
  </div>
</section>

<!-- CTA -->
<section class="cta-sec">
  <div class="cta-card rv">
    <div class="cta-ico">🎁</div>
    <div class="cta-txt"><h2>Ücretsiz Kaydol, Hemen Başla!</h2><p>Kredi kartı yok, taahhüt yok. Sınırsız içerik tamamen bedava!</p></div>
    <div class="cta-btns">
      <button type="button" class="btn-ca" onclick="openModal('register')">🚀 Kaydol</button>
      <button type="button" class="btn-cb" onclick="openModal('login')">Giriş Yap</button>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer">

  <!-- FOOTER YORUM FORMU -->
  <div class="footer-feedback rv">
    <h3>💬 Yorum & Öneri Gönderin</h3>
    <p>Platformu geliştirmemize yardımcı olun — yorumunuz hemen yukarıda görünecek!</p>

    @if(session('review_success'))
      <div class="ff-success show">🎉 Teşekkürler! Yorumunuz alındı ve "Kullanıcılar Ne Diyor?" bölümüne eklendi.</div>
    @else
      <form method="POST" action="{{ route('review.store') }}">
        @csrf

        {{-- Rol Seçimi --}}
        <div class="ff-role-sel">
          <button type="button" class="ff-role-btn sel" id="ffr-ogrenci"  onclick="setFfRole('Öğrenci')">🎓 Öğrenci</button>
          <button type="button" class="ff-role-btn"     id="ffr-ogretmen" onclick="setFfRole('Öğretmen')">👩‍🏫 Öğretmen</button>
          <button type="button" class="ff-role-btn"     id="ffr-veli"     onclick="setFfRole('Veli')">👨‍👩‍👧 Veli</button>
          <button type="button" class="ff-role-btn"     id="ffr-diger"    onclick="setFfRole('Diğer')">🙋 Diğer</button>
        </div>
        <input type="hidden" name="role" id="ffRoleInput" value="Öğrenci"/>

        {{-- Yıldız --}}
        <div class="ff-star-row">
          <span class="ff-star-lbl">Puan:</span>
          <button type="button" class="ff-star" data-v="1" onclick="setFfStar(1)">★</button>
          <button type="button" class="ff-star" data-v="2" onclick="setFfStar(2)">★</button>
          <button type="button" class="ff-star" data-v="3" onclick="setFfStar(3)">★</button>
          <button type="button" class="ff-star" data-v="4" onclick="setFfStar(4)">★</button>
          <button type="button" class="ff-star active" data-v="5" onclick="setFfStar(5)">★</button>
        </div>
        <input type="hidden" name="star" id="ffStarInput" value="5"/>

        {{-- Ad + Mesaj + Gönder --}}
        <div class="ff-grid">
          <input class="ff-input" type="text" name="name" placeholder="Adınız Soyadınız" required/>
          <input class="ff-input" type="text" name="message" placeholder="Yorumunuz..." required/>
          <button type="submit" class="ff-btn">Gönder →</button>
        </div>

        @if($errors->has('name') || $errors->has('message') || $errors->has('star'))
          <div class="ff-err">⚠️ {{ $errors->first() }}</div>
        @endif
      </form>
    @endif
  </div>

  <div class="fg2">
    <div>
      <div class="fl-logo">Quiz<span>ion</span></div>
      <p class="fl-desc">Ortaokul öğrencileri için yapay zeka destekli tamamen ücretsiz sınav ve öğrenme platformu.</p>
      <div class="fl-free">✅ Tamamen Ücretsiz Platform</div>
      <div class="f-soc">
        <a class="soc-btn" href="#" onclick="toast('📸 Instagram','info');return false">📸</a>
        <a class="soc-btn" href="#" onclick="toast('🐦 Twitter','info');return false">🐦</a>
        <a class="soc-btn" href="#" onclick="toast('📺 YouTube','info');return false">📺</a>
        <a class="soc-btn" href="#" onclick="toast('💬 Discord','info');return false">💬</a>
      </div>
    </div>
    <div class="fc2"><h4>Platform</h4><ul>
      <li><a onclick="document.getElementById('features').scrollIntoView({behavior:'smooth'})">Özellikler</a></li>
      <li><a onclick="document.getElementById('subjects').scrollIntoView({behavior:'smooth'})">Dersler</a></li>
      <li><a onclick="document.getElementById('hiw').scrollIntoView({behavior:'smooth'})">Nasıl Çalışır?</a></li>
      <li><a onclick="document.getElementById('yorumlar').scrollIntoView({behavior:'smooth'})">Yorumlar</a></li>
    </ul></div>
    <div class="fc2"><h4>Destek</h4><ul>
      <li><a onclick="toast('📧 destek@quizion.com.tr','info')">İletişim</a></li>
      <li><a onclick="toast('📖 Kılavuz açılıyor...','info')">Kullanım Kılavuzu</a></li>
      <li><a onclick="document.querySelector('.faq').scrollIntoView({behavior:'smooth'})">SSS</a></li>
      <li><a onclick="toast('✅ Tüm sistemler çalışıyor!','ok')">Durum</a></li>
    </ul></div>
    <div class="fc2"><h4>Yasal</h4><ul>
      <li><a onclick="toast('📄 Gizlilik Politikası','info')">Gizlilik</a></li>
      <li><a onclick="toast('📄 Kullanım Şartları','info')">Kullanım Şartları</a></li>
      <li><a onclick="toast('📄 KVKK','info')">KVKK</a></li>
      <li><a onclick="toast('🍪 Çerez ayarları','info')">Çerezler</a></li>
    </ul></div>
  </div>
  <div class="f-bot">
    <div class="f-bot-txt">© 2026 <strong>Quizion</strong>. Tüm hakları saklıdır. ❤️ ile yapıldı.</div>
    <div class="f-bdgs"><span class="f-bdg">🔒 SSL</span><span class="f-bdg">🇹🇷 Yerli</span><span class="f-bdg">KVKK</span><span class="f-bdg">✅ Ücretsiz</span></div>
  </div>
</footer>

</div>

<script>
let regRole='ogrenci';

/* MODAL */
function openModal(tab='login'){document.getElementById('authModal').classList.add('open');document.body.style.overflow='hidden';switchTab(tab);}
function closeModal(){document.getElementById('authModal').classList.remove('open');document.body.style.overflow='';}
function bgClick(e){if(e.target===document.getElementById('authModal'))closeModal();}
function switchTab(t){
  document.getElementById('tLogin').classList.toggle('ac',t==='login');
  document.getElementById('tReg').classList.toggle('ac',t==='register');
  document.getElementById('pLogin').classList.toggle('ac',t==='login');
  document.getElementById('pReg').classList.toggle('ac',t==='register');
}

/* ROL */
function selectRegRole(r){
  regRole=r;
  document.getElementById('roleInput').value=r;
  document.getElementById('rrc-student').classList.toggle('sel',r==='ogrenci');
  document.getElementById('rrc-teacher').classList.toggle('sel',r==='ogretmen');
  document.getElementById('gradeWrap').style.display=r==='ogrenci'?'':'none';
  document.getElementById('branchWrap').style.display=r==='ogretmen'?'':'none';
  document.getElementById('rgGrade').required=r==='ogrenci';
  document.getElementById('rgBranch').required=r==='ogretmen';
}

/* FOOTER ROL */
function setFfRole(r){
  document.getElementById('ffRoleInput').value=r;
  const map={'Öğrenci':'ogrenci','Öğretmen':'ogretmen','Veli':'veli','Diğer':'diger'};
  Object.values(map).forEach(k=>{const el=document.getElementById('ffr-'+k);if(el)el.classList.remove('sel');});
  const el=document.getElementById('ffr-'+map[r]);
  if(el)el.classList.add('sel');
}

/* FOOTER YILDIZ */
function setFfStar(v){
  document.getElementById('ffStarInput').value=v;
  document.querySelectorAll('.ff-star').forEach(b=>{b.classList.toggle('active',+b.dataset.v<=v);});
}

/* TOAST */
function toast(msg,type='info'){
  const c=document.getElementById('tw');
  const t=document.createElement('div');
  t.className='toast '+(type==='ok'?'ok':type==='err'?'err':type==='warn'?'warn':'');
  t.innerHTML=msg;c.appendChild(t);
  setTimeout(()=>{t.classList.add('out');setTimeout(()=>t.remove(),280);},3200);
}

/* FAQ */
function toggleFaq(el){
  const item=el.closest('.faq-item');
  document.querySelectorAll('.faq-item').forEach(i=>{if(i!==item)i.classList.remove('open');});
  item.classList.toggle('open');
}

/* SCROLL REVEAL */
const ro=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');ro.unobserve(e.target);}});},{threshold:.1,rootMargin:'0px 0px -36px 0px'});
document.querySelectorAll('.rv').forEach(el=>ro.observe(el));

/* COUNT UP */
const co=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){animC(e.target);co.unobserve(e.target);}});},{threshold:.5});
document.querySelectorAll('.cu').forEach(el=>co.observe(el));
function animC(el){const t=+el.dataset.t,dur=1800,s=performance.now();(function u(n){const p=Math.min((n-s)/dur,1),e2=1-Math.pow(1-p,3);el.textContent=Math.round(e2*t);if(p<1)requestAnimationFrame(u);else el.textContent=t;})(s);}

/* NAV ACTIVE */
const navSecs=['hero','features','subjects','yorumlar'];
window.addEventListener('scroll',()=>{
  document.getElementById('btt').classList.toggle('on',window.scrollY>400);
  let cur='hero';
  navSecs.forEach(id=>{const el=document.getElementById(id);if(el&&window.scrollY>=el.offsetTop-130)cur=id;});
  document.querySelectorAll('.nav-links li a').forEach(a=>{a.classList.toggle('ac',a.getAttribute('href').replace('#','')=== cur);});
});

/* PARTICLES */
(function(){const c=document.getElementById('ptcl');for(let i=0;i<16;i++){const p=document.createElement('div');p.className='ptcl';const s=Math.random()*22+7;p.style.cssText=`width:${s}px;height:${s}px;left:${Math.random()*100}%;bottom:-40px;animation-duration:${Math.random()*9+7}s;animation-delay:${Math.random()*6}s;opacity:${Math.random()*.26+.04}`;c.appendChild(p);}})();

document.addEventListener('keydown',e=>{if(e.key==='Escape')closeModal();});
selectRegRole('ogrenci');
setFfStar(5);
setFfRole('Öğrenci');
</script>
</body>
</html>