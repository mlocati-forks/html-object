<?php

namespace HtmlObject;

use HtmlObject\Traits\Helpers;
use HtmlObject\Traits\Tag;

/**
 * A classic HTML element.
 */
class Element extends Tag
{
    ////////////////////////////////////////////////////////////////////
    //////////////////////////// CORE METHODS //////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Creates a basic Element.
     *
     * @param string|null                                     $element
     * @param string|\HtmlObject\Traits\TreeObject|array|null $value      Its value (a text, a child, or an array of children: see setValue())
     * @param array                                           $attributes
     */
    public function __construct($element = null, $value = null, $attributes = array())
    {
        $this->setTag($element, $value, $attributes);
    }

    /**
     * Static alias for constructor.
     *
     * @param string                                          $element
     * @param string|\HtmlObject\Traits\TreeObject|array|null $value      Its value (a text, a child, or an array of children: see setValue())
     * @param array                                           $attributes
     *
     * @return $this
     */
    public static function create($element = null, $value = null, $attributes = array())
    {
        return new static($element, $value, $attributes);
    }

    /**
     * Dynamically create an element.
     *
     * @param string $method     The element
     * @param array  $parameters The value (see setValue()) and the attributes
     *
     * @return $this
     */
    public static function __callStatic($method, $parameters)
    {
        $value = Helpers::arrayGet($parameters, 0);
        $attributes = Helpers::arrayGet($parameters, 1);

        return new static($method, $value, $attributes);
    }
}
