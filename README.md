# Tester Care API

Tester Care API is a comprehensive backend system designed to manage laptop repair and maintenance operations with an integrated online store. It provides full control over repair tickets, device tracking, invoices, spare parts, and product management in one unified solution. The system is built using the Laravel framework following a clean RESTful architecture, making it easily extendable for web or mobile integration.

## Project Overview

Tester Care API is developed for electronics repair centers that require an efficient digital workflow. It allows technicians and administrators to track customer repair requests, manage spare parts and inventory, and generate invoices automatically. This project is based on real business needs and is currently used in a working model for a client in the tech maintenance field.

## Core Features

### 1. Home Module

* Allows quick search for devices under repair using a unique tracking ID.
* Provides real-time access to device status and repair progress.

### 2. Spares Management

* Handles all data related to repair and maintenance.
* Includes adding, updating, deleting, and listing spare parts.
* Ensures accurate stock control and replacement tracking.

### 3. Orders Module

* Manages all repair and maintenance orders submitted by customers.
* Tracks device condition, repair cost, and related customer details.
* Provides complete visibility into ongoing and completed repairs.

### 4. Products Module

* Organizes spare parts and other store items used in repair operations.
* Supports CRUD operations and allows linking each product to a category.

### 5. Categories Module

* Groups products logically for easier navigation and management.
* Simplifies inventory handling and API filtering for clients or dashboards.

## API Architecture

The API is built on a clean RESTful structure to ensure scalability and ease of integration. All responses are returned in standard JSON format containing three main fields: message, status, and data.

### Available Endpoints

#### Home

`GET /api/spares/search?query=`
Used to search for a repair record or device by its tracking ID.

#### Spares

`GET /api/spares`
`POST /api/spares`
`PUT /api/spares/{id}`
`DELETE /api/spares/{id}`
Handles all operations related to spare part records.

#### Orders

`GET /api/orders`
`POST /api/orders`
`PUT /api/orders/{id}`
`DELETE /api/orders/{id}`
Manages repair orders and customer requests.

#### Products

`GET /api/products`
`POST /api/products`
`PUT /api/products/{id}`
`DELETE /api/products/{id}`
Handles product and spare part management.

#### Categories

`GET /api/categories`
`POST /api/categories`
`PUT /api/categories/{id}`
`DELETE /api/categories/{id}`
Organizes product categories for better filtering and display.

### Response Format Example

Every API response includes:

* **Message:** Human-readable result of the request
* **Status:** Numeric HTTP code (200 for success, 404 for not found, etc.)
* **Data:** Object containing response details or null if empty

Example scenario: When a device is found, the API returns its details and current repair status. If not found, it returns a clear message such as "No record found for this ID".

## Technical Details

**Built with:**

* Laravel Framework
* PHP
* MySQL Database
* RESTful API principles
* JSON data format

**Security:**
The system uses Laravel’s built-in security layers to protect API routes, validation logic, and data integrity. Access can be controlled through tokens or Sanctum for authenticated integrations.

## Postman Collection

A complete Postman workspace is available for developers to test and integrate the API. It includes all endpoints, sample requests, and responses.
**Access it here:**
[https://postman.co/workspace/My-Workspace~a5494b49-f2f4-4ec7-8258-cb72513fa45a/collection/38543342-ccd02da3-28cc-4fc7-9cb5-2c226f59bb00?action=share&creator=38543342&active-environment=38543342-c726f886-7fa0-4cfa-9fc7-2652def6791b](https://postman.co/workspace/My-Workspace~a5494b49-f2f4-4ec7-8258-cb72513fa45a/collection/38543342-ccd02da3-28cc-4fc7-9cb5-2c226f59bb00?action=share&creator=38543342&active-environment=38543342-c726f886-7fa0-4cfa-9fc7-2652def6791b)

## Live Demo

**Website:** [https://tester-company.rf.gd/](https://tester-company.rf.gd/)

## Purpose

Tester Care API aims to streamline operations in electronics repair shops by digitizing traditional workflows. It minimizes human errors, speeds up repair tracking, and provides accurate financial calculations for each repair or product sale. The system can easily be integrated into custom admin dashboards or mobile applications for complete service management.

## Author

**Developed by:** Mahmoud Ebrahim
**Role:** Backend Developer specialized in PHP and Laravel
**Website:** [https://mahmoud-ebrahim.gt.tc/](https://mahmoud-ebrahim.gt.tc/)

© 2025 Tester Care API. All rights reserved.
