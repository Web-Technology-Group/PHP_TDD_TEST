@ECHO OFF
TITLE "PHP Test Game"
REM keep the old path
set OLDDIR=%CD%
REM CD into the directory
cd %~dp0
REM run the game
php game
REM return to old path
cd "%OLDDIR%"