@echo off
title Creating Red Lotus Final Project

@REM set BASE_PATH=C:\xampp\htdocs

@REM cd /d %BASE_PATH%

@REM mkdir red_lotus_bungalow
@REM cd red_lotus_bungalow

echo Creating folders...

mkdir config
mkdir includes
mkdir admin
mkdir admin\uploads
mkdir assets
mkdir assets\css
mkdir assets\js
mkdir assets\images

echo Creating frontend files...
type nul > index.php
type nul > rooms.php
type nul > booking.php
type nul > contact.php

echo Creating config files...
type nul > config\database.php

echo Creating include files...
type nul > includes\header.php
type nul > includes\navbar.php
type nul > includes\footer.php
type nul > includes\auth.php

echo Creating admin files...
type nul > admin\login.php
type nul > admin\dashboard.php
type nul > admin\manage_rooms.php
type nul > admin\manage_bookings.php
type nul > admin\logout.php

echo Creating SQL file...
type nul > database.sql

echo.
echo ✅ FINAL Project Structure Created Successfully!
pause
