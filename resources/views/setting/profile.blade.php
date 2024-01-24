<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-1 pb-16">
        <h3 class="text-gray-700 text-3xl font-medium">Welcome : {{ auth()->user()->nom }}</h3>
        <div class="bg-white shadow-md rounded my-6 p-5">
          <form method="POST" action="{{ route('admin.profile.update',$user->id)}}">
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



            <div class="flex text-gray-500 mt-5">
              <div class="bg-white rounded-lg">
                <div class="" x-data="imageData()">
                  <div x-show="previewUrl == '' && imgurl == ''">
                    <p class="text-center uppercase text-bold">
                      <label for="thumbnailprev" class="cursor-pointer">
                        Upload a file
                      </label>
                      <input type="file" name="profile" id="thumbnailprev" class="hidden thumbnailprev"
                        @change="updatePreview()">
                    </p>
                  </div>
                  <div x-show="previewUrl !== ''" class="relative w-24 h-24">
                    <img :src="previewUrl" alt=""
                      class="shadow-lg rounded-full max-w-full h-auto align-middle border-none h-full w-full object-cover">
                    <div class="ml-5">
                      <button type="button" class="" @click="clearPreview()">change</button>
                    </div>
                  </div>

                  <div x-show="imgurl !== ''" class="relative w-24 h-24">
                    <img :src="imgurl" alt=""
                      class="shadow-lg rounded-full max-w-full h-auto align-middle border-none h-full w-full object-cover">
                    <div class="ml-5">
                      <button type="button" class="" @click="clearPreview()">change</button>
                    </div>
                  </div>

                </div>
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

  <script>
    function imageData() {
        var files = document.getElementById("thumbnailprev").files;
        if(files.length == 0){
            var url = '/images/4.webp';
            // var url = '/images/'+{!! json_encode($user->profile) !!};
        }else{
            url = '';
        }
      return {
        previewUrl: "",
        imgurl: url,
        updatePreview() {
          var reader, files = document.getElementById("thumbnailprev").files;
          reader = new FileReader();
          reader.onload = e => {
            this.previewUrl = e.target.result;
          };
          reader.readAsDataURL(files[0]);
        },
        clearPreview() {
          document.getElementById("thumbnailprev").value = null;
          this.previewUrl = "";
          this.imgurl     = "";
        }
      };
    }

  </script>
</x-app-layout>