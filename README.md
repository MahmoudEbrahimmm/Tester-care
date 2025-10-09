<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Tester Care API

The Tester Care API is a complete backend system designed to manage electronic device repair and maintenance operations.
It allows tracking of spare parts, managing repair orders, and organizing products and categories efficiently.
The system is built with Laravel following a clean RESTful architecture that makes it easy to integrate with web or mobile applications.

Project Overview

The system includes the following main sections:

Home
Provides a simple search for devices under repair using their ID.

Spares
Manages device repair and maintenance data.
Includes all CRUD operations such as adding, editing, deleting, and listing device records.

Orders
Handles customer orders for repair and maintenance services.
Tracks device status, repair cost, and customer information.

Products
Manages spare parts and items used in repairs.
Allows adding, updating, or deleting products, and linking them with categories.

Categories
Organizes products into logical groups for easier browsing and management.

API Endpoints

Home Endpoint:
GET /api/spares/search?query=
Used to search for a device record by its ID.

Spares Endpoint:
/api/spares
Used to manage all device repair records.

Orders Endpoint:
/api/orders
Used to manage customer repair orders.

Products Endpoint:
/api/products
Used to manage products and spare parts.

Categories Endpoint:
/api/categories
Used to manage and organize product categories.

Response Format

All API responses are returned in JSON format and contain three main parts:

Message that describes the result

Status code (for success or error)

Data field that contains the response body or null

Example:
The API will return a success message when data is found and a clear error message when no record exists.

Purpose

Tester Care API is developed for electronic repair centers to digitize and organize repair operations.
It helps in managing customers, tracking devices, storing spare part information, and monitoring repair progress.
It can be easily connected to any admin dashboard or mobile app for complete workflow management.

Technologies Used

Laravel Framework

PHP

MySQL Database

RESTful API Architecture

JSON Response Format

© 2025 Tester Care API
Developed by Mahmoud Ebrahim
