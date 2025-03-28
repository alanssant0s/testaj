<?php
declare(strict_types=1);

namespace App\Model\Traits;

use Cake\Http\ServerRequestFactory;

/**
 * Trait CurrentUserTrait
 *
 * @package AuditLog\Model\Table
 */
trait CurrentUserTrait
{
    /**
     * Returns data about the current logged user
     *
     * @return array
     */
    public function currentUser(): array
    {
        $request = ServerRequestFactory::fromGlobals();
        $session = $request->getSession();


        return [
            'id' => 1,//$session->read('Auth.id'),
            'ip' => $request->clientIp(),
            'url' => $request->getRequestTarget(),
            'description' => null,
        ];
    }
}
