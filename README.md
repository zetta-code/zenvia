# Zetta\\Zenvia

Integração Zenvia + PHP.

A instalação do Zetta\Zenvia utiliza o PHP Composer. Para mais informações sobre PHP Composer, por favor visite o site oficial [PHP Composer](http://getcomposer.org/).

### Installation

You can install this using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require zetta-code/zenvia
```

## Send SMS

```php
$sms = new \Zetta\Zenvia\Zenvia('account', 'password', 'https://api-rest.zenvia.com');
$messages = new \Zetta\Zenvia\Model\Sms('5500999999999', 'Test message', '1', 'Sender', new \DateTime());

$response = $sms->send($messages);
echo $response->getStatusDescription();
```
