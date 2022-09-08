// var acc = document.getElementsByClassName("accordion");
// var i;

// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     this.classList.toggle("active");
//     var panel = this.nextElementSibling;
//     if (panel.style.maxHeight) {
//       panel.style.maxHeight = null;
//     } else {
//       panel.style.maxHeight = panel.scrollHeight + "px";
//     } 
//   });
// }

// console.log('hello');
let readMoreBtns = document.querySelectorAll('.btn-read-more');
let readLessBtns = document.querySelectorAll('.btn-read-less');

for(i = 0; i < readMoreBtns.length; i++){
    readMoreBtns[i].addEventListener('click',showContentFunction);
    function showContentFunction () {
        showContent(this);
    }
}

let showContent = (elem) => {
        // elem.classList.remove('closed');
        dadElement = elem.parentElement;
        grandDad = dadElement.parentElement;
        console.log(grandDad);
        dropdownArrow = grandDad.querySelector('.dropdown-arrow');
        contentHeight = dadElement.querySelector('.content-area-height');
        contentInner = dadElement.querySelector('.content-area-inner');
        contentInnerHeight = contentInner.offsetHeight;
        // console.log(contentHeight);
        // console.log(contentInner);
        // console.log(contentInnerHeight);

        dropdownArrow.classList.add('active');
        dropdownArrow.classList.remove('inactive');
        contentHeight.style.height = `${contentInnerHeight}px`;
        elem.classList.add('inactive');
        elem.classList.remove('active');
        elem.nextElementSibling.classList.add('active');
}


for(i = 0; i < readLessBtns.length; i++){
    // console.log(readLessBtns[i]);

    readLessBtns[i].addEventListener('click',hideContentFunction);

    function hideContentFunction () {
        hideContent(this);
    }
}

let hideContent = (elem) => {
    // elem.classList.remove('closed');
    dadElement = elem.parentElement;
    dropdownArrow = grandDad.querySelector('.dropdown-arrow');
    contentHeight = dadElement.querySelector('.content-area-height');
    contentInner = dadElement.querySelector('.content-area-inner');
    contentInnerHeight = contentInner.offsetHeight;
    // console.log(contentHeight);
    // console.log(contentInner);
    // console.log(contentInnerHeight);

    dropdownArrow.classList.remove('active');
    dropdownArrow.classList.add('inactive');
    contentHeight.style.height = `45px`;
    elem.previousElementSibling.classList.add('active');
    elem.classList.remove('active');
    elem.classList.add('inactive');
}