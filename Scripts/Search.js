// Search function and others

const searchInput = document.getElementById('search-input');
const searchIcon = document.getElementById('search-icon');

searchInput.addEventListener('input', () => {
  if (searchInput.value) {
    searchIcon.style.display = 'none';
  } else {
    searchIcon.style.display = 'block';
  }
});

