<?php

namespace Yebto\DomainAPI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array check(string $domain, array $extra = [])
 * @method static array detectNiche(string $domain, array $extra = [])
 * @method static array detectCategory(string $domain, array $extra = [])
 */
class DomainAPI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'yebto-domain';
    }
}
