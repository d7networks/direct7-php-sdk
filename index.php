<?php

require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

// Initialize the Direct7 client
$direct7 = new Client("eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJhdXRoLWJhY2tlbmQ6YXBwIiwic3ViIjoiOTM2M2FmNTUtYWRmMS00Y2YzLWJhNjEtNGRjNWIxOTE4NGUwIn0.rctBTKBUO2FERmv_j75ItWACpUDQ7NG14v1PeXlM1ks");

// Example usage:
try {
    $response = $direct7->sms->sendMessage(['+918086757074'], 'Hello, World!', 'Sender', 'https://example.com/callback', false);
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

try {
    $response = $direct7->sms->getStatus('00145469-b503-440a-bb0c-59af8a598a7f');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
?>