The "Simple Banking System Using PHP and MySQL" is a web-based application designed to provide basic banking functionality for users. 
It allows users to sign up for accounts, log in, and perform common banking operations such as viewing account information, making transactions, and more.
Here's an overview of its key features:
User Registration: Users can sign up for accounts by providing their personal information, including their name, Social Security Number (SSN), state, city, street number, zip code, apartment number, username, and password.
The system generates a random Account Number and assigns a random Personal Banker's SSN from available employee SSNs.
User Authentication: Registered users can securely log in to their accounts using their username and password.
User Dashboard: Upon logging in, users are presented with a dashboard that displays their account information, including their name, account number, and assigned personal banker. The dashboard also provides access to various banking functionalities.
Transaction History: Users can view their transaction history, which includes details such as date and time of transactions, transaction type (deposit or withdrawal), amount, and a unique code for each transaction.
Adding Transactions: Users can add new transactions to their accounts, specifying the date and time, amount, transaction type (deposit or withdrawal), and a unique code for reference.
Logout: Users can log out of their accounts to ensure the security of their banking information.
Database Integration: The system utilizes a MySQL database to store user information, transaction records, and employee details. It establishes database connections, prepares SQL queries, and securely handles user data.
Security: The system incorporates basic security measures, such as password hashing, to protect user credentials. Passwords are hashed before storing them in the database to enhance security.
Employee Management: The system assigns a random Personal Banker's SSN to each user, creating a link between customers and employees. This connection allows customers to know their assigned personal banker.
User-Friendly Interface: The web interface is designed for simplicity and ease of use, making it accessible to a wide range of users.


![Screenshot 2024-01-06 215512](https://github.com/jesicarana24/Banking-System/assets/146164537/dede4c1a-dbe8-408b-8b05-eb19f432e3cf)
