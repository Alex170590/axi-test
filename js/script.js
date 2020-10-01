(function() {
    let form__nav_next = document.querySelectorAll('.form__nav-next');
    if(form__nav_next.length != 0){
        form__nav_next.forEach((item) => {
            "use strict";
            item.addEventListener('click', (e) => {
                e.preventDefault();
                let element = e.currentTarget;
                let form__item = element.closest('.form__item');
                let form__field_required = form__item.querySelectorAll('.form__field--required');
                if(form__field_required.length != 0){
                    if(validation(form__field_required) != 0) return false;
                }
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

    let form__action = document.querySelector('.form__action');
    if(form__action){
        form__action.addEventListener('submit', (e) => {
            let element = e.currentTarget;
            let form__item = element.closest('.form__item');
            let form__field_required = element.querySelectorAll('.form__field--required');
            if(form__field_required.length != 0){
                if(validation(form__field_required) != 0){
                    e.preventDefault()
                }
            }
        })
    }

    function validation(form__field_required) {
        let error = 0;
        form__field_required.forEach((item) => {
            "use strict";
            item.querySelectorAll('.form__field-error').forEach((item) => {
                "use strict";
                item.classList.remove('form__field-error--active')
            });
        });

        form__field_required.forEach((item) => {
            "use strict";
            let field = item.querySelector('[name]');
            switch (field.type){
                case 'text':
                    if(field.value.length == 0){
                        item.querySelector('.form__field-error').classList.add('form__field-error--active');
                        error++;
                    }
                    break;
                case 'file':
                    let file = [],
                        n = 0;
                    if(field.hasAttribute('data-max-weight')){
                        let max_weight = Number(field.getAttribute('data-max-weight') * 1024);
                        let size_error = 0;
                        for(let i = 0; i < field.files.length; i++){
                            if(field.files[i].size > max_weight){
                                size_error++;
                            }
                        }
                        if(size_error != 0){
                            file[n++] = "weight";
                        }
                    }

                    if(field.hasAttribute('data-max-count')){
                        let max_count = Number(field.getAttribute('data-max-count'));
                        if(field.files.length > max_count){
                            file[n++] = "count";
                        }
                    }
                    console.log(file);
                    if(file.length != 0){
                        for(let i = 0; i < file.length; i++){
                            item.querySelector('.form__field-error--'+file[i]).classList.add('form__field-error--active');
                            error++;
                        }
                    }
                    break;
            }
        });

        return error;
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