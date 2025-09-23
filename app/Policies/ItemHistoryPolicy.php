<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ItemHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemHistoryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ItemHistory');
    }

    public function view(AuthUser $authUser, ItemHistory $itemHistory): bool
    {
        return $authUser->can('View:ItemHistory');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ItemHistory');
    }

    public function update(AuthUser $authUser, ItemHistory $itemHistory): bool
    {
        return $authUser->can('Update:ItemHistory');
    }

    public function delete(AuthUser $authUser, ItemHistory $itemHistory): bool
    {
        return $authUser->can('Delete:ItemHistory');
    }

    public function restore(AuthUser $authUser, ItemHistory $itemHistory): bool
    {
        return $authUser->can('Restore:ItemHistory');
    }

    public function forceDelete(AuthUser $authUser, ItemHistory $itemHistory): bool
    {
        return $authUser->can('ForceDelete:ItemHistory');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ItemHistory');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ItemHistory');
    }

    public function replicate(AuthUser $authUser, ItemHistory $itemHistory): bool
    {
        return $authUser->can('Replicate:ItemHistory');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ItemHistory');
    }

}