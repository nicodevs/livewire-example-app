<div class="max-w-4xl mx-auto p-6">
    <flux:heading size="lg">Big Form</flux:heading>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="submit" class="space-y-6">
        <flux:field>
            <flux:label>Name</flux:label>
            <flux:input wire:model="name" placeholder="Enter name" />
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Title</flux:label>
            <flux:input wire:model="title" placeholder="Enter title" />
            <flux:error name="title" />
        </flux:field>

        <flux:field>
            <flux:label>Value</flux:label>
            <flux:input wire:model="value" type="number" placeholder="Enter value" />
            <flux:error name="value" />
        </flux:field>

        <flux:separator />

        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <flux:heading size="md">Roles</flux:heading>
                <flux:button wire:click.prevent="addRole" variant="primary" size="sm">
                    Add Role
                </flux:button>
            </div>

            @foreach($roles as $index => $role)
                <livewire:role
                    :key="'role-'.$index"
                    :index="$index"
                    wire:model="roles.{{ $index }}"
                    :removable="count($roles) > 1"
                />
            @endforeach
        </div>

        <flux:button type="submit" variant="primary">Submit</flux:button>
    </form>
</div>
