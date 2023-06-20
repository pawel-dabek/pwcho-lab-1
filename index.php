<?php
// funkcja do pobierania informacji o strefie czasowej na podstawie IP
function get_timezone($ip)
{
  $jsondata = file_get_contents("http://ip-api.com/json/{$ip}?fields=status,message,timezone");
  $data = json_decode($jsondata, true);
  if ($data['status'] == 'success') {
    return $data['timezone'];
  }
  return 'Europe/Warsaw';
}

// pobieranie IP klienta
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}

// pobieranie strefy czasowej
$timezone = get_timezone($ip);

// ustawienie strefy czasowej
date_default_timezone_set($timezone);

// logowanie informacji o uruchomieniu serwera
$file = 'server_log.txt';

if (!file_exists($file)) {
  $handle = fopen($file, 'w');
  fclose($handle);
}

$current = file_get_contents($file);
$current .= date('Y-m-d H:i:s') . " - Serwer uruchomiony. Autor: Paweł Dąbek. Port TCP: 80\n";
file_put_contents($file, $current);

// wyświetlanie informacji dla klienta
echo "Twoje IP: {$ip}<br/>";
echo "Data i godzina w Twojej strefie czasowej: " . date('Y-m-d H:i:s');
