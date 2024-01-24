<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-1 pb-16">
        <div class="bg-white shadow-md rounded my-6 p-5">
          <h1 class="mb-4">Formulaire de réclamation:</h1>
          <form method="POST" action="{{ route('admin.reclamations.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col space-y-2">
              <label for="title" class="text-gray-700 select-none font-medium">Objet de la réclamation:</label>
              <input id="title" type="text" name="objet" value="{{ old('objet') }}" placeholder="Enter title"
                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>

            <div class="flex flex-col space-y-2">

              <label for="title" class="text-gray-700 select-none font-medium">Détail réclamation:</label>
              <textarea class="form-control" name="reclamation" rows="5"></textarea>

            </div>
            <div class="flex flex-col space-y-2">
              <label for="datetime" class="text-gray-700 select-none font-medium">Date et heure de la
                réclamation:</label>
              <input type="datetime-local" name="datereclamation" id="datetimereclamation">
              <input type="hidden" name="user_id " id="userId">
            </div>


            {{ csrf_field() }}

            <div class="w-full max-w-md py-2">
              <label for="local" class="text-gray-700 select-none font-medium">Localisation:</label>
              <select name="id_site" id="site"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <option value="">Sélectionner votre site</option>
                @foreach($sites as $site)
                <option value="{{ $site->id }}">{{ $site->Site }}</option>
                @endforeach
              </select>
            </div>
            <div class="w-full max-w-md py-2">
              <select name="id_bat" id="batiment"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <option value="">Sélectionner votre bâtiment</option>

              </select>
            </div>
            <div class="w-full max-w-md  py-2">

              <select name="id_etg" id="etage"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <option value="">Sélectionner un étage</option>

              </select>
            </div>

            <div class="w-full max-w-md py-2">

              <select name="id_list_loc" id="typeLocal"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <option value="">Sélectionner votre local</option>
                @foreach($liste_locaux as $local)
                <option value="{{ $local->id }}">{{ $local->Local }}</option>
                @endforeach
              </select>
            </div>
            <div class="w-full max-w-md py-2">

              <select name=" id_loc" id="local"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <option value="">Sélectionner un inventaire</option>

              </select>
            </div>

            {{ csrf_field() }}
            <div class="w-full max-w-md py-2">
              <label for="materiel" class="text-gray-700 select-none font-medium">Matériel nécessaire:</label>
              <select name="id_type_mat" id="materiel"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <option value="">Sélectionner votre matériel</option>
                @foreach($materiels as $materiel)
                <option value="{{ $materiel->id }}">{{ $materiel->materiel }}</option>
                @endforeach
              </select>
            </div>
            <div class="w-full max-w-md py-2">
              <select name="id_mat" id="detailmateriel"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                <option value="">Sélectionner sa réference</option>

              </select>
            </div>
            <div class="w-full max-w-md py-2">
              <label for="pieces_jointes" class="text-gray-700 select-none font-medium">Pièces jointes:</label>
              <input type="file" name="pieces_jointes[]" multiple class="mt-2">
            </div>

            <div class="flex justify-center py-4">
              <button type="submit"
                class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">Valider</button>
            </div>
        </div>
        </form>

      </div>


  </div>
  </main>
  <script>
    window.onload = (event) => {
            
              var userId = document.getElementById("userId");
              var id = document.getElementById("id");
              userId.value=id.textContent;
            }
  </script>

  <script>
    document.getElementById('site').addEventListener('change', function () {

        var SiteId = this.value;
        var batimentSelect = document.getElementById('batiment');
        batimentSelect.innerHTML = '<option value="">Sélectionner votre batiment</option>';
        var batiments = @json($batiments);
        var filteredBatiments= batiments.filter(function (batiment) {
            return batiment.id_site == SiteId ;  
        });
        filteredBatiments.forEach(function (batiment) {
            var option = document.createElement('option');
            option.value = batiment.id;
            option.textContent = batiment.Batiment ;
            batimentSelect.appendChild(option);
        });
        }); 
         document.getElementById('batiment').addEventListener('change', function () {

        var batimentId = this.value;
        var etageSelect = document.getElementById('etage');
        etageSelect.innerHTML = '<option value="">Sélectionner votre etage</option>';
        var etages = @json($etages);
        var filteredEtages= etages.filter(function (etage) {
            return etage.id_bat == batimentId ;  
        });
        filteredEtages.forEach(function (etage) {
            var option = document.createElement('option');
            option.value = etage.id;
            option.textContent = etage.Etage ;
            etageSelect.appendChild(option);
        });
        });
      
      document.getElementById('typeLocal').addEventListener('change', function () {

              var localId = this.value;
              var inventaireSelect = document.getElementById('local');
             inventaireSelect.innerHTML = '<option value="">Sélectionner un inventaire</option>  ';
              var locaux = @json($locaux);
              var filteredInventaires = locaux.filter(function (local) {
                  return local.id_loc == localId ;  
              });
              filteredInventaires.forEach(function (local) {
                  var option = document.createElement('option');
                  option.value = local.id;
                  option.textContent = local.inventaire+' '+local.NumLoc;
                  inventaireSelect.appendChild(option);
              });
          });
        document.getElementById('materiel').addEventListener('change', function () {
        var materielSelect = this;
        var detailMatSelect = document.getElementById('detailmateriel');
        
  
        var materielId = materielSelect.value;
         
        detailMatSelect.innerHTML = '';

        if (materielId === '') {
           
          var option = document.createElement('option');
          option.value = 'Aucun';
          option.textContent = 'Aucun';
          detailMatSelect.appendChild(option);
        } else {
           
          var detail_materiels = @json($detail_materiels);
          var filteredMat = detail_materiels.filter(function (detail_materiel) {
            return detail_materiel.id_materiel == materielId;
          });
          filteredMat.forEach(function (detail_materiel) {
            var option = document.createElement('option');
            option.value = detail_materiel.id;
            option.textContent = detail_materiel.reference;
            detailMatSelect.appendChild(option);
          });
        }
      }); 
       
  </script>

  </div>
  </div>
</x-app-layout>