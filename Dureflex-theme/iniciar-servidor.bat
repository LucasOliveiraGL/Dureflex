@echo off
echo ====================================
echo    DUREFLEX - Servidor Local
echo ====================================
echo.

REM Verificar se estamos no diretório correto
if not exist "php-portable\php.exe" (
    echo ERRO: Arquivo php.exe não encontrado!
    echo Certifique-se de estar no diretório Dureflex-theme
    pause
    exit /b 1
)

REM Definir variáveis
set PHP_PATH=%cd%\php-portable
set DOCUMENT_ROOT=%cd%
set SERVER_HOST=localhost
set SERVER_PORT=8080

echo Configurações:
echo - PHP Path: %PHP_PATH%
echo - Document Root: %DOCUMENT_ROOT%
echo - Servidor: http://%SERVER_HOST%:%SERVER_PORT%
echo.

REM Verificar se a porta está disponível
netstat -an | find ":%SERVER_PORT%" > nul
if %errorlevel% == 0 (
    echo AVISO: A porta %SERVER_PORT% já está em uso!
    echo Tentando usar a porta 8081...
    set SERVER_PORT=8081
)

echo Iniciando servidor PHP...
echo.
echo ====================================
echo  Servidor rodando em:
echo  http://%SERVER_HOST%:%SERVER_PORT%
echo ====================================
echo.
echo Pressione Ctrl+C para parar o servidor
echo.

REM Iniciar servidor PHP
"%PHP_PATH%\php.exe" -S %SERVER_HOST%:%SERVER_PORT% -t "%DOCUMENT_ROOT%"

pause
