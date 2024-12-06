
const menuStylenone = document.querySelectorAll('#sidebar a');
const menuStyletow = document.querySelectorAll('#sidebar a');


// Function to handle the active class toggle
menuStylenone.forEach(item => {
    item.addEventListener('click', function() {
        // Remove the 'active' class from all items
        menuStylenone.forEach(i => i.classList.remove('active1'));
        // Add the 'active' class to the clicked item
        this.classList.add('active1');
    });
});
menuStylentow.forEach(item => {
    item.addEventListener('click', function() {
        // Remove the 'active' class from all items
        menuStylentow.forEach(i => i.classList.remove('active1'));
        // Add the 'active' class to the clicked item
        this.classList.add('active1');
    });
});


function toggleSuMenu(button) {
    button.nextElementSibling.classList.toggle('show');
    button.classList.toggle('rotate');
    if (sidebar.classList.contains('close')) {
        sidebar.classList.toggle('close');
        toggleButton.classList.toggle('rotate');
    }
}
