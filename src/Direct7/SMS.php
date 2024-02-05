<?php

namespace direct7\Direct7;

class SMS
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function sendMessage($originator, $report_url = null, $schedule_time = null, ...$args)
    {
        $messages = [];

        foreach ($args as $message) {
            $messages[] = [
                "channel" => "sms",
                "recipients" => $message["recipients"] ?? [],
                "content" => $message["content"] ?? "",
                "msg_type" => "text",
                "data_coding" => $message["unicode"] ? "unicode" : "text",
            ];
        }

        $messageGlobals = [
            "originator" => $originator,
            "report_url" => $report_url,
            "schedule_time" => $schedule_time,
        ];

        $payload = [
            "messages" => $messages,
            "message_globals" => $messageGlobals,
        ];

        $response = $this->client->post("/messages/v1/send", $payload);

        return $response;
    }

    public function getStatus($request_id)
    {
        $response = $this->client->get("/report/v1/message-log/{$request_id}");
        return $response;
    }
}

?>
