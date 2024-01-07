CREATE TABLE BANK (
  Cust_Name VARCHAR(40),
  Cust_Address VARCHAR(40)
);
CREATE TABLE BRANCH (
  Name VARCHAR(40) NOT NULL,
  Branch_ID VARCHAR(10) PRIMARY KEY,
  State VARCHAR(40),
  City VARCHAR(40),
  StreetNumber INT,
  ZipCode VARCHAR(10),
  Employee_SSN VARCHAR(20) UNIQUE,
  ManagerSSN VARCHAR(20) UNIQUE,
  AssistantManagerSSN VARCHAR(20) UNIQUE
);
CREATE TABLE EMPLOYEE (
  Name VARCHAR(40),
  SSN VARCHAR(20) PRIMARY KEY,
  S_Date DATE,
  Phone_Number VARCHAR(20),
  LengthOfEmployment INT,
  Branch_ID VARCHAR(10),
  FOREIGN KEY (Branch_ID) REFERENCES BRANCH(Branch_ID)
);
CREATE TABLE CUSTOMER (
  Name VARCHAR(40),
  SSN VARCHAR(20) PRIMARY KEY,
  State VARCHAR(40),
  City VARCHAR(40),
  StreetNumber INT,
  ZipCode VARCHAR(10),
  ApartmentNumber INT,
  Personal_Banker_SSN VARCHAR(20) UNIQUE,
  FOREIGN KEY (Personal_Banker_SSN) REFERENCES EMPLOYEE(SSN)
);

CREATE TABLE TRANSACTIONS (
  Name VARCHAR(40),
  DateHour DATETIME NOT NULL,
  Uniq_Code VARCHAR(20)NOT NULL PRIMARY KEY,
  Amount DECIMAL(10,2) NOT NULL,
  Type VARCHAR(40),
  Account_Number INT,
  FOREIGN KEY(Account_Number) REFERENCES ACCOUNT(Account_Number)
);
CREATE TABLE ACCOUNT (
  Account_Number INT NOT NULL PRIMARY KEY,
  Date_Accessed DATETIME,
  Balance DECIMAL(10,2) NOT NULL
);
ALTER TABLE ACCOUNT
MODIFY COLUMN Account_Number BIGINT;
CREATE TABLE SAVINGS(
  Account_Number INT PRIMARY KEY NOT NULL,
  Fixed_Interest_Rate DECIMAL (10,4),
  FOREIGN KEY (Account_Number) REFERENCES ACCOUNT(Account_Number)
);
CREATE TABLE LOAN (
  Loan_Number INT PRIMARY KEY,
  Amount DECIMAL(10,2) NOT NULL,
  Monthly_Repayment DECIMAL(10,2) NOT NULL,
  Branch_ID VARCHAR(10) UNIQUE,
  Customer_SSN VARCHAR(20) UNIQUE,
  Account_Number INT UNIQUE,
  FOREIGN KEY (Branch_ID) REFERENCES BRANCH(Branch_ID),
  FOREIGN KEY (Customer_SSN) REFERENCES CUSTOMER(SSN),
  FOREIGN KEY (Account_Number) REFERENCES ACCOUNT(Account_Number)
);


CREATE TABLE USER (
  Customer_SSN VARCHAR(20) PRIMARY KEY,
  Username VARCHAR(40) UNIQUE,
  PasswordHash VARCHAR(255) NOT NULL,
  FOREIGN KEY (Customer_SSN) REFERENCES CUSTOMER(SSN)
);


INSERT INTO USER (Customer_SSN, Username, PasswordHash)
VALUES
  ('938-18-3499', 'BritneyUser', 'hashed_password_1'),
  ('912-38-9335', 'ConnorUser', 'hashed_password_2'),
  ('833-99-2934', 'EmilyUser', 'hashed_password_3'),
  ('283-19-9413', 'AaronUser', 'hashed_password_4'),
  ('212-99-4882', 'DallasUser', 'hashed_password_5');

INSERT INTO BANK
VALUES('John Smith', '123 Maple Drive, Newark, NJ'),
      ('Jane Smith', '42 Wilsey Street, Newark, NJ'),
      ('John Doe', '154 Summit Street, Newark, NJ'),
      ('Jane Doe', '150 Bleeker Street, Newark, NJ'),
      ('Ashley Smith', '74 Martin Luther King Blvd, Newark, NJ');
