# Script PowerShell pour lancer le serveur PHP sur l'adresse IP locale accessible sur le réseau WiFi

# Récupère l'adresse IPv4 locale (WiFi ou Ethernet)
$ip = (Get-NetIPAddress -AddressFamily IPv4 | Where-Object { $_.IPAddress -notlike '127.*' -and $_.InterfaceAlias -notlike '*Loopback*' -and $_.PrefixOrigin -eq 'Dhcp' } | Select-Object -First 1 -ExpandProperty IPAddress)
if (-not $ip) {
    $ip = (Get-NetIPAddress -AddressFamily IPv4 | Where-Object { $_.IPAddress -notlike '127.*' -and $_.InterfaceAlias -notlike '*Loopback*' } | Select-Object -First 1 -ExpandProperty IPAddress)
}
if (-not $ip) {
    Write-Host 'Impossible de trouver une adresse IP locale.' -ForegroundColor Red
    exit 1
}

# Définit le port (modifiable si besoin)
$port = 8000

# Affiche l'URL d'accès
Write-Host "Serveur accessible sur : http://$ip:$port" -ForegroundColor Green

# Lance le serveur PHP intégré
php -S "$ip`:$port" -t public
