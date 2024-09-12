document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('ddc').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var ddc = selectedOption.value; 
        var description = selectedOption.textContent.split(' - ')[1]; 

        console.log('Selected Dewey Number:', ddc);
        console.log('Selected Description:', description);

        if (ddc && description) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'sub_description.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('subDescription').innerHTML = xhr.responseText;
                }
            };
            xhr.send('dewey_number=' + encodeURIComponent(ddc) + '&description=' + encodeURIComponent(description));
        }
    });
});




