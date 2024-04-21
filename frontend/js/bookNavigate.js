function navigateToCategory(category) {
    // Prevent default navigation
    event.preventDefault();

    // Navigate to the category page with the category title with query parameter
    window.location.href = 'bookNavigate.php?category=' + encodeURIComponent(category);
}

