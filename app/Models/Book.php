<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Book extends Model { protected $fillable=['title_bn','title_en','slug','description_bn','description_en','cover_image','category_id','published_year','is_featured','status']; protected $casts=['is_featured'=>'boolean','published_year'=>'integer']; public function category(): BelongsTo { return $this->belongsTo(Category::class); } public function links(): HasMany { return $this->hasMany(BookLink::class)->orderBy('sort_order'); } }
