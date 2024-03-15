CREATE DATABASE book_list;
USE book_list;
CREATE TABLE books (
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(100) NOT NULL,
    publication_year INT NOT NULL,
    availability BOOLEAN NOT NULL
);
INSERT INTO books (title, author, publication_year, availability) VALUES
    ('Anna Karenina', 'Leo Tolstoy', 1877, TRUE),
    ('The Great Gatsby', 'F. Scott Fitzgerald', 1925, TRUE),
    ('To Kill a Mockingbird', 'Harper Lee', 1960, FALSE),
    ('1984', 'George Orwell', 1949, TRUE),
    ('Pride and Prejudice', 'Jane Austen', 1813, TRUE),
    ('The Catcher in the Rye', 'J.D. Salinger', 1951, FALSE),
    ('The Lord of the Rings', 'J.R.R. Tolkien', 1954, TRUE);
    
    SELECT * FROM books;
    