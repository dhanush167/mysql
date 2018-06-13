
 /* ================================================================ */
 /*  Creating Databases and Tables -------------------------------------- */
 /* ================================================================ */






show databases;

<!--CREATE DATABASE database_name;-->

CREATE DATABASE soap_store;

<!-- To drop a database -->

DROP DATABASE database_name;

DROP DATABASE hello_world_db;

<!--  Using Databases-->


USE database name;

USE dog_walking_app;

SELECT database();

<!-- CODE Creating Your Own Tables-->

CREATE TABLE tablename
(
    column_name data_type,
    column_name data_type
);


CREATE TABLE cats
(
    name VARCHAR(100),
    age INT
);


<!-- How Do We Know It Worked.html-->

SHOW COLUMNS FROM tablename;


<!--Dropping Tables.html-->


DROP TABLE tablename;

DROP TABLE cats;



<!-- Creating Your Own Tables Challenge-->

CREATE TABLE pastries
(
name VARCHAR(100),
quantity INT
);



SHOW TABLES;

DESC pastries;

DROP TABLE pastries;








 /* ================================================================ */
 /*  Inserting Data and a couple other things -------------------------------------- */
 /* ================================================================ */



<!-- Inserting Data.html-->

 INSERT INTO table_name(column_name) VALUES (data);

 INSERT INTO cats(name, age) VALUES ('Jetson', 7);


<!-- Super Quick Intro To SELECT-->

 SELECT * FROM cats;

<!-- Multiple Insert-->

 INSERT INTO table_name
 (column_name, column_name)
 VALUES      (value, value),
 (value, value),
 (value, value);


 INSERT INTO cats
 (name, age)
 VALUES      ('peanut', 2),
 ('butter', 4),
 ('jelly', 10 );


 CREATE TABLE people
 (
 first_name VARCHAR(20),
 last_name VARCHAR(20),
 age INT
 );


 INSERT INTO people(first_name, last_name, age)
 VALUES ('Tina', 'Belcher', 13);



 INSERT INTO people(age, last_name, first_name) VALUES (42, 'Belcher', 'Bob');




 INSERT INTO people(first_name, last_name, age) VALUES('Linda', 'Belcher', 45),('Phillip', 'Frond', 38),('Calvin', 'Fischoeder', 70);



 DROP TABLE people;

 SELECT * FROM people;

 show tables;



 <!-- NULL and NOT NULL-->


INSERT INTO cats(name) VALUES('Alabama');

SELECT * FROM cats;

Try inserting a nameless and ageless cat:

INSERT INTO cats() VALUES();

Define a new cats2 table with NOT NULL constraints:

CREATE TABLE cats2
  (
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL
  );

DESC cats2;

INSERT INTO cats2(name) VALUES('Texas');

 View the new warnings:

 SHOW WARNINGS;

SELECT * FROM cats2;


Do the same for a nameless cat:

INSERT INTO cats2(age) VALUES(7);

SHOW WARNINGS;


 <!-- Setting Default Values-->




    CREATE TABLE cats3
  (
    name VARCHAR(20) DEFAULT 'no name provided',
    age INT DEFAULT 99
  )



 Notice the change when you describe the table:

DESC cats3;


Insert a cat without a name:


INSERT INTO cats3(age) VALUES(13);

Or a nameless, ageless cat

INSERT INTO cats3() VALUES();

Combine NOT NULL and DEFAULT:

CREATE TABLE cats4
  (
    name VARCHAR(20) NOT NULL DEFAULT ‘unnamed’,
    age INT NOT NULL DEFAULT 99
  );

Notice The Difference:


INSERT INTO cats() VALUES();

SELECT * FROM cats;

INSERT INTO cats3() VALUES();

SELECT * FROM cats3;

INSERT INTO cats3(name, age) VALUES('Montana', NULL);

SELECT * FROM cats3;

INSERT INTO cats4(name, age) VALUES('Cali', NULL);



 <!-- A Primer on Primary Keys-->

Primary Keys
Define a table with a PRIMARY KEY constraint:


CREATE TABLE unique_cats
  (
    cat_id INT NOT NULL,
    name VARCHAR(100),
    age INT,
    PRIMARY KEY (cat_id)
  );


DESC unique_cats;

Insert some new cats:

INSERT INTO unique_cats(cat_id, name, age) VALUES(1, 'Fred', 23);

