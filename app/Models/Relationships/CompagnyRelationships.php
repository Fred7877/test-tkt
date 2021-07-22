<?php

namespace App\Models\Relationships;
use App\Models\Result;

trait CompagnyRelationships {

    /**
     * Get the results of compagny
     */
    public function results() {
        return $this->hasMany(Result::class);
    }
}
