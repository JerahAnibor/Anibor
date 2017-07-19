# Anibor
Author: Jerahmeel Anibor
Email: jerahmeelanibor@gmail.com
Library URL: https://github.com/anibor
Facebook page URL: https://facebook.com/JerahAnibor
//

A PHP database library written in Object-Oriented Programming OOP approach to rapidly increase software development time and code neatness.

//
NOTE: 
SQL statements are passed as arameters
Values are stored in an array and also passed as parameters
//

//
HOW TO USE THIS LIBRARY
//
STEP 1 - RENAME DATABASE
Replace "anibor" with your database name in the anibor.php file
$dsn = 'mysql:host=localhost; dbname=anibor; charset=latin1';

STEP 2 - FILE INCLUSION
Include Anibor.php in your file: 
include_once 'Anibor.php';

STEP 3 - CLASS INSTANTIATION AND DATABASE CONNECTION
Make an instance of the anibor class:
anibor = new anibor();

Connect to database:
$db_connect = $anibor->db_connect();

STEP 4 - IMPLEMENTATION
Examples

Insert:// New entries. Inserts new records.
$value = array("Jerahmeel Anibor", "https"//github.com/anibor");
$anibor->tranzact("INSERT INTO table (full_name, github_url) VALUES (?, ?)", $value);

Update
// Update a table record in a particular field
$value = array("Jerahmeel Ovie Anibor", "https"//github.com/anibor");
$anibor->tranzact("UPDATE table SET full_name = ?, github_url = ?", $value);

Delete
// Deletes a record in table
$anibor->delete("DELETE FROM table WHERE fullname = "Jerahmeel Ovie Anibor");

Retrieve
// Retrieves or fetches a value from table
$anibor->retrieve("SELECT github_url FROM table WHERE full_name = 'Jerahmeel Ovie Anibor'", "github_url");

Query
// Fetch data
foreach ($anibor->db_connect->query("SELECT full_name FROM table") as $row) echo $row['fullname'];

Row count
// Gets the number of rows present in table
$anibor->get_rows("SELECT * FROM table);

Sum
// Returns the sum of a particular column
$anibor->sum("SELECT amount FROM table WHERE fullname = 'Jerahmeel Ovie Anibor'", "amount");
