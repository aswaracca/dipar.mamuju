@extends('home_layout.app')
@section('content')
<div class="container-fluid" style="padding-top: 80px;">
<!-- Widgets -->
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="height: 570px;">
                <div class="header bg-orange" style="padding: 10px;">
                    <h2>
                        PROFIL
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="hidden-scrollbar">
                            <div class="inner-hotel">
                                <div class="col-sm-12 col-md-7 col-lg-7">
                                    <img src="{{ asset('images/profil/'.$profil['name_ex']) }}" class="img-responsive">
                                </div>
                                
                                <div class="col-md-5 col-lg-5 col-sm-12">
                                    <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-warning">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="" href="" aria-expanded="" aria-controls="">
                                                        Tentang
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                                <div class="panel-body" style="text-align: justify;">
                                                    <?=$profil['about']?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-warning">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="" href="" aria-expanded="" aria-controls="">
                                                        Visi dan Misi
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                                <div class="panel-body" style="text-align: justify;">
                                                    <?=$profil['vision']?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('library-css')
    
@endsection

@section('style-css')
    
@endsection

@section('library-js')

@endsection

@section('js-code')

@endsection