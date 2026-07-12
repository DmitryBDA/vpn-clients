@extends('admin.layout.main')

@section('content')
<main class="app-main">
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Form Layout</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Layout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">

                    <!-- Horizontal Form -->
                    <div class="col-md-6">
                        <div class="card card-warning card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Horizontal Form</div>
                            </div>
                            <form action="{{ route('admin.index.users.update', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Имя</label>
                                        <div class="col-sm-10">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="name"
                                                value="{{ $user->name }}"
                                            >
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">ссылка</label>
                                        <div class="col-sm-10">
                                            <textarea
                                                class="form-control"
                                                id="settings"
                                                name="settings"
                                                rows="5"
                                            >{{ $user->links[0] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                    <button type="submit" class="btn float-end">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>
@endsection
