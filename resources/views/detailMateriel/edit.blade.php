{{-- <x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Edition d'un détail du matériel</h3>
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

            <form style="width:60%" method="post" action="{{route('DetailMateriel.update', ['detail_materiel'=>
                $detail_materiel->id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Matériel</label>
                    <select class="form-control" name="id_materiel">
                        <option value=" "></option>
                        @foreach ($materiels as $materiel)
                        @if ($materiel->id==$detail_materiel->id_materiel)
                        <option value="{{$materiel->id}}" selected>{{$materiel->materiel}}</option>
                        @else
                        <option vvalue="{{$materiel->id}}">{{$materiel->materiel}}</option>
                        @endif
                        @endforeach


                    </select>
                </div>
                <input type="hidden" name="_method" value="put">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Catégorie</label>
                    <input type="text" class="form-control" name="categorie" value="{{$detail_materiel->categorie}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Prix</label>
                    <input type="text" class="form-control" name="prix" value="{{$detail_materiel->prix}}">
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{route('DetailMateriel')}}" class="btn btn-danger">Annuler</a>

            </form>
        </div>
    </div>
</x-app-layout> --}}