@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                    @yield('form-method')
                    @csrf

                    <div class="mb-3">
                        <h1 class="text-center fw-bold">
                            @yield('form-title')
                        </h1>
                    </div>

                    <div class="mb-3">
                        <label for="property-title" class="form-label">Property Title:</label>
                        <input type="text" name="title" id="property-title" class="form-control"
                            value="{{ old('title', $property->title) }}">
                        @error('title')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-description" class="form-label">Property Description:</label>
                        <input type="text" name="description" id="property-description" class="form-control"
                            value="{{ old('description', $property->description) }}">
                        @error('description')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="address-property">
                            <label for="address" class=form-label>Property Address:</label>
                        </div>
                    </div>
                    @error('address')
                        @include('partials.single-name-error-message')
                    @enderror
                    <div class="mb-3">
                        <label for="property-rooms" class="form-label">Property rooms:</label>
                        <input type="number" name="rooms" id="property-rooms" class="form-control"
                            value="{{ old('rooms', $property->rooms) }}">
                        @error('rooms')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-beds" class="form-label">Property beds:</label>
                        <input type="number" name="beds" id="property-beds" class="form-control"
                            value="{{ old('beds', $property->beds) }}">
                        @error('beds')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-bathrooms" class="form-label">Property bathrooms:</label>
                        <input type="number" name="bathrooms" id="property-bathrooms" class="form-control"
                            value="{{ old('bathrooms', $property->bathrooms) }}">
                        @error('bathrooms')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-square_meters" class="form-label">Property square_meters:</label>
                        <input type="number" name="square_meters" id="property-square_meters" class="form-control"
                            value="{{ old('square_meters', $property->square_meters) }}">
                        @error('square_meters')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-is_visible" class="form-label">Property visiblility:</label>
                        <input type="number" min="0" max="1" name="is_visible" id="property-is_visible"
                            class="form-control" value="{{ old('is_visible', $property->is_visible) }}">
                        @error('is_visible')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-thumb_url" class="form-label">Property thumb:</label>
                        <input type="file" name="thumb_url" id="property-thumb_url" class="form-control"
                            value="{{ old('thumb_url', $property->thumb_url) }}">
                        @error('thumb_url')
                            @include('partials.single-name-error-message')
                        @enderror
                    </div>

                    {{-- <div class="mb-3">
                    <input type="file" name="image" id="post-image" class="form-control">

                    @error('image')
                        @include("partials.single-name-error-message")
                    @enderror
                </div> --}}


                    <button type="submit" class="btn btn-lg btn-primary">@yield('form-title')</button>
                    <button type="reset" class="btn btn-lg btn-warning">Reset fields</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var options = {
            searchOptions: {
                key: "fOXBjSOM6sAbKnzA75jOHRdjNXpvPB8D",
                language: "it-IT",
                limit: 5
            },
            autocompleteOptions: {
                key: "fOXBjSOM6sAbKnzA75jOHRdjNXpvPB8D",
                language: "it-IT",
            },
        }
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

        // Get the div where to locate the input
        const addressInput = document.querySelector(".address-property");
        addressInput.appendChild(searchBoxHTML);

        //get the input
        const searchInput = document.querySelector("input.tt-search-box-input");

        //set the all the necessary value
        searchInput.type = "text";
        searchInput.name = "address";
        searchInput.id = "search-address";
        searchInput.value = "{{ old('address', $property->address) }}";

        //get search container
        const searchContainer = document.querySelector(".tt-search-box-input-container");

        //style search container
        searchContainer.style.border = "var(--bs-border-width) solid var(--bs-border-color)";
        searchContainer.style.borderRadius = "var(--bs-border-radius)";
        searchContainer.style.backgroundColor = "var(--bs-body-bg)";
    </script>
@endsection
