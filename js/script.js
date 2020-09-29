(function() {
    let form__nav_next = document.querySelectorAll('.form__nav-next');
    if(form__nav_next.length != 0){
        form__nav_next.forEach((item) => {
            "use strict";
            item.addEventListener('click', (e) => {
                e.preventDefault();
                let element = e.currentTarget;
                let form__item_current = element.closest('.form__item');
                form__item_current.classList.remove('form__item--active');
                form__item_current.nextElementSibling.classList.add('form__item--active');
                Step();
            })
        })
    }

    let form__nav_prev = document.querySelectorAll('.form__nav-prev');
    if(form__nav_prev.length != 0){
        form__nav_prev.forEach((item) => {
            "use strict";
            item.addEventListener('click', (e) => {
                e.preventDefault();
                let element = e.currentTarget;
                let form__item_current = element.closest('.form__item');
                form__item_current.classList.remove('form__item--active');
                form__item_current.previousElementSibling.classList.add('form__item--active');
                Step();
            })
        })
    }

    function Step() {
        let form__list = document.querySelector('.form__list');
        let number_element = 0;
        for(let i = 0; i < form__list.children.length; i++){
            if(form__list.children[i].classList.contains('form__item--active')){
                number_element = i
            }
        }

        let form__paragraph_item = document.querySelectorAll('.form__paragraph-item');
        if(form__paragraph_item.length != 0){
            form__paragraph_item.forEach((item, i) => {
                "use strict";
                item.classList.remove('form__paragraph-item--active');
                if(i < number_element){
                    item.classList.add('form__paragraph-item--ok')
                }
                if(i == number_element){
                    item.classList.add('form__paragraph-item--active')
                }
            })
        }

        // console.log(number_element);
    }
})();