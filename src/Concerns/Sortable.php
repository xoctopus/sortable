<?php

namespace Xoctopus\Sortable\Concerns;

use Xoctopus\Sortable\Scopes\SortableScope;

/**
 * Sortable Trait.
 *
 * @property array $sortable
 *
 * @extends \Illuminate\Database\Eloquent\Model
 */
trait Sortable
{
    /**
     * Boot the Sortable trait for a model.
     *
     * @return void
     */
    protected static function bootSortable()
    {
        static::addGlobalScope(resolve(SortableScope::class));
    }

    /**
     * Remove the Sortable trait for a model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withoutSortable()
    {
        return static::withoutGlobalScope(SortableScope::class);
    }

    /**
     * Get the sortable attributes for the model.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSortable()
    {
        //
    }

    /**
     * Determines if the model has the 'sortable' property and its value is
     * not an empty array.
     *
     * @return bool
     */
    public function hasSortable()
    {
        if (property_exists($this, 'sortable')) {
            return is_array($this->sortable) && empty($this->sortable);
        }

        return false;
    }

    /**
     * Set the sortable attributes for the model.
     *
     * @param  array  $sortable
     * @return $this
     */
    public function setSortable(array $sortable)
    {
        if (property_exists($this, 'sortable')) {
            $this->sortable = $sortable;
        }

        return $this;
    }

    /**
     * Merge new sortable attributes with existing sortables attributes on
     * the model.
     *
     * @param  array  $sortable
     * @return $this
     */
    public function mergeSortable(array $sortable)
    {
        if (property_exists($this, 'sortable')) {
            $this->sortable = array_merge($this->sortable, $sortable);
        }

        return $this;
    }
}
