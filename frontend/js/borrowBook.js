function bookBorrow(studentId){
    console.log(studentId);
    var div = document.getElementById('book-borrow');
        div.style.display = 'block';
}

function closeBorrow() {
    var borrowClose = document.getElementById('book-borrow');
    borrowClose.style.display = "none";
  };
