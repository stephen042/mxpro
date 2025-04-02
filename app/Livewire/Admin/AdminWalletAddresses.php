<?php

namespace App\Livewire\Admin;

use App\Models\AdminWallets;
use Livewire\Component;

class AdminWalletAddresses extends Component
{
    public $admin_wallets;
    public $bitcoin;
    public $ethereum;
    public $solana;
    public $ripple;
    public $usdt;
    public $polygon; 

    public function mount()
    {
        $this->admin_wallets = AdminWallets::first();

        // Retrieve crypto address of admin
        $this->bitcoin  = $this->admin_wallets->bitcoin_address ?? 'no address';
        $this->ethereum = $this->admin_wallets->ethereum_address ?? 'no address';
        $this->solana   = $this->admin_wallets->solana_address ?? 'no address';
        $this->ripple   = $this->admin_wallets->ripple_address ?? 'no address';
        $this->usdt     = $this->admin_wallets->usdt_address ?? 'no address';
        $this->polygon  = $this->admin_wallets->polygon_address ?? 'no address';
    }

    public function updateCryptoAddress()
    {
        $data = $this->validate([
            'bitcoin'  => 'nullable',
            'ethereum' => 'nullable',
            'solana'   => 'nullable',
            'ripple'   => 'nullable',
            'usdt'     => 'nullable',
            'polygon'  => 'nullable',
        ]);

        // Update the user's crypto accounts in the accounts table
        $this->admin_wallets->update([
            'bitcoin_address'  => $data['bitcoin'],
            'ethereum_address' => $data['ethereum'],
            'solana_address'   => $data['solana'],
            'ripple_address'   => $data['ripple'],
            'usdt_address'     => $data['usdt'],
            'polygon_address'  => $data['polygon'],
        ]);

        return $this->dispatch('notify', 'User Crypto Address Updated', 'success');
    }


    public function render()
    {
        return view('livewire.admin.admin-wallet-addresses');
    }
}
