console.log('gift-card.js loaded');

// // Load the footer dynamically
// fetch("/components/footer.html")
//     .then(response => response.text())
//     .then(data => {
//         document.getElementById('footer-placeholder').innerHTML = data;
//     });

// // Load the navbar dynamically
// fetch("/components/navbar.html")
//     .then(response => response.text())
//     .then(data => {
//         document.getElementById('navbar-placeholder').innerHTML = data;
//     });

// Function to change the card style
function changeCardStyle(element, cardImagePath) {
    const mainCardImage = document.getElementById('mainCardImage');
    mainCardImage.src = cardImagePath;

    const styleCards = document.querySelectorAll('.style-card');
    styleCards.forEach(card => card.classList.remove('active'));

    element.classList.add('active');
}

// Toggle custom amount section
document.getElementById('customAmountBtn')?.addEventListener('click', function () {
    document.getElementById('customAmountSection').classList.toggle('d-none');
});