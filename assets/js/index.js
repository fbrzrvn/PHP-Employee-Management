// CHANGE ACTIVE PATH
const url = window.location.href.split('/')
const subdomain = url[url.length-1];
document.querySelector('a[href$="' + subdomain + '"]').classList.add('active');