INSERT INTO unique_cats(cat_id, name, age) VALUES(2, 'Louise', 3);

INSERT INTO unique_cats(cat_id, name, age) VALUES(1, 'James', 3);

 Notice what happens

SELECT * FROM unique_cats;

Adding in AUTO_INCREMENT:

CREATE TABLE unique_cats2 (
    cat_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    age INT,
    PRIMARY KEY (cat_id)
);

INSERT a couple new cats:


INSERT INTO unique_cats2(name, age) VALUES('Skippy', 4);
INSERT INTO unique_cats2(name, age) VALUES('Jiff', 3);
INSERT INTO unique_cats2(name, age) VALUES('Jiff', 3);
INSERT INTO unique_cats2(name, age) VALUES('Jiff', 3);
INSERT INTO unique_cats2(name, age) VALUES('Skippy', 4);

Notice the difference:

SELECT * FROM unique_cats2;



<!-- Constraints Exercise Solution-->

Table Constraints Exercise Solution

 Defining The employees table:

CREATE TABLE employees (
    id INT AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255),
    age INT NOT NULL,
    current_status VARCHAR(255) NOT NULL DEFAULT 'employed',
    PRIMARY KEY(id)
);


Another way of defining a primary key:

 CREATE TABLE employees (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255),
    age INT NOT NULL,
    current_status VARCHAR(255) NOT NULL DEFAULT 'employed'
);

INSERT INTO employees(first_name, last_name, age)
 VALUES ('Dora', 'Smith', 58);



 /* ================================================================ */
 /*  CRUD commmands -------------------------------------- */
 /* ================================================================ */


<!--Preparing Our Data-->


  Preparing Our Data
  Let's drop the existing cats table:



DROP TABLE cats;


Recreate a new cats table:

CREATE TABLE cats
  (
     cat_id INT NOT NULL AUTO_INCREMENT,
     name   VARCHAR(100),
     breed  VARCHAR(100),
     age    INT,
     PRIMARY KEY (cat_id)
  );


DESC cats;


And finally insert some new cats:


INSERT INTO cats(name, breed, age)
VALUES ('Ringo', 'Tabby', 4),
       ('Cindy', 'Maine Coon', 10),
       ('Dumbledore', 'Maine Coon', 11),
       ('Egg', 'Persian', 4),
       ('Misty', 'Tabby', 13),
       ('George Michael', 'Ragdoll', 9),
       ('Jackson', 'Sphynx', 7);


 <!-- Official Introduction to SELECT-->

SELECT * FROM cats;

SELECT name FROM cats;

SELECT age FROM cats;

SELECT cat_id FROM cats;

SELECT name, age FROM cats;

SELECT cat_id, name, age FROM cats;

SELECT age, breed, name, cat_id FROM cats;

SELECT cat_id, name, age, breed FROM cats;


 <!-- Introduction to WHERE-->

 Introduction to WHERE

 Select by age:

 SELECT * FROM cats WHERE age=4;

 Select by name:

 SELECT * FROM cats WHERE name='Egg';

 SELECT * FROM cats WHERE name='egG';

 <!-- SELECT Challenges Solution-->

 Select Challenges Solution

 SELECT cat_id FROM cats;

 SELECT name, breed FROM cats;

 SELECT name, age FROM cats WHERE breed='Tabby';

 SELECT cat_id, age FROM cats WHERE cat_id=age;

 SELECT *  FROM cats WHERE cat_id=age;


<!--Introduction to Aliases-->

ELECT cat_id AS id, name FROM cats;

SELECT name AS 'cat name', breed AS 'kitty breed' FROM cats;

DESC cats;


<!-- The UPDATE Command-->

UPDATE cats SET breed='Shorthair' WHERE breed='Tabby';

Another update

UPDATE cats SET age=14 WHERE name='Misty';

<!--UPDATE Challenges Solution-->


SELECT * FROM cats WHERE name='Jackson';

UPDATE cats SET name='Jack' WHERE name='Jackson';

SELECT * FROM cats WHERE name='Jackson';

SELECT * FROM cats WHERE name='Jack';

SELECT * FROM cats WHERE name='Ringo';

UPDATE cats SET breed='British Shorthair' WHERE name='Ringo';

SELECT * FROM cats WHERE name='Ringo';

SELECT * FROM cats;

SELECT * FROM cats WHERE breed='Maine Coon';

