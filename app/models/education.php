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
            'description'
        ];

        public function category(){

            return $this->belongsToMany('app\models\category', 'education_id');
        }
    }