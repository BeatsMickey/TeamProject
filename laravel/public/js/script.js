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

var myFunction = function() {
    let attribute = this.getAttribute("id");
    alert(attribute);
};

for (let i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', myFunction, false);
}


console.log(document.getElementsByClassName("category"));


function selectCategory() {
    console.log(111);
    // document.getElementsByClassName("category").innerHTML = "Hello World";
    // console.log(document.getElementsByClassName("category"));
}
selectCategory();
