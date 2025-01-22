<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case MANAGE_USERS       = 'manage_users';
    case CREATE_USERS       = 'create_users';
    case EDIT_USERS         = 'edit_users';
    case DELETE_USERS       = 'delete_users';
    case DELETE_CLIENTS     = 'delete_clients';
    case DELETE_PROJECTS    = 'delete_projects';
    case DELETE_TASKS       = 'delete_tasks';
}