UPDATE cats SET age=12 WHERE breed='Maine Coon';

SELECT * FROM cats WHERE breed='Maine Coon';

<!--Introduction to DELETE-->

DELETE FROM cats WHERE name='Egg';

SELECT * FROM cats;

SELECT * FROM cats WHERE name='egg';

DELETE FROM cats WHERE name='egg';

SELECT * FROM cats;

DELETE FROM cats;



 /* ================================================================ */
 /* The World Of String Functions -------------------------------------- */
 /* ================================================================ */


 CREATE TABLE books
 (
 book_id INT NOT NULL AUTO_INCREMENT,
 title VARCHAR(100),
 author_fname VARCHAR(100),
 author_lname VARCHAR(100),
 released_year INT,
 stock_quantity INT,
 pages INT,
 PRIMARY KEY(book_id)
 );

 INSERT INTO books (title, author_fname, author_lname, released_year, stock_quantity, pages)
 VALUES
 ('The Namesake', 'Jhumpa', 'Lahiri', 2003, 32, 291),
 ('Norse Mythology', 'Neil', 'Gaiman',2016, 43, 304),
 ('American Gods', 'Neil', 'Gaiman', 2001, 12, 465),
 ('Interpreter of Maladies', 'Jhumpa', 'Lahiri', 1996, 97, 198),
 ('A Hologram for the King: A Novel', 'Dave', 'Eggers', 2012, 154, 352),
 ('The Circle', 'Dave', 'Eggers', 2013, 26, 504),
 ('The Amazing Adventures of Kavalier &amp; Clay', 'Michael', 'Chabon', 2000, 68, 634),
 ('Just Kids', 'Patti', 'Smith', 2010, 55, 304),
 ('A Heartbreaking Work of Staggering Genius', 'Dave', 'Eggers', 2001, 104, 437),
 ('Coraline', 'Neil', 'Gaiman', 2003, 100, 208),
 ('What We Talk About When We Talk About Love: Stories', 'Raymond', 'Carver', 1981, 23, 176),
 ("Where I'm Calling From: Selected Stories", 'Raymond', 'Carver', 1989, 12, 526),
 ('White Noise', 'Don', 'DeLillo', 1985, 49, 320),
 ('Cannery Row', 'John', 'Steinbeck', 1945, 95, 181),
 ('Oblivion: Stories', 'David', 'Foster Wallace', 2004, 172, 329),
 ('Consider the Lobster', 'David', 'Foster Wallace', 2005, 92, 343);


 <!-- Working With CONCAT-->



 SELECT author_fname, author_lname FROM books;

 CONCAT(x,y,z) // from slides

 CONCAT(column, anotherColumn) // from slides

 CONCAT(author_fname, author_lname)

 CONCAT(column, 'text', anotherColumn, 'more text')

 CONCAT(author_fname, '  ', author_lname)

 CONCAT(author_fname, author_lname); // invalid syntax

 SELECT CONCAT('Hello', 'World');

 SELECT CONCAT('Hello', '....', 'World');

 SELECT
 CONCAT(author_fname, '  ', author_lname)
 FROM books;

 SELECT
 CONCAT(author_fname, '  ', author_lname)
 AS 'full name'
 FROM books;

 SELECT author_fname AS first, author_lname AS last,
 CONCAT(author_fname, '  ', author_lname) AS full
 FROM books;

 SELECT author_fname AS first, author_lname AS last,
 CONCAT(author_fname, ', ', author_lname) AS full
 FROM books;

 SELECT CONCAT(title, '-', author_fname, '-', author_lname) FROM books;

 SELECT
 CONCAT_WS(' - ', title, author_fname, author_lname)
 FROM books;


 <!-- Introducing SUBSTRING-->

 SELECT SUBSTRING('Hello World', 1, 4);

 SELECT SUBSTRING('Hello World', 7);

 SELECT SUBSTRING('Hello World', 3, 8);

 SELECT SUBSTRING('Hello World', 3);

 SELECT SUBSTRING('Hello World', -3);

 SELECT SUBSTRING('Hello World', -7);

 SELECT title FROM books;

 SELECT SUBSTRING("Where I'm Calling From: Selected Stories", 1, 10);

 SELECT SUBSTRING(title, 1, 10) FROM books;

 SELECT SUBSTRING(title, 1, 10) AS 'short title' FROM books;

 SELECT SUBSTR(title, 1, 10) AS 'short title' FROM books;



 SELECT CONCAT
     (
         SUBSTRING(title, 1, 10),
         '...'
     )
 FROM books;






 source book_code.sql

 SELECT CONCAT
     (
         SUBSTRING(title, 1, 10),
         '...'
     ) AS 'short title'
 FROM books;

 source book_code.sql


 <!-- Introducing REPLACE.html-->

 SELECT REPLACE('Hello World', 'Hell', '%$#@');

 SELECT REPLACE('Hello World', 'l', '7');

 SELECT REPLACE('Hello World', 'o', '0');

 SELECT REPLACE('HellO World', 'o', '*');

 SELECT REPLACE('cheese bread coffee milk', ' ', ' and ');

 SELECT REPLACE(title, 'e ', '3') FROM books;

 SELECT CONCAT (SUBSTRING(title, 1, 10),'...') AS 'short title' FROM books;

 SELECT SUBSTRING(REPLACE(title, 'e', '3'), 1, 10) FROM books;

 SELECT SUBSTRING(REPLACE(title, 'e', '3'), 1, 10) AS 'weird string' FROM books;


 <!-- Using REVERSE-->

 SELECT REVERSE('Hello World');

 SELECT REVERSE('meow meow');

 SELECT REVERSE(author_fname) FROM books;

 SELECT CONCAT('woof', REVERSE('woof'));

 SELECT CONCAT(author_fname, REVERSE(author_fname)) FROM books;


 <!-- Working with CHAR LENGTH-->


 SELECT CHAR_LENGTH('Hello World');

 SELECT author_lname, CHAR_LENGTH(author_lname) AS 'length' FROM books;

 SELECT CONCAT(author_lname, ' is ', CHAR_LENGTH(author_lname), ' characters long') FROM books;


 <!-- Changing Case with UPPER and LOWER-->


 SELECT UPPER('Hello World');

 SELECT LOWER('Hello World');

 SELECT UPPER(title) FROM books;

 SELECT CONCAT('MY FAVORITE BOOK IS ', UPPER(title)) FROM books;

 SELECT CONCAT('MY FAVORITE BOOK IS ', LOWER(title)) FROM books;




 /* ================================================================ */
 /* Refining Our Selections -------------------------------------- */
 /* ================================================================ */


 INSERT INTO books
 (title, author_fname, author_lname, released_year, stock_quantity, pages) VALUES ('10% Happier', 'Dan', 'Harris', 2014, 29, 256),
 ('fake_book', 'Freida', 'Harris', 2001, 287, 428),
 ('Lincoln In The Bardo', 'George', 'Saunders', 2017, 1000, 367);


 <!-- Using DISTINCT.html-->

 SELECT author_lname FROM books;

 SELECT DISTINCT author_lname FROM books;

 SELECT author_fname, author_lname FROM books;

 SELECT DISTINCT CONCAT(author_fname,'  ', author_lname) FROM books;

 SELECT DISTINCT author_fname, author_lname FROM books;


 <!--Sorting Data with ORDER BY-->




 SELECT author_lname FROM books;

 SELECT author_lname FROM books ORDER BY author_lname;

 SELECT title FROM books;

 SELECT title FROM books ORDER BY title;
 SELECT author_lname FROM books ORDER BY author_lname DESC;(reverse order)

 SELECT released_year FROM books;

 SELECT released_year FROM books ORDER BY released_year;

 SELECT released_year FROM books ORDER BY released_year DESC;

 SELECT released_year FROM books ORDER BY released_year ASC;

 SELECT title, released_year, pages FROM books ORDER BY released_year;

 SELECT title, pages FROM books ORDER BY released_year;

 SELECT title, author_fname, author_lname
 FROM books ORDER BY 2;

 SELECT title, author_fname, author_lname
 FROM books ORDER BY 3;

 SELECT title, author_fname, author_lname
 FROM books ORDER BY 1;

 SELECT title, author_fname, author_lname
 FROM books ORDER BY 1 DESC;

 SELECT author_lname, title
 FROM books ORDER BY 2;

 SELECT author_fname, author_lname FROM books
 ORDER BY author_lname, author_fname;


 <!-- Using LIMIT.html-->



 SELECT title FROM books LIMIT 3;

 SELECT title FROM books LIMIT 1;

 SELECT title FROM books LIMIT 10;

 SELECT * FROM books LIMIT 1;

 SELECT title, released_year FROM books
 ORDER BY released_year DESC LIMIT 5;

 SELECT title, released_year FROM books
 ORDER BY released_year DESC LIMIT 1;

 SELECT title, released_year FROM books
 ORDER BY released_year DESC LIMIT 14;

 SELECT title, released_year FROM books
 ORDER BY released_year DESC LIMIT 0,5;

 SELECT title, released_year FROM books
 ORDER BY released_year DESC LIMIT 0,3;

 SELECT title, released_year FROM books
 ORDER BY released_year DESC LIMIT 1,3;

 SELECT title, released_year FROM books
 ORDER BY released_year DESC LIMIT 10,1;

 SELECT * FROM tbl LIMIT 95,18446744073709551615;

 SELECT title FROM books LIMIT 5;

 SELECT title FROM books LIMIT 5, 123219476457;

 SELECT title FROM books LIMIT 5, 50;


 <!-- Better Searches with LIKE-->

 SELECT title, author_fname FROM books WHERE author_fname LIKE '%da%';

 SELECT title, author_fname FROM books WHERE author_fname LIKE 'da%';

 SELECT title FROM books WHERE  title LIKE 'the';

 SELECT title FROM books WHERE  title LIKE '%the';

 SELECT title FROM books WHERE title LIKE '%the%';

 <!-- LIKE Part 2 More Wildcards-->


 SELECT title, stock_quantity FROM books;

 SELECT title, stock_quantity FROM books WHERE stock_quantity LIKE '____';

 SELECT title, stock_quantity FROM books WHERE stock_quantity LIKE '__';

 (235)234-0987 LIKE '(___)___-____'

 SELECT title FROM books;

 SELECT title FROM books WHERE title LIKE '%\%%'

 SELECT title FROM books WHERE title LIKE '%\_%'


 /* ================================================================ */
 /* The Magic of Aggregate Functions -------------------------------------- */
 /* ================================================================ */

 SELECT COUNT(*) FROM books;

 SELECT COUNT(author_fname) FROM books;

 SELECT COUNT(DISTINCT author_fname) FROM books;

 SELECT COUNT(DISTINCT author_lname) FROM books;

 SELECT COUNT(DISTINCT author_lname, author_fname) FROM books;

 SELECT title FROM books WHERE title LIKE '%the%';

 SELECT COUNT(*) FROM books WHERE title LIKE '%the%';



