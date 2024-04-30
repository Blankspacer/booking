<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $date = $_POST["date"];
	 $name = $_POST["name"];
    $time = $_POST["time"];
    $room_type = $_POST["room_type"];
    $consultant = $_POST["consultant"];
    $duration = $_POST["duration"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $extra_facilities = $_POST["extra_facilities"];

    // Send email to admin
    $to = "info@blankspacer.com";
    $subject = "New Booking";
    $message = "Date: $date\Name:$name\nTime: $time\nRoom Type: $room_type\nConsultant: $consultant\nDuration: $duration\nEmail: $email\nCountry: $country\nPhone: $phone\nExtra Facilities: $extra_facilities";
    $headers = "From: $email";

    // Send email to admin
    mail($to, $subject, $message, $headers);

    // Send confirmation email to user
    $user_subject = "Booking Confirmation";
    $user_message = "Thank you for your booking. We have received your request and will get back to you shortly.";
    $user_headers = "From: info@blankspacer.com";

    // Send email to user
    mail($email, $user_subject, $user_message, $user_headers);

    // Redirect back to booking page with success message
    header("Location: www.blankspacer.com/booking/index.html?status=success");
} else {
    // Redirect back to booking page with error message
    header("Location: www.blankspacer.com/booking/index.html??status=error");
}
?>
