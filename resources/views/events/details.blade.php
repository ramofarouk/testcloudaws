@extends("layouts.base")
@section("content")
<div class="container-fluid full-height">
    <div class="row row-height">
        <div class="col-lg-3 content-left">
            <div class="content-left-wrapper">
                <center>
                    <a href="/" id="logo" style="color:white;font-size:18px">Accueil</a>
                </center>
                <div>
                    <figure><img src="/img/info_graphic_1.svg" alt="" class="img-fluid"></figure>
                    <h2>SIMPLON EVENT</h2>
                    <p>Application web de gestion des évènements de SIMPLON</p>
                </div>
                <div class="copy">© 2023 Powered by KOF</div>
            </div>
            <!-- /content-left-wrapper -->
        </div>
        <!-- /content-left -->

        <div class="col-lg-9 content-right" id="start">

            <div class="card w-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="header-title">
                                {{ $event->name }}
                            </h4>
                        </div>
                        <div class="col-lg-4">
                            <button class="btn btn-primary text-white float-end" data-bs-toggle="modal" data-bs-target="#add-participant">
                                Ajouter +
                            </button>
                            <div class="modal fade" id="add-participant" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="/events/{{ $event->id }}/add-participant" method="post" class="w-100">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="termsLabel">Ajouter un participant</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" name="firstname" class="form-control" required placeholder="Ex: DOE">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" name="lastname" class="form-control" required placeholder="Ex: John">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control" required placeholder="Ex: johndoe@gmail.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="tel" name="telephone" class="form-control" required placeholder="Ex: +225079596982">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group radio_input">
                                                            <label class="container_radio">Masculin
                                                                <input type="radio" name="sexe" value="Masculin" checked required>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="container_radio">Féminin
                                                                <input type="radio" name="sexe" value="Féminin" required>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="process" class="submit">Ajouter</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </form>

                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                    <hr>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Numéro de téléphone</th>
                                <th>Email</th>
                                <th>Sexe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($event->participants as $participant)
                            <tr>
                                <td>
                                    {{ $participant->last_name }}
                                </td>
                                <td>
                                    {{ $participant->first_name }}
                                </td>
                                <td>
                                    {{ $participant->telephone }}
                                </td>
                                <td>
                                    {{ $participant->email }}
                                </td>
                                <td>
                                    {{ $participant->sexe }}
                                </td>
                                <td>
                                    <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#edit-participant{{ $participant->id }}">
                                        Modifier
                                    </button>
                                    <div class="modal fade" id="edit-participant{{ $participant->id }}" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <form action="/participants/{{ $participant->id }}/edit" method="post" class="w-100">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="termsLabel">Editer un participant</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="text" value="{{ $participant->last_name }}" name="firstname" class="form-control" required placeholder="Ex: DOE">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="text" value="{{ $participant->first_name }}" name="lastname" class="form-control" required placeholder="Ex: John">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="email" name="email" value="{{ $participant->email }}" class="form-control" required placeholder="Ex: johndoe@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="tel" name="telephone" value="{{ $participant->telephone }}" class="form-control" required placeholder="Ex: +225079596982">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group radio_input">
                                                                    <label class="container_radio">Masculin
                                                                        <input type="radio" name="sexe" value="Masculin" @if($participant->sexe == 'Masculin') checked @endif required>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                    <label class="container_radio">Féminin
                                                                        <input type="radio" name="sexe" value="Féminin" @if($participant->sexe == 'Féminin') checked @endif required>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="process" class="submit">Modifier</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </form>

                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /content-right-->
    </div>
    <!-- /row-->
</div>
<!-- /container-fluid -->
@endsection