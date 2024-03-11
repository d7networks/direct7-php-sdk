<?php

require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

// Initialize the Direct7 client
$direct7 = new Client("Your API token");

try {
    $response = $direct7->sms->sendMessage(
        'Sender',
        'https://example.com/callback',
        '2024-02-05T10:17:10+0000',
        [
            'recipients' => ["+91999999XXXX"],
            'content' => 'Schedule Greetings from D7 API',
            'unicode' => false,
        ],
        [
            'recipients' => ["+91999999XXXX"],
            'content' => 'Schedule Greetings from D7 API',
            'unicode' => false,
        ]
    );
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->sms->getStatus(request_id:'00145469-b503-440a-bb0c-59af8a598a7f');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->viber->sendViberMessage(recipients:['+91999999XXXX'], content:'Hello, World!', label:'PROMOTION', originator:'SignOTP', call_back_url:'https://example.com/callback');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

try {
    $response = $direct7->viber->getStatus('deb7c268-cde9-4782-a4a7-9bc03a82bd1d');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->slack->sendSlackMessage(content:'Hello, World!', work_space_name:'Test', channel_name:'test', report_url:'https://example.com/callback');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->slack->getStatus('002165fd-8d12-43a2-8d75-de0f03d08a08');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->verify->sendOtp(originator:'SignOTP', recipient:'+91999999XXXX', content:'Greetings from D7 API, your mobile verification code is: {}', data_coding:'text');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->verify->resendOtp(otpId:'9c476ed0-c1ce-43e2-8576-ec505902e987');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->verify->verifyOtp('31b89954-d37c-426f-8113-ac718afc5d4c', '429766');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->verify->getStatus('31b89954-d37c-426f-8113-ac718afc5d4c');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->number_lookup->searchNumberDetails(recipient:'+91999999XXXX');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $body_parameter_values = ["0" => 'Customer'];

    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        '91906152XXXX',
        '91999999XXXX',
        'marketing_media_image',
        $body_parameter_values,
        'image',
        'https://d7networks.com/static/resources/css/img/favicon.d27f70e6ebd0.png'
    );

    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}



try {
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"91906152XXXX", recipient:"91999999XXXX", message_type:"CONTACTS", first_name:"Amal", last_name:"Anu", display_name:"Amal Anu", phone:"91906152XXXX", email : "amal@gmail.com", url: "dscsd");
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}

try {
    $response = $direct7->whatsapp->getStatus('469affd7-0983-4bbc-9d07-ee43e1d1cfef');
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}



try {
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"XXXXXXXXXXX", recipient:"XXXXXXX", message_type:"CONTACTS", first_name:"Amal", last_name:"Anu", formatted_name:"Amal Anu", phones:["91906152XXXX", "91906152XXXX"], emails : ["amal@gmail.com","amal@gmail1.com"]);
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"XXXXXXXXXXX", recipient:"XXXXXXX", message_type:"TEXT", body: "Hi");
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"XXXXXXXXXXX", recipient:"XXXXXXX", message_type:"ATTACHMENT", type: "image", url: "https://upload.wikimedia.org", caption: "test");
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"XXXXXXXXXXX", recipient:"XXXXXXX", message_type:"LOCATION", latitude: "12.93803129081362", longitude: "77.61088653615994", name: "Karix Mobile Pvt Ltd", address: "30, Hosur Rd, 7th Block, Koramangala, Bengaluru, Karnataka 560095");
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(originator:"XXXXXXXXXXX", recipient:"XXXXXXX", template_id: "lto_change_1", media_url: "https://miro.medium.com/max/780/1*9Wdo1PuiJTZo0Du2A9JLQQ.jpeg", lto_expiration_time_ms: "1708804800000", coupon_code: "DWS44");
    $body_parameter_values = [];
    $actions = [
        [
            "action_type" => "url",
            "action_index" => "0",
            "action_payload" => "dashboard"
        ]
    ];
    
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(originator: "+XXXXXXXXXX", recipient:"XXXXXXX", template_id:"click_me", body_parameter_values: $body_parameter_values, actions: $actions);
    $cards = [
        [
            "card_index" => "0",
            "components" => [
                [
                    "type" => "header",
                    "parameters" => [
                        [
                            "type" => "image",
                            "image" => [
                                "link" => "https://miro.medium.com/max/780/1*9Wdo1PuiJTZo0Du2A9JLQQ.jpeg"
                            ]
                        ]
                    ]
                ],
                [
                    "type" => "button",
                    "sub_type" => "quick_reply",
                    "index" => "0",
                    "parameters" => [
                        [
                            "type" => "payload",
                            "payload" => "2259NqSd"
                        ]
                    ]
                ]
            ]
        ],
        [
            "card_index" => "1",
            "components" => [
                [
                    "type" => "header",
                    "parameters" => [
                        [
                            "type" => "image",
                            "image" => [
                                "link" => "https://www.selfdrive.ae/banner_image/desktop/21112023164328_409449002729.jpg"
                            ]
                        ]
                    ]
                ],
                [
                    "type" => "button",
                    "sub_type" => "quick_reply",
                    "index" => "0",
                    "parameters" => [
                        [
                            "type" => "payload",
                            "payload" => "59NqSdd"
                        ]
                    ]
                ]
            ]
        ]
    ];
    
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(originator: "+XXXXXXXXXX", recipient:"XXXXXXX", template_id:"carousel_card", carousel_cards: $cards);
    
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}
?>