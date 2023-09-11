@if ($project->exists)
    <form class="row" action="{{ route('admin.projects.update', $project) }}" method="POST"
        enctype="multipart/form-data" novalidate>
        @method('PUT')
    @else
        <form class="row" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
            novalidate>
@endif

@csrf
{{-- # TITLE --}}
<div class="mb-3 col-6">
    <label for="title" class="form-label">Titolo</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
        value="{{ old('title', $project->title) }}" required>
    <div class="invalid-feedback">
        {{ $errors->first('title') }}
    </div>
</div>

{{-- # URL --}}
<div class="mb-3 col-6">
    <label for="url" class="form-label">URL</label>
    <input type="url" class="form-control @error('url') is-invalid @enderror" name="url" id="url"
        value="{{ old('url', $project->url) }}" required>
    <div class="invalid-feedback">
        {{ $errors->first('url') }}
    </div>
</div>

{{-- # Image --}}
<div class="mb-3 col-11">
    <label for="img" class="form-label">Immagine</label>
    <input type="file" accept=".jpg, .png, .svg, jpeg" class="form-control @error('image') is-invalid @enderror"
        name="image" id="img" value="{{ old('image', $project->getImagePath()) }}">
    <div class="invalid-feedback">
        {{ $errors->first('image') }}
    </div>
</div>
{{-- # Image preview --}}
<div class="col-1">
    <img src="{{ $project->image ? $project->getImagePath() : 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=' }}"
        alt="preview" class="img-fluid my-2" id="image-preview">
</div>


{{-- # Description --}}
<div class="col-9 mb-3">
    <label for="description" class="form-label @error('description') is-invalid @enderror">Descrizione</label>
    <textarea class="form-control" name="description" id="description" rows="5">{{ old('description', $project->description) }}</textarea>
    <div class="invalid-feedback">
        {{ $errors->first('description') }}
    </div>
</div>

<div class="col-3">
    <label for="type" class="form-label">Tipo</label>
    <select id="type" class="form-select @error('type_id') is-invalid @enderror" name="type_id">
        <option>Nessun Tipo</option>
        @foreach ($types as $type)
            <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>
                {{ $type->label }}
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        {{ $errors->first('type_id') }}
    </div>
</div>
<div class="col-12">
    @foreach ($technologies as $technology)
        <div class="form-check form-check-inline my-5">
            <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                @if (in_array($technology->id, old('technologies', $project_technology_ids ?? []))) checked @endif id="technology-{{ $technology->id }}"
                name="technologies[]">
            <label class="form-check-label" for="technology-{{ $technology->id }}">
                {{ $technology->label }}
            </label>
        </div>
    @endforeach
</div>

<div class="text-end">
    <button type="reset" class="btn btn-danger ">Reset</button>
    <button class="btn btn-success"><i class="fas fa-floppy-disk me-2"></i>Salva</button>
</div>
</form>

@section('scripts')
    @Vite('resources/js/image-prev.js')
@endsection
