<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model {

        // public $timestamps = false;
        protected $table = 'posts';
        protected $fillable = [
            'title',
            'description',
            'user_id'
        ];

        public function user(){

            return $this->belongsTo('app\models\user', 'id');
        }
    }