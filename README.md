# MySQL-Database-Interface

A simple web based database manager website 
put the files into your server folder and launch the login file at your localhost or any server that you saved the files on

## Description
This is a PHP-based web application designed to interface with your MySQL database system. It provides a simple and intuitive interface to view all databases and tables within your system. Additionally, it offers a 'Query' page where users can run custom SQL queries.

---

## Features

### Pages

1. **Login**
    - Login page enter your sql local username and password
      
     ![image](https://github.com/vishaljha1710/MySQL-Database-Interface/assets/77543816/064c19d1-21f3-4f80-9e7b-fe727889cf12)
2. **Home**
    - Displays a welcome message and a brief description of the application.
    - Provides links to the developer's social media profiles.
  
      ![image](https://github.com/vishaljha1710/MySQL-Database-Interface/assets/77543816/03e7d8a0-b261-4a1e-91a1-2bc21b690845)


2. **Navbar**
    - Contains a dropdown menu listing all databases in your MySQL system.

3. **Tables**
    - Opens up after selecting any database from the navbar.
    - Displays all tables within the selected database.

4. **Query**
    - Features a text box for users to enter custom SQL queries.
    - Displays the result of the query below the text box.
  
      ![image](https://github.com/vishaljha1710/MySQL-Database-Interface/assets/77543816/187e8e33-b555-4938-b0b1-039fef851ebf)


---

## Getting Started

### Prerequisites

- Web server with PHP support
- MySQL database

### Installation Steps

1. Clone the repository:
    ```bash
    git clone https://github.com/vishaljha1710/MySQL-Database-Interface.git
    ```

2. Import the SQL file provided (`database.sql`) to set up the necessary tables and data.

3. Update the database connection details in `config.php`:
    ```php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'username');
    define('DB_PASSWORD', 'password');
    define('DB_NAME', 'database_name');
    ```

4. Upload the project to your web server.

5. Navigate to the project URL to access the login page.

---

## Usage

1. **Login**
    - Access the application through the login page.
    - Enter the MySQL database credentials to connect.

2. **Home Page**
    - After successful login, you will be directed to the home page displaying the welcome message and description.

3. **Navbar**
    - Select a database from the dropdown menu to view its tables.

4. **Tables**
    - Click on any database from the navbar to view all tables within that database.

5. **Query**
    - Navigate to the 'Query' page from the navbar.
    - Enter a custom SQL query in the text box and click 'Run Query'.
    - View the result of the query displayed below the text box.


---

## Contributing

If you'd like to contribute to this project, please fork the repository and submit a pull request.

---

## License

This project is licensed under the MIT License. See `LICENSE` for more details.

---

## Contact

For any inquiries or support, please contact [Your Name](mailto:youremail@example.com).

