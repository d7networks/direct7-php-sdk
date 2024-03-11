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
        $body = null
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
                "name" => [
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "formatted_name" => $formatted_name,
                ],
                "phones" => array_map(function ($phone) {
                    return ["phone" => $phone];
                }, $phones ?? []),
                "emails" => array_map(function ($email) {
                    return ["email" => $email];
                }, $emails ?? []),
                "urls" => array_map(function ($url) {
                    return ["url" => $url];
                }, $urls ?? []),
            ];
        } elseif ($message_type == "LOCATION") {
            $message["content"]["location"] = [
                "latitude" => $latitude,
                "longitude" => $longitude,
                "name" => $name,
                "address" => $address,
            ];
        } elseif ($message_type == "ATTACHMENT") {
            $message["content"]["attachment"] = [
                "type" => $type,
                "url" => $url,
                "caption" => $caption,
            ];
        } elseif ($message_type == "TEXT") {
            $message["content"]["text"] = [
                "body" => $body,
            ];
        }

        $response = $this->client->post("/whatsapp/v2/send", ["messages" => [$message]]);

        return $response;
    }

    public function sendWhatsAppTemplatedMessage(
        $originator,
        $recipient,
        $template_id,
        $body_parameter_values = null,
        $media_type = null,
        $media_url = null,
        $latitude = null,
        $longitude = null,
        $location_name = null,
        $location_address = null,
        $lto_expiration_time_ms = null,
        $coupon_code = null,
        $actions = null,
        $quick_replies = null,
        $carousel_cards = null
    ) {
        $template = [
            "template_id" => $template_id,
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

    public function getStatus($request_id)
    {
        $response = $this->client->get("/whatsapp/v1/report/{$request_id}");

        return $response;
    }
}

?>
