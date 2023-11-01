<?php

namespace direct7\Direct7;

class SMS
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function sendMessage($recipients, $content, $originator, $reportUrl = null, $unicode = false)
    {
        $message = [
            "channel" => "sms",
            "recipients" => $recipients,
            "content" => $content,
            "msg_type" => "text",
            "data_coding" => $unicode ? "unicode" : "text",
        ];

        $messageGlobals = [
            "originator" => $originator,
            "report_url" => $reportUrl,
        ];

        $response = $this->client->post("/messages/v1/send", [
            "messages" => [$message],
            "message_globals" => $messageGlobals,
        ]);

        return $response;
    }

    public function getStatus($requestId)
    {
        $response = $this->client->get("/report/v1/message-log/{$requestId}");
        return $response;
    }
}

?>
