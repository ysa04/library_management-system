function navigateToCategory(category) {
    // Prevent default navigation
    event.preventDefault();

    // Navigate to the category page with the category title as a query parameter
    window.location.href = 'bookNavigate.php?category=' + encodeURIComponent(category);
}

