@ECHO OFF
REM keep the old path
set OLDDIR=%CD%
REM CD into the directory
cd %~dp0
REM run thing
vendor\phing\phing\bin\phing.bat
REM return to old path
cd "%OLDDIR%"