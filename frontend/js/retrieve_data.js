document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.program-link');
    const studentInfo = document.getElementById('studentTableBody');
    const pagination = document.querySelector('.pagination');
    let currentProgram = '';
    let currentPage = 1;

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            currentProgram = event.target.textContent;
            currentPage = 1; // Reset to first page on program change
            fetchStudentInfo(currentProgram, currentPage);
        });
    });

    pagination.addEventListener('click', function(event) {
        if (event.target.tagName === 'A') {
            event.preventDefault();
            const newPage = parseInt(event.target.getAttribute('data-page'));
            if (!isNaN(newPage) && newPage !== currentPage) {
                currentPage = newPage;
                fetchStudentInfo(currentProgram, currentPage);
            } else if (event.target.getAttribute('data-page') === 'prev' && currentPage > 1) {
                currentPage -= 1;
                fetchStudentInfo(currentProgram, currentPage);
            } else if (event.target.getAttribute('data-page') === 'next') {
                currentPage += 1;
                fetchStudentInfo(currentProgram, currentPage);
            }
        }
    });

    function fetchStudentInfo(program, page) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `retrieve_data.php?program=${encodeURIComponent(program)}&page=${page}`, true); 
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                displayStudentInfo(data.data);
                updatePagination(data.total_pages, data.current_page);
            }
        };
        xhr.send();
    }

    function displayStudentInfo(students) {
        studentInfo.innerHTML = students.map(student => `
            <tr>
                <td>${student.id}</td>
                <td>${student.first_name}</td>
                <td>${student.last_name}</td>
                <td>${student.program}</td>
                <td>${student.course}</td>
                <td class='more_details'><button onclick='openModal(${student.id})'>more details</button></td>
            </tr>
        `).join('');
    }

    function updatePagination(totalPages, currentPage) {
        let paginationHTML = '';
        paginationHTML += `
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="prev">Previous</a>
            </li>
        `;
        for (let i = 1; i <= totalPages; i++) {
            paginationHTML += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;
        }
        paginationHTML += `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="next">Next</a>
            </li>
        `;
        pagination.innerHTML = paginationHTML;
    }
});



 
function openModal(studentId) {

    console.log(studentId);

    var modal = document.querySelector('.details');
    modal.style.display = 'block'; // Display the modal
    // Apply CSS transitions to smoothly animate the modal appearance
    modal.style.opacity = '0'; // Start with opacity 0
    modal.style.transition = '0.8s ease'; // Apply transition for opacity property

// Use setTimeout to delay the modal appearance
setTimeout(function() {
    modal.style.opacity = '1'; // Set opacity to 1 after a short delay
}, 50); 

// Make an AJAX request to fetch additional details for the student with studentId
var xhr = new XMLHttpRequest();
xhr.open('GET', 'modaldetails.php?id=' + encodeURIComponent(studentId), true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            // Handle the response here to populate the modal with additional details
            modal.innerHTML = xhr.responseText;
   
        } else {
            console.error('Error: ' + xhr.status);
        }
    }
};
xhr.send();

};
