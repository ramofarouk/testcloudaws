@extends("layouts.base")
@section("content")
<div class="container-fluid full-height">
    <div class="row row-height">
        <div class="col-lg-6 content-left">
            <div class="content-left-wrapper">
                <a href="/" id="logo"><img src="/img/logo.png" alt="" width="49" height="35"></a>
                <div id="social">
                    <ul>
                        <li><a href="#0"><i class="icon-facebook"></i></a></li>
                        <li><a href="#0"><i class="icon-twitter"></i></a></li>
                        <li><a href="#0"><i class="icon-linkedin"></i></a></li>
                    </ul>
                </div>
                <!-- /social -->
                <div>
                    <figure><img src="/img/info_graphic_1.svg" alt="" class="img-fluid"></figure>
                    <h2>SIMPLON EVENT</h2>
                    <p>Application web de gestion des évènements de SIMPLON</p>
                    <a href="/events" class="btn_1 rounded">Consulter tous les évènements</a>
                    <a href="/events" class="btn_1 rounded mobile_btn">Consulter tous les évènements</a>
                </div>
                <div class="copy">© 2023 Powered by KOF</div>
            </div>
            <!-- /content-left-wrapper -->
        </div>
        <!-- /content-left -->

        <div class="col-lg-6 content-right" id="start">
            <div id="wizard_container">
                <form action="{{ route('home') }}" method="POST">
                    @csrf
                    <h3 class="main_question">Donnez un nom à votre évènement</h3>
                    <div class="form-group">
                        <input type="text" name="event" class="form-control" required placeholder="Remise des diplômes">
                    </div>
                    <center>
                        <button type="submit" name="process" class="submit">Créer l'évènement</button>
                    </center>
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
        <!-- /content-right-->
    </div>
    <!-- /row-->
</div>
<!-- /container-fluid -->
@endsection