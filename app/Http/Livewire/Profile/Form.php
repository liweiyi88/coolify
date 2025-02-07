<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class Form extends Component
{
    public int $userId;
    public string $name;
    public string $email;

    protected $rules = [
        'name' => 'required',
    ];
    protected $validationAttributes = [
        'name' => 'name',
    ];

    public function mount()
    {
        $this->userId = auth()->user()->id;
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function submit()

    {
        try {
            $this->validate();
            User::where('id', $this->userId)->update([
                'name' => $this->name,
            ]);
        } catch (\Throwable $e) {
            return handleError($e, $this);
        }
    }
}
