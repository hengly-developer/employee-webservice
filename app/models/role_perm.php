<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Role_Permission extends Model {

        // public $timestamps = false;
        protected $table = 'role_permission';
        protected $fillable = [
            'role_id',
            'perm_id'
            
        ];

        public function permission(){

            return $this->belongsToMany('app\models\permission', 'id');
        }
        public function role(){

            return $this->belongsToMany('app\models\role', 'id');
        }
    }