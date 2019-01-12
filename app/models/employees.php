<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Employees extends Model {

        // public $timestamps = false;
        protected $table = 'employees';
        protected $fillable = [
            'department_id',
            'branch_id',
            'fullname',
            'user_id',
            'post_id',
            'email',
            'address',
            'phone'
        ];

        // public function employee_detail(){
            
        //     return $this->belongsTo('app\models\employee_detail', 'id');
        // }

        public function department(){
            return $this->belongsTo('app\models\department', 'id');
        }

        public function branch(){
            return $this->belongsTo('app\models\branch', 'id');
        }

        public function user(){
            return $this->belongsTo('app\models\user', 'id');
        }

        public function post(){
            return $this->belongsTo('app\models\post', 'emp_id');
        }

        public function skill(){
            return $this->hasMany('app\models\skill', 'employee_id');
        }
        public function education(){
            return $this->hasMany('app\models\education', 'employee_id');
        }
        public function experience(){
            return $this->hasMany('app\models\experience', 'employee_id');
        }

    }