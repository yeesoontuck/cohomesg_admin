<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif
        
        <div class="flex flex-col justify-between mb-4">
            <h1 class="text-2xl font-bold">Permissions</h1>
            <h2 class="text-lg font-semibold">Role: {{ $role->name }}</h2>
        </div>


        <form action="{{ route('roles.permissions.sync', $role) }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf
            @method('PUT')

            <p>Properties</p>
            <div class="grid grid-cols-6 pb-4 mb-4 border-b border-on-surface/50">
                <x-permission-checkbox permission_id="1" :value="in_array('property.view', $role_mapped_permissions)">View</x-permission-checkbox>
                <x-permission-checkbox permission_id="13" :value="in_array('property.create', $role_mapped_permissions)">Create</x-permission-checkbox>
                <x-permission-checkbox permission_id="2" :value="in_array('property.update', $role_mapped_permissions)">Edit</x-permission-checkbox>
                <x-permission-checkbox permission_id="3" :value="in_array('property.delete', $role_mapped_permissions)">Delete</x-permission-checkbox>
            </div>
            
            <p>Districts</p>
            <div class="grid grid-cols-6 pb-4 mb-4 border-b border-on-surface/50">
                <x-permission-checkbox permission_id="4" :value="in_array('district.view', $role_mapped_permissions)">View</x-permission-checkbox>
                <x-permission-checkbox permission_id="5" :value="in_array('district.create', $role_mapped_permissions)">Create</x-permission-checkbox>
                <x-permission-checkbox permission_id="6" :value="in_array('district.update', $role_mapped_permissions)">Edit</x-permission-checkbox>
                <x-permission-checkbox permission_id="7" :value="in_array('district.delete', $role_mapped_permissions)">Delete</x-permission-checkbox>
                <x-permission-checkbox permission_id="8" :value="in_array('district.restore', $role_mapped_permissions)">Restore</x-permission-checkbox>
                <x-permission-checkbox permission_id="9" :value="in_array('district.force_delete', $role_mapped_permissions)">Permanently Delete</x-permission-checkbox>
            </div>
            
            <p>Roles</p>
            <div class="grid grid-cols-6 pb-4 mb-4 border-b border-on-surface/50">
                <x-permission-checkbox permission_id="18" :value="in_array('role.view', $role_mapped_permissions)">View</x-permission-checkbox>
                <x-permission-checkbox permission_id="15" :value="in_array('role.create', $role_mapped_permissions)">Create</x-permission-checkbox>
                <x-permission-checkbox permission_id="17" :value="in_array('role.update', $role_mapped_permissions)">Edit</x-permission-checkbox>
                <x-permission-checkbox permission_id="16" :value="in_array('role.delete', $role_mapped_permissions)">Delete</x-permission-checkbox>
            </div>
            
            <p>Users</p>
            <div class="grid grid-cols-6 pb-4 mb-4 border-b border-on-surface/50">
                <x-permission-checkbox permission_id="10" :value="in_array('user.view', $role_mapped_permissions)">View</x-permission-checkbox>
                <x-permission-checkbox permission_id="11" :value="in_array('user.create', $role_mapped_permissions)">Invite</x-permission-checkbox>
                <x-permission-checkbox permission_id="12" :value="in_array('user.update', $role_mapped_permissions)">Edit</x-permission-checkbox>
                <x-permission-checkbox permission_id="14" :value="in_array('user.delete', $role_mapped_permissions)">Delete</x-permission-checkbox>
            </div>
            
            <p>Activity Logs</p>
            <div class="grid grid-cols-6 pb-4 mb-4 border-b border-on-surface/50">
                <x-permission-checkbox permission_id="19" :value="in_array('audit.view', $role_mapped_permissions)">View</x-permission-checkbox>
            </div>

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Update</button>
                    <a href="{{ route('roles.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
                </div>
            </div>
        </form>
    </main>
</x-app>
