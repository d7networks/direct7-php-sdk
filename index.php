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
    // TEXT
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"9715XXXXXXX", recipient:"+91XX8675XXXX", message_type:"TEXT", body: "Hi");
    
    // REACTION
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"9715XXXXXXX", recipient:"+91XX8675XXXX", message_type:"REACTION", message_id: "966c7b62-172b-11ef-a5a3-0242ac1b002c", emoji: "😀");

    // Media: Image
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"9715XXXXXXX", recipient:"91XX8675XXXX", message_type:"ATTACHMENT", type: "image", url: "https://miro.medium.com/max/780/1*9Wdo1PuiJTZo0Du2A9JLQQ.jpeg", caption: "test");

    // Media: Video
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"9715XXXXXXX", recipient:"91XX8675XXXX", message_type:"ATTACHMENT", type: "video", url: "http://www.onirikal.com/videos/mp4/nestlegold.mp4", caption: "test");

    // Media: Video
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        message_type:"ATTACHMENT", 
        type: "document",
        url: "https://www.clickdimensions.com/links/TestPDFfile.pdf", 
        caption: "Test PDF file pdf", 
        filename: "TestPDFfile.pdf"
    );

    // Media: Audio
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        message_type:"ATTACHMENT", 
        type: "audio", 
        url: "http://fate-suite.ffmpeg.org/mpegaudio/extra_overread.mp3"
    );

    // Media: Sticker
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        message_type:"ATTACHMENT", 
        type: "sticker", 
        url: "https://raw.githubusercontent.com/sagarbhavsar4328/dummys3bucket/master/sample3.webp"
    );

    // Location
    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        message_type:"LOCATION", 
        latitude: "12.93803129081362", 
        longitude: "77.61088653615994", 
        name: "Pvt Ltd", 
        address: "Bengaluru, Karnataka"
      );

    // COntacts
    $contact_addresses = [
        [
            "street" => "1 Lucky Shrub Way",
            "city" => "Menlo Park",
            "state" => "CA",
            "zip" => "94025",
            "country" => "United States",
            "country_code" => "US",
            "type" => "WORK"
        ]
    ];

    $phones = [
        [
            "phone" => "+16505559999",
            "type" => "HOME"
        ]
    ];

    $emails = [
        [
            "email" => "bjohnson@luckyshrub.com",
            "type" => "WORK"
        ]
    ];
    $urls = [
        [
            "url" => "https://www.luckyshrub.com",
            "type"=> "WORK"
        ]
    ];

    $response = $direct7->whatsapp->sendWhatsAppFreeformMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        message_type:"CONTACTS", 
        first_name:"Alice", 
        last_name:"Jane", 
        formatted_name:"Alice Jane", 
        middle_name:"Joana", 
        suffix:"Esq.",
        prefix:"Dr.",
        phones:$phones, 
        emails:$emails,
        contact_addresses:$contact_addresses,
        urls:$urls
        );


    // Interactive: cta
    $parameters = [
        "display_text" => "Visit Us",
        "url" => "https://www.luckyshrub.com?clickID=kqDGWd24Q5TRwoEQTICY7W1JKoXvaZOXWAS7h1P76s0R7Paec4"
      ];

      $response = $direct7->whatsapp->sendWhatsAppInteractiveMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        interactive_type:"cta_url",
        header_type:"text",
        header_text:"Payment$ for D7 Whatsapp Service",
        body_text:"Direct7 Networks is a messaging service provider that specializes in helping organizations efficiently communicate with their customers.",
        footer_text:"Thank You", 
        parameters: $parameters
      );


    // interactive: buttons
    $buttons = [
        ["type" => "reply", "reply" => ["id" => "1", "title" => "Debit Card"]],
        ["type" => "reply", "reply" => ["id" => "2", "title" => "Credit"]]
    ];

    $response = $direct7->whatsapp->sendWhatsAppInteractiveMessage(
      originator:"9715XXXXXXX", 
      recipient:"91XX8675XXXX", 
      interactive_type:"button",
      header_type:"image",
      header_link:"https://karix.s3.ap-south-1.amazonaws.com/English-4.jpg",
      body_text:"Direct7 Networks is a messaging service provider that specializes in helping organizations efficiently communicate with their customers.",
      footer_text:"Thank You",
      buttons: $buttons
    );


    // interactive: list
    $sections = [
        [
            "title" => "SMS Messaging",
            "rows" => [
                [
                    "id" => "1",
                    "title" => "Normal SMS",
                    "description" => "Signup for free at the D7 platform to use our Messaging APIs."
                ],
                [
                    "id" => "2",
                    "title" => "Verify",
                    "description" => "D7 Verify API is to applications requires SMS based OTP authentications."
                ]
            ]
        ],
        [
            "title" => "Whatsapp",
            "rows" => [
                [
                    "id" => "3",
                    "title" => "WhatsApp Messages",
                    "description" => "D7 Whatsapp API is to applications requires pre-registration."
                ]
            ]
        ]
    ];

    $response = $direct7->whatsapp->sendWhatsAppInteractiveMessage(
      originator:"9715XXXXXXX", 
      recipient:"91XX8675XXXX", 
      interactive_type:"list",
      header_type:"text",
      header_text:"Payment$ for D7 Whatsapp Service",
      body_text:"Direct7 Networks is a messaging service provider that specializes in helping organizations efficiently communicate with their customers.",
      footer_text:"Thank You",
      list_button_text:"Choose Service",
      sections: $sections
    );


    // templated: no example body
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator: '9715XXXXXXX',
        recipient: '91XX8675XXXX',
        language: "en",
        template_id: 'testing_alpha'
    );

    // templated: with example body
    $body_parameter_values = ["0" => 'first_parameter_in_your_template'];

    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator: '9715XXXXXXX',
        recipient: '91XX8675XXXX',
        language: 'en',
        template_id: 'with_personalize',
        body_parameter_values: $body_parameter_values,
    );

    // template: text
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator: '9715XXXXXXX',
        recipient: '91XX8675XXXX',
        language: 'en',
        template_id: 'header_param',
        media_type: 'text',
        text_header_title: 'Tom'
    );

    // Templates: image
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator: '9715XXXXXXX',
        recipient: '91XX8675XXXX',
        language: 'en',
        template_id: 'image',
        media_type: 'image',
        media_url: 'https://d7networks.com/static/resources/css/img/favicon.d27f70e6ebd0.png'
    );

    
    // Templated: video
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator: '9715XXXXXXX',
        recipient: '91XX8675XXXX',
        language: 'en',
        template_id: 'video',
        media_type: 'video',
        media_url: 'https://www.luckyshrub.com/assets/lucky-shrub-eclipse-viewing.mp4'
    );


    //  Templated: Doc
    $body_parameter_values = ["0" => 'first_parameter_in_your_template'];
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator: '9715XXXXXXX',
        recipient: '91XX8675XXXX',
        language: 'en',
        template_id: 'document',
        body_parameter_values: $body_parameter_values,
        media_type: 'document',
        media_url: 'https://www.clickdimensions.com/links/TestPDFfile.pdf'
    );

    // Templated: Location
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator: '9715XXXXXXX',
        recipient: '91XX8675XXXX',
        language: 'en',
        template_id: 'location',
        media_type: 'location',
        latitude: '12.93803129081362',
        longitude: '77.61088653615994',
        name: 'Mobile Pvt Ltd', 
        address: 'Bengaluru, Karnataka 560095'
    );

    // Templated: quick reply
    $quick_replies = [
                        [
                            "button_index" => "0",
                            "button_payload" => "ButtonText"
                        ]
                    ];  

    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator:'9715XXXXXXX',
        recipient:'91XX8675XXXX',
        language: 'en',
        template_id:'quick_reply',
        quick_replies: $quick_replies
    );

    // Templated: action
    $body_parameter_values = ["0" => 'first_parameter_in_your_template', "1" => 'second_parameter_in_your_template'];
    $actions = [
        [
            "action_type" => "url",
            "action_index" => "0",
            "action_payload" => "dashboard"
        ]
    ];  

    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator:'9715XXXXXXX',
        recipient:'91XX8675XXXX',
        template_id:'call_to_action',
        language: 'en',
        actions:$actions
    );


    // Templated: coupo code
    $body_parameter_values = ["0" => 'DS45'];

    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator:'9715XXXXXXX',
        recipient:'91XX8675XXXX',
        template_id:'coupon_code',
        language: 'en',
        body_parameter_values:$body_parameter_values,
        coupon_code: 'DF345F45'
    );


    // Templated: Carousel
    $body_parameter_values = ["0" => 'first_parameter_in_your_template', "1" => 'second_parameter_in_your_template'];
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
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator:'9715XXXXXXX',
        recipient:'91XX8675XXXX',
        language: 'en',
        template_id:'carousel_card',
        carousel_cards: $cards
    );

    // Templated: LTO
    $response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        template_id: "limited_time_offer", 
        language: 'en',
        media_type: "image",
        media_url: "https://miro.medium.com/max/780/1*9Wdo1PuiJTZo0Du2A9JLQQ.jpeg", 
        lto_expiration_time_ms: "1708804800000", 
        coupon_code: "DWS44"
    );
    
    var_dump($response);
} catch (\Exception $error) {
    if ($error instanceof \direct7\Direct7\ValidationError) {
        echo "Validation Error: " . $error->getMessage() . "\n";
    } else {
        echo "Error: " . $error->getMessage() . "\n";
    }
}
?>