<!-- The Joys of Group By.html-->


 SELECT title, author_lname FROM books;

 SELECT title, author_lname FROM books
 GROUP BY author_lname
 SELECT author_lname, COUNT(*)
 FROM books GROUP BY author_lname;


 SELECT title, author_fname, author_lname FROM books;

 SELECT title, author_fname, author_lname FROM books GROUP BY author_lname;

 SELECT author_fname, author_lname, COUNT(*) FROM books GROUP BY author_lname;

 SELECT author_fname, author_lname, COUNT(*) FROM books GROUP BY author_lname, author_fname;

 SELECT released_year FROM books;

 SELECT released_year, COUNT(*) FROM books GROUP BY released_year;

 SELECT CONCAT('In ', released_year, '  ', COUNT(*), ' book(s) released') AS year FROM books GROUP BY released_year;




 <!-- MIN and MAX Basics-->

 SELECT MIN(released_year) FROM books;

 SELECT MIN(pages) FROM books;

 SELECT MAX(pages)FROM books;

 SELECT MAX(released_year)FROM books;

<!--
 SELECT MAX(pages),title,released_year FROM books;
 problem here
-->

 SELECT*FROM books WHERE pages=(SELECT MAX(pages)FROM books);

 SELECT title,pages FROM books WHERE pages=(SELECT MIN(pages)FROM books);

