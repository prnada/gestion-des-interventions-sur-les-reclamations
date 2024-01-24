<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-1 pb-16">
        <div class="bg-white shadow-md rounded my-6 p-5">
          <form method="POST" action="{{ route('admin.users.update',$user->id)}}">
            @csrf
            @method('put')
            <div class="flex flex-col space-y-2">
              <label for="nom" class="text-gray-700 select-none font-medium">Nom</label>
              <input id="nom" type="text" name="nom" value="{{ old('nom',$user->nom) }}"
                placeholder="Entrer votre prénom"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            <div class="flex flex-col space-y-2">
              <label for="prenom" class="text-gray-700 select-none font-medium">Prénom</label>
              <input id="prenom" type="text" name="prenom" value="{{ old('prenom',$user->prenom) }}"
                placeholder="Entrer votre prénom"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>

            <div class="flex flex-col space-y-2">
              <label for="email" class="text-gray-700 select-none font-medium">Email</label>
              <input id="email" type="text" name="email" value="{{ old('email',$user->email) }}"
                placeholder="Enter email"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            <div class="flex flex-col space-y-2">
              <label for="email" class="text-gray-700 select-none font-medium">Télephone</label>
              <input id="email" type="text" name="telephone" value="{{ old('telephone',$user->telephone) }}"
                placeholder="Enter email"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>

            <div class="flex flex-col space-y-2">
              <label for="password" class="text-gray-700 select-none font-medium">Password</label>
              <input id="password" type="text" name="password" value="{{ old('password') }}"
                placeholder="Enter password"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>

            <div class="flex flex-col space-y-2">
              <label for="password_confirmation" class="text-gray-700 select-none font-medium">Confirm Password</label>
              <input id="password_confirmation" type="text" name="password_confirmation" placeholder="Re-enter password"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>

            <div class="flex flex-col space-y-2">
              <label for="metier" class="text-gray-700 select-none font-medium">Métier</label>
              <select class="form-control" name="id_met">
                <option value=" "></option>
                @foreach ($metiers as $metier)
                @if ($metier->id==$user->id_met)
                <option value="{{$metier->id}}" selected>{{$metier->Metier}}</option>
                @else
                <option value="{{$metier->id}}">{{$metier->Metier}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="flex flex-col space-y-2">
              <label for="structure" class="text-gray-700 select-none font-medium">Structure</label>
              <select class="form-control" name="id_str">
                <option value=" "></option>
                @foreach ($structures as $structure)
                @if ($structure->id==$user->str_id)
                <option value="{{$structure->id}}" selected>{{$structure->Description}}</option>
                @else
                <option value="{{$structure->id}}">{{$structure->Description}}</option>
                @endif
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
                      value="{{$role->id}}" @if(count($user->roles->where('id',$role->id)))
                    checked
                    @endif
                    ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                  </label>
                </div>
              </div>
              @endforeach
            </div>

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