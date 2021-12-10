// login and register

const user_login = document.querySelectorAll('.js-user-login');
const user_register = document.querySelectorAll('.js-user-register');
const modal = document.querySelector('.js-modal');
const modalClose = document.querySelectorAll('.js-modal-close');
const modalContainer = document.querySelector('.js-modal-container');
const overlay = document.querySelector('.js-overlay');
const form_register = document.querySelector('.js-auth-form1');
const form_login = document.querySelector('.js-auth-form2');

function showRegisterForm(){
    modal.classList.add('open')
    overlay.classList.add('open-form')
    form_register.classList.add('open-form')
}
function CloseForm(){
    modal.classList.remove('open')
    overlay.classList.remove('open-form')
    form_login.classList.remove('open-form')
    form_register.classList.remove('open-form')
}

function showLoginForm(){
    modal.classList.add('open')
    overlay.classList.add('open-form')
    form_login.classList.add('open-form')
}

for(const close of modalClose){
    close.addEventListener('click', CloseForm)
}
for(const login of user_login){
    login.addEventListener('click', showLoginForm)
}
for(const register of user_register){
    register.addEventListener('click', showRegisterForm)
}

modal.addEventListener('click', CloseForm)
modalContainer.addEventListener('click', function(event){
    event.stopPropagation()
})