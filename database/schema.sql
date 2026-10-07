-- EcoTech Innovators Society Database Schema
-- Compatible with SQLite and MySQL / MariaDB

CREATE TABLE IF NOT EXISTS members (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name VARCHAR(150) NOT NULL,
    student_id VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    year_of_study VARCHAR(20) NOT NULL,
    department VARCHAR(100) NOT NULL,
    membership_type VARCHAR(50) NOT NULL,
    interests TEXT NOT NULL,
    statement TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contacts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
