-- Student: 2209314 - Rana Alsaggaf
CREATE DATABASE IF NOT EXISTS cpit405_lab10 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cpit405_lab10;

DROP TABLE IF EXISTS borrows;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS members;
DROP TABLE IF EXISTS librarians;

CREATE TABLE books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  author VARCHAR(120) NOT NULL,
  year_published INT,
  status ENUM('Available','Borrowed','Damaged') DEFAULT 'Available',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE members (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(150) NOT NULL,
  email VARCHAR(150) UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE librarians (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(150) NOT NULL,
  staff_code VARCHAR(50) UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE borrows (
  id INT AUTO_INCREMENT PRIMARY KEY,
  member_id INT NOT NULL,
  book_id INT NOT NULL,
  librarian_id INT NOT NULL,
  borrow_date DATE NOT NULL DEFAULT (CURRENT_DATE),
  return_date DATE NULL,
  CONSTRAINT fk_b_member FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE,
  CONSTRAINT fk_b_book FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE,
  CONSTRAINT fk_b_lib FOREIGN KEY (librarian_id) REFERENCES librarians(id) ON DELETE CASCADE
);

INSERT INTO books (title, author, year_published, status) VALUES
('Clean Code','Robert C. Martin',2008,'Available'),
('Introduction to Algorithms','Cormen et al.',2009,'Available'),
('The Pragmatic Programmer','Andrew Hunt',1999,'Borrowed');

INSERT INTO members (full_name, email) VALUES
('Ali Ahmed','ali@example.com'),
('Sara Omar','sara@example.com');

INSERT INTO librarians (full_name, staff_code) VALUES
('Hussam Mo','LB001'),
('Noura Saleh','LB002');
