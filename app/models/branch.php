<?php

    namespace app\models;

    use Illuminate\Database\Eloquent\Model;

    class Branch extends Model {

        // public $timestamps = false;
        protected $table = 'branch';
        protected $fillable = [
            'name'
        ];

        public function employee(){

            return $this->hasMany('app\model\employee', 'branch_id');
        }
    }