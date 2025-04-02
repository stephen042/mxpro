<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class AllUsers extends Component
{
    use WithPagination;

    // Use Tailwind pagination styling if needed
    protected $paginationTheme = 'tailwind';

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return $this->dispatch('notify', 'User Deleted', 'success');
    }

    public function activateUser($id){
        $user = User::find($id);
        $user->account_hold =2;
        $user->save();
        return $this->dispatch('notify', 'User Activated', 'success');
    }
    public function deactivateUser($id){
        $user = User::find($id);
        $user->account_hold = 1;
        $user->save();
        return $this->dispatch('notify', 'User Deactivated', 'success');
    }

    public function render()
    {
        // Retrieve only 10 users per page
        $users = User::where('role', 0)->orderByDesc('created_at')->paginate(10);

        return view('livewire.admin.all-users',[
            "users" => $users
        ]);
    }
}
