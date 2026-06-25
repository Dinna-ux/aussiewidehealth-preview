<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: contact.html");
  exit;
}

function clean_value($value) {
  return trim(str_replace(["\r", "\n"], " ", strip_tags($value ?? "")));
}

$name = clean_value($_POST["name"] ?? "");
$phone = clean_value($_POST["phone"] ?? "");
$email = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL);
$ndis = clean_value($_POST["ndis_status"] ?? "");
$message = trim(strip_tags($_POST["message"] ?? ""));
$source = clean_value($_POST["source"] ?? "Website enquiry");

if ($name === "" || $phone === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === "") {
  header("Location: contact.html?status=missing");
  exit;
}

$to = "info@aussiewidehealth.com.au";
$subject = "AussieWide Health Website Enquiry";
$body = "New enquiry from AussieWide Health website\n\n";
$body .= "Source: {$source}\n";
$body .= "Name: {$name}\n";
$body .= "Phone: {$phone}\n";
$body .= "Email: {$email}\n";
$body .= "NDIS Status: {$ndis}\n\n";
$body .= "Message:\n{$message}\n";

$headers = [];
$headers[] = "From: AussieWide Health Website <info@aussiewidehealth.com.au>";
$headers[] = "Reply-To: {$name} <{$email}>";
$headers[] = "Content-Type: text/plain; charset=UTF-8";

$sent = mail($to, $subject, $body, implode("\r\n", $headers));

header("Location: contact.html?status=" . ($sent ? "sent" : "error"));
exit;
?>
