<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-1 pb-16">

        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h3 class="border-bottom pb-2 mb-4">Ajout d'un utilisateur</h3>
          <div class="mt-4">
            @if (session()->has("success"))
            <div class="alert alert-success">
              <h4> {{session()->get('success')}} </h4>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('admin.users.store')}}">
              @csrf
              @method('post')
              <div class="flex flex-col space-y-2">
                <label for="name" class="text-gray-700 select-none font-medium">Nom</label>
                <input id="name" type="text" name="nom" value="{{ old('nom' ) }}" placeholder="Entrer le nom"
                  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="name" class="text-gray-700 select-none font-medium">Prénom</label>
                <input id="name" type="text" name="prenom" value="{{ old('prenom' ) }}" placeholder="Entrer le prénom"
                  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              </div>


              <div class="flex flex-col space-y-2">
                <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                <input id="email" type="text" name="email" value="{{ old('email' ) }}" placeholder="Entrer l'email"
                  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              </div>
              <div class="flex flex-col space-y-2">
                <label for="email" class="text-gray-700 select-none font-medium">Téléphone</label>
                <input id="telephone" type="text" name="telephone" value="{{ old('telephone' ) }}"
                  placeholder="Entrer le numéro de téléphone"
                  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="password" class="text-gray-700 select-none font-medium">Mot de passe</label>
                <input id="password" type="password" name="password" value="{{ old('password' ) }}"
                  placeholder="Enter password"
                  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="password_confirmation" class="text-gray-700 select-none font-medium">Confirmation du mot
                  de
                  passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                  placeholder="Re-enter password"
                  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              </div>

              <h3 class="text-xl my-2 text-gray-600">Métier</h3>
              <div class="mb-3">
                <select class="form-control" name="id_met">
                  <option value=" "></option>
                  @foreach ($metiers as $metier)
                  <option value="{{$metier->id}}">{{$metier->Metier}}</option>
                  @endforeach
                </select>
              </div>

              <h3 class="text-xl my-4 text-gray-600">Role</h3>
              <div class="grid grid-cols-3 gap-4">
                @foreach($roles as $role)
                <div class="flex flex-col justify-cente">
                  <div class="flex flex-col">
                    <label class="inline-flex items-center mt-3">
                      <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]"
                        value="{{$role->id}}"><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                    </label>
                  </div>
                </div>
                @endforeach
              </div>



              {{-- <h3 class="text-xl my-4 text-gray-600">Structure</h3>
              <div class="mb-3">
                <select class="form-control" name="id_str">
                  <option value=" "></option>
                  @foreach ($structures as $structure)
                  <option value="{{$structure->id}}">{{$structure->Description}}</option>
                  @endforeach
                </select>
              </div> --}}

              <div class="text-center mt-16 mb-16">
                <button type="submit"
                  class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
              </div>
          </div>


        </div>
    </main>
  </div>
  </div>
</x-app-layout>