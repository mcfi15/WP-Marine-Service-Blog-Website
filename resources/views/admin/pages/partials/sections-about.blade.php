<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Mission Statement</label>
            <textarea name="sections[mission]" class="form-control" rows="4">{{ old('sections.mission', $sections['mission'] ?? '') }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Vision Statement</label>
            <textarea name="sections[vision]" class="form-control" rows="4">{{ old('sections.vision', $sections['vision'] ?? '') }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="mb-3">
            <label class="form-label">Years of Experience</label>
            <input type="text" name="sections[stat_years]" class="form-control" value="{{ old('sections.stat_years', $sections['stat_years'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label class="form-label">Countries Covered</label>
            <input type="text" name="sections[stat_countries]" class="form-control" value="{{ old('sections.stat_countries', $sections['stat_countries'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label class="form-label">Ports Served</label>
            <input type="text" name="sections[stat_ports]" class="form-control" value="{{ old('sections.stat_ports', $sections['stat_ports'] ?? '') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label class="form-label">Happy Clients</label>
            <input type="text" name="sections[stat_clients]" class="form-control" value="{{ old('sections.stat_clients', $sections['stat_clients'] ?? '') }}">
        </div>
    </div>
</div>
