<x-app-layout>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des permissions:</h3>
    <div class="text-right">
      @can('Permission create')
      <a href="{{route('admin.permissions.create')}}" class="btn btn-outline-primary">Nouveau
        permission</a>
      @endcan
    </div>
    @if (session()->has("successDelete"))
    <div class="alert alert-success">
      <h4> {{session()->get('successDelete')}} </h4>
    </div>
    @endif
    <div class="bg-white shadow-md rounded my-6">
      <table class="table table-striped table-bordered mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th
              class="text-center py-4 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
              Permission Name</th>

            <th
              class="text-center py-4 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">
              Actions</th>
          </tr>
        </thead>
        <tbody>

          @can('Permission access')
          @foreach($permissions as $permission)
          <tr class="hover:bg-grey-lighter">
            <th scope="row">{{$loop->index +1}}</th>
            <td class="fw-normal text-center py-3 px-3">{{ $permission->name }}</td>
            <td class="fw-normal text-center py-3 px-3">
              @can('Permission edit')
              <a href="{{route('admin.permissions.edit',$permission->id)}}" class="btn btn-info btn-sm">Modifier</a>
              @endcan

              @can('Permission delete')
              <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm">Supprimer</button>
              </form>
              @endcan
            </td>
          </tr>
          @endforeach
          @endcan

        </tbody>
      </table>
    </div>

  </div>

</x-app-layout>