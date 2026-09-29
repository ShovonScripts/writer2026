<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BookLink extends Model { protected $fillable=['book_id','platform_name','url','icon','sort_order']; public function book(): BelongsTo { return $this->belongsTo(Book::class); } }
