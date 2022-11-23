@extends('layouts.app')

@section('content')
    <div class="container-fluid AcceuilNav">
        <div class="row">
            <!-- ito ny blog iray -->
            <div class="col-md-8">
                @foreach ($posts as $post)
                    @include('components.post', ['post' => $post])
                @endforeach
                @include('components.pagination', ['indexPage' => $indexPage])
            </div>
            <!--mifarana eto ny blog iray -->

            <div class="col-md-4">
                <!-- PARTIE RECHERCHE -->
                @include('components.recherche')

                <!-- PARTIE PROFIL -->
                @if (Session::has('user'))
                    @include('components.publishPost')
                @endif


            </div>
        </div>
    </div>
@endsection
