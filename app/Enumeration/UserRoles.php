<?php
namespace App\Enumeration;

enum UserRoles: string {

    case USER = 'user';
    case ADMIN = 'admin';
    case SUPER = 'super';
}
