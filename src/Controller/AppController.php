<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeRender(EventInterface $event)
    {
        if ($this->request->getSession()->read('Auth') && $this->request->getSession()->read('Auth')['id']) {
            $user = $this->fetchTable('Users')->find()->where(['Users.id' => $this->request->getSession()->read('Auth')['id']])
                ->contain([
                ])->first();

            $this->set('loggedUser', $user);
        }

        // Lê o valor do cookie "layout_mode" e define o atributo
        $layoutModeCookie = $this->request->getCookie('layout_mode');
        $hamburguerEnable = $this->request->getCookie('hamburguer_enable', 0);
        $layoutMode = $layoutModeCookie ?? 'light';  // Padrão para 'light' se o cookie não existir
        $this->set(compact('layoutMode', 'hamburguerEnable'));
    }

    /**
     * Retrieves the logged-in user's data from the database.
     *
     * This function fetches the user's data from the 'Users' table using the user ID stored in the session.
     * It uses CakePHP's ORM (Object-Relational Mapping) to perform the database query.
     *
     * @return \Cake\Datasource\EntityInterface|null The logged-in user's data as an entity object.
     *     Returns null if the user ID is not found in the session or if any error occurs during the database query.
     */
    public function getLoggedUser()
    {
        $user = $this->fetchTable('Users')->find()->where(['Users.id' => $this->request->getSession()->read('Auth')['id']])
            ->contain([
            ])->first();

        return $user;
    }

    public function getLoggedUserId(){
        return $this->getLoggedUser()->id;
    }
}
