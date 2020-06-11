<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hootlex\Moderation\Moderatable;

class Member extends Model
{
    use Moderatable;
    
   // Table Name
   protected $table = 'members';
   // Primary Key
   public $primaryKey = 'id';
   // Timestamps
   public $timestamps = true;

}
