<?php

namespace direct7\Direct7;

class SLACK
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function sendSlackMessage($content, $work_space_name, $channel_name, $report_url = null)
    {

        $message = [
            "channel" => "slack",
            "content" => $content,
            "work_space_name" => $work_space_name,
            "channel_name" => $channel_name
        ];

        $messageGlobals = [
            "report_url" => $report_url
        ];

        $response = $this->client->post("/messages/v1/send", [
            "messages" => [$message],
            "message_globals" => $messageGlobals
        ]);

        return $response;
    }

    public function getStatus($request_id)
    {

        $response = $this->client->get("/report/v1/message-log/{$request_id}");

        return $response;
    }
}

?>
