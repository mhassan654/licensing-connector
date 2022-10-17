<?php

namespace Mhassan654\LicensingConnector\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mhassan654\LicenseServer\Support\DomainSupport;

class LicensingGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $host = $request->header('_Host');
        $hostName = $request->header('_Host_Name');

        if ($host && $hostName) {
            $domain = DomainSupport::validateDomain($host);
            $subDomain = $domain->subDomain()->toString();

            if (Config::get('license-server.allow_subdomains') && !empty($subDomain)) {
                $request->merge([
                    'domain' => $subDomain,
                ]);

                return $next($request);
            }

            $registrableDomain = $domain->registrableDomain()->toString();

            if (!empty($registrableDomain)) {
                $request->merge([
                    'domain' => $registrableDomain,
                ]);

                return $next($request);
            }
        }

        return abort(403);
    }
}
