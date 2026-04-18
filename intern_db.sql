CREATE DATABASE IF NOT EXISTS intern_db;
USE intern_db;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users (name, email, password) VALUES
('Rahul', 'rahul@gmail.com', '1234'),
('Priya', 'priya@gmail.com', 'abcd'),
('Amit', 'amit@gmail.com', 'pass');
SELECT * FROM users;
UPDATE users 
SET name = 'Rahul Sharma'
WHERE id = 1;
DELETE FROM users 
WHERE id = 3;
SELECT * FROM users;