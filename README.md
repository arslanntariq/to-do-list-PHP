# To-Do List App

This simple To-Do List application is built using PHP and MySQL. It allows users to add, delete, and mark tasks as completed. The application has a clean and user-friendly interface.

## Features
- **Add Task:** Users can add a new task by entering the task description in the input field and clicking the "Add" button.

- **Mark as Completed:** Tasks can be marked as completed by checking the checkbox next to each task. Completed tasks are displayed with a strikethrough.

- **Delete Task:** Users can delete a task by clicking the "Delete" link next to each task.

## Setup

1. **Database Configuration:** Make sure to configure your database connection in the `index.php` file. Update the following line with your database details:

    ```php
    $conn = mysqli_connect('localhost', 'YourUsername', 'YourPassword', 'your_database_name');
    ```

2. **Database Table:** Create a table named `tasks` in your database with the following fields:
   - `id` (auto-incremented primary key)
   - `task` (varchar)
   - `completed` (boolean)

   You can use the following SQL query to create the table:

    ```sql
    CREATE TABLE tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        task VARCHAR(255) NOT NULL,
        completed BOOLEAN DEFAULT 0
    );
    ```

## Screenshots
![To-Do List Screenshot]

## Usage
1. Open the `index.php` file in your web browser.
2. Add new tasks using the input field and "Add" button.
3. Mark tasks as completed by checking the checkboxes.
4. Delete tasks by clicking the "Delete" link.

Feel free to fork and modify this To-Do List app according to your needs!

## License
This project is licensed under the [MIT License](LICENSE).

**Note:** Ensure that you have PHP and a MySQL server installed and running on your machine before using this application.
