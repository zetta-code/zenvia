# Zetta\\Zenvia

Integração Zenvia + PHP.

A instalação do Zetta\\Zenvia utiliza o PHP Composer. Para mais informações sobre PHP Composer, por favor visite o site oficial [PHP Composer](http://getcomposer.org/).

### Installation

You can install this using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require zetta-code/zenvia
```

## Send SMS

```php
$sms = new \Zetta\Zenvia\Zenvia('conta', 'senha', 'https://api-rest.zenvia360.com.br/services/send-sms');
$messages = new \Zetta\Zenvia\Model\Sms('5586998291391', 'Mensagem de teste', '1', 'Sender', new DateTime());

$response = $sms->send($messages);
echo $response->getStatusDescription();
```
