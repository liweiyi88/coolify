<div>
    <div class="flex flex-col">
        <div class="flex items-center gap-2">
            <h2>Backup</h2>
            @if (isset($database))
                <x-forms.button type="submit" wire:click="submit">
                    Save
                </x-forms.button>
            @endif
        </div>
        <div class="pb-4">Backup your Coolify instance settings</div>
        <div>
            @if (isset($database))
                <div class="flex flex-col gap-3 pb-4">
                    <div class="flex gap-2">
                        <x-forms.input label="UUID" readonly id="database.uuid" />
                        <x-forms.input label="Name" readonly id="database.name" />
                        <x-forms.input label="Description" id="database.description" />
                    </div>
                    <div class="flex gap-2">
                        <x-forms.input label="User" readonly id="database.postgres_user" />
                        <x-forms.input type="password" label="Password" readonly id="database.postgres_password" />
                    </div>
                </div>
                <livewire:project.database.backup-edit :backup="$backup" :s3s="$s3s" :status="data_get($database,'status')" />
            @else
                To configure automatic backup for your Coolify instance, you first need to add as a database resource
                into Coolify.
                <x-forms.button wire:click="add_coolify_database">Add Database</x-forms.button>
            @endif
        </div>
        <div class="py-4">
            <h2 class="pb-4">Executions</h2>
            <livewire:project.database.backup-executions :backup="$backup" :executions="$executions" />
        </div>
    </div>
</div>
