<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-1 pb-16">
        <div class="bg-white shadow-md rounded my-6 p-5">
          <form method="POST" action="{{ route('Reclamation.update',$reclamation->id)}}">
            @csrf
            @method('put')
            <div class="flex flex-col space-y-2">
              <label for="objet" class="text-gray-700 select-none font-medium">Objet</label>
              <input id="objet" type="text" name="objet" value="{{ old('objet',$reclamation->objet) }}"
                placeholder="Enter objet"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>

            <div class="flex flex-col space-y-2">
              <label for="reclamation" class="text-gray-700 select-none font-medium">Description</label>
              <textarea name="reclamation" id="reclamation" placeholder="Enter reclamation"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                rows="5">{{ old('reclamation',$reclamation->reclamation) }}</textarea>
            </div>

            <h3 class="text-xl my-4 text-gray-600">Site</h3>

            <select class="form-control" name="id_site">
              <option value=" "></option>
              @foreach ($sites as $site)
              @if ($site->id==$reclamation->id_site)
              <option value="{{$site->id}}" selected>{{$site->Site}}</option>
              @else
              <option value="{{$site->id}}">{{$site->Site}}</option>
              @endif
              @endforeach
            </select>
            <h3 class="text-xl my-4 text-gray-600">Batiment</h3>

            <select class="form-control" name="id_bat">
              <option value=" "></option>
              @foreach ($batiments as $batiment)
              @if ($batiment->id==$reclamation->id_bat)
              <option value="{{$batiment->id}}" selected>{{$batiment->Batiment}}</option>
              @else
              <option value="{{$batiment->id}}">{{$batiment->Batiment}}</option>
              @endif
              @endforeach
            </select>
            <h3 class="text-xl my-4 text-gray-600">Etage</h3>

            <select class="form-control" name="id_etg">
              <option value=" "></option>
              @foreach ($etages as $etage)
              @if ($etage->id==$reclamation->id_etg)
              <option value="{{$etage->id}}" selected>{{$etage->Etage}}</option>
              @else
              <option value="{{$etage->id}}">{{$etage->Etage}}</option>
              @endif
              @endforeach
            </select>
            <h3 class="text-xl my-4 text-gray-600">Lieu local</h3>

            <select class="form-control" name="id_list_loc">
              <option value=" "></option>
              @foreach ($liste_locaux as $liste)
              @if ($liste->id==$reclamation->id_list_loc)
              <option value="{{$liste->id}}" selected>{{$liste->Local}}</option>
              @else
              <option value="{{$liste->id}}">{{$liste->Local}}</option>
              @endif
              @endforeach
            </select>
            <h3 class="text-xl my-4 text-gray-600">Inventaire local</h3>

            <select class="form-control" name="id_loc">
              <option value=" "></option>
              @foreach ($locaux as $local)
              @if ($local->id==$reclamation->id_loc)
              <option value="{{$local->id}}" selected>{{$local->inventaire}}</option>
              @else
              <option value="{{$local->id}}">{{$local->inventaire}}</option>
              @endif
              @endforeach
            </select>


        </div>
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