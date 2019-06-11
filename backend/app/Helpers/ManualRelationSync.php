<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 12/09/2017
 * Time: 13:57
 */

namespace App\Helpers;


class ManualRelationSync
{
    /**
     * Used to manual sync many to many relationship
     * with soft delete.
     *
     * The sync function provided by Eloquent can't
     * soft delete.
     *
     * @param $mainModelIdName
     * @param $mainModelClass
     * @param $mainModelId
     * @param $relationClass
     * @param $secondModelIdName
     * @param $newItems
     * @param null $userId
     * @return mixed
     */
    public static function sync($mainModelIdName, $mainModelClass, $mainModelId, $relationClass,
                                $secondModelIdName, $newItems, $userId = NULL)
    {
        $item = $mainModelClass::find($mainModelId);

        $currentIds = $relationClass::where($mainModelIdName, $mainModelId)
            ->get()
            ->pluck("$secondModelIdName");
        $newIds = array_column($newItems, 'id');

        foreach ($currentIds as $currentId) {
            if (!in_array($currentId, $newIds)) {
                $relationClass::where($secondModelIdName, $currentId)
                    ->where($mainModelIdName, $mainModelId)
                    ->delete();
            }
        }
        foreach ($newIds as $newId) {
            if (!in_array($newId, $currentIds->toArray())) {
                $data = [
                    "$secondModelIdName" => $newId,
                    "$mainModelIdName" => $item->id,
                ];

                if ($userId) {
                    $data['user_id'] = $userId;
                }

                $relationClass::create($data);
            }

        }
    }
}