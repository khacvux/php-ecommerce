const btnAdd = document.querySelector('.js-productList__heading-button--add')
    const modal= document.querySelector('.js-modal')
    const modal2= document.querySelector('.js-modal2')
    const modalContainer = document.querySelector('.js-modal-container')
    const closeForms = document.querySelectorAll('.js-modal-container__body-action-button--back')
    const btnEdits= document.querySelectorAll('.js-productList__body-item-Action-icon--edit')

    //open form add product
    function openFrom(){
      modal.classList.add('modal-open')
    }

    //open form edit product
    function openFrom2(){
      modal2.classList.add('modal-open')
    }

    function hideFrom(){
      modal.classList.remove('modal-open')
      modal2.classList.remove('modal-open')
    }

    btnAdd.addEventListener('click', openFrom)
    
    for(const btnEdit of btnEdits){
      btnEdit.addEventListener('click', openFrom2)
    }

    for(const closeForm of closeForms){
      closeForm.addEventListener('click', hideFrom)
    }

    modal.addEventListener('click', hideFrom)
    modalContainer.addEventListener('click', function(event){
      event.stopPropagation()
    })

