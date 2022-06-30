let buttons = document.querySelectorAll('.button');
function playSound() {
    document.getElementById('sound').play();
}
buttons.forEach(function(button){
    button.addEventListener('click',playSound);
});