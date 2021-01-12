$('.header__navbar-togle').click(function(e){
    e.preventDefault();
    $('.header__navbar').toggleClass('is-open');
 })

let id = document.getElementById('add');
console.log(id);
id.style.color = 'red';