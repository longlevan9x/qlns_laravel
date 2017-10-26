<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User as BaseUser;
use App\Helpers\UploadFile;
class User extends BaseUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'phone', 'gender', 'address', 'city', 'people_id', 'description', 'is_active', 'role', 'is_online', 'last_login', 'last_logout', 'password_reset_token', 'remember_token', 'image', 'auth_key', 'created_user'
    ];

    public function createUser($request)
    {
    	$model = new User();
        $model->fill($request->all());
        $model->password = bcrypt($request->password);
    	$image = UploadFile::saveFile($request, 'image');
        $model->image = $image;
        if($model->save()) {
        	return true;
        }
        UploadFile::deleteFile($image);
        return false;
    }
}
