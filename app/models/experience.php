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
            'description'
        ];

        public function experience(){

            return $this->belongsToMany('app\models\category', 'experince_id');
        }
    }