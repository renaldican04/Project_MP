CREATE TABLE playstations (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
status ENUM('available','rented') DEFAULT 'available',
price_per_hour INT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE rentals (
id INT AUTO_INCREMENT PRIMARY KEY,
playstation_id INT,
user_name VARCHAR(100),
user_phone VARCHAR(30),
start_time DATETIME,
end_time DATETIME,
total_price INT,
status VARCHAR(20),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO playstations (name,status,price_per_hour) VALUES
('PlayStation 3', 'available', 5000),
('PlayStation 4', 'available', 8000),
('PlayStation 5', 'available', 12000);
