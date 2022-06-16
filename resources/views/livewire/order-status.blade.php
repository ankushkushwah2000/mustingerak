<div>
    <p><strong>Current status : </strong>{{ $currentStatus }}</p>
    <div>
        <div class="mb-2">
            <label class="form-label" for="status_id">Available status :</label>
            <select name="status_id" id="status_id" class="form-control" wire:model="status_id">
                @foreach ($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->title }}
                </option>
                @endforeach
            </select>
        </div>
        {{ $status_id }}
    </div>
</div>