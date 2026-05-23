CREATE DATABASE aura_fitness_db;
USE aura_fitness_db;

CREATE TABLE memberships (
    membership_id INT AUTO_INCREMENT PRIMARY KEY,
    membership_name VARCHAR(100) NOT NULL,
    duration VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    benefits TEXT
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    role ENUM('member', 'admin') DEFAULT 'member',
    membership_id INT,
    FOREIGN KEY (membership_id) REFERENCES memberships(membership_id)
);

CREATE TABLE trainers (
    trainer_id INT AUTO_INCREMENT PRIMARY KEY,
    trainer_name VARCHAR(100) NOT NULL,
    specialization VARCHAR(100),
    email VARCHAR(150),
    phone_number VARCHAR(20)
);

CREATE TABLE classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(100) NOT NULL,
    class_date DATE NOT NULL,
    class_time TIME NOT NULL,
    capacity INT NOT NULL,
    class_description TEXT,
    trainer_id INT,
    FOREIGN KEY (trainer_id) REFERENCES trainers(trainer_id)
);

CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    class_id INT NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    booking_status VARCHAR(50) DEFAULT 'Confirmed',
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (class_id) REFERENCES classes(class_id)
);

INSERT INTO memberships (membership_name, duration, price, benefits)
VALUES
('Basic', '1 Month', 49.99, 'Access to gym equipment'),
('Premium', '3 Months', 129.99, 'Gym access and group classes'),
('Elite', '6 Months', 249.99, 'Gym access, classes, and personal training discount');

INSERT INTO trainers (trainer_name, specialization, email, phone_number)
VALUES
('Sarah Johnson', 'Strength Training', 'sarah@aurafitness.com', '0400000001'),
('Michael Lee', 'Cardio Fitness', 'michael@aurafitness.com', '0400000002'),
('Amina Grace', 'Yoga and Pilates', 'amina@aurafitness.com', '0400000003');

INSERT INTO classes (class_name, class_date, class_time, capacity, class_description, trainer_id)
VALUES
('Morning Yoga', '2026-06-01', '08:00:00', 20, 'Relaxing yoga session for all levels', 3),
('HIIT Training', '2026-06-02', '18:00:00', 15, 'High intensity workout class', 2),
('Strength Basics', '2026-06-03', '17:30:00', 18, 'Beginner strength training session', 1),
('Pilates Core', '2026-06-04', '09:00:00', 16, 'Improve flexibility, posture and core strength', 3),
('Advanced Strength', '2026-06-05', '18:30:00', 12, 'Strength training using free weights and machines', 1),
('Boxing Fitness', '2026-06-06', '17:00:00', 20, 'Cardio boxing workout focused on endurance and coordination', 2),
('Functional Training', '2026-06-07', '10:00:00', 15, 'Full body workout designed to improve everyday movement and strength', 1),
('Spin Class', '2026-06-08', '06:30:00', 18, 'Indoor cycling session with music and resistance training', 2),
('Mobility and Recovery', '2026-06-09', '19:00:00', 20, 'Stretching and mobility exercises to improve flexibility and recovery', 3),
('Bootcamp Challenge', '2026-06-10', '18:00:00', 25, 'High energy circuit training class', 2),
('Women Strength Club', '2026-06-11', '17:30:00', 15, 'Strength and confidence focused training for women', 1),
('Elite Athlete Conditioning', '2026-06-12', '19:00:00', 10, 'Advanced conditioning program for experienced members', 2);