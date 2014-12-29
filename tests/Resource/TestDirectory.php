<?php

/*
 * This file is part of the puli/repository package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Puli\Repository\Tests\Resource;

use Puli\Repository\Resource\AbstractResource;
use Puli\Repository\Resource\Collection\ArrayResourceCollection;

/**
 * @since  1.0
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class TestDirectory extends AbstractResource
{
    /**
     * @var Resource[]
     */
    private $children = array();

    public function __construct($path = null, array $children = array())
    {
        parent::__construct($path);

        foreach ($children as $child) {
            $this->children[$child->getName()] = $child;
        }
    }

    public function getChild($relPath)
    {
        return $this->children[$relPath];
    }

    public function hasChild($relPath)
    {
        return isset($this->children[$relPath]);
    }

    public function hasChildren()
    {
        return count($this->children) > 0;
    }

    public function listChildren()
    {
        return new ArrayResourceCollection($this->children);
    }
}
