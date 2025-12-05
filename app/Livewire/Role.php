<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Role extends Component
{
    #[Modelable]
    public $roleData = [];

    public $index;

    public $removable = true;

    #[Validate('required|string|max:255')]
    public $title = '';

    #[Validate('required|numeric|min:0|max:40')]
    public $hours_per_week = '';

    public $isEditing = true;

    public function mount($index, $roleData = null, $removable = true)
    {
        $this->index = $index;
        $this->removable = $removable;

        if ($roleData) {
            $this->title = $roleData['title'] ?? '';
            $this->hours_per_week = $roleData['hours_per_week'] ?? '';

            if (!empty($roleData['title']) || !empty($roleData['hours_per_week'])) {
                $this->isEditing = false;
            }
        }
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        $this->roleData = [
            'title' => $this->title,
            'hours_per_week' => $this->hours_per_week,
        ];

        $this->isEditing = false;
    }

    public function cancel()
    {
        if (!empty($this->roleData)) {
            $this->title = $this->roleData['title'] ?? '';
            $this->hours_per_week = $this->roleData['hours_per_week'] ?? '';
        }

        $this->isEditing = false;
        $this->resetValidation();
    }

    public function remove()
    {
        $this->dispatch('role-removed', index: $this->index);
    }

    public function render()
    {
        return view('livewire.role');
    }
}