INSERT INTO BRANCH
VALUES('Maplewood', 'M130', 'New Jersey', 'Maplewood', 12, '02890', '121-11-1211', '012-34-5678', '123-45-6789'),
      ('Newark', 'N913', 'New Jersey', 'Newark', 245, '04820', '122-12-1212', '345-67-8901', '456-78-90-1234'),
      ('Springfield', 'S231', 'New Jersey', 'Springfield', 1038, '07942', '123-13-1213', '567-89-0123', '678-90-1234'),
      ('Easton', 'E383', 'New Jersey', 'Easton', 492, '04829', '124-14-1214', '789-01-2345', '890-12-3456'),
      ('Brooklyn', 'B173', 'New York', 'Brooklyn', 71, '02849', '125-15-1215', '901-23-4567', '012-34-5678');
INSERT INTO CUSTOMER
VALUES('Aaron Pear', '283-19-9413', 'New Jersey', 'Maplewood', 134, '23884', 9, '139-39-2940'),
      ('Britney Orange', '938-18-3499', 'New Jersey', 'Newark', 3, '10399', 59, '188-29-9019'),
      ('Connor Apple', '912-38-9335', 'New Jersey', 'Wildwood', 29, '92842', 42, '928-38-1345'),
      ('Dallas Kiwi', '212-99-4882', 'New Jersey', 'Cape May', 34, '20943', 18, '182-39-1933'),
      ('Emily Biscoff', '833-99-2934', 'New Jersey', 'Burlington', 93, '02848', 104, '142-23-1830');
      
UPDATE CUSTOMER
SET SSN = '938-18-3499' 
WHERE SSN = '-2579'; 
      
INSERT INTO EMPLOYEE
VALUES('Michael Pomoy', '142-23-1830', '2015-02-13', '842-545-2582', 8, 'B173'),
      ('Michelle Ripa', '182-39-1933', '2000-12-01', '973-133-2491', 23, 'S231'),
      ('Mitchell Warel', '928-38-1345', '2012-11-11', '212-639-2940', 11, 'N913'),
      ('Maxwell Lake', '188-29-9019', '2019-02-14', '610-138-3930', 4, 'E383'),
      ('Microphone Hamy', '139-39-2940', '2021-03-24', '201-000-1212', 2, 'M130');
INSERT INTO LOAN
VALUES(3918, 20000.00, 300.00, 'N913', '938-18-3499', 4120001),
      (9284, 20000.00, 300.00, 'M130', '212-99-4882', 4120002),
      (2408, 100000.00, 650.00, 'E383', '912-38-9335', 4120003),
      (1234, 5500.00, 150.00, 'B173', '283-19-9413', 4120004),
      (5824, 3040.00, 400.00, 'S231', '833-99-2934', 4120005);
INSERT INTO ACCOUNT
VALUES(4120001, '2022-01-24 14:23:19', 100.23),
      (4120002, '2023-01-24 09:05:51', 15.00),
      (4120003, '2021-12-12 12:53:34', 200.00),
      (4120004, '2023-04-18 15:44:35', 42.32),
      (4120005, '2022-03-09 09:12:29', 98.43);
INSERT INTO SAVINGS
VALUES(4120001, 3.275),
      (4120002, 0.03),
      (4120003, 3.00),
      (4120004, 1.65),
      (4120005, 0.025);  
INSERT INTO TRANSACTIONS
VALUES 
  ('AMC MovieTHRTE', '2023-10-29 15:29:39', '1234567890', 12.49, 'Withdraw', 4120001),
  ('NJITPaystub', '2023-11-10 00:00:52', '2345678901', 735.24, 'Deposit', 4120002),
  ('ToyotaNewark', '2022-04-21 13:56:08', '3456789012', 79.99, 'Withdraw', 4120003),
  ('Birthday', '2023-07-27 18:01:23', '4567890123', 500.00, 'Deposit', 4120004),
  ('NJTRANSIT', '2023-01-03 05:49:24', '5678901234', 5.25, 'Withdraw', 4120005);
  
