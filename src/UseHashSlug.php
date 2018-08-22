<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 22/08/2018
 * Time: 7:39 PM
 */

namespace Afiqiqmal\LaraHashSlug;

use Illuminate\Database\Eloquent\Builder;

trait UseHashSlug
{
    public $slug_column = "hashslug";

    public static function bootUseHashSlug()
    {
        static::observe(app(LaraHashSlugObserver::class));
    }

    /**
     * @return string
     */
    protected function getSlugKeyName()
    {
        return $this->slug_column;
    }

    /**
     * @param Builder $scope
     * @param $slug
     * @return Builder
     */
    public function scopeWhereSlug(Builder $scope, $slug)
    {
        return $scope->where($this->getSlugKeyName(), $slug);
    }

    /**
     * @param Builder $scope
     * @param $slug
     * @param array $columns
     * @return mixed
     */
    public function scopeFindBySlug(Builder $scope, $slug, array $columns = ['*']) {
        return $scope->whereSlug($slug)->first($columns);
    }

    /**
     * @param Builder $scope
     * @param string $slug
     * @param array $columns
     * @return mixed
     */
    public function scopeFindBySlugOrFail(Builder $scope, $slug, array $columns = ['*']) {
        return $scope->whereSlug($slug)->firstOrFail($columns);
    }

    /**
     * Find a model by its primary slug.
     *
     * @param string $slug
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public static function findBySlug($slug, array $columns = ['*'])
    {
        return static::whereSlug($slug)->first($columns);
    }

    /**
     * Find a model by its primary slug or throw an exception.
     *
     * @param string $slug
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     */
    public static function findBySlugOrFail($slug, array $columns = ['*'])
    {
        return static::whereSlug($slug)->firstOrFail($columns);
    }
}