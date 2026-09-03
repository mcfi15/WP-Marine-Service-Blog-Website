<h5 class="mb-3">Our References</h5>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">References Title</label>
            <input type="text" name="sections[references_title]" class="form-control" value="{{ old('sections.references_title', $sections['references_title'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">References Subtitle</label>
            <input type="text" name="sections[references_subtitle]" class="form-control" value="{{ old('sections.references_subtitle', $sections['references_subtitle'] ?? '') }}">
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Reference Items</label>
    <div id="references-list">
        @foreach(old('sections.references', $sections['references'] ?? []) as $i => $ref)
        <div class="row g-2 mb-2 reference-item">
            <div class="col-md-2">
                <input type="text" name="sections[references][{{ $i }}][icon]" class="form-control" placeholder="Icon (e.g. fa-ship)" value="{{ $ref['icon'] ?? '' }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="sections[references][{{ $i }}][title]" class="form-control" placeholder="Title" value="{{ $ref['title'] ?? '' }}">
            </div>
            <div class="col-md-5">
                <input type="text" name="sections[references][{{ $i }}][description]" class="form-control" placeholder="Description" value="{{ $ref['description'] ?? '' }}">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-primary" onclick="addReferenceItem()"><i class="fas fa-plus"></i> Add Reference</button>
</div>

<hr>
<h5 class="mb-3">What Our Clients Say (Testimonials)</h5>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Testimonials Title</label>
            <input type="text" name="sections[testimonials_title]" class="form-control" value="{{ old('sections.testimonials_title', $sections['testimonials_title'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Testimonials Subtitle</label>
            <input type="text" name="sections[testimonials_subtitle]" class="form-control" value="{{ old('sections.testimonials_subtitle', $sections['testimonials_subtitle'] ?? '') }}">
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Testimonial Items</label>
    <div id="testimonials-list">
        @foreach(old('sections.testimonials', $sections['testimonials'] ?? []) as $i => $test)
        <div class="card mb-2 testimonial-item">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="small text-muted">Rating (1-5)</label>
                            <select name="sections[testimonials][{{ $i }}][rating]" class="form-select">
                                @for($r = 1; $r <= 5; $r++)
                                <option value="{{ $r }}" {{ ($test['rating'] ?? 5) == $r ? 'selected' : '' }}>{{ $r }} Star{{ $r > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="small text-muted">Name</label>
                            <input type="text" name="sections[testimonials][{{ $i }}][name]" class="form-control" placeholder="Client name" value="{{ $test['name'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="small text-muted">Position / Company</label>
                            <input type="text" name="sections[testimonials][{{ $i }}][position]" class="form-control" placeholder="Position" value="{{ $test['position'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i> Remove</button>
                    </div>
                </div>
                <div class="mb-0">
                    <label class="small text-muted">Quote</label>
                    <textarea name="sections[testimonials][{{ $i }}][quote]" class="form-control" rows="2" placeholder="Testimonial quote">{{ $test['quote'] ?? '' }}</textarea>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-primary" onclick="addTestimonialItem()"><i class="fas fa-plus"></i> Add Testimonial</button>
</div>

<hr>
<h5 class="mb-3">Why Choose Us</h5>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Why Title</label>
            <input type="text" name="sections[why_title]" class="form-control" value="{{ old('sections.why_title', $sections['why_title'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Why Subtitle</label>
            <input type="text" name="sections[why_subtitle]" class="form-control" value="{{ old('sections.why_subtitle', $sections['why_subtitle'] ?? '') }}">
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Reason Items (why choose us)</label>
    <div id="reasons-list">
        @foreach(old('sections.reasons', $sections['reasons'] ?? []) as $i => $reason)
        <div class="row g-2 mb-2 reason-item">
            <div class="col-md-2">
                <input type="text" name="sections[reasons][{{ $i }}][icon]" class="form-control" placeholder="Icon (e.g. fa-globe)" value="{{ $reason['icon'] ?? '' }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="sections[reasons][{{ $i }}][title]" class="form-control" placeholder="Title" value="{{ $reason['title'] ?? '' }}">
            </div>
            <div class="col-md-5">
                <input type="text" name="sections[reasons][{{ $i }}][description]" class="form-control" placeholder="Description" value="{{ $reason['description'] ?? '' }}">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-primary" onclick="addReasonItem()"><i class="fas fa-plus"></i> Add Reason</button>
</div>

@push('scripts')
<script>
function addReferenceItem() {
    var i = $('#references-list .reference-item').length;
    $('#references-list').append(`<div class="row g-2 mb-2 reference-item">
        <div class="col-md-2"><input type="text" name="sections[references][${i}][icon]" class="form-control" placeholder="Icon (e.g. fa-ship)"></div>
        <div class="col-md-3"><input type="text" name="sections[references][${i}][title]" class="form-control" placeholder="Title"></div>
        <div class="col-md-5"><input type="text" name="sections[references][${i}][description]" class="form-control" placeholder="Description"></div>
        <div class="col-md-2"><button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button></div>
    </div>`);
}
function addTestimonialItem() {
    var i = $('#testimonials-list .testimonial-item').length;
    var stars = '';
    for (var r = 1; r <= 5; r++) { stars += '<option value="' + r + '">' + r + ' Star' + (r > 1 ? 's' : '') + '</option>'; }
    $('#testimonials-list').append(`<div class="card mb-2 testimonial-item">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-2"><div class="mb-2"><label class="small text-muted">Rating (1-5)</label><select name="sections[testimonials][${i}][rating]" class="form-select">${stars}</select></div></div>
                <div class="col-md-4"><div class="mb-2"><label class="small text-muted">Name</label><input type="text" name="sections[testimonials][${i}][name]" class="form-control" placeholder="Client name"></div></div>
                <div class="col-md-4"><div class="mb-2"><label class="small text-muted">Position / Company</label><input type="text" name="sections[testimonials][${i}][position]" class="form-control" placeholder="Position"></div></div>
                <div class="col-md-2 d-flex align-items-end"><button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i> Remove</button></div>
            </div>
            <div class="mb-0"><label class="small text-muted">Quote</label><textarea name="sections[testimonials][${i}][quote]" class="form-control" rows="2" placeholder="Testimonial quote"></textarea></div>
        </div>
    </div>`);
}
function addReasonItem() {
    var i = $('#reasons-list .reason-item').length;
    $('#reasons-list').append(`<div class="row g-2 mb-2 reason-item">
        <div class="col-md-2"><input type="text" name="sections[reasons][${i}][icon]" class="form-control" placeholder="Icon (e.g. fa-globe)"></div>
        <div class="col-md-3"><input type="text" name="sections[reasons][${i}][title]" class="form-control" placeholder="Title"></div>
        <div class="col-md-5"><input type="text" name="sections[reasons][${i}][description]" class="form-control" placeholder="Description"></div>
        <div class="col-md-2"><button type="button" class="btn btn-sm btn-danger remove-item"><i class="fas fa-times"></i></button></div>
    </div>`);
}
</script>
@endpush
