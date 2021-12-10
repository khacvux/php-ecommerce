function toggle(source) {
    checkboxes = document.getElementsByName('check');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    const discountCode = document.querySelector('.js-cart-pay__discount-code')
    const edit = document.querySelector('.js-nav-cart-mobile__action-edit')
    const complete = document.querySelector('.js-nav-cart-mobile__action-complete')
    const payBtn = document.querySelector('.js-cart-pay-bottom__button-pay')
    const deleteBtn = document.querySelector('.js-cart-pay-bottom__button-delete')
    const sum = document.querySelector('.js-cart-pay-bottom__sum-product-wrap')

    function editForm(){
        discountCode.classList.add('cart-pay__discount-code-close')
        complete.classList.add('nav-cart-mobile__action-complete-open')
        edit.classList.add('nav-cart-mobile__action-edit-close')
        payBtn.classList.add('cart-pay-bottom__button-pay-close')
        deleteBtn.classList.add('cart-pay-bottom__button-delete-open')
        sum.classList.add('cart-pay-bottom__sum-product-wrap-close')
    }

    function completeForm(){
        discountCode.classList.remove('cart-pay__discount-code-close')
        complete.classList.remove('nav-cart-mobile__action-complete-open')
        edit.classList.remove('nav-cart-mobile__action-edit-close')
        payBtn.classList.remove('cart-pay-bottom__button-pay-close')
        deleteBtn.classList.remove('cart-pay-bottom__button-delete-open')
        sum.classList.remove('cart-pay-bottom__sum-product-wrap-close')
    }

    edit.addEventListener('click', editForm)
    complete.addEventListener('click', completeForm)