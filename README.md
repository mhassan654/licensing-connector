# Laravel Theme Store

<!-- [![EgoistDeveloper Laravel License Connector](https://preview.dragon-code.pro/EgoistDeveloper/License-Connector.svg?brand=laravel)](https://github.com/mhassan654/license-connector) -->

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

⚠️ This package is under active development and is not yet stable. There may be some changes in later versions.

License Connector is continous integration tool for [License Server](https://github.com/mhassan654/licensing-server) package. This package is using for connect your Laravel project with License Server.

## Installation (for Client App)

Publish store migrations

Get via composer

`composer require mhassan654/licensing-connector`

Configs are very important. You can find them in [license-connector.php](config/licensing-connector.php) file. You should read all configs and configure for your needs.

```bash
#publish configs

php artisan vendor:publish --tag=licensing-connector-configs
```

## Validate License

As you can see, this validation process is very simple and anyone is can break this license flow.

```php
use Mhassan654\LicensingConnector\Services\ConnectorService;

...

$licenseKey = '46fad906-bc51-435f-9929-db46cb4baf13';
$connectorService = new ConnectorService($licenseKey);

$isLicenseValid = $connectorService->validateLicense();

if ($isLicenseValid) {
    // License is valid
} else {
    // License is invalid
}
```

To validating with custom data

```php
$customData = ['email' => 'testa@example.com'];
$isLicenseValid = $connectorService->validateLicense($customData);
```

⚠️ Don't forget this package just provides management of licenses and server communication.

⚠️ Please don't confuse it with ioncube or similar source code encryption tools.


[badge_downloads]:      https://img.shields.io/packagist/dt/mhassan654/licensing-connector.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/mhassan654/licensing-connector.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/mhassan654/licensing-connector?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/mhassan654/licensing-connector

