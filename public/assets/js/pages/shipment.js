// Get modal elements
const modal = document.getElementById('myModal');
const openModalBtn = document.getElementById('openModalBtn');
const closeModalSpan = document.getElementsByClassName('close')[0];

// Open modal when the button is clicked
openModalBtn.onclick = function() {
    modal.style.display = 'block';
}

// Close modal when the 'x' is clicked
closeModalSpan.onclick = function() {
    modal.style.display = 'none';
}

// Close modal when clicking outside of the modal content
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Close modal when clicking the cancel button
document.querySelectorAll('.close').forEach(btn => {
    btn.onclick = function() {
        modal.style.display = 'none';
    }
});

