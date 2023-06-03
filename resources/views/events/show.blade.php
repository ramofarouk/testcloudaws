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

                    <h4 class="header-title">Liste des évènements</h4>

                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date de l'évènement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>
                                    {{ $event->name }}
                                </td>
                                <td>
                                {{ formatDate($event->created_at) }}
                                </td>
                                <td>
                                    <a href="/events/details/{{$event->id}}" class="btn btn-info text-white">
                                        Voir
                                    </a>
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