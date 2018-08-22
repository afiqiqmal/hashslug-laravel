<?php

namespace Afiqiqmal\LaraHashSlug;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 22/08/2018
 * Time: 4:09 PM
 */

class LaraHashSlugObserver
{
    public function creating(Model $model)
    {
        $slug_column = $model->slug_column;

        if (Schema::hasColumn($model->getTable(), $slug_column) && is_null($model->{$slug_column})) {
            $timestamp = time() + $model->count() + mt_rand();

            if (config('hashslug.unique')) {
                // check if model use soft delete
                if (method_exists($model, 'bootSoftDeletes')) {
                    $keys = $model->withTrashed()->pluck($slug_column)->toArray();
                } else {
                    $keys = $model->pluck($slug_column)->toArray();
                }

                //check unique hash Ids
                while (in_array($timestamp = time() + $model->count() + 1, $keys)) {}
            }

            $model->{$slug_column} = hash_service($model->getTable())->encode($timestamp);
        }
    }
}