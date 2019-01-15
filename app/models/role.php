<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Role extends Model {

        // public $timestamps = false;
        protected $table = 'role';
        protected $fillable = [
            'name',
            
        ];

        public function role_perm(){

            return $this->belongsToMany('app\models\role_perm', 'role_id');
        }
        public function user_role(){

            return $this->belongsToMany('app\models\user_role', 'role_id');
        }
    }