<?php

namespace Mhassan654\LicensingConnector\Traits;

trait CacheKeys
{
    /**
     * Get access token cache key
     *
     * @return string
     */
    private function getAccessTokenKey(string $licenseKey): string
    {
        return "license-connector:access-token-{$licenseKey}";
    }
}
