@extends('layouts.app')
@section('content')
    <main id="page">
        <h4 class="alert-heading alert text-white home">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('users.index') }}">{{ $header }}</a>
        </h4>
        <div class="home">
            {!! Form::open(['method' => 'POST', 'route' => 'SearchUser.index', 'class' => 'form-horizontal']) !!}
            @csrf
            @include('front.SearchForm')
            {!! Form::close() !!}
        </div>
        <form action="#" method="post" name="massformComputer" id="massformComputer" class="home my-3">
            <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="">
                        <td width="30px">
                            <img src="/images/arrow-left-top.png" alt="" srcset="">
                        </td>
                        <td class="left" width="100%">
                            <a class="vsubmit" onclick="massiveaction_windowe59f855a9415b6a820471339573d9573.dialog("
                                open");" title="Actions" href="">Actions</a>
                        </td>
                        <td class="left" width="100%">
                            <a href="{{ route('users.create') }}" class="btn btn-success px-2 py-0">
                                <i class="fa fa-plus-circle" title="Ajouter"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="center">
                <table class="tab_cadrehov" border="0">
                    <thead>
                        <tr class="bg-white">
                            <th class="">
                                <div class="form-group-checkbox">
                                    <input id="checkbox" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                {return true;}" title="Tout cocher Comme">
                                    <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                    </label>
                                </div>
                            </th>
                            <th><a href="#">Identifiant</a></th>
                            <th><a href="#">Nom de famille</a></th>
                            <th><a href="#">Adresses de messagerie</a></th>
                            <th><a href="#">T??l??phone</a></th>
                            <th><a href="#">Lieu</a></th>
                            <th><a href="#">Actif</a></th>
                            <th><a href="#">Derni??re modification</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Users as $User)
                            <tr>
                                <td width="10px" valign="top">
                                    <span class="form-group-checkbox">
                                        <input id="check_1515325751" value="1" type="checkbox" class="new_checkbox"
                                            data-glpicore-ma-tags="common" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                    {return true;}" title="Tout cocher Comme">
                                        <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </span>
                                </td>
                                <td><a href="{{ route('users.edit', $User->id) }}">{{ $User->name }}</a></td>
                                <td><a href="#">{{ $User->last_login }}</a></td>
                                <td><a href="#">{{ $User->email }}</a></td>
                                <td><a href="#">{{ $User->phone }}</a></td>
                                <td><a href="#">{{ App\Models\glpi_location::findOrFail($User->locations_id)->Nom }}</a>
                                </td>
                                <td></td>
                                <td>{{ $User->updated_at }}</td>

                            </tr>
                        @endforeach
                        <tr class="bg-white">
                            <th class="">
                                <div class="form-group-checkbox">
                                    <input id="checkbox" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                   {return true;}" title="Tout cocher Comme">
                                    <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                    </label>
                                </div>
                            </th>
                            <th><a href="#">Identifiant</a></th>
                            <th><a href="#">Nom de famille</a></th>
                            <th><a href="#">Adresses de messagerie</a></th>
                            <th><a href="#">T??l??phone</a></th>
                            <th><a href="#">Lieu</a></th>
                            <th><a href="#">Actif</a></th>
                            <th><a href="#">Derni??re modification</a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="">
                        <td width="30px">
                            <img src="/images/arrow-left.png" alt="" srcset="">
                        </td>
                        <td class="left" width="100%">
                            <a class="vsubmit" onclick="massiveaction_windowe59f855a9415b6a820471339573d9573.dialog("
                                open");" title="Actions" href="">Actions</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div class="d-flex justify-content-center my-4">
            {!! $Users->links('layouts.pagination') !!}
        </div>
    </main>
@endsection
