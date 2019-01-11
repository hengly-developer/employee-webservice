<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Category extends Model {

        public $timestamps = false;
        protected $table = 'categories';
        protected $fillable = [
            'education_id',
            'skill_id',
            'experience_id',

        ];

        public function education(){

            return $this->hasMany('app\models\education', 'id');
        }

        public function experince(){
            return $this->hasMany('app\models\experince', 'id');
        }

        
        public function skill(){
            return $this->hasMany('app\models\skill', 'id');
        }
    }