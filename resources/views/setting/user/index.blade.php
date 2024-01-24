<x-app-layout>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des utilisateurs:</h3>


    <div class="text-right">
      @can('User create')
      <a href="{{route('admin.users.create')}}" class="btn btn-outline-primary">Nouveau
        utilisateur</a>
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
              class="text-center py-3 px-3 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
              Email
            </th>
            <th
              class=" text-center py-3 px-3 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
              Role
            </th>
            <th
              class=" text-center py-3 px-3 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">
              Actions</th>
          </tr>
        </thead>
        <tbody>

          @can('User access')
          @foreach($users as $user)
          <tr class="hover:bg-grey-lighter">
            <th scope="row">{{$loop->index +1}}</th>
            <td class="fw-normal text-center py-3 px-3">{{ $user->email }}</td>

            <td class="py-3 px-4 border-b border-grey-light text-center">
              @foreach($user->roles as $role)
              <span
                class=" text-center inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{
                $role->name }}</span>
              @endforeach
            </td>
            <td class="py-3 px-4 border-b border-grey-light text-right">
              <div class="text-center">
                @can('User edit')
                <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-info btn-sm">Modifier</a>
                @endcan

                @can('User delete')
                {{-- <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm">Supprimer</button>
                </form> --}}
                <a href="#" class="btn btn-danger btn-sm"
                  onclick="if(confirm('Voulez-vous vraiment supprimer cet intervenant?')){document.getElementById('form-{{$user->id}}').submit()}">Supprimer</a>
                @csrf
                <form id="form-{{$user->id}}" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="delete">

                </form>
                @endcan
              </div>

            </td>
          </tr>
          @endforeach
          @endcan

        </tbody>
      </table>
      {{$users->links()}}
    </div>

  </div>

</x-app-layout>