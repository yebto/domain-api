# YEB DomainAPI

PHP SDK for the YEB Domain API. Domain analysis, niche and category detection.

Works standalone (plain PHP) or with Laravel (Facade + auto-discovery).

## Requirements

- PHP 8.1+
- cURL extension
- [YEB API Key](https://yeb.to) (free tier available)

## Installation

```bash
composer require yebto/domain-api
```

## Standalone Usage

```php
use Yebto\DomainAPI\DomainAPI;

$api = new DomainAPI(['key' => 'your-api-key']);
$result = $api->check('example');
```

## Laravel Usage

Add your API key to `.env`:

```
YEB_KEY_ID=your-api-key
```

Use via Facade:

```php
use DomainAPI;

$result = DomainAPI::check('example');
```

Or via dependency injection:

```php
use Yebto\DomainAPI\DomainAPI;

public function handle(DomainAPI $api)
{
    $result = $api->check('example');
}
```

### Publish Config

```bash
php artisan vendor:publish --tag=yebto-domain-config
```

## Available Methods

| Method | Description |
|--------|-------------|
| `check($domain)` | Check domain information |
| `detectNiche($domain)` | Detect the niche of a domain |
| `detectCategory($domain)` | Detect the category of a domain |


All methods accept an optional `$extra` array parameter for additional API options.

## Error Handling

```php
use Yebto\ApiClient\Exceptions\ApiException;
use Yebto\ApiClient\Exceptions\AuthenticationException;
use Yebto\ApiClient\Exceptions\RateLimitException;

try {
    $result = $api->check('example');
} catch (AuthenticationException $e) {
    // Missing or invalid API key (401)
} catch (RateLimitException $e) {
    // Too many requests (429)
} catch (ApiException $e) {
    echo $e->getMessage();
    echo $e->getHttpCode();
}
```

## Free API Access

Register at [yeb.to](https://yeb.to) with Google OAuth to get a free API key.

## Support

- API Documentation: [https://yeb.to/api/domain-checker](https://yeb.to/api/domain-checker)
- Email: support@yeb.to
- Issues: [GitHub Issues](https://github.com/yebto/domain-api/issues)

## License

MIT - NETOX Ltd.
