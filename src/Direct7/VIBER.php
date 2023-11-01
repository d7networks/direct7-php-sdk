<?php

namespace direct7\Direct7;

class VIBER
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function sendViberMessage($recipients, $content, $label, $originator, $call_back_url = null)
    {

        $message = [
            "channel" => "viber",
            "recipients" => $recipients,
            "content" => $content,
            "label" => $label
        ];

        $messageGlobals = [
            "originator" => $originator,
            "call_back_url" => $call_back_url
        ];

        $response = $this->client->post("/viber/v1/send", [
            "messages" => [$message],
            "message_globals" => $messageGlobals
        ]);

        return $response;
    }

    public function getStatus($request_id)
    {

        $response = $this->client->get("/report/v1/viber-log/{$request_id}");

        return $response;
    }
}

?>
