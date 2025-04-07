# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Tisla Template : https://github.com/stisla/stisla

Download Template : https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbFYwZmdPelZ4bjB5bXlWLXVFVkxnTnBfWS1yUXxBQ3Jtc0tsLVFWTjYxQ1BCUTAyOTNpYk9rbjJjVkl0NDJha1RTVnNfaS10REphODBZQmt1VVhmTHJCb3Uwbnh4eGhrek5QZWlfUHdCRmNrb3dybEFWZUdTdUxyTXdCb1dFaDhyMF9TQnFtYURZLUJSQXJGdlE4NA&q=https%3A%2F%2Fyukcoding.id%2Fdownload-koleksi-template-bootstrap-responsive-gratis%2F&v=Kre5kJIufhw

Script home.php : https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqa0FfRmE3N1RWN1pRZFp2MDYwNUp3WjZCbW9fd3xBQ3Jtc0tsaHVwemVBb2JMSk4xTUZyaXdZS2NhQjI4c2JYSlM1TDFVR0Q1YU5sQ1Jxc25GbU84cUxXYzYyWVk2RzNrR183Q3pDWG9CMjFscXc4WW1VNWFMdlNjUVZBN2ROWGFTaGpKUzZfSWlHNzRYbjNhdF81UQ&q=https%3A%2F%2Fpastebin.com%2FLv9gbUgh&v=Kre5kJIufhw

SC template public (lite) : https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbDhnMGxxeHBTZ2pYc0ppOFNZZlRoTU1Fdk84d3xBQ3Jtc0tsQWJrTUhRSjAwV1p0RUdNeEpvMm54VVpyc3F6cksxQlpFckxMUkQ5Z2xOTzJVQXlUemdTa1J0S3Z2Wk9KTUpWMG9nbFdBdVRSSzlvRGpVQ2tPXzhrX2dSalpTOGlrRnhVY2tDXzFTLS1OOU8tYXRsZw&q=https%3A%2F%2Fdrive.google.com%2Ffile%2Fd%2F1faeYDIigD_17K6pSU13Yl_XKMZav06eS%2F&v=Kre5kJIufhw

SC template public (full) : https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbG5ocnhERXhJdFVtb01nbXJ3WDBlZU4tTGx4d3xBQ3Jtc0trVFE0QWlISVgyeWdSejE1bHFIOWhPNjFwVEpOS2stRXhTdHotQWU1S0ZNUHpaaFE5b2lqamFhOEhmSnFuSzU0VG5GandndjBMT1Q1cDFsSDQ4YVh6OTVmMU5CbGtoSUhDc1l3MWtCN2ZIR3dQRUliMA&q=https%3A%2F%2Fdrive.google.com%2Ffile%2Fd%2F1Z2WMITOd1UzGiul3v0COivB81YKwFpSe%2F&v=Kre5kJIufhw

E:\CI4\ci4-undangan\public\template>yarn install