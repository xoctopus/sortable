<?php

namespace Xoctopus\Sortable;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class SortField implements \Stringable
{
    /**
     * The value of the sort field as a stringable object.
     *
     * @var \Illuminate\Support\Stringable
     */
    private Stringable $value;

    /**
     * The alias of the sort field as a stringable object.
     *
     * @var \Illuminate\Support\Stringable
     */
    private Stringable $alias;

    /**
     * SortField constructor.
     *
     * @param  string  $value
     * @param  string  $alias
     */
    public function __construct(string $value = '', string $alias = '')
    {
        $this->setValue($value);
        $this->setAlias($alias);
    }

    /**
     * Get the sort field value.
     *
     * @return \Illuminate\Support\Stringable
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the sort field value.
     *
     * @param  string  $value
     * @return $this
     */
    public function setValue(string $value = '')
    {
        $this->value = Str::of($value)->replaceMatches('/\s+/', '');

        return $this;
    }

    /**
     * Get the sort field alias.
     *
     * @return \Illuminate\Support\Stringable
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set the sort field alias.
     *
     * @param  string  $alias
     * @return $this
     */
    public function setAlias(string $alias = '')
    {
        $this->alias = Str::of($alias)->replaceMatches('/\s+/', '');

        return $this;
    }

    /**
     * Determine if the direction of the sort field is ascending.
     *
     * @return bool
     */
    public function isAscending()
    {
        return ! $this->isDescending();
    }

    /**
     * Determine if the direction of the sort field is descending.
     *
     * @return bool
     */
    public function isDescending()
    {
        return $this->value->startsWith('-');
    }

    /**
     * Get the sort field direction.
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->isDescending() ? 'DESC' : 'ASC';
    }

    /**
     * Gets a string representation of the sort field.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getValue()->toString();
    }
}
