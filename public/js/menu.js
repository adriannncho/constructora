const nav = document.querySelector('.container_menu','logo');

window.addEventListener('scroll', function(){
    nav.classList.toggle('active', this.window.scrollY>0)
});


var logo = document.querySelector('.logo');
var logoOffset = logo.offsetTop;
var logoHeight = logo.offsetHeight;
var logoScroll = document.querySelector('.logo .scroll');

window.addEventListener('scroll', function() {
  var scroll = window.scrollY;
  if (scroll > logoOffset + logoHeight) {
    logo.classList.add('scroll-top');
  } else {
    logo.classList.remove('scroll-top');
  }
}); 
