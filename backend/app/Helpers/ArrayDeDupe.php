<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 27/09/2017
 * Time: 14:35
 */

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ArrayDeDupe
{
    /**
     * Iterates over the array of objects and looks for matching property values.
     * If a match is found the later object is removed from the array, which is returned
     * @param array $objects The objects to iterate over
     * @param array $props Array of the properties to dedupe on.
     *   If more than one property is specified then all properties must match for it to be deduped.
     * @return array
     */
    public static function run($objects, $props)
    {
        if (empty($objects) || empty($props))
            return $objects;


        $results = array();
        foreach ($objects as $object) {
            $matched = false;
            foreach ($results as $result) {
                $matches = 0;
                foreach ($props as $prop) {
                    if ($object->$prop == $result->$prop)
                        $matches++;
                }
                if ($matches == count($props)) {
                    $matched = true;
                    break;
                }

            }
            if (!$matched)
                $results[] = $object;
        }
        return $results;
    }
}