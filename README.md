<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>




## Quick Start
### 1. Install Dependencies
composer install
### 2. Install JS Dependencies
npm install
### 3. Watch Files in Command 1
npm run watch
### 4. Running PHP in Command 2
php artisan serve

## Endpoints
4 Table => patients, doctors, medicines, medicalrecords\n
The command of api is same, this is example of command for API of "patients"
### List all patientss with links and meta
GET api/patients
### Get single patients
GET api/patient/{id}
### Delete article
DELETE api/patient/{id}
### Add article
POST api/patient
### Update article
PUT api/patient/{id}
