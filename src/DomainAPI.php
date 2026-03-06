<?php

namespace Yebto\DomainAPI;

use Yebto\ApiClient\YebtoClient;

class DomainAPI extends YebtoClient
{
    protected function module(): string
    {
        return 'domain';
    }

    protected function defaults(): array
    {
        return [
            'base_url' => 'https://api.yeb.to/v1',
            'key'      => null,
            'curl'     => [
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_USERAGENT      => 'yebto-domain-api-php',
            ],
        ];
    }

    /**
     * Check domain information
     */
    public function check(string $domain, array $extra = []): array
    {
        return $this->post('check', array_merge(compact('domain'), $extra));
    }

    /**
     * Detect the niche of a domain
     */
    public function detectNiche(string $domain, array $extra = []): array
    {
        return $this->post('detect-niche', array_merge(compact('domain'), $extra));
    }

    /**
     * Detect the category of a domain
     */
    public function detectCategory(string $domain, array $extra = []): array
    {
        return $this->post('detect-category', array_merge(compact('domain'), $extra));
    }
}
