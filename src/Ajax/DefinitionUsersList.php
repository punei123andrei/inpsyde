<?php

/**
 * Inpsyde Users
 *
 * @package   Inpsyde Users
 * @author    Punei Andrei <punei.andrei@gmail.com>
 * @license   GNU General Public License v3.0
 */

declare(strict_types=1);

namespace Inpsyde\Ajax;

class DefinitionUsersList implements RequestDefinition
{
    /**
     * Route.
     * @return string
     */
    public function route(): string
    {
        return ApiBase::baseUrl('/users');
    }

    /**
     * Headers.
     * @return array
     */
    public function headers(): array
    {
        return ApiBase::headers();
    }

    /**
     * Action
     * @return string
     */
    public function action(): string
    {
        return 'inpsyde_users_list';
    }

    /**
     * Data to be sent with the request.
     * @return array
     */
    public function data(): array
    {

        return [];
    }
}