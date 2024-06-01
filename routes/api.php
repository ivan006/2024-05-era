<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // This route will be accessible only by authenticated users via Sanctum
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

//    Route::apiResource('posts', PostController::class);
});


// API routes for address
Route::apiResource('addresses', \App\Http\Controllers\Api\AddressController::class);
// API routes for attachment
Route::apiResource('attachments', \App\Http\Controllers\Api\AttachmentController::class);
// API routes for audit
Route::apiResource('audits', \App\Http\Controllers\Api\AuditController::class);
// API routes for bank
Route::apiResource('banks', \App\Http\Controllers\Api\BankController::class);
// API routes for communication
Route::apiResource('communications', \App\Http\Controllers\Api\CommunicationController::class);
// API routes for contactnumber
Route::apiResource('contactnumbers', \App\Http\Controllers\Api\ContactNumberController::class);
// API routes for crm
Route::apiResource('crms', \App\Http\Controllers\Api\CrmController::class);
// API routes for document
Route::apiResource('documents', \App\Http\Controllers\Api\DocumentController::class);
// API routes for documentdetail
Route::apiResource('documentdetails', \App\Http\Controllers\Api\DocumentDetailController::class);
// API routes for domainuser
Route::apiResource('domainusers', \App\Http\Controllers\Api\DomainUserController::class);
// API routes for dummy
Route::apiResource('dummies', \App\Http\Controllers\Api\DummyController::class);
// API routes for email
Route::apiResource('emails', \App\Http\Controllers\Api\EmailController::class);
// API routes for entity
Route::apiResource('entities', \App\Http\Controllers\Api\EntityController::class);
// API routes for entityaudit
Route::apiResource('entityaudits', \App\Http\Controllers\Api\EntityAuditController::class);
// API routes for entityevent
Route::apiResource('entityevents', \App\Http\Controllers\Api\EntityEventController::class);
// API routes for entitygood
Route::apiResource('entitygoods', \App\Http\Controllers\Api\EntityGoodController::class);
// API routes for entitygoodapproval
Route::apiResource('entitygoodapprovals', \App\Http\Controllers\Api\EntityGoodApprovalController::class);
// API routes for entityrelationship
Route::apiResource('entityrelationships', \App\Http\Controllers\Api\EntityRelationshipController::class);
// API routes for externalproducers
Route::apiResource('externalproducers', \App\Http\Controllers\Api\ExternalProducerController::class);
// API routes for good
Route::apiResource('goods', \App\Http\Controllers\Api\GoodController::class);
// API routes for instanceno
Route::apiResource('instancenos', \App\Http\Controllers\Api\InstanceNoController::class);
// API routes for migrations
Route::apiResource('migrations', \App\Http\Controllers\Api\MigrationController::class);
// API routes for object
Route::apiResource('objects', \App\Http\Controllers\Api\ObjectController::class);
// API routes for objecttrait
Route::apiResource('objecttraits', \App\Http\Controllers\Api\ObjectTraitController::class);
// API routes for objectvalue
Route::apiResource('objectvalues', \App\Http\Controllers\Api\ObjectValueController::class);
// API routes for passwordhash
Route::apiResource('passwordhashes', \App\Http\Controllers\Api\PasswordHashController::class);
// API routes for productprovider
Route::apiResource('productproviders', \App\Http\Controllers\Api\ProductProviderController::class);
// API routes for query
Route::apiResource('queries', \App\Http\Controllers\Api\QueryController::class);
// API routes for queryheader
Route::apiResource('queryheaders', \App\Http\Controllers\Api\QueryHeaderController::class);
// API routes for relative
Route::apiResource('relatives', \App\Http\Controllers\Api\RelativeController::class);
// API routes for requirement
Route::apiResource('requirements', \App\Http\Controllers\Api\RequirementController::class);
// API routes for requirementdetail
Route::apiResource('requirementdetails', \App\Http\Controllers\Api\RequirementDetailController::class);
// API routes for rule
Route::apiResource('rules', \App\Http\Controllers\Api\RuleController::class);
// API routes for ruleaction
Route::apiResource('ruleactions', \App\Http\Controllers\Api\RuleActionController::class);
// API routes for ruleactiondata
Route::apiResource('ruleactiondatas', \App\Http\Controllers\Api\RuleActionDatumController::class);
// API routes for ruleconfig
Route::apiResource('ruleconfigs', \App\Http\Controllers\Api\RuleConfigController::class);
// API routes for ruleentityrole
Route::apiResource('ruleentityroles', \App\Http\Controllers\Api\RuleEntityRoleController::class);
// API routes for servicerequest
Route::apiResource('servicerequests', \App\Http\Controllers\Api\ServiceRequestController::class);
// API routes for servicerequestfrequency
Route::apiResource('servicerequestfrequencies', \App\Http\Controllers\Api\ServiceRequestFrequencyController::class);
// API routes for servicerequestreport
Route::apiResource('servicerequestreports', \App\Http\Controllers\Api\ServiceRequestReportController::class);
// API routes for systemaction
Route::apiResource('systemactions', \App\Http\Controllers\Api\SystemActionController::class);
// API routes for systemcode
Route::apiResource('systemcodes', \App\Http\Controllers\Api\SystemCodeController::class);
// API routes for systemconfiguration
Route::apiResource('systemconfigurations', \App\Http\Controllers\Api\SystemConfigurationController::class);
// API routes for systemlog
Route::apiResource('systemlogs', \App\Http\Controllers\Api\SystemLogController::class);
// API routes for systemuser
Route::apiResource('systemusers', \App\Http\Controllers\Api\SystemUserController::class);
// API routes for transactions
Route::apiResource('transactions', \App\Http\Controllers\Api\TransactionController::class);
// API routes for treatmentdetails
Route::apiResource('treatmentdetails', \App\Http\Controllers\Api\TreatmentDetailController::class);
// API routes for useraccess
Route::apiResource('useraccesses', \App\Http\Controllers\Api\UserAccessController::class);
// API routes for userconfiguration
Route::apiResource('userconfigurations', \App\Http\Controllers\Api\UserConfigurationController::class);
// API routes for userdevice
Route::apiResource('userdevices', \App\Http\Controllers\Api\UserDeviceController::class);
// API routes for userrole
Route::apiResource('userroles', \App\Http\Controllers\Api\UserRoleController::class);
// API routes for userroleaccess
Route::apiResource('userroleaccesses', \App\Http\Controllers\Api\UserRoleAccessController::class);
// API routes for website_producer_registrations
Route::apiResource('website_producer_registrations', \App\Http\Controllers\Api\WebsiteProducerRegistrationController::class);