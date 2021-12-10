const modal = document.querySelector('.js-modal')
    const modalContainer = document.querySelector('.js-modal-order-container')
    const closes = document.querySelectorAll('.js-btn--close')
    const eyes = document.querySelectorAll('.js-action__icon--eye')

    function openModal()
    {
      modal.classList.add('modal-open')
    }
    function hideModal()
    {
      modal.classList.remove('modal-open')
    }
    for(const eye of eyes){
      eye.addEventListener('click', openModal)
    }

    for(const close of closes){
      close.addEventListener('click', hideModal)
    }

    modal.addEventListener('click', hideModal)
    modalContainer.addEventListener('click', function(event){
      event.stopPropagation()
    })