<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Skill extends Model {

        // public $timestamps = false;
        protected $table = 'skill';
        protected $fillable = [
            'name',
            'description'
        ];

        public function category(){

            return $this->belongsToMany('app\models\category', 'skill_id');
        }
    }