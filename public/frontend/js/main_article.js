// fetch("/components/footer.html")
//   .then(response => response.text())
//   .then(data => {
//     document.getElementById('footer-placeholder').innerHTML = data;
//   });

// fetch("/components/navbar.html")
//   .then(response => response.text())
//   .then(data => {
//     document.getElementById('navbar-placeholder').innerHTML = data;
//   });

document.addEventListener('DOMContentLoaded', function () {
  const categories = document.querySelectorAll('.category');
  const articles = document.querySelectorAll('.card-wrapper');

  categories.forEach(category => {
    category.addEventListener('click', function () {
      // Remove 'active' class from all categories
      categories.forEach(c => c.classList.remove('active'));
      // Add 'active' class to the clicked category
      this.classList.add('active');

      // Get the selected category's data attribute
      const selectedCategory = this.getAttribute('data-category');
      console.log(`Selected Category: ${selectedCategory}`);

      // Hide all articles
      articles.forEach(article => {
        article.style.display = 'none'; // Initially hide all articles
      });

      // Show articles that match the selected category
      articles.forEach(article => {
        const articleCategory = article.getAttribute('data-category');
        console.log(`Article Category: ${articleCategory}`);
        if (articleCategory === selectedCategory || selectedCategory === 'All') {
          article.style.display = 'block';  // Show matching articles
        }
      });
    });
  });
  
  const subscribeForm = document.querySelector('.subscribe-form');
  subscribeForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const emailInput = subscribeForm.querySelector('input[type="email"]');
    const emailValue = emailInput.value;

    if (validateEmail(emailValue)) {
      alert(`Thank you for subscribing with the email: ${emailValue}`);
      emailInput.value = ''; // Clear the input after submission.
    } else {
      alert('Please enter a valid email address');
    }
  });

  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
  }
});

function shareContent(title, imagePath) {
  if (navigator.share) {
    navigator.share({
      title: title,
      text: `Check out this article: ${title}`,
      url: window.location.href,
    }).then(() => {
      console.log('Thanks for sharing!');
    }).catch(err => {
      console.error('Error sharing:', err);
    });
  } else {
    // Fallback for browsers that do not support the share API
    const shareUrl = encodeURIComponent(window.location.href);
    const text = encodeURIComponent(`Check out this article: ${title}`);
    const twitterUrl = `https://twitter.com/intent/tweet?url=${shareUrl}&text=${text}`;
    window.open(twitterUrl, '_blank');
  }
}
