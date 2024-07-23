<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public const MESSAGE_CREATED = 'Created successfully.';
    public const MESSAGE_DUPLICATE = 'Already exists.';
    public const MESSAGE_DUPLICATE_EMAIL = 'Email already exists.';
    public const MESSAGE_UPDATED = 'Selected item updated successfully.';
    public const MESSAGE_RESTORED = 'Selected item restored successfully.';
    public const MESSAGE_DELETE_ALL = 'Items permanently deleted.';    
    public const MESSAGE_WRONG_CODE = 'Entered code is wrong.';   
    public const MESSAGE_EXPIRED_CODE = 'Entered code is expired.';    
    public const MESSAGE_NOT_FOUND = 'Not found.';    

 

    
}