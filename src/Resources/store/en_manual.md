Simply install via the Shopware app manager in the shop administration.
Configure the plugin using the plugin settings. All the possible options are explained 
there in detail.

## IP Whitelisting

You can configure IP addresses that are always allowed to access the storefront,
without the need to authenticate.
IPv4 and IPv6 are supported. Subnet masks or IPv6 prefixes can also be specified.

***Be mindful when using a proxy server or load balancer***
In order for the IP whitelisting to work correctly when using an additional reverse proxy server,
it is necessary to store the IP address of the proxy in the .env configuration file
(in the Shopware main directory) as a trusted proxy. This is possible via the entry
_TRUSTED_PROXIES=IP_of_the_proxy_.

Alternatively this is also possible using the PHP settings. More information on how
to do this in PHP can be found at https://symfony.com/doc/current/deployment/proxies.html#solution-settrustedproxies
