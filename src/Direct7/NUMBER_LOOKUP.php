<?php

namespace direct7\Direct7;

class NumberLookup
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function searchNumberDetails($recipient)
    {
        $params = [
            "recipient" => $recipient
        ];

        $response = $this->client->post("/hlr/v1/lookup", $params);

        return $response;
    }
}

?>
