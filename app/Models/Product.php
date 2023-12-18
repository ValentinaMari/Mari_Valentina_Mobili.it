<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory; 
   

    protected  $fillable =['name', 'price', 'description','img', 'user_id','category_id'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);

    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }

    
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
