@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center">
            <br>
                <div class="card-header" style="color:white; font-size: 22px">{{ __('User Dashboard') }}</div>

                <div class="card-body" style="color:white; font-size: 22px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <img src="https://jonmgomes.com/wp-content/uploads/2020/01/Bar_Chart_4_Columns_.gif" width=500px style="opacity:0.6; border-radius: 5px">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
