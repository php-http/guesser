<?php

namespace Http\Discovery;

use Http\Message\UriFactory;

/**
 * Finds a URI Factory.
 *
 * @author David de Boer <david@ddeboer.nl>
 */
final class UriFactoryDiscovery extends ClassDiscovery
{
    /**
     * Finds a URI Factory.
     *
     * @return UriFactory
     */
    public static function find()
    {
        try {
            $uriFactory = static::findOneByType('Http\Message\UriFactory');

            return new $uriFactory();
        } catch (NotFoundException $e) {
            throw new NotFoundException(
                'No factories found. Install php-http/message to use Guzzle or Diactoros factories.',
                0,
                $e
            );
        }
    }
}
