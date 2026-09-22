-- Database setup for Inventory Management System
-- This database schema supports the DSA Final Project

-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS inventory_system;
USE inventory_system;

-- Create items table for product inventory
CREATE TABLE IF NOT EXISTS items (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT(11) NOT NULL
);

-- Create operations table for tracking inventory changes (Stack - LIFO)
CREATE TABLE IF NOT EXISTS operations (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    type ENUM('ADD', 'REMOVE') NOT NULL,
    item_id INT(11),
    item_name VARCHAR(255) NOT NULL,
    item_price DECIMAL(10,2) NOT NULL,
    item_quantity INT(11) NOT NULL,
    position INT(11),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create requests table for queue management (Queue - FIFO)
CREATE TABLE IF NOT EXISTS requests (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    type ENUM('RESTOCK', 'ORDER') NOT NULL,
    item_name VARCHAR(255) NOT NULL,
    quantity INT(11) NOT NULL,
    status ENUM('PENDING', 'PROCESSED') DEFAULT 'PENDING',
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data for initial setup
INSERT INTO items (name, price, quantity) VALUES
('Laptop', 1200.00, 15),
('Smartphone', 800.00, 25),
('Headphones', 150.00, 30),
('Monitor', 350.00, 10),
('Keyboard', 80.00, 40);

-- Create indexes for better query performance
CREATE INDEX idx_items_name ON items(name);
CREATE INDEX idx_requests_status ON requests(status);
CREATE INDEX idx_operations_type ON operations(type);