<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Employees extends Model {

        public $timestamps = false;
        protected $table = 'employees';
        protected $fillable = [
            'fullname',
            'email',
            'address'
        ];

        public function category(){
            return $this->belongsTo('app\models\category', 'id');
        }

        public function department(){
            return $this->belongsTo('app\models\department', 'id');
        }

        public function branch(){
            return $this->belongsTo('app\models\branch', 'id');
        }

        public function user(){
            return $this->belongsTo('app\models\user', 'id');
        }
    }