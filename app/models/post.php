<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model {

        // public $timestamps = false;
        protected $table = 'posts';
        protected $fillable = [
            'title',
            'description'
            
        ];

        public function employee(){

            return $this->hasMany('app\models\employee_detail', 'id');
        }
    }