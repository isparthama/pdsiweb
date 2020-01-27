<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class ApiBaseController
 * @package App\Http\Controllers\Api
 * @author efriandika
 */
class ApiBaseController extends Controller
{
    private $errors = [];
    protected $user;
    protected $permissionModule;

    protected $errorDataNotFound = 'DATA_NOT_FOUND';
    protected $errorUserNotFound = 'USER_NOT_FOUND';
    protected $errorInvalidCredentials = 'INVALID_CREDENTIALS';
    protected $errorFailedToUpload = 'FAILED_TO_UPLOAD';
    protected $errorFailedToSave = 'FAILED_TO_STORE';
    protected $errorFatal = 'FATAL_ERROR';

    protected function addError($code, $message, $additionalData = array()){
        $error = [
            'code'      => $code,
            'message'   => $message
        ];

        if(count($additionalData) > 0)
            $error = array_merge($error, $additionalData);

        $this->errors[] = $error;
    }

    protected function hasError(){
        return (count($this->errors) > 0) ? true : false;
    }

    protected function responseWithErrors($statusCode = 200){
        \Log::error('API RESPONSE ERROR: '.json_encode(['errors' => $this->errors]));
        return response()->json(['errors' => $this->errors], $statusCode);
    }

    protected function responseWithPermission($data){
        $permission = $this->permissionModule;
        return response()->json(compact('data','permission'));
    }

    

}
