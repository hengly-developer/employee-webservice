<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Skill extends Model {

        // public $timestamps = false;
        protected $table = 'skill';
        protected $fillable = [
            'name',
            'description',
            'employee_id'
        ];

        public function employees(){

            return $this->belongsTo('app\models\employees', 'id');
        }
    }