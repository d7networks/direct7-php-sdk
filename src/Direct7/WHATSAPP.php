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
        $display_name = null,
        $phone = null,
        $email = null,
        $url = null,
        $latitude = null,
        $longitude = null,
        $location_name = null,
        $location_address = null,
        $attachment_type = null,
        $attachment_url = null,
        $attachment_caption = null,
        $message_text = null
    ) {
        $message = [
            "originator" => $originator,
            "recipients" => [["recipient" => $recipient]],
            "content" => [
                "message_type" => $message_type,
            ],
        ];

        if ($message_type == "CONTACTS") {
            $message["content"]["contact"] = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "display_name" => $display_name,
                "phone" => $phone,
                "email" => $email,
                "url" => $url,
            ];
        } elseif ($message_type == "LOCATION") {
            $message["content"]["location"] = [
                "latitude" => $latitude,
                "longitude" => $longitude,
                "name" => $location_name,
                "address" => $location_address,
            ];
        } elseif ($message_type == "ATTACHMENT") {
            $message["content"]["attachment"] = [
                "attachment_type" => $attachment_type,
                "attachment_url" => $attachment_url,
                "attachment_caption" => $attachment_caption,
            ];
        } elseif ($message_type == "TEXT") {
            $message["content"]["message_text"] = $message_text;
        }

        $response = $this->client->post("/whatsapp/v1/send", ["messages" => [$message]]);

        return $response;
    }

    public function sendWhatsAppTemplatedMessage(
        $originator,
        $recipient,
        $template_id,
        $body_parameter_values,
        $media_type = null,
        $media_url = null,
        $latitude = null,
        $longitude = null,
        $location_name = null,
        $location_address = null
    ) {
        $template = [
            "template_id" => $template_id,
        ];
    
        if (!empty($body_parameter_values)) {
            $template["body_parameter_values"] = (object)$body_parameter_values;
        }
    
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
                        "name" => $location_name,
                        "address" => $location_address,
                    ],
                ];
            } else {
                $message["content"]["template"]["media"] = [
                    "media_type" => $media_type,
                    "media_url" => $media_url,
                ];
            }
        }
    
        $response = $this->client->post("/whatsapp/v1/send", ["messages" => [$message]]);
    
        return $response;
    }
    
    
    

    public function getStatus($request_id) {
        $response = $this->client->get("/whatsapp/v1/report/{$request_id}");

        return $response;
    }
}

?>
