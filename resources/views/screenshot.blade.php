<form action="{{ url('/screenshot') }}" method="POST">
    @csrf
    <input type="text" name="url" placeholder="https://example.com" required>
    <button type="submit">Take Screenshot</button>
</form>

@if(session('screenshotPath'))
    <h2>Screenshot:</h2>
    <img src="{{ asset('storage/' . session('screenshotPath')) }}" style="max-width: 100%;">
@endif
