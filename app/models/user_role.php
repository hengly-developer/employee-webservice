<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class User_Role extends Model {

        // public $timestamps = false;
        protected $table = 'user_role';
        protected $fillable = [
            'user_id',
            'role_id'
            
        ];

        public function role_perm(){

            return $this->belongsToMany('app\models\users', 'id');
        }
        public function user_role(){

            return $this->belongsToMany('app\models\role', 'id');
        }
    }