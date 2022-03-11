<?php

namespace App\Traits;

trait ModelSelectOptionsTrait {

    public function scopeSelectOptions($query, $valueColumn, $labelColumn) {
        $query->select("$valueColumn as value", "$labelColumn as label");
    }

}
