<?php

namespace App\Livewire\Modal\User;

use App\Models\User;
use App\Services\UserService;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Role extends Component
{
    public function promote(string $name)
    {
        $user = User::where("name", $name)->firstOrFail();
        UserService::promote($user);

        $this->dispatch("close-modal");
        return $this->redirectRoute("manage user");
    }

    public function demote(string $name)
    {
        $user = User::where("name", $name)->firstOrFail();
        UserService::demote($user);

        $this->dispatch("close-modal");
        return $this->redirectRoute("manage user");
    }

    public function render()
    {
        return view('livewire.modal.user.role');
    }
}
