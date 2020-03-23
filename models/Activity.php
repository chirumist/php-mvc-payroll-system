<?php

class Activity extends Model{

    protected $table = 'activity';

    protected $fillable = ['type', 'created_at','user_id'];

}