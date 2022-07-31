<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicForm extends Model
{
    use HasFactory;

    protected $guarded = [];

     /**
     * Get the user that submitted the form.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
