<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Permission extends Model {

        // public $timestamps = false;
        protected $table = 'permissions';
        protected $fillable = [
            'description'
        ];

        public function role_perm(){

            return $this->belongsToMany('app\models\role_perm', 'role_id');
        }
    }