<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BigForm extends Component
{
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|max:255')]
    public $title = '';

    #[Validate('required|numeric')]
    public $value = '';

    #[Validate('required|array|min:1')]
    public $roles = [];

    public function mount()
    {
        $this->addRole();
    }

    public function addRole()
    {
        $this->roles[] = [
            'title' => '',
            'hours_per_week' => '',
        ];
    }

    #[On('role-removed')]
    public function removeRole($index)
    {
        unset($this->roles[$index]);
    }

    public function submit()
    {
        $this->validate();

        logger()->info('Big form submitted', [
            'name' => $this->name,
            'title' => $this->title,
            'value' => $this->value,
            'roles' => array_values($this->roles),
        ]);
    }

    public function render()
    {
        return view('livewire.big-form');
    }
}
