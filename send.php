<?php
$token = "8309388385:AAH2dm-EK43o7-l7Pu3bGz1D67tgt4hgDOc;
$chat_id = "7811538325";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];

$text = "📩 Pesan Baru\n";
$text .= "👤 Nama: $name\n";
$text .= "📧 Email: $email\n";
$text .= "💬 Pesan: $message\n\n";
$text .= "🌐 IP: $ip\n";
$text .= "🖥️ Device: $device";

$url = "https://api.telegram.org/bot$token/sendMessage";
$data = [
  'chat_id' => $chat_id,
  'text' => $text
];

$options = [
  'http' => [
    'method'  => 'POST',
    'header'  => "Content-Type: application/x-www-form-urlencoded",
    'content' => http_build_query($data)
  ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result) {
  echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='contact.html';</script>";
} else {
  echo "<script>alert('Gagal mengirim pesan.'); window.location.href='contact.html';</script>";
}
?>