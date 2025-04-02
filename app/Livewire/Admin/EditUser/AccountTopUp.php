<?php

namespace App\Livewire\Admin\EditUser;

use Livewire\Component;

class AccountTopUp extends Component
{
    public $user;

    public $credit_bal_amount;
    public $credit_sub_bal_amount;
    
    public $debit_bal_amount;
    public $debit_sub_bal_amount;

    public function credit_balance(){
        $this->validate([
            'credit_bal_amount' => 'required|numeric|min:0',
        ]);

        $this->user->balance += $this->credit_bal_amount;
        $this->user->save();

        $this->dispatch('notify', 'User balance has been credited', 'success');
        return redirect()->route('admin.user.edit', $this->user->id);
    }

    public function credit_sub_balance(){
        $this->validate([
            'credit_sub_bal_amount' => 'required|numeric|min:0',
        ]);

        $this->user->sub_balance += $this->credit_sub_bal_amount;
        $this->user->save();

        $this->dispatch('notify', 'User sub balance has been credited', 'success');
        return redirect()->route('admin.user.edit', $this->user->id);
    }
    public function debit_balance(){
        $this->validate([
            'debit_bal_amount' => 'required|numeric|min:0',
        ]);

        if ($this->user->balance < $this->debit_bal_amount) {
            $this->dispatch('notify', 'User balance is not enough', 'error');
            return;
        }

        $this->user->balance -= $this->debit_bal_amount;
        $this->user->save();

        $this->dispatch('notify', 'User balance has been debited', 'success');
        return redirect()->route('admin.user.edit', $this->user->id);
    }
    public function debit_sub_balance(){
        $this->validate([
            'debit_sub_bal_amount' => 'required|numeric|min:0',
        ]);

        if ($this->user->sub_balance < $this->debit_sub_bal_amount) {
            $this->dispatch('notify', 'User sub balance is not enough', 'error');
            return;
        }

        $this->user->sub_balance -= $this->debit_sub_bal_amount;
        $this->user->save();

        $this->dispatch('notify', 'User sub balance has been debited', 'success');
        return redirect()->route('admin.user.edit', $this->user->id);
    }

    public function render()
    {
        return view('livewire.admin.edit-user.account-top-up');
    }
}