<!--same thing here with short time -->
<!--min pages-->
 SELECT * FROM books ORDER BY pages ASC LIMIT 1;
<!--max pages-->
 SELECT * FROM books ORDER BY pages DESC LIMIT 1;


<!-- Min and Max with Group By-->

 SELECT author_fname,author_lname,MIN(released_year) FROM books GROUP BY author_lname,author_fname;

 SELECT author_fname,author_lname,MIN(released_year)FROM books GROUP BY author_lname;

 SELECT CONCAT(author_fname, ' ',author_lname ) as author, MAX(pages) AS 'longest book' FROM books GROUP BY author_lname,author_fname;


<!-- The Sum Function-->

 SELECT SUM(pages)FROM books;

 SELECT SUM(released_year)FROM books;


<!--The Avg Function-->

 SELECT AVG(released_year) FROM books;

//calculate the average stock quantity for books released in the same year

 SELECT AVG(stock_quantity)FROM books GROUP BY released_year;






 /* ================================================================ */
 /* Revisiting Data Types -------------------------------------- */
 /* ================================================================ */


 <!-- CHAR and VARCHAR-->

 CREATE TABLE dogs(name CHAR(5),breed varchar(10));

 INSERT INTO dogs(name,breed) VALUES('bob','beagle');

 INSERT INTO dogs(name,breed)VALUES('princejane','retriver');


