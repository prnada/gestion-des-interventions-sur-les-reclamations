<x-app-layout>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-2">Liste des roles:</h3>
    <div class="text-right">
      @can('Role create')
      <a href="{{route('admin.users.create')}}" class="btn btn-outline-primary">Nouveau
        role</a>
      @endcan
    </div>
    @if (session()->has("successDelete"))
    <div class="alert alert-success">
      <h4> {{session()->get('successDelete')}} </h4>
    </div>
    @endif

    <div class="bg-white shadow-md rounded my-4">
      <table class="table table-striped table-bordered mt-2">
        <thead>
          <tr>
            <th
              class=" text-center py-4 px-5 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
              Role</th>
            <th
              class=" text-center py-4 px-5 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
              Permissions</th>
            <th
              class="text-center py-4 px-5 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">
              Actions</th>
          </tr>
        </thead>
        <tbody>
          @can('Role access')
          @foreach($roles as $role)
          <tr class="hover:bg-grey-lighter">
            <td class="py-4 px-5 border-b border-grey-light">{{ $role->name }}</td>
            <td class="py-4 px-5 border-b border-grey-light">
              @foreach($role->permissions as $permission)
              <span
                class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{
                $permission->name }}</span>
              @endforeach
            </td>
            <td class="py-4 px-5 border-b border-grey-light text-right">
              <div class="text-center">
                @can('Role edit')
                <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-info btn-sm">Modifier</a>
                @endcan

                @can('Role delete')
                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
                @endcan
              </div>
            </td>
          </tr>
          @endforeach
          @endcan
        </tbody>
      </table>
    </div>

  </div>

</x-app-layout>