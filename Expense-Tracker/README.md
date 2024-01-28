https://github.com/g-gourav-r/Daily_Tasks/assets/75977813/d7cca414-1bbb-49a1-8c74-a835dca40845

# Expense Tracker

Expense Tracker is a simple web application designed to help users keep track of their expenses. It stores all expense data in a CSV file, making it easy to manage your financial records.

## How it Works

1. The web application utilizes a form to input expense details. Users can enter information about their expenses, including the expense name, amount, and date.

2. PHP code processes the data entered by the user. It parses the form submissions, creates an array to store the information, and then appends this data to a CSV file for future reference.

3. The application also includes a function to read the CSV file and display its contents on the screen. This allows users to view and review their expense history.

4. To ensure that previous entries are not duplicated when the form is refreshed, the application uses HTTP headers to refresh the page after a new entry is submitted. This prevents the inadvertent duplication of data.

## Getting Started

To use the Expense Tracker, follow these steps:

1. Clone the repository to your local machine.

2. Set up a web server with PHP support. You can use tools like XAMPP, MAMP, or any web server of your choice.

3. Place the Expense Tracker files on your web server.

4. Access the application through your web browser.

## Usage

1. Open the Expense Tracker in your web browser.

2. Enter your expense details in the provided form, including the expense name, amount, and date.

3. Submit the form to add a new expense entry. The application will refresh, preventing duplicate entries.
