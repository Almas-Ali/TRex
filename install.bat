@echo off
title TRex installation
color 0a
cls

setlocal EnableExtensions DisableDelayedExpansion
echo TRex installation...
if exist "%SystemRoot%\System32\choice.exe" goto UseChoice
setlocal EnableExtensions EnableDelayedExpansion

:UseSetPrompt
    set "UserChoice="
    set /p "UserChoice=Are you sure [Y/N]? "
    set "UserChoice=!UserChoice: =!"
    if /i not "!UserChoice!" == "Y" endlocal & goto :eof
    endlocal
    goto Continue

:UseChoice
    %SystemRoot%\System32\choice.exe /C YN /N /M "Are you sure [Y/N]?"
    if not errorlevel 2 if errorlevel 1 goto Continue
    goto :eof

:Continue
    echo Starting the installation...
    echo.
    echo Installing env details...
    copy .env.example .env
    echo Installing env details DONE!
    echo.
    composer install
    php artisan key:generate
    php artisan passport:install --force
    php artisan migrate:fresh --force
    php artisan trex:install
    endlocal

:eof
    rem This is the deadend of this file!
    exit /b


