@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div>
                        <a href="{{route('todo.index')}}" class="btn btn-primary">Todo Tasks</a>
                    </div>
                </div>
            </div>

         
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Learnings
                </div>
                <div class="card-body">
                    <ul>
                        <li>Larvel</li>
                        <li>CRUD Operation: (Create/Read/Update/Delete)</li>
                        <li>Routes: Get / Post (Remaining -> PUT/DELETE)</li>
                        <li>SoftDelete</li>
                        <li>FontAwesome integration</li>
                        <li>Authentication Systems</li>
                        <li>Passing data in routes</li>
                        <li>Adding Columns in table using migration without rollback</li>
                        <li>Bootstrap Classes (Cards/Buttons/badges/breadcrumb)</li>
                        <li>Clean Storage Folder Structure / Naming conventions</li>
                        <li class="bg-secondary text-white">php artisan make:model Todo -mcr</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection