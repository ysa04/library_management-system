// WIP

CREATE TABLE Books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    publication_year INT,
    status ENUM('Available', 'Borrowed') DEFAULT 'Available'
);

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    -- Add other relevant user information here
);

CREATE TABLE Borrowings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    user_id INT,
    borrowing_date DATE,
    return_date DATE,
    fine_amount DECIMAL(10, 2),
    FOREIGN KEY (book_id) REFERENCES Books(id),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Librarians (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL, -- Encrypted password
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    -- Add other relevant librarian information here
);
