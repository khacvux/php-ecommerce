const navMobile = document.querySelector('.js-nav-mobile');
const overlay = document.querySelector('.js-nav__overlay');
const showNavBtn = document.querySelector('.js-nav-mobile-btn');
const closeNavBtn = document.querySelector('.js-nav-mobile-close');

function showNav(){
    navMobile.classList.add('openNav')
    overlay.classList.add('open')
}
function closeNav(){
    navMobile.classList.remove('openNav')
    overlay.classList.remove('open')
}

showNavBtn.addEventListener('click', showNav)
closeNavBtn.addEventListener('click', closeNav)
overlay.addEventListener('click', closeNav)

// đóng khi chọn menu
var menuItems = document.querySelectorAll(' .js-nav-mobile li a[href*="#"] ');
for(var i = 0; i < menuItems.length; i++) 
{
    var menuItem = menuItems[i];      
    menuItem.onclick = function()
    {
        navMobile.classList.remove('openNav')
        overlay.classList.remove('open')
    }         
}

// const menuItemss = document.querySelectorAll('.nav-mobile-link ');
// for(const menuItem of menuItemss){
//     menuItem.addEventListener('click', function(){
//         menuItem.classList.add('nav-mobile-link--active')
//     })
    
// }