<!-- DECIMAL-->


<!--best data type for price is DECIMAL-->
<!--best data type for date and time is TIMESTAMP -->
<!--best data type for id is INT-->
<!--best data type for phone number string and varchar-->


 CREATE TABLE items(price DECIMAL(5,2));

 INSERT INTO items(price) VALUES(754.7544554);




<!-- FLOAT and DOUBLE-->

Store Large numbers using less space
CREATE TABLE thing(price FLOAT);
INSERT INTO thing(price) VALUES(88.45);


 FLOAT-7 digits
 DOUBLE-15 digits


<!--Creating Our DATE data-->

 CREATE TABLE rooby(
 name varchar(100),
 birthdate date,
 birthtime time,
 birthdt datetime
 );



 INSERT INTO rooby(name,birthdate,birthtime,birthdt)
 VALUES
 ('padma','1983-11-12','10:07:35','1983-11-14');


<!-- Formatting Dates-->

 SELECT name,birthdate FROM rooby;

 SELECT name,day(birthdate) FROM rooby;

 SELECT name,birthdate,day(birthdate) FROM rooby;


<!-- Date Math-->
1)DATEDIFF

 SELECT name,birthdate,DATEDIFF(NOW(),birthdate) FROM rooby;

<!-- Working with TIMESTAMPS-->

 CREATE TABLE luthera(content varchar(100),create_at timestamp);

 INSERT INTO luthera (content)VALUES('i found this offensive');

 INSERT INTO luthera (content)VALUES('uls_sks');

 INSERT INTO luthera(content)VALUES('oopsk');

 SELECT*FROM luthera ORDER BY create_at;
 SELECT*FROM luthera ORDER BY create_at DESC;




 /* ================================================================ */
 /* The Power of Logical Operators -------------------------------------- */
 /* ================================================================ */

 SELECT title,released_year FROM books WHERE released_year =2017;

 SELECT title FROM books  WHERE released_year !=2017;

 SELECT title,author_fname FROM books  WHERE author_lname='harris';

 SELECT title FROM books WHERE title LIKE 'w%';

 SELECT title FROM books WHERE title LIKE '%w%';
<!--Greater Than-->
 SELECT title FROM books WHERE title NOT LIKE 'w%';

<!-- Greater Than-->
 SELECT * FROM books WHERE released_year>2000;

 SELECT * FROM books WHERE released_year>2014;

 SELECT title,released_year FROM books WHERE released_year >2000 ORDER BY released_year;
 SELECT title,released_year FROM books WHERE released_year >=2000 ORDER BY released_year;


<!-- Less Than-->

 SELECT title,released_year FROM books WHERE released_year < 2000 ORDER BY released_year;
 SELECT title,released_year FROM books WHERE released_year <= 2000 ORDER BY released_year;

 SELECT 3<-10; <!-- answer 0 -->
 SELECT -10<-9; <!-- answer 1 -->
 SELECT 42<=42;  <!-- answer 1 -->
 SELECT 'h'<'p'; <!-- answer 1 -->
 SELECT 'Q'<='q'; <!-- answer 1 -->


<!-- Logical AND // &&-->

 SELECT*FROM books WHERE author_lname ='Eggers' AND released_year>2010;

 SELECT*FROM books WHERE author_lname ='Eggers' && released_year>2010;

 SELECT 1 < 5 && 7 = 9;
 SELECT -10 > -20 && 0 <=0;

 SELECT title,author_lname,released_year FROM books WHERE author_lname='Eggers' && released_year > 2010 AND title LIKE '%novel%';


<!-- Logical OR-->

 SELECT * FROM books WHERE author_lname='Eggers' || released_year >2010;

 SELECT 40 <=100 || -2>0;
 SELECT 10>5 || 5=5;
 SELECT 'a'=5 || 3000 >2000;


<!--Between-->

 SELECT title,released_year FROM books WHERE released_year >=2004 && released_year <=2015;

 SELECT title,released_year FROM books WHERE released_year >=2004 && released_year <=2015;

 SELECT title,released_year FROM books WHERE released_year BETWEEN 2004 AND 2015;

 SELECT title,released_year FROM books WHERE released_year NOT BETWEEN 2004 AND 2015;

 SELECT title,released_year FROM books WHERE released_year NOT BETWEEN 2004 AND 2015 ORDER BY released_year;


<!--In And Not In.html-->

 SELECT title,author_lname FROM books WHERE author_lname='Carver' OR author_lname='Lahiri' OR author_lname='Smith';

 SELECT title,author_lname FROM books WHERE author_lname IN('Carver','Lahiri','Smith');

 SELECT title,released_year FROM books WHERE released_year IN(2017,1985);


 SELECT title,released_year FROM books
 WHERE released_year !=2000 AND
 released_year !=2002 AND
 released_year !=2002 AND
 released_year !=2004 AND
 released_year !=2006 AND
 released_year !=2008 AND
 released_year !=2010 AND
 released_year !=2012 AND
 released_year !=2014 AND
 released_year !=2016;



<!-- Case Statements-->


 SELECT title,released_year,
 CASE
 WHEN released_year >= 2000 THEN 'Modern Lit' ELSE '20th Century Lit'
 END AS GENRE
 FROM books;



 SELECT title, stock_quantity,
 CASE
 WHEN stock_quantity BETWEEN 0 AND 50 THEN '*'
 WHEN stock_quantity BETWEEN 51 AND 100 THEN '**'
 ELSE '***'
 END AS STOCK
 FROM books;



 /* ================================================================ */
 /* One To Many -------------------------------------- */
 /* ================================================================ */



<!--
Working With Foreign Keys
Schema diagram(skeema)
-->

 Relationship Basics

 1)One to One Relationship
 2)One to Many Relationship
 3)Many to Many Relationship


 CREATE TABLE customers(
 id INT AUTO_INCREMENT PRIMARY KEY,
 first_name VARCHAR(100),
 last_name VARCHAR(100),
 email VARCHAR(100)
 );
 <!--
    INSERT INTO customers (first_name, last_name, email)
     VALUES ('Boy', 'George', 'george@gmail.com'),
       ('George', 'Michael', 'gm@gmail.com'),
       ('David', 'Bowie', 'david@gmail.com'),
       ('Blue', 'Steele', 'blue@gmail.com'),
       ('Bette', 'Davis', 'bette@aol.com');
 -->
 CREATE TABLE orders(
 id INT AUTO_INCREMENT PRIMARY KEY,
 order_date DATE,
 amount DECIMAL(8,2),
 customers_id INT,
 FOREIGN KEY(customers_id) REFERENCES customers(id)
 );

<!--
INSERT INTO orders (order_date, amount, customers_id)
VALUES ('2016/02/10', 99.99, 1),
       ('2017/11/11', 35.50, 1),
       ('2014/12/12', 800.67, 2),
       ('2015/01/03', 12.50, 2),
       ('1999/04/11', 450.25, 5);
-->



<!-- Cross Joins-->
 SELECT id FROM customers
 WHERE last_name='George';<!--answer 1-->



 SELECT*FROM orders WHERE customers_id =
 (
 SELECT id FROM customers
 WHERE last_name='George'
 );

 SELECT*FROM orders WHERE customers_id =1;

 SELECT*FROM customers,orders;

 SELECT*FROM customers,orders WHERE customers.id=orders.customers_id;

 SELECT first_name,last_name,order_date,amount
 FROM customers,orders
 WHERE customers.id=orders.customers_id;

 <!--Inner Joins-->
 SELECT*FROM customers JOIN orders ON customers.id=orders.customers_id;

 SELECT first_name,last_name,order_date,amount
 FROM customers JOIN orders ON customers.id=orders.customers_id;


 SELECT first_name,last_name,order_date,amount
 FROM customers JOIN orders ON customers.id=orders.customers_id ORDER BY amount;

 SELECT first_name,last_name,order_date,amount
 FROM customers JOIN orders ON customers.id=orders.customers_id GROUP BY orders.customers_id;

 SELECT * FROM customers JOIN orders ON customers.id=orders.customers_id GROUP BY orders.customers_id;


 SELECT first_name,last_name,order_date,SUM(amount)AS totalspent FROM customers JOIN orders ON customers.id=orders.customers_id GROUP BY orders.customers_id;

 SELECT first_name,last_name,order_date,SUM(amount)AS totalspent FROM customers JOIN orders ON customers.id=orders.customers_id GROUP BY orders.customers_id ORDER BY totalspent DESC;

 SELECT*FROM customers INNER JOIN orders
 ON customers_id=orders.customers_id;

 <!--Left Joins.html-->

 SELECT*FROM customers LEFT JOIN orders ON customers.id=orders.customers_id;

 SELECT first_name,last_name,order_date,amount FROM customers LEFT JOIN orders on customers.id=orders.customers_id;

 SELECT first_name,last_name,order_date,amount FROM customers LEFT JOIN orders on customers.id=orders.customers_id GROUP BY customers.id;

 SELECT first_name,last_name,order_date,SUM(amount) FROM customers LEFT JOIN orders on customers.id=orders.customers_id GROUP BY customers.id;

 SELECT first_name,last_name,order_date,IFNULL(SUM(amount),0) FROM customers LEFT JOIN orders on customers.id=orders.customers_id GROUP BY customers.id;

 SELECT first_name,last_name,order_date,IFNULL(SUM(amount),0) AS total_spent FROM customers LEFT JOIN orders on customers.id=orders.customers_id GROUP BY customers.id ORDER BY total_spent;


<!-- Right Joins Part -->

 SELECT*FROM customers RIGHT JOIN orders ON customers.id=orders.customers_id;


 CREATE TABLE customers(
 id INT AUTO_INCREMENT PRIMARY KEY,
 first_name VARCHAR(100),
 last_name VARCHAR(100),
 email VARCHAR(100)
 );


 CREATE TABLE orders(
 id INT AUTO_INCREMENT PRIMARY KEY,
 order_date DATE,
 amount DECIMAL(8,2),
 customers_id INT
 );



 INSERT INTO orders(order_date,amount,customers_id)
 VALUES('2017/11/05',23.45,45),
 (CURDATE(),777.77,109);


 SELECT first_name,last_name,order_date,amount FROM customers RIGHT JOIN orders on customers.id=orders.customers_id;

 SELECT first_name,last_name,order_date,amount FROM customers RIGHT JOIN orders on customers.id=orders.customers_id ORDER BY first_name;

 SELECT first_name,last_name,order_date,amount FROM customers RIGHT JOIN orders on customers.id=orders.customers_id ORDER BY customers_id;

 SELECT first_name,last_name,order_date,amount,SUM(amount) FROM customers RIGHT JOIN orders on customers.id=orders.customers_id GROUP BY customers_id;


<!--ON DELETE CASCADE-->

 CREATE TABLE customers(
 id INT AUTO_INCREMENT PRIMARY KEY,
 first_name VARCHAR(100),
 last_name VARCHAR(100),
 email VARCHAR(100)
 );
 CREATE TABLE orders(
 id INT AUTO_INCREMENT PRIMARY KEY,
 order_date DATE,
 amount DECIMAL(8,2),
 customers_id INT,
 FOREIGN KEY(customers_id)
 REFERENCES customers(id)
 ON DELETE CASCADE
 );


 INSERT INTO customers (first_name, last_name, email)
 VALUES ('Boy', 'George', 'george@gmail.com'),
 ('George', 'Michael', 'gm@gmail.com'),
 ('David', 'Bowie', 'david@gmail.com'),
 ('Blue', 'Steele', 'blue@gmail.com'),
 ('Bette', 'Davis', 'bette@aol.com');

 INSERT INTO orders (order_date, amount, customers_id)
 VALUES ('2016/02/10', 99.99, 1),
 ('2017/11/11', 35.50, 1),
 ('2014/12/12', 800.67, 2),
 ('2015/01/03', 12.50, 2),
 ('1999/04/11', 450.25, 5);

 DELETE FROM customers WHERE email='gm@gmail.com';


 /* ================================================================ */
 /* Many To Many -------------------------------------- */
 /* ================================================================ */














































































































