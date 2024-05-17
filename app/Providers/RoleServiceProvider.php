<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /***
     * Roles de usuarios admitidos
     */
    public const GUEST = 'guest';
    public const ADMIN = 'admin';
    public const COLLABORATOR = 'collaborator';
    public const INVESTIGATOR = 'investigator';

    /***
     * Roles de visualización admitidos
     * 
     */
    public const PUBLIC = 'public';
    public const PRIVATE = 'private';
    public const GENERAL_PUBLIC = 'general-public';


    /**
     * 
     * ID de los Roles de los usuarios
     */
    public const ADMIN_ID = 1;
    public const COLLABORATOR_ID = 3;
    public const INVESTIGATOR_ID = 2;


}
