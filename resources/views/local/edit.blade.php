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

            <form style="width:60%" method="post" action="{{route('Local.update', ['local'=>
                $local->id]) }}">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Local</label>
                    <select class="form-control" name="id_loc">
                        <option value=" "></option>
                        @foreach ($listes as $liste)
                        @if ($liste->id==$local->id_loc)
                        <option value="{{$liste->id }}" selected>{{$liste->Local}}</option>
                        @else
                        <option value="{{$liste->id}}">{{$liste->Local}}</option>
                        @endif
                        @endforeach


                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Numéro local</label>
                    <input type="text" class="form-control" name="NumLoc" value="{{$local->NumLoc}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Inventaire</label>
                    <input type="text" class="form-control" name="inventaire" value="{{$local->inventaire}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Etage</label>
                    <select class="form-control" name="id_etg">
                        <option value=" "></option>
                        @foreach ($etages as $etage)
                        @if ($etage->id==$local->id_etg)
                        <option value="{{$etage->id }}" selected>{{$etage->Etage}}</option>
                        @else
                        <option value="{{$etage->id}}">{{$etage->Etage}}</option>
                        @endif
                        @endforeach


                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{route('Local')}}" class="btn btn-danger">Annuler</a>

            </form>
        </div>
    </div>
</x-app-layout>