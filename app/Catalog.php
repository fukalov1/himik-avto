<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{

    public function goods() {
        return $this->hasMany(Good::class);
    }
}
