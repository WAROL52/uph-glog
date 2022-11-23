@extends('layouts.app')

@section('content')
<div class="container-fluid AcceuilNav">
    <div class="row">
        <!-- ito ny blog iray -->
        <div class="col-md-8">
            @foreach ($posts as $post)
                @include('components.post',["post"=>$post])
            @endforeach
        </div>
        <!--mifarana eto ny blog iray -->

        <div class="col-md-4">
            <!-- PARTIE RECHERCHE -->
            @include('components.recherche')
            <!-- PARTIE PROFIL -->
            @include('components.userProfile',["user"=>$user])
        </div>  
    </div>
</div> 
@endsection