(function () {
  // tampilkan / sembunyikan kata sandi
  document.addEventListener('click', function (e) {
    var eye = e.target.closest('[data-eye]');
    if (eye) {
      var input = document.getElementById(eye.dataset.eye);
      var show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      eye.classList.toggle('on', show);
      eye.setAttribute('aria-pressed', show ? 'true' : 'false');
    }
    var demo = e.target.closest('[data-demo]');
    if (demo) {
      var r = document.getElementById('role-' + demo.dataset.role);
      if (r) { r.checked = true; syncRole(); }
      document.getElementById('identifier').value = demo.dataset.identifier;
      document.getElementById('password').value = demo.dataset.password;
    }
  });

  // teks keterangan di bawah pilihan peran (halaman masuk)
  function syncRole() {
    var checked = document.querySelector('input[name=role]:checked');
    var note = document.getElementById('role-note');
    if (checked && note && note.dataset[checked.value]) note.textContent = note.dataset[checked.value];
  }
  document.querySelectorAll('input[name=role]').forEach(function (r) { r.addEventListener('change', syncRole); });
  syncRole();

  // cegah klik ganda saat mengirim
  document.querySelectorAll('form[data-auth]').forEach(function (f) {
    f.addEventListener('submit', function () {
      var b = f.querySelector('button[type=submit]');
      if (b) { b.disabled = true; }
    });
  });
  window.addEventListener('pageshow', function () {
    document.querySelectorAll('form[data-auth] button[type=submit]').forEach(function (b) { b.disabled = false; });
  });
})();
