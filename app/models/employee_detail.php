<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Employee_Detail extends Model {

        public $timestamps = false;
        protected $table = 'employee_detail';
        protected $fillable = [
            'education_id',
            'skill_id',
            'experience_id',

        ];

        public function education(){

            return $this->hasMany('app\models\education', 'id');
        }

        public function experience(){
            return $this->hasMany('app\models\experience', 'id');
        }

        
        public function skill(){
            return $this->hasMany('app\models\skill', 'id');
        }
    }