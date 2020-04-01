use netEscape;

CREATE TABLE bookings (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_id INT(11) NOT NULL,
status VARCHAR(30) NOT NULL,
begin_at DATETIME,
end_at DATETIME,
formula_name VARCHAR(255),
games_name VARCHAR(255),
booking_status VARCHAR(255)
);

CREATE TABLE comments (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11) NOT NULL,
formula_name VARCHAR(255) NOT NULL,
event_date DATETIME,
overall_rating INT(11),
comment VARCHAR(255),
feedback TINYINT(1),
jumanji INT(1),
voodoo INT(1),
assassin INT(1),
the_cabin INT(1)
);

CREATE TABLE contact_messages (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
object VARCHAR(255),
message VARCHAR(255),
date DATETIME,
email_validation TINYINT(1),
status VARCHAR(255),
answer_to_customer VARCHAR(255)
);

CREATE TABLE formulas (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description VARCHAR(255) NOT NULL,
nb_of_game INT(11),
price INT(11),
picture VARCHAR(255)
);

CREATE TABLE games (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description VARCHAR(255) NOT NULL,
duration INT(11),
player_min INT(11),
player_max INT(11),
picture VARCHAR(255)
);

CREATE TABLE image (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
image VARCHAR(255) NOT NULL,
updated_at DATETIME,
user_id INT(11),
event_date DATETIME,
formula_name VARCHAR(255)
);

CREATE TABLE users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255),
firstname VARCHAR(255),
lastname VARCHAR(255),
company VARCHAR(255),
phone_number VARCHAR(255),
delivery_adress VARCHAR(255),
invoice_adress VARCHAR(255),
roles TINYTEXT
);