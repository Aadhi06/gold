CREATE DATABASE gold_buying;

USE gold_buying;

CREATE TABLE gold_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    goldType VARCHAR(50) NOT NULL,
    weight FLOAT NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
