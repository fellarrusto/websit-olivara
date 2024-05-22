function loadTranslations(language, callback) {
    fetch(`trs/${language}.json`)
      .then(response => response.json())
      .then(data => {
        callback(data);
      });
  }

  function changeLanguage(language) {
    loadTranslations(language, translations => {
      document.querySelectorAll('[data-key]').forEach(el => {
        const key = el.getAttribute('data-key');
        el.innerHTML = translations[key];
      });
    });
  }

document.getElementById('languageSelector').addEventListener('change', function() {
    changeLanguage(this.value)
});