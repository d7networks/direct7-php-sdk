# Direct7 PHP SDK

This PHP SDK provides a convenient and easy-to-use interface to the Direct7 REST API. The SDK allows you to perform
all the operations that are available through the REST API.

## Installation

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require direct7/direct7-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once 'vendor/autoload.php';
```

## Usage

The SDK is designed to be easy to use. To get started, you need to create a client instance:


### Send SMS

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->sms->sendMessage(recipients: ['+91999999XXXX'], content: 'Hello, World!', originator: 'Sender', report_url: 'https://example.com/callback', unicode: false);

var_dump($response);
```

### Send SMS (Unicode)

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->sms->sendMessage(recipients: ['+91999999XXXX'], content: 'مرحبا بالعالم!', originator: 'Sender', report_url: 'https://example.com/callback', unicode: true);

var_dump($response);
```

### Get Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

# request_id is the id returned in the response of send_message
 $response = $direct7->sms->getStatus(request_id:'00145469-b503-440a-bb0c-59af8a598a7f');

var_dump($response);
```

### Send OTP

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->verify->sendOtp(originator:'SignOTP', recipient:'+91999999XXXX', content:'Greetings from D7 API, your mobile verification code is: {}', data_coding:'text', expiry:600);

var_dump($response);
```

### Re-Send OTP

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->verify->resendOtp(otpId:'9c476ed0-c1ce-43e2-8576-ec505902e987');

var_dump($response);
```

### Verify OTP

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->verify->verifyOtp(otpId:'31b89954-d37c-426f-8113-ac718afc5d4c', otpCode:'429766');
var_dump($response);

```

### Get Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->verify->getStatus(otpId:'31b89954-d37c-426f-8113-ac718afc5d4c');
var_dump($response);

```

### Send Viber Message

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->viber->sendViberMessage(recipients:['+91999999XXXX'], content:'Hello, World!', label:'PROMOTION', originator:'SignOTP', call_back_url:'https://example.com/callback');
var_dump($response);

```


### Get Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->viber->getStatus(request_id:'deb7c268-cde9-4782-a4a7-9bc03a82bd1d');
var_dump($response);

```

### Send Slack Message

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->slack->sendSlackMessage(content:'Hello, World!', work_space_name:'WorkSpaceName', channel_name:'ChannelName', report_url:'https://example.com/callback');
var_dump($response);

```


### Get Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->viber->getStatus(request_id:'deb7c268-cde9-4782-a4a7-9bc03a82bd1d');
var_dump($response);

```

### Search Your Number details

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->number_lookup->searchNumberDetails(recipient:'+91999999XXXX');
var_dump($response);

```

### Send Whatsapp Free-form Message (Contact Details)

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->whatsapp->sendWhatsAppFreeformMessage(originator:"91999999XXXX", recipient:"91989898XXXX", message_type:"CONTACTS", first_name:"Test", last_name:"test", display_name:"Test test", phone:"91906152XXXX", email : "test@gmail.com");

var_dump($response);

```

### Send Whatsapp Templated Message.

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$body_parameter_values = ["0" => 'sisira'];

$response = $direct7->whatsapp->sendWhatsAppTemplatedMessage(
    '9190615XXXXX',
    '91999999XXXX',
    'marketing_media_image',
    $body_parameter_values,
    'image',
    'https://d7networks.com/static/resources/css/img/favicon.d27f70e6ebd0.png'
);

var_dump($response);

```

### Get Request Status

```php
require_once __DIR__ . '/vendor/autoload.php';

use direct7\Direct7\Client;

$client = new Client(api_token="Your API token")

$response = $direct7->whatsapp->getStatus('469affd7-0983-4bbc-9d07-ee43e1d1cfef');

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