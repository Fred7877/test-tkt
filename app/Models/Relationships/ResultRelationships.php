<?php

namespace App\Models\Relationships;
use App\Models\Result;

trait ResultRelationships {

    /**
     * Get compagny of result
     */
    public function compagny() {
        return $this->hasOne(Compagny::class);
    }
}
