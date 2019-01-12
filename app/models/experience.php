<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Experince extends Model {

        // public $timestamps = false;
        protected $table = 'experince';
        protected $fillable = [
            'name',
            'position',
            'company',
            'startdate',
            'enddate',
            'description',
            'employee_id'
        ];

        public function employees(){

            return $this->belongsTo('app\models\employees', 'id');
        }
    }