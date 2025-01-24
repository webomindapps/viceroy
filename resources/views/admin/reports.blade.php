<x-app-layout>
    <div class="container">
        <h2 class="text-center mt-4">Download Form B  Guest Reports</h2>
        <form method="POST" action="{{ route('generate.foreigner.reports') }}">
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <label for="from_date">From Date</label>
                    <input type="date" id="from_date" name="from_date" class="form-control" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mt-3">
                    <label for="to_date">To Date</label>
                    <input type="date" id="to_date" name="to_date" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Generate Reports</button>
        </form>
    </div>
</x-app-layout>
