<?php
// Include the database connection file using require
require('connect.php');

// Customer data
$first_name = '[value-1]';
$last_name = '[value-2]';
$email = '[value-3]';
$password = '[value-4]';
$phone_number = '[value-5]';
$house_name = '[value-6]';
$street_name = '[value-7]';
$state = '[value-8]';
$district = '[value-9]';
$pincode = '[value-10]';

// SQL query for inserting customer data
$insert_query = "INSERT INTO customer(FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, PHONE_NUMBER, HOUSE_NAME, STREET_NAME, STATE, DISTRICT, PINCODE) VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$house_name', '$street_name', '$state', '$district', '$pincode')";

// Insert customer data
if (insert_data($insert_query)) {
    echo "Customer data inserted successfully!";
} else {
    echo "Failed to insert customer data.";
}
?>