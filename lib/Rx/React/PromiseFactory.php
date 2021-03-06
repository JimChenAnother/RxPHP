<?php

namespace Rx\React;

use Rx\Observable;

final class PromiseFactory
{
    /**
     * Returns an observable sequence that invokes the specified factory function whenever a new observer subscribes.
     *
     * @param callable $factory
     * @return \Rx\Observable\AnonymousObservable
     */
    public static function toObservable(callable $factory)
    {
        $observableFactory = function () use ($factory) {
            return Promise::toObservable($factory());
        };

        return Observable::defer($observableFactory);
    }
}
