@if ($type->exists)
    <form class="row" action="{{ route('admin.types.update', $type) }}" method="POST" enctype="multipart/form-data"
        novalidate>
        @method('PUT')
    @else
        <form class="row" action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data"
            novalidate>
@endif

@csrf

<div class="col-6">
    <label for="type" class="form-label">Label</label>
    <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label"
        value="{{ old('label', $type->label) }}" placeholder="Inserisci un tipo...">
    @error('label')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-2">
    <label for="color" class="form-label">Color picker</label>
    <input type="color" name="color" class="form-control form-control-color @error('color') is-invalid @enderror"
        id="color" value="{{ old('color', $type->color) }}" title="Choose your color">
    @error('color')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="text-end">
    <button type="reset" class="btn btn-danger ">Reset</button>
    <button class="btn btn-success"><i class="fas fa-floppy-disk me-2"></i>Salva</button>
</div>
</form>

@section('scripts')
    @Vite('resources/js/image-prev.js')
@endsection
