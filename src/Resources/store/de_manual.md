Das Plugin kann über den Shopware App Manager installiert werden.
Dort wird es ebenfalls konfiguriert. Alle möglichen Optionen werden an den Feldern ausführlich
erklärt.

## IP-Whitelisting

Es können IP-Adressen konfiguriert werden, die immer Zugriff auf die Storefront haben,
ohne sich authentifizieren zu müssen.
Unterstützt werden IPv4 und IPv6. Es können auch Subnetzmasken oder IPv6-Prefixe angegeben werden.

**Besonderheit bei der Verwendung eines Proxy-Servers oder eines Loadbalancers**
Damit das IP-Whitelisting bei Verwendung eines zusätzlichen Reverse-Proxy-Servers korrekt
funktioniert, ist es erforderlich, die IP-Adresse des Proxys in der .env-Konfigurationsdatei
(im Shopware-Hauptverzeichnis) als Trusted Proxy zu hinterlegen. Dies ist über den Eintrag
_TRUSTED_PROXIES=IP_des_Proxys_ möglich.

Alternativ kann dies auch über die PHP-Einstellungen geschehen. Weitere Informationen, wie
Du dies PHP-seitig umsetzen kannst, findest Du unter https://symfony.com/doc/current/deployment/proxies.html#solution-settrustedproxies
