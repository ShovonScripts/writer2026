<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Event extends Model { protected $fillable=['title_bn','title_en','description_bn','description_en','event_date','location']; protected $casts=['event_date'=>'date']; }
