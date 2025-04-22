# Direct7 PHP SDK

PHP SDK to seamlessly incorporate communication features into your PHP applications via the Direct7 REST API. This SDK empowers you to effortlessly initiate SMS,Whatsapp, Slack, Viber  messages and 2 factor authentication features.

## Documentation
The documentation for the Direct7 REST API can be found here [Direct7 API Reference](https://d7networks.com/docs/).


## Installation

Install the SDK using [Composer](http://getcomposer.org/).
Run the following command from project root directory:

```bash
composer require direct7/direct7-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once 'vendor/autoload.php';
```

## Usage

To get started you need to have an active Direct7 account, If you haven't yet registered, please proceed to [Sign up](https://app.d7networks.com/signup?tag="direct7-php-sdk")


### Authentication

In order to initiate API requests, create a client object using your Direct7 API token. To obtain an API token, kindly visit the following link: https://app.d7networks.com/api-tokens.

```php
require_once __DIR__ . '/vendor/autoload.php';
use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token")
```

## Examples

  - [SMS](#sms)
  - [Verify](#verify)
  - [Whatsapp](#whatsapp)
  - [Number Lookup](#number-lookup)
  - [Viber](#viber)
  - [Slack](#slack)

### SMS


### Send SMS

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->sms->sendMessage(
        'Sender',
        'https://example.com/callback',
        '2024-02-05T10:17:10+0000',
        [
            'recipients' => ["+91999XXXXXXX"],
            'content' => 'Greetings from D7 API',
            'unicode' => false,
        ],
    );
var_dump($response);
```

### Send SMS (Unicode)

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->sms->sendMessage(
        'Sender',
        'https://example.com/callback',
        null,
        [
            'recipients' => ["+919999XXXXXX"],
            'content' => 'لوحة المفاتيح العربية!',
            'unicode' => true,
        ]
    );
var_dump($response);
```

### Check Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

# request_id is the id returned in the response of send_message
 $response = $direct7->sms->getStatus(request_id:'00145469-b503-440a-bb0c-59af8a598a7f');

var_dump($response);
```

### Verify

### Send OTP

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->verify->sendOtp(originator:'SignOTP', recipient:'+91999999XXXX', content:'Greetings from D7 API, your mobile verification code is: {}', data_coding:'text', expiry:600);

var_dump($response);
```

### Re-Send OTP

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->verify->resendOtp(otpId:'9c476ed0-c1ce-43e2-8576-ec505902e987');

var_dump($response);
```

### Verify OTP

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->verify->verifyOtp(otpId:'31b89954-d37c-426f-8113-ac718afc5d4c', otpCode:'429766');
var_dump($response);

```

### Check OTP Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->verify->getStatus(otpId:'31b89954-d37c-426f-8113-ac718afc5d4c');
var_dump($response);

```


### Whatsapp

### Send Whatsapp Free-form Message (Location Details)

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->whatsapp->sendWhatsAppFreeformMessage(
        originator:"9715XXXXXXX", 
        recipient:"91XX8675XXXX", 
        message_type:"LOCATION", 
        latitude: "12.93803129081362", 
        longitude: "77.61088653615994", 
        name: "Pvt Ltd", 
        address: "Bengaluru, Karnataka"
      );

var_dump($response);

```

### Send Whatsapp Templated Message.

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$body_parameter_values = ["0" => 'first_parameter_in_your_template'];

$response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
    originator: '9715XXXXXXX',
    recipient: '91XX8675XXXX',
    language: 'en',
    template_id: 'template_id',
    body_parameter_values: $body_parameter_values,
);

var_dump($response);

```

### Send Whatsapp Interactive Message.

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

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


```

### Check Whatsapp Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->whatsapp->getStatus('469affd7-0983-4bbc-9d07-ee43e1d1cfef');

var_dump($response);

```

### Whatsapp Read Receipt

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->whatsapp->readReceipt('469affd7-0983-4bbc-9d07-ee43e1d1cfef');

var_dump($response);

```

### Whatsapp Download User Initiated Media

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->whatsapp->downloadMedia('16534343434');

var_dump($response);

```

### Number Lookup

### Search Phone Number Details

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->number_lookup->searchNumberDetails(recipient:'+91999999XXXX');
var_dump($response);

```

### Viber

### Send Viber Message

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->viber->sendViberMessage(recipients:['+91999999XXXX'], content:'Hello, World!', label:'PROMOTION', originator:'SignOTP', call_back_url:'https://example.com/callback');
var_dump($response);

```


### Check Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->viber->getStatus(request_id:'deb7c268-cde9-4782-a4a7-9bc03a82bd1d');
var_dump($response);

```

### Slack

### Send Slack Message

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->slack->sendSlackMessage(content:'Hello, World!', work_space_name:'WorkSpaceName', channel_name:'ChannelName', report_url:'https://example.com/callback');
var_dump($response);

```


### Check Slack Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$direct7 = new Client(api_token="Your API token");

$response = $direct7->viber->getStatus(request_id:'deb7c268-cde9-4782-a4a7-9bc03a82bd1d');
var_dump($response);

```





## FAQ

### How do I get my API token?

You can get your API token from the Direct7 dashboard. If you don't have an account yet, you can create one for free.

### Supported php versions

The SDK supports php 8.1.2 and higher.

### Supported APIs

As of now, the SDK supports the following APIs:

| API                    |        Supported?        |
|------------------------|:------------------------:|
| SMS API                |            ✅             |
| Verify API             |            ✅             |
| Whatsapp API           |            ✅             |
| Number Lookup API      |            ✅             |
| Viber API              |            ✅             |
| Slack API              |            ✅             |

### How do I get started?

You can find the platform documentation @ [Direct7 Docs](https://d7networks.com/docs/).

### How do I get help?

If you need help using the SDK, you can create an issue on GitHub or email to support@d7networks.com

## Contributing

We welcome contributions to the Direct7 PHP SDK. If you have any ideas for improvements or bug fixes, please feel
free to create an issue on GitHub.
