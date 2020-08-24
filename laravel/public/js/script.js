let select = function () {
    let selectHeader = document.querySelectorAll('.select__header');
    let selectItem = document.querySelectorAll('.select__item');

    selectHeader.forEach(item => {
        item.addEventListener('click', selectToggle)
    });

    selectItem.forEach(item => {
        item.addEventListener('click', selectChoose)
    });

    function selectToggle() {
        this.parentElement.classList.toggle('is-active');
    }

    function selectChoose() {
        let text = this.innerText,
            select = this.closest('.select'),
            currentText = select.querySelector('.select__current');
        currentText.innerText = text;
        select.classList.remove('is-active');

    }

};

select();

// Составление списка упраженений по заданной категории

// document.getElementsByClassName("category").addEventListener("click", selectCategory);

let elements = document.getElementsByClassName("category");

let selectCategory = function() {
    let activeCategory = this.getAttribute("id");

    for (let i = 0; i < elements.length; i++) {
        let el = elements[i];
        let categoryID = el.getAttribute('id');
        if (categoryID === activeCategory) {
            el.classList.add('selected-category');
        } else {
            el.classList.remove('selected-category');
        }
    }

    // alert(activeCategory);
    let options = document.getElementById('choose-exercises');
    options.selectedIndex = "-1";
    console.log(options.selectedIndex);

    let exercises = document.getElementsByClassName("exercise");
    for (let i = 0; i < exercises.length; i++) {
        let el = exercises[i];
        let categoryID = el.getAttribute('data-category');
        if (categoryID === activeCategory || activeCategory === "all") {
            el.classList.remove('d-none');
        } else {
            el.classList.add('d-none');
        }
    }
};

for (let i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', selectCategory, false);
}



