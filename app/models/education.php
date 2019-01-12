<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Education extends Model {

        // public $timestamps = false;
        protected $table = 'education';
        protected $fillable = [
            'name',
            'subject',
            'startdate',
            'enddate',
            'description',
            'employee_id'
        ];

        public function employees(){

            return $this->belongsTo('app\models\employees', 'id');
        }
    }