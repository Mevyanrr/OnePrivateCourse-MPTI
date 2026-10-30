/* One Private Course — runtime kecil untuk menghidupkan tombol di desain HTML (tanpa mengubah tampilannya). */
window.OPC = (function () {
  const meta = document.querySelector('meta[name="csrf-token"]');
  const csrf = meta ? meta.content : '';

  function label(el) {
    const c = el.cloneNode(true);
    c.querySelectorAll('.material-symbols-outlined').forEach(n => n.remove());
    return c.textContent.replace(/\s+/g, ' ').trim();
  }
  function norm(s) { return String(s || '').replace(/\s+/g, ' ').trim().toLowerCase(); }

  /** Cari tombol / link berdasarkan teks (abaikan ikon). exact=false => "mengandung". */
  function find(text, o) {
    o = o || {};
    const root = o.root || document;
    const t = norm(text);
    const hits = [...root.querySelectorAll(o.sel || 'button,a')].filter(e => {
      const l = norm(label(e));
      return o.exact === false ? l.includes(t) : l === t;
    });
    // Untuk pencocokan "mengandung", ambil elemen paling dalam saja (bukan pembungkusnya)
    return o.exact === false ? hits.filter(e => !hits.some(h => h !== e && e.contains(h))) : hits;
  }
  /** Pasang handler klik pada semua tombol dengan teks tertentu. */
  function on(text, fn, o) {
    const els = find(text, o);
    els.forEach(e => {
      e.addEventListener('click', ev => { ev.preventDefault(); fn(e, ev); });
      e.style.cursor = 'pointer';
    });
    return els;
  }
  function go(url) { window.location.href = url; }

  function toast(msg, ok) {
    ok = ok !== false;
    let box = document.getElementById('opc-toast');
    if (!box) {
      box = document.createElement('div');
      box.id = 'opc-toast';
      box.style.cssText = 'position:fixed;right:20px;bottom:20px;z-index:99999;display:flex;flex-direction:column;gap:8px;font-family:"Plus Jakarta Sans",sans-serif';
      document.body.appendChild(box);
    }
    const el = document.createElement('div');
    el.style.cssText = 'padding:12px 16px;border-radius:12px;color:#fff;font-size:13px;font-weight:600;box-shadow:0 10px 25px rgba(0,0,0,.18);max-width:360px;background:' + (ok ? '#047857' : '#ba1a1a');
    el.textContent = msg;
    box.appendChild(el);
    setTimeout(() => { el.style.opacity = '0'; el.style.transition = 'opacity .3s'; setTimeout(() => el.remove(), 300); }, 3200);
  }

  async function req(url, data, method) {
    const opt = {
      method: method || 'POST',
      headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json', 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
    };
    if (data !== undefined && opt.method !== 'GET') opt.body = JSON.stringify(data);
    let res, json = {};
    try { res = await fetch(url, opt); } catch (e) { toast('Gagal terhubung ke server.', false); throw e; }
    try { json = await res.json(); } catch (e) { json = {}; }
    if (!res.ok) {
      let msg = json.message || 'Terjadi kesalahan.';
      if (json.errors) msg = Object.values(json.errors).flat().join(' ');
      toast(msg, false);
      const err = new Error(msg); err.json = json; throw err;
    }
    return json;
  }
  const post = (u, d) => req(u, d, 'POST');
  const put = (u, d) => req(u, d, 'PUT');
  const del = (u) => req(u, {}, 'DELETE');

  function done(json, fallbackUrl) {
    if (json && json.message) toast(json.message, true);
    const to = (json && json.redirect) || fallbackUrl;
    if (to === 'reload' || (!to && json && json.reload !== false)) setTimeout(() => location.reload(), 600);
    else if (to) setTimeout(() => go(to), 600);
  }

  function logout() {
    if (!confirm('Keluar dari akun?')) return;
    const f = document.createElement('form');
    f.method = 'POST'; f.action = '/logout';
    f.innerHTML = '<input type="hidden" name="_token" value="' + csrf + '">';
    document.body.appendChild(f); f.submit();
  }

  /** Dialog form sederhana (gaya Tailwind yang sama dengan desain). */
  function dialog(cfg) {
    const ov = document.createElement('div');
    ov.style.cssText = 'position:fixed;inset:0;z-index:99990;background:rgba(19,27,46,.45);display:flex;align-items:center;justify-content:center;padding:16px;font-family:"Plus Jakarta Sans",sans-serif';
    const card = document.createElement('div');
    card.style.cssText = 'background:#fff;border-radius:20px;max-width:480px;width:100%;max-height:90vh;overflow:auto;padding:24px;box-shadow:0 25px 50px rgba(0,0,0,.25)';
    let h = '<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px"><div style="font-size:16px;font-weight:700;color:#131b2e">' + cfg.title + '</div><button type="button" data-x style="border:0;background:none;font-size:22px;cursor:pointer;color:#737686;line-height:1">&times;</button></div>';
    if (cfg.desc) h += '<div style="font-size:12px;color:#434655;margin-bottom:14px">' + cfg.desc + '</div>';
    h += '<form style="display:flex;flex-direction:column;gap:12px;margin-top:10px">';
    (cfg.fields || []).forEach(f => {
      const base = 'width:100%;padding:10px 12px;border:1px solid #c3c6d7;border-radius:10px;font-size:13px;font-family:inherit;background:#fff;color:#131b2e;outline:none';
      let input;
      const val = f.value === undefined || f.value === null ? '' : f.value;
      if (f.type === 'select') {
        input = '<select name="' + f.name + '" style="' + base + '">' + (f.options || []).map(o => '<option value="' + o.v + '"' + (String(o.v) === String(val) ? ' selected' : '') + '>' + o.t + '</option>').join('') + '</select>';
      } else if (f.type === 'textarea') {
        input = '<textarea name="' + f.name + '" rows="3" placeholder="' + (f.placeholder || '') + '" style="' + base + '">' + val + '</textarea>';
      } else {
        input = '<input name="' + f.name + '" type="' + (f.type || 'text') + '" value="' + String(val).replace(/"/g, '&quot;') + '" placeholder="' + (f.placeholder || '') + '" style="' + base + '">';
      }
      h += '<label style="display:flex;flex-direction:column;gap:5px;font-size:12px;font-weight:600;color:#131b2e">' + f.label + input + '</label>';
    });
    h += '<div style="display:flex;gap:8px;justify-content:flex-end;margin-top:6px"><button type="button" data-x style="padding:10px 16px;border-radius:10px;border:1px solid #c3c6d7;background:#fff;font-size:13px;font-weight:600;cursor:pointer;color:#434655">Batal</button><button type="submit" style="padding:10px 18px;border-radius:10px;border:0;background:#2563eb;color:#fff;font-size:13px;font-weight:600;cursor:pointer">' + (cfg.submit || 'Simpan') + '</button></div></form>';
    card.innerHTML = h; ov.appendChild(card); document.body.appendChild(ov);
    const close = () => ov.remove();
    ov.addEventListener('click', e => { if (e.target === ov) close(); });
    card.querySelectorAll('[data-x]').forEach(b => b.addEventListener('click', close));
    const form = card.querySelector('form');
    form.addEventListener('submit', async e => {
      e.preventDefault();
      const data = {};
      new FormData(form).forEach((v, k) => { data[k] = v; });
      const btn = form.querySelector('[type=submit]'); btn.disabled = true; btn.style.opacity = '.6';
      try { await cfg.onSubmit(data); close(); } catch (err) { btn.disabled = false; btn.style.opacity = '1'; }
    });
    return { close, form };
  }

  /** Saring baris/kartu berdasarkan teks input pencarian. */
  function liveSearch(input, items, extraFilter) {
    const run = () => {
      const q = norm(input.value);
      items.forEach(el => {
        const ok = (!q || norm(el.textContent).includes(q)) && (!extraFilter || extraFilter(el));
        el.style.display = ok ? '' : 'none';
      });
    };
    input.addEventListener('input', run);
    return run;
  }

  /** User block di header => klik untuk keluar. */
  function userLogout(nameText) {
    const spans = [...document.querySelectorAll('header span, header div')].filter(e => e.children.length === 0 && norm(e.textContent) === norm(nameText));
    if (!spans.length) return;
    let blk = spans[0].closest('div.flex.items-center') || spans[0].parentElement.parentElement;
    if (spans[0].parentElement && spans[0].parentElement.parentElement) blk = spans[0].parentElement.parentElement;
    blk.style.cursor = 'pointer'; blk.title = 'Klik untuk keluar';
    blk.addEventListener('click', logout);
  }

  return { label, norm, find, on, go, toast, req, post, put, del, done, logout, dialog, liveSearch, userLogout, csrf };
})();

/* Delegasi klik: [data-go] => pindah halaman, [data-post] => kirim request (opsional konfirmasi) */
document.addEventListener('click', async function (e) {
  const g = e.target.closest('[data-go]');
  if (g) { e.preventDefault(); OPC.go(g.dataset.go); return; }
  const p = e.target.closest('[data-post]');
  if (p) {
    e.preventDefault();
    if (p.dataset.confirm && !confirm(p.dataset.confirm)) return;
    try {
      const body = p.dataset.body ? JSON.parse(p.dataset.body) : {};
      const j = await OPC.req(p.dataset.post, body, p.dataset.method || 'POST');
      OPC.done(j, p.dataset.after);
    } catch (_) {}
  }
});

/* Pilihan kartu/tombol bergaya "radio" tanpa ubah desain: tukar class aktif <-> tidak aktif. */
OPC.choice = function (els, activeIdx, onPick) {
  els = [...els];
  if (els.length < 2) return;
  const walk = e => [e, ...e.querySelectorAll('*')];
  const other = els.findIndex((_, i) => i !== activeIdx);
  const A = walk(els[activeIdx]).map(n => n.getAttribute('class'));
  const I = walk(els[other]).map(n => n.getAttribute('class'));
  function apply(k) {
    els.forEach((e, i) => {
      const set = i === k ? A : I;
      walk(e).forEach((n, idx) => {
        if (set[idx] !== undefined && set[idx] !== null) n.setAttribute('class', set[idx]);
        if (n.children.length === 0) {
          const t = n.textContent.trim();
          if (t === 'radio_button_checked' || t === 'radio_button_unchecked') n.textContent = i === k ? 'radio_button_checked' : 'radio_button_unchecked';
        }
      });
    });
    if (onPick) onPick(k);
  }
  els.forEach((e, i) => { e.style.cursor = 'pointer'; e.addEventListener('click', () => apply(i)); });
  return apply;
};
OPC.leaf = function (text, root) {
  const t = OPC.norm(text);
  return [...(root || document).querySelectorAll('*')].find(n => n.children.length === 0 && OPC.norm(n.textContent) === t);
};
OPC.setLeaf = function (oldText, newText, root) {
  const n = OPC.leaf(oldText, root); if (n) n.textContent = newText; return n;
};
