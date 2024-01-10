// Scroll to page section
function goToSection(id) {
  $('html, body').animate({
    scrollTop: $(id).offset().top
  }, 1000);
}

// Scroll up to top
function backToTop() {
  const topBtn = document.getElementById('to-top-btn');

  topBtn.addEventListener('click', () => {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
  });
}

// Open menu sub menu in navbar
function unfoldMenu() {
  const menuItem = document.getElementById('menu-sub-menu');

  menuItem.classList.toggle('hidden');
  menuItem.classList.toggle('menu-animation');
}

// Open menu sub menu in navbar for mobile
function unfoldMobileMenu() {
  const menuItem = document.getElementById('menu-sub-mobile');

  menuItem.classList.toggle('hidden');
  menuItem.classList.toggle('menu-animation');
}

// Open mobile menu
const openBtn = document.getElementById('menu-open-btn');
const closeBtn = document.getElementById('menu-close-btn');

function openMenu() {
  const mobileMenu = document.getElementById('mobile');

  openBtn.classList.add('hidden');
  closeBtn.classList.remove('hidden');
  mobileMenu.classList.remove('hidden');
}

// Close mobile menu
function closeMenu() {
  const menuItem = document.getElementById('menu-sub-mobile');
  const mobileMenu = document.getElementById('mobile');

  closeBtn.classList.add('hidden');
  openBtn.classList.remove('hidden');
  mobileMenu.classList.add('hidden');
  menuItem.classList.add('hidden');
}

window.addEventListener('scroll', () => {
  const topBtn = document.getElementById('to-top-btn');

  if (window.scrollY >= 900) {
    topBtn.classList.remove('hidden');
  } else {
    topBtn.classList.add('hidden');
  }
});

// Lang Vars
const lang = document.getElementById('lang');
const langBody = document.getElementById('lang-body');
const openLang = document.getElementById('open-lang');
const openLangBody = document.getElementById('open-lang-body');
const closeLang = document.getElementById('close-lang');
const openLangSelect = document.getElementById('open-lang-select');

// Handle language switch UI
closeLang.addEventListener('click', () => {
  langBody.classList.add('hidden');
  openLangBody.classList.remove('hidden');
  lang.classList.add('hidden');
});

openLang.addEventListener('click', () => {
  langBody.classList.remove('hidden');
  openLangBody.classList.add('hidden');
});

openLangSelect.addEventListener('click', () => {
  openLangBody.classList.add('hidden');
  lang.classList.remove('hidden');
});

backToTop();  // Scroll to top of page when clicked
