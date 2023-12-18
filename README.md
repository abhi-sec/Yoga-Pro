# Yoga Class Registration System

This repository contains a simple web application for yoga class registration. The application is built using PHP for the server-side logic and HTML, CSS, and JavaScript for the front end. It includes functionality for user registration and payment processing.

## Table of Contents

- [ER Diagram]](#er-diagram)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Files and Structure](#files-and-structure)
- [Contributing](#contributing)
- [License](#license)

## ER Diagram

![ER Diagram]([images/your-er-diagram.png](https://drive.google.com/file/d/1SqXrqSNZyDbFQFr6uOHFn5KkRIYkrvm0/view?usp=sharing))

## Getting Started

Follow these instructions to set up and run the application locally.

### Prerequisites

- PHP installed on your local machine
- A web server (e.g., Apache) to serve the PHP files
- MySQL database server
- Web browser

### Installation

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/your-username/yoga-registration.git
    ```

2. Create a MySQL database and import the `database.sql` file to set up the necessary tables:

    ```bash
    mysql -u your-username -p your-database-name < database.sql
    ```

3. Update the `connection.php` file with your database credentials:

    ```php
    $servername = "localhost";
    $username = "your-username";
    $password = "your-password";
    $dbname = "your-database-name";
    ```

4. Configure your web server to serve the PHP files.

5. Open the application in your web browser:

    ```bash
    http://localhost/path-to-your-app/
    ```

## Usage

1. Access the web application in your browser.

2. Fill out the registration form with your details, including name, email, preferred batch, age, and date of birth.

3. Click the "Pay 500 & Register" button to submit the registration form and initiate the payment process.

4. You will be redirected to the payment page. Complete the payment process.

5. Upon successful payment, you will receive a confirmation message.

## Files and Structure

This section provides an overview of the files and directory structure of the Yoga Class Registration System.

- `index.html`: HTML file containing the registration form.
- `payment.html`: HTML file for the payment page.
- `api.php`: PHP script handling user registration.
- `payapi.php`: PHP script handling payment processing.
- `connection.php`: PHP script for establishing a database connection.
- `vendor/`: Directory containing external libraries and stylesheets.
- `css/`: Directory containing CSS styles for the user interface.
- `js/`: Directory containing JavaScript for form validation and AJAX requests.

## Contributing

If you'd like to contribute to this project, please follow the standard GitHub fork and pull request workflow.

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push your changes to your fork.
5. Submit a pull request.

## License

This project is licensed under the MIT License - see the LICENSE.md file for details.
