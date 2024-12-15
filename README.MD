# BookShelf

## 📚 Library for All | Share and Discover Books

**BookShelf** is a platform where users can upload books for sharing, and others can download these books for reading. By creating a simple and user-friendly interface, BookShelf promotes access to knowledge and encourages collaboration among book enthusiasts.

---

### Table of Contents

1. [Project Overview](#project-overview)
2. [Features](#features)
3. [Installation Guide](#installation-guide)
4. [How to Run](#how-to-run)
5. [Prerequisites](#prerequisites)
6. [Accessing the Platform](#accessing-the-platform)

---

## Project Overview

BookShelf is designed to make books accessible to everyone. Users can register, upload books in various formats, and share them with others. Readers can browse the library, download books of interest, and enjoy their reading experience.

---

## Features

- **User Registration & Authentication**: Secure login and signup for book contributors and readers.
- **Book Uploads**: Users can upload books with metadata such as title, author, and genre.
- **Library Search**: Browse and search for books by title, author, or genre.
- **Download Functionality**: Easy-to-use system for downloading books.

---

## Installation Guide

### Step 1: Clone the Repository
```bash
git clone https://github.com/username/bookshelf.git
cd bookshelf
```

### Step 2: Configure Database
1. Edit the database configuration file (`/configuration`).
2. Replace placeholders with your PostgreSQL database credentials:
   ```php
   'host' => '127.0.0.1',
   'port' => '5432',
   'database' => 'bookshelf_db',
   'username' => 'your_username',
   'password' => 'your_password'
   ```

### Step 3: Set Up Docker
1. Navigate to the `build` directory.
2. Use the following command to start the PostgreSQL server in a Docker container:
   ```bash
   docker-compose up -f build/docker-compose.yml --build
   ```

### Step 4: Run Migrations
Use **Phinx** to set up the database schema:
```bash
vendor/bin/phinx migrate
```

---

## How to Run

### Step 1: Start PHP Server
Start the PHP development server manually:
```bash
php -S localhost:8000
```

### Step 2: Verify PostgreSQL Container
Ensure the PostgreSQL Docker container is running. If it is not:
```bash
docker-compose up -f build/docker-compose.yml
```

---

## Prerequisites

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP (manually started), PostgreSQL (via Docker)
- **Database Migrations**: Phinx
- **Version Control**: Git

---

## Accessing the Platform

After completing the setup:

1. Open your browser and navigate to:
   ```
   http://localhost:8000/home
   ```
2. The BookShelf platform’s user interface will be accessible, allowing users to upload and download books seamlessly.

---

With BookShelf, sharing knowledge has never been easier. Start uploading, discovering, and enjoying books today!

