# Welcome to library management system!

This is a simple library management system created using PHP and MYSQL. 
 
### Features: 
1. Search and locate the book in the library
2. Request a book if it's not available in the library
3. Student Login:
   students can change their email and password, etc,
   students can see the books issued to them including the issued date and (to be returned) date
4. Librarian Dashboard: 
   librarian can see all the books, 
   librarian can see the books that has been issued (including to whom it is issued to, name of the book, issued date and return date),
   librarian can add a new book, remove a book and manage students/users,
   librarian can change password of his/her account 

## Installation

For now, only manual installation is supported which can be done by following ways:

 1. Download the zip file from [here](https://github.com/crquor/library_management_system/archive/refs/heads/main.zip) 
    
 2. Extract it and move it to htdocs folder ( for xampp users) and www folder (for WAMPP users)

 3. Make sure that your web server(Apache or nginx) and MySQL                      server is running

 4. Create a MYSQL database 

 5. Import the file with .sql extension into your database

  6. Navigate to the folder named "includes", you'll
        find a file named 'db.php'

 7. In that file, change the database server, username, password and username that matches  your database configuration

    
    **Finally, Go to http://localhost or 127.0.0.1**

### NOTE: 
The project is in the initial stage and no any security mechanisms has been implemented so it's **not** recommended to host this project.


