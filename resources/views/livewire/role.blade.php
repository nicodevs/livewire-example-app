<div class="border border-gray-200 rounded-lg p-4 mb-4">
    <div class="flex items-start justify-between mb-4">
        <flux:subheading>Role #{{ $index + 1 }}</flux:subheading>
        <div class="flex gap-2">
            @if($isEditing)
                <flux:button wire:click="save" variant="primary" size="sm">
                    Save
                </flux:button>
                @if(!empty($roleData))
                    <flux:button wire:click="cancel" variant="ghost" size="sm">
                        Cancel
                    </flux:button>
                @endif
            @else
                <flux:button wire:click="edit" variant="ghost" size="sm">
                    Edit
                </flux:button>
            @endif
            @if($removable)
                <flux:button wire:click="remove" variant="danger" size="sm">
                    Remove
                </flux:button>
            @endif
        </div>
    </div>

    @if($isEditing)
        <div class="grid grid-cols-2 gap-4">
            <flux:field>
                <flux:label>Title</flux:label>
                <flux:input wire:model="title" placeholder="Enter role title" />
                <flux:error name="title" />
            </flux:field>

            <flux:field>
                <flux:label>Hours per Week</flux:label>
                <flux:input wire:model="hours_per_week" type="number" step="0.01" placeholder="Enter hours" />
                <flux:error name="hours_per_week" />
            </flux:field>
        </div>
    @else
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="text-sm font-medium text-gray-700 mb-1">Title</div>
                <div class="text-base text-gray-900">{{ $title ?: '—' }}</div>
            </div>

            <div>
                <div class="text-sm font-medium text-gray-700 mb-1">Hours per Week</div>
                <div class="text-base text-gray-900">{{ $hours_per_week ?: '—' }}</div>
            </div>
        </div>
    @endif
</div>
