# Dureflex - Script para iniciar servidor local
Write-Host "====================================" -ForegroundColor Green
Write-Host "    DUREFLEX - Servidor Local" -ForegroundColor Green  
Write-Host "====================================" -ForegroundColor Green
Write-Host ""

# Verificar se estamos no diretório correto
if (-not (Test-Path "php-portable\php.exe")) {
    Write-Host "ERRO: Arquivo php.exe não encontrado!" -ForegroundColor Red
    Write-Host "Certifique-se de estar no diretório Dureflex-theme" -ForegroundColor Red
    Read-Host "Pressione Enter para sair"
    exit 1
}

# Definir variáveis
$phpPath = Join-Path $PWD "php-portable"
$documentRoot = $PWD
$serverHost = "localhost"
$serverPort = 8080

Write-Host "Configurações:"
Write-Host "- PHP Path: $phpPath"
Write-Host "- Document Root: $documentRoot"
Write-Host "- Servidor: http://$serverHost`:$serverPort"
Write-Host ""

# Verificar se a porta está disponível
$portInUse = Get-NetTCPConnection -LocalPort $serverPort -ErrorAction SilentlyContinue
if ($portInUse) {
    Write-Host "AVISO: A porta $serverPort já está em uso!" -ForegroundColor Yellow
    Write-Host "Tentando usar a porta 8081..." -ForegroundColor Yellow
    $serverPort = 8081
}

Write-Host "Iniciando servidor PHP..." -ForegroundColor Cyan
Write-Host ""
Write-Host "====================================" -ForegroundColor Green
Write-Host "  Servidor rodando em:" -ForegroundColor Green
Write-Host "  http://$serverHost`:$serverPort" -ForegroundColor Yellow
Write-Host "====================================" -ForegroundColor Green
Write-Host ""
Write-Host "Pressione Ctrl+C para parar o servidor" -ForegroundColor Cyan
Write-Host ""

# Iniciar servidor PHP
$phpExe = Join-Path $phpPath "php.exe"
& $phpExe -S "$serverHost`:$serverPort" -t $documentRoot
