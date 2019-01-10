<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Department extends Model {

        // public $timestamps = false;
        protected $table = 'department';
        protected $fillable = [
            'name'
        ];

        public function employee(){

            return $this->hasMany('app\models\department', 'department_id');
        }
    }