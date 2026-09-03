<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Services Section Title</label>
            <input type="text" name="sections[services_title]" class="form-control" value="{{ old('sections.services_title', $sections['services_title'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Services Section Subtitle</label>
            <input type="text" name="sections[services_subtitle]" class="form-control" value="{{ old('sections.services_subtitle', $sections['services_subtitle'] ?? '') }}">
        </div>
    </div>
</div>

<hr>
<h5 class="mb-3">Our Added Value</h5>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Value Title</label>
            <input type="text" name="sections[value_title]" class="form-control" value="{{ old('sections.value_title', $sections['value_title'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Value Subtitle</label>
            <input type="text" name="sections[value_subtitle]" class="form-control" value="{{ old('sections.value_subtitle', $sections['value_subtitle'] ?? '') }}">
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Value Items (icon, title, description)</label>
    <div id="values-list">
        @foreach(old('sections.values', $sections['values'] ?? []) as $i => $value)
        <div class="row g-2 mb-2 value-item">
            <div class="col-md-2">
                <input type="text" name="sections[values][{{ $i }}][icon]" class="form-control" placeholder="Icon (e.g. fa-clock)" value="{{ $value['icon'] ?? '' }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="sections[values][{{ $i }}][title]" class="form-control" placeholder="Title" value="{{ $value['title'] ?? '' }}">
            </div>
            <div class="col-md-5">
                <input type="text" name="sections[values][{{ $i }}][description]" class="form-control" placeholder="Description" value="{{ $value['description'] ?? '' }}">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-primary" onclick="addValueItem()"><i class="fas fa-plus"></i> Add Value</button>
</div>

<hr>
<h5 class="mb-3">Products Section</h5>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Products Title</label>
            <input type="text" name="sections[products_title]" class="form-control" value="{{ old('sections.products_title', $sections['products_title'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Products Subtitle</label>
            <input type="text" name="sections[products_subtitle]" class="form-control" value="{{ old('sections.products_subtitle', $sections['products_subtitle'] ?? '') }}">
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Product Items (icon, name, brands)</label>
    <div id="products-list">
        @foreach(old('sections.products', $sections['products'] ?? []) as $i => $product)
        <div class="row g-2 mb-2 product-item">
            <div class="col-md-2">
                <input type="text" name="sections[products][{{ $i }}][icon]" class="form-control" placeholder="Icon" value="{{ $product['icon'] ?? '' }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="sections[products][{{ $i }}][name]" class="form-control" placeholder="Name" value="{{ $product['name'] ?? '' }}">
            </div>
            <div class="col-md-5">
                <input type="text" name="sections[products][{{ $i }}][brands]" class="form-control" placeholder="Brands" value="{{ $product['brands'] ?? '' }}">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-primary" onclick="addProductItem()"><i class="fas fa-plus"></i> Add Product</button>
</div>

<hr>
<h5 class="mb-3">Call to Action</h5>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">CTA Title</label>
            <input type="text" name="sections[cta_title]" class="form-control" value="{{ old('sections.cta_title', $sections['cta_title'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">CTA Text</label>
            <input type="text" name="sections[cta_text]" class="form-control" value="{{ old('sections.cta_text', $sections['cta_text'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">CTA Button Text</label>
            <input type="text" name="sections[cta_btn]" class="form-control" value="{{ old('sections.cta_btn', $sections['cta_btn'] ?? '') }}">
        </div>
    </div>
</div>

@push('scripts')
<script>
function addValueItem() {
    var i = $('#values-list .value-item').length;
    $('#values-list').append(`<div class="row g-2 mb-2 value-item">
        <div class="col-md-2"><input type="text" name="sections[values][${i}][icon]" class="form-control" placeholder="Icon (e.g. fa-clock)"></div>
        <div class="col-md-3"><input type="text" name="sections[values][${i}][title]" class="form-control" placeholder="Title"></div>
        <div class="col-md-5"><input type="text" name="sections[values][${i}][description]" class="form-control" placeholder="Description"></div>
        <div class="col-md-2"><button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button></div>
    </div>`);
}
function addProductItem() {
    var i = $('#products-list .product-item').length;
    $('#products-list').append(`<div class="row g-2 mb-2 product-item">
        <div class="col-md-2"><input type="text" name="sections[products][${i}][icon]" class="form-control" placeholder="Icon"></div>
        <div class="col-md-3"><input type="text" name="sections[products][${i}][name]" class="form-control" placeholder="Name"></div>
        <div class="col-md-5"><input type="text" name="sections[products][${i}][brands]" class="form-control" placeholder="Brands"></div>
        <div class="col-md-2"><button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button></div>
    </div>`);
}
</script>
@endpush
