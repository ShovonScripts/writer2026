<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Post extends Model { protected $fillable=['title_bn','title_en','slug','content_bn','content_en','excerpt_bn','excerpt_en','featured_image','category_id','published_at','status']; protected $casts=['published_at'=>'datetime']; public function category(): BelongsTo { return $this->belongsTo(Category::class); } }
