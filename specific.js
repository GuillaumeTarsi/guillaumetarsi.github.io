// import i18next from 'i18next';

i18next
  .use(i18nextXHRBackend)
  .use(i18nextBrowserLanguageDetector)
  .init({
    fallbackLng: 'en',
    debug: true,
    ns: ['translation'],
    defaultNS: 'translation',
    backend: {
      // load from i18next-gitbook repo
      loadPath: './ressources/locales/{{lng}}/{{ns}}.json',
      crossDomain: true
    }
  }, function(err, t) {
    // init set content
    updateContent();
  });


// just set some content and react to language changes
// could be optimized using vue-i18next, jquery-i18next, react-i18next, ...
function updateContent() {
  document.getElementById('nav-home').innerHTML = i18next.t('nav.home', { what: 'i18next' });
  document.getElementById('nav-about').innerHTML = i18next.t('nav.about', { what: 'i18next' });
  document.getElementById('nav-portfolio').innerHTML = i18next.t('nav.portfolio', { what: 'i18next' });
  document.getElementById('nav-contact').innerHTML = i18next.t('nav.contact', { what: 'i18next' });

  document.getElementById('section_title-about').innerHTML = i18next.t('nav.about', { what: 'i18next' });
  document.getElementById('section_title-portfolio').innerHTML = i18next.t('nav.portfolio', { what: 'i18next' });
  document.getElementById('section_title-contact').innerHTML = i18next.t('nav.contact', { what: 'i18next' });

  document.getElementById('section_contact-email').innerHTML = i18next.t('section_contact.field-email', { what: 'i18next' });
  document.getElementById('section_contact-phone_number').innerHTML = i18next.t('section_contact.field-phone_number', { what: 'i18next' });
  document.getElementById('section_contact-city').innerHTML = i18next.t('section_contact.field-city', { what: 'i18next' });
  document.getElementById('section_contact-social_networks').innerHTML = i18next.t('section_contact.field-social_networks', { what: 'i18next' });


  
}

function changeLng(lng) {
  i18next.changeLanguage(lng);
}

i18next.on('languageChanged', () => {
  updateContent();
});