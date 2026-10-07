<?php

namespace direct7\Direct7;

class VERIFY
{
    private $client;

    public $v2;

    public function __construct($client)
    {
        $this->client = $client;
        $this->v2 = new VERIFY_V2($client);
    }

    public function sendOtp($originator, $recipient, $content = null, $data_coding = null, $expiry = null, $template_id = null)
    {
        if ($template_id !== null) {
            $params = [
                "originator" => $originator,
                "recipient" => $recipient,
                "template_id" => $template_id
            ];
        } else {
            $params = [
                "originator" => $originator,
                "recipient" => $recipient,
                "content" => $content,
                "expiry" => $expiry,
                "data_coding" => $data_coding
            ];
        }

        $response = $this->client->post("/verify/v1/otp/send-otp", $params);

        return $response;
    }

    public function resendOtp($otpId)
    {
        /**
         * Re-send an OTP to a single recipient.
         *
         * @param string $otpId The OTP ID which was returned from Generate OTP endpoint.
         * @return mixed
         */

        $params = [
            "otp_id" => $otpId
        ];

        $response = $this->client->post("/verify/v1/otp/resend-otp", $params);

        return $response;
    }

    public function verifyOtp($otpId, $otpCode)
    {
        /**
         * Verify an OTP.
         *
         * @param string $otpId The OTP ID which was returned from Generate OTP endpoint.
         * @param string $otpCode The OTP received on the customer's mobile phone.
         * @return mixed
         */

        $params = [
            "otp_id" => $otpId,
            "otp_code" => $otpCode
        ];

        $response = $this->client->post("/verify/v1/otp/verify-otp", $params);

        return $response;
    }

    public function getStatus($otpId)
    {
        /**
         * Get the status for an OTP request.
         *
         * @param string $otpId The OTP ID which was returned from Generate OTP endpoint.
         * @return mixed
         */

        $response = $this->client->get("/verify/v1/report/{$otpId}");

        return $response;
    }
}

class VERIFY_V2
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function sendOtp($recipient, $flowId)
    {
        /**
         * Send an OTP to a single recipient using a verification flow (Verify V2).
         *
         * @param string $recipient Mobile number to send the OTP code to, in international format.
         * @param string $flowId ID of the verification flow created in the dashboard.
         * @return mixed
         */

        $params = [
            "recipient" => $recipient,
            "flow_id" => $flowId
        ];

        $response = $this->client->post("/verify/v2/otp/send-otp", $params);

        return $response;
    }

    public function resendOtp($otpId)
    {
        /**
         * Re-send an OTP to a single recipient (Verify V2).
         *
         * @param string $otpId The OTP ID which was returned from Generate OTP endpoint.
         * @return mixed
         */

        $params = [
            "otp_id" => $otpId
        ];

        $response = $this->client->post("/verify/v2/otp/resend-otp", $params);

        return $response;
    }

    public function verifyOtp($otpId, $otpCode)
    {
        /**
         * Verify an OTP (Verify V2).
         *
         * @param string $otpId The OTP ID which was returned from Generate OTP endpoint.
         * @param string $otpCode The OTP received on the customer's mobile phone.
         * @return mixed
         */

        $params = [
            "otp_id" => $otpId,
            "otp_code" => $otpCode
        ];

        $response = $this->client->post("/verify/v2/otp/verify-otp", $params);

        return $response;
    }

    public function getStatus($otpId)
    {
        /**
         * Get the status for an OTP request (Verify V2).
         *
         * @param string $otpId The OTP ID which was returned from Generate OTP endpoint.
         * @return mixed
         */

        $response = $this->client->get("/verify/v2/report/{$otpId}");

        return $response;
    }
}

?>
