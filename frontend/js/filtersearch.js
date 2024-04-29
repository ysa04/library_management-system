function applyFilter() {
    var formData = new FormData(document.getElementById("filterForm"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "searchhome.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var results = xhr.responseText;
            // Update the image containers with search results
            document.querySelectorAll('.gallery').forEach(function(container) {
                container.innerHTML = results;
            });
        }
    };
    xhr.send(formData);
}