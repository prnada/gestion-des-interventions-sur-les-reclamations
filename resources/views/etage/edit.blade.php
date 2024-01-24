<x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Edition d'un étage</h3>
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

            <form style="width:60%" method="post" action="{{route('Etage.update', ['etage'=>
                $etage->id]) }}">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Etage</label>
                    <input type="text" class="form-control" name="Etage" value="{{$etage->Etage}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Batiment</label>
                    <select class="form-control" name="id_site">
                        <option value=" "></option>
                        @foreach ($batiments as $batiment)
                        @if ($batiment->id==$etage->id_bat)
                        <option value="{{$batiment->id }}" selected>{{$batiment->Batiment}}</option>
                        @else
                        <option value="{{$batiment->id}}">{{$batiment->Batiment}}</option>
                        @endif
                        @endforeach


                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{route('Etage')}}" class="btn btn-danger">Annuler</a>

            </form>
        </div>
    </div>
</x-app-layout>