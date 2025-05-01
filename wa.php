<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = urlencode($_POST['name']);
    $email = urlencode($_POST['email']);
    $phone = urlencode($_POST['phone']);
    $state = urlencode($_POST['state']);
    $message = urlencode($_POST['message']);

    // Fix: Replace newline (\n) with %0A for proper URL encoding
    $whatsappMessage = "Name: $name%0A";
    $whatsappMessage .= "Email: $email%0A";
    $whatsappMessage .= "Phone: $phone%0A";
    $whatsappMessage .= "State: $state%0A";
    $whatsappMessage .= "Message: $message";

    // WhatsApp number (Replace with actual number)
    $whatsappNumber = "917011013046";

    // WhatsApp Redirect URL
    $whatsappURL = "https://wa.me/$whatsappNumber?text=$whatsappMessage";

    // Fix: Remove any new lines in the URL
    $whatsappURL = str_replace(["\r", "\n"], '', $whatsappURL);

    // Redirect to WhatsApp
    header("Location: $whatsappURL");
    exit();
} else {
    echo "Invalid Request!";
}
?>
