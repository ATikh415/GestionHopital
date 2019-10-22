<?php

use Core\Router;

require '../vendor/autoload.php';

define('ROOT',dirname(__DIR__));
define('ASSETS_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR);
$router = new Router( ROOT . '/views');

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router
    //LOGIN
    ->match('/', 'auth/login', 'login')
    ->match('/logout', 'auth/logout', 'logout')
    //RENDEZ-VOUS
    ->get('/secretary/rv', 'secretary/rv/index', 'secretary_home')
    ->get('/', 'e404', 'e404')
    ->match('/secretary/rv/new', 'secretary/rv/new', 'secretary_rv_new')
    ->post('/secretary/rv/delete/[i:id]', 'secretary/rv/delete', 'secretary_rv_delete')
    ->match('/secretary/rv/edit/[i:id]', 'secretary/rv/edit', 'secretary_rv_edit')
    ->match('/secretary/rv/show/[i:id]', 'secretary/rv/show', 'secretary_rv_show')
    //PATIENTS
    ->get('/secretary/patient', 'secretary/patients/index', 'secretary_patient')
    ->match('/secretary/patient/new', 'secretary/patients/new', 'secretary_patient_new')
    ->post('/secretary/patient/delete/[i:cin]', 'secretary/patients/delete', 'secretary_patient_delete')
    ->match('/secretary/patient/edit/[i:cin]', 'secretary/patients/edit', 'secretary_patient_edit')
    ->match('/secretary/patient/show/[i:cin]', 'secretary/patients/show', 'secretary_patient_show')
    //PLANNINGS
    ->get('/secretary/planning', 'secretary/plannings/index', 'secretary_planning')
    ->match('/secretary/planning/new', 'secretary/plannings/new', 'secretary_planning_new')
    ->post('/secretary/planning/delete/[i:id]', 'secretary/plannings/delete', 'secretary_planning_delete')
    ->match('/secretary/planning/edit/[i:id]', 'secretary/plannings/edit', 'secretary_planning_edit')
    ->match('/secretary/planning/show/[i:id]', 'secretary/plannings/show', 'secretary_planning_show')
    //ADMIN
    //RENDEZ-VOUS
    ->get('/admin/rv', 'admin/rv/index', 'admin_home')
    ->match('/admin/rv/new', 'admin/rv/new', 'admin_rv_new')
    ->post('/admin/rv/delete/[i:id]', 'admin/rv/delete', 'admin_rv_delete')
    ->match('/admin/rv/edit/[i:id]', 'admin/rv/edit', 'admin_rv_edit')
    ->match('/admin/rv/show/[i:id]', 'admin/rv/show', 'admin_rv_show')
    //SECRETARY
    ->get('/admin/secretary', 'admin/secretariat/index', 'admin_secretary')
    ->match('/admin/secretary/new', 'admin/secretariat/new', 'admin_secretary_new')
    ->post('/admin/secretary/delete/[i:id]', 'admin/secretariat/delete', 'admin_secretary_delete')
    ->match('/admin/secretary/edit/[i:id]', 'admin/secretariat/edit', 'admin_secretary_edit')
    ->match('/admin/secretary/show/[i:id]', 'admin/secretariat/show', 'admin_secretary_show')
    //DOCTORS
    ->get('/admin/doctor', 'admin/doctors/index', 'admin_doctor')
    ->match('/admin/doctor/new', 'admin/doctors/new', 'admin_doctor_new')
    ->post('/admin/doctor/delete/[i:cin]', 'admin/doctors/delete', 'admin_doctor_delete')
    ->match('/admin/doctor/edit/[i:cin]', 'admin/doctors/edit', 'admin_doctor_edit')
    ->match('/admin/doctor/show/[i:cin]', 'admin/doctors/show', 'admin_doctor_show')
    //SPECIALISTE => ADMIN
    ->get('/admin/speciality', 'admin/speciality/index', 'admin_speciality')
    ->match('/admin/speciality/new', 'admin/speciality/new', 'admin_speciality_new')
    ->post('/admin/speciality/delete/[i:id]', 'admin/speciality/delete', 'admin_speciality_delete')
    ->match('/admin/speciality/edit/[i:id]', 'admin/speciality/edit', 'admin_speciality_edit')
    //SPECIALITY 
    ->get('/admin/specialiste', 'admin/specialistes/index', 'admin_specialiste')
    ->match('/admin/specialiste/new', 'admin/specialistes/new', 'admin_specialiste_new')
    ->post('/admin/specialiste/delete/[i:id]', 'admin/specialistes/delete', 'admin_specialiste_delete')
    ->match('/admin/specialiste/edit/[i:id]', 'admin/specialistes/edit', 'admin_specialiste_edit')
     //SERVICES
     ->get('/admin/service', 'admin/service/index', 'admin_service')
     ->match('/admin/service/new', 'admin/service/new', 'admin_service_new')
     ->post('/admin/service/delete/[i:id]', 'admin/service/delete', 'admin_service_delete')
     ->match('/admin/service/edit/[i:id]', 'admin/service/edit', 'admin_service_edit')
     //DOCTOR
     //RENDEZ-VOUS par Doctor
     ->get('/doctor/rv', 'doctor/rv/index', 'doctor_home')
    ->match('/doctor/rv/show/[i:id]', 'doctor/rv/show', 'doctor_rv_show')
    ->run();
