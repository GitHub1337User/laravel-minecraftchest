function pagination (){
    // let links_container = document.querySelector('.links-page');
    let links = document.querySelectorAll('.pagintation-link');

    links.forEach(item=> event(item));
    function event(item){
        item.addEventListener('click',switch_link);
    }
    function switch_link(){
        alert('hui');
    }
}
// pagination();