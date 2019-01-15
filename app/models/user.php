<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model {

        // public $timestamps = false;
        protected $table = 'users';
        protected $fillable = [
            'username',
            'email',
            'password',
            'remember_token',
            'remember_identifier'
        ];

        public function employee(){
            return $this->hasOne('app\models\employees', 'user_id');
        }
    }