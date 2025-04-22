<?php

namespace direct7\Direct7;

class WHATSAPP
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function sendWhatsAppFreeformMessage(
        $originator,
        $recipient,
        $message_type,
        $first_name = null,
        $last_name = null,
        $formatted_name = null,
        $middle_name = null,
        $suffix = null,
        $prefix = null,
        $birthday = null,
        $phones = null,
        $emails = null,
        $urls = null,
        $latitude = null,
        $longitude = null,
        $name = null,
        $address = null,
        $type = null,
        $url = null,
        $caption = null,
        $filename = null,
        $body = null,
        $message_id = null,
        $emoji = null,
        $contact_addresses = null,
    ) {
        $message = [
            "originator" => $originator,
            "recipients" => [["recipient" => $recipient]],
            "content" => [
                "message_type" => $message_type,
            ],
        ];

        if ($message_type == "CONTACTS") {
            $message["content"]["contacts"] = [
                [
                "name" => [
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "formatted_name" => $formatted_name,
                    "middle_name" => $middle_name,
                    "suffix" => $suffix,
                    "prefix" => $prefix,
                ],
                "addresses" => $contact_addresses,
                "birthday" => $birthday,
                "phones" => $phones,
                "emails" => $emails,
                "urls" => $urls
            ]
        ];
        } elseif ($message_type == "LOCATION") {
            $message["content"]["location"] = [
                "latitude" => $latitude,
                "longitude" => $longitude,
                "name" => $name,
                "address" => $address,
            ];
        } elseif ($message_type == "ATTACHMENT") {

            if ($type == "document") {
                $message["content"]["attachment"] = [
                    "type" => $type,
                    "url" => $url,
                    "caption" => $caption,
                    "filename" => $filename
                ];
            }
            else {
                $message["content"]["attachment"] = [
                    "type" => $type,
                    "url" => $url,
                    "caption" => $caption
                ];
            }
        } elseif ($message_type == "TEXT") {
            $message["content"]["text"] = [
                "body" => $body,
            ];
        }
        elseif ($message_type == "REACTION") {
            $message["content"]["reaction"] = [
                "message_id" => $message_id,
                "emoji" => $emoji
            ];
        }

        $response = $this->client->post("/whatsapp/v2/send", ["messages" => [$message]]);

        return $response;
    }

    public function sendWhatsAppTemplatedMessage(
        $originator,
        $recipient,
        $template_id,
        $language,
        $body_parameter_values = null,
        $media_type = null,
        $text_header_title = null,
        $media_url = null,
        $latitude = null,
        $longitude = null,
        $name = null,
        $address = null,
        $lto_expiration_time_ms = null,
        $coupon_code = null,
        $actions = null,
        $quick_replies = null,
        $carousel_cards = null
    ) {
        $template = [
            "template_id" => $template_id,
            "language" => $language,
            "body_parameter_values" => (object)$body_parameter_values,
        ];

        $message = [
            "originator" => $originator,
            "recipients" => [["recipient" => $recipient]],
            "content" => [
                "message_type" => "TEMPLATE",
                "template" => $template,
            ],
        ];

        if ($media_type) {
            if ($media_type == "location") {
                $message["content"]["template"]["media"] = [
                    "media_type" => "location",
                    "location" => [
                        "latitude" => $latitude,
                        "longitude" => $longitude,
                        "name" => $name,
                        "address" => $address,
                    ],
                ];
            } elseif ($media_type == "text")  {
                $message["content"]["template"]["media"] = [
                    "media_type" => $media_type,
                    "text_header_title" => $text_header_title,
                ];
            }
            else {
                $message["content"]["template"]["media"] = [
                    "media_type" => $media_type,
                    "media_url" => $media_url,
                ];
            }
        }

        if ($lto_expiration_time_ms) {
            $message["content"]["template"]["limited_time_offer"] = [
                "expiration_time_ms" => $lto_expiration_time_ms,
            ];
        }

        if ($coupon_code) {
            $message["content"]["template"]["buttons"] = [
                "coupon_code" => [
                    [
                        "index" => 0,
                        "type" => "copy_code",
                        "coupon_code" => $coupon_code,
                    ],
                ],
            ];
        }

        if ($actions) {
            $message["content"]["template"]["buttons"] = [
                "actions" => $actions
            ];
        }

        if ($quick_replies) {
            $message["content"]["template"]["buttons"] = [
                "quick_replies" => $quick_replies
            ];
        }

        if ($carousel_cards) {
            $message["content"]["template"]["carousel"] = [
                "cards" => $carousel_cards
            ];
        }

        $response = $this->client->post("/whatsapp/v2/send", ["messages" => [$message]]);

        return $response;
    }


    public function sendWhatsAppInteractiveMessage(
        $originator,
        $recipient,
        $interactive_type,
        $header_type = null,
        $header_text = null,
        $header_link = null,
        $header_file_name = null,
        $body_text = null,
        $footer_text = null,
        $parameters = null,
        $sections = null,
        $buttons = null,
        $list_button_text = null
    ) {
        $interactive = [
            "type" => $interactive_type,
            "header" => [
                "type" => $header_type,
            ],
            "body" => [
                "text" => $body_text,
            ],
            "footer" => [
                "text" => $footer_text,
            ]
        ];
    
        $message = [
            "originator" => $originator,
            "recipients" => [["recipient" => $recipient]],
            "content" => [
                "message_type" => "INTERACTIVE",
                "interactive" => $interactive,
            ],
        ];
    
        if ($header_type == "text") {
            $message["content"]["interactive"]["header"]["text"] = $header_text;
        } elseif ($header_type == "image" || $header_type == "video" || $header_type == "document") {
            $message["content"]["interactive"]["header"][$header_type] = [
                "filename" => $header_type == "document" ? $header_file_name : null,
                "link" => $header_link
            ];
        }
    
        if ($interactive_type == "cta_url") {
            $message["content"]["interactive"]["action"] = [
                "parameters" => $parameters
            ];
        } elseif ($interactive_type == "button") {
            $message["content"]["interactive"]["action"] = [
                "buttons" => $buttons,
            ];
        } elseif ($interactive_type == "list") {
            $message["content"]["interactive"]["action"] = [
                "sections" => $sections,
                "button" => $list_button_text
            ];
        } elseif ($interactive_type == "location_request_message") {
            $message["content"]["interactive"]["action"] = [
                "name" => "send_location"
            ];
        } elseif ($interactive_type == "address_message") {
            $message["content"]["interactive"]["action"] = [
                "parameters" => $parameters
            ];
        }
    
        $response = $this->client->post("/whatsapp/v2/send", ["messages" => [$message]]);
    
        return $response;
    }
    

    public function getStatus($request_id)
    {
        $response = $this->client->get("/whatsapp/v1/report/{$request_id}");

        return $response;
    }

    public function readReceipt($message_id)
    {
        $response = $this->client->post("/whatsapp/v2/read-receipt/{$message_id}");

        return $response;
    }

    public function downloadMedia($media_id)
    {
        $response = $this->client->get("/whatsapp/v2/download/{$media_id}");

        return $response;
    }
}

?>
