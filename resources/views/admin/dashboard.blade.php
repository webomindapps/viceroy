<x-app-layout>
    <div class="main">
        <div class="row mb-3">
            <ul class="month_count list-inline">
                <li class="list-inline-item filter-button" onclick="filterByDays(0, this)">Today</li>
                <li class="list-inline-item filter-button" onclick="filterByDays(7, this)">7 Days</li>
                <li class="list-inline-item filter-button" onclick="filterByDays(30, this)">Month</li>
            </ul>
        </div>

        <div class="row mb-3">
            <ul class="Nationality list-inline">
                <li class="list-inline-item filter-button" onclick="filterByNationality('All', this)">All</li>
                <li class="list-inline-item filter-button" onclick="filterByNationality('India', this)">Indian
                    Nationals</li>
                <li class="list-inline-item filter-button" onclick="filterByNationality('Foreigner', this)">Foreigners
                </li>
                <li class="list-inline-item filter-button" onclick="filterByVIP(this)">VIPs</li>

            </ul>
        </div>





        <div class="container-fluid">
            <div class="row pt-3 pb-2 border-bottom">
                <div class="col-lg-4">
                    <h3>Registered Guests</h3>
                </div>
                <div class="col-lg-8 text-end ms-auto">
                    <form class="row justify-content-end" action="{{ route('admin.dashboard') }}" method="GET">
                        <div class="col-lg-3">
                            <input type="date" class="form-control filter" name="from_date"
                                value="{{ request()->from_date }}">
                        </div>
                        <div class="col-lg-1 text-center my-auto">
                            <span class="fw-semibold fs-6">To</span>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" class="form-control filter" name="to_date"
                                value="{{ request()->to_date ?? date('Y-m-d') }}">
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('admin.guest.exports', ['from_date' => request('from_date'), 'to_date' => request('to_date')]) }}"
                                class="add-btn bg-success text-white" role="button">Export</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div id="table-scroll" class="table-scroll">
            <div class="table-wrap custom_table">
                <table class="table main-table product-table table-nowrap table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Arriving From</th>
                            <th>Arrival Date & Time</th>
                            <th>Purpose of Visit</th>
                            <th>Departure Date</th>
                            <th>Proceeding To</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Nationality</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guests as $index => $guest)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $guest->firstname ?? '--' }}</td>
                                <td>{{ $guest->lastname ?? '--' }}</td>
                                <td>{{ $guest->dob ? Carbon\Carbon::parse($guest->dob)->format('d-m-Y') : '--' }}</td>
                                <td>{{ $guest->address ?? '--' }}</td>
                                <td>{{ $guest->arrivingfrom ?? '--' }}</td>
                                <td>{{ $guest->datetime ? \Carbon\Carbon::parse($guest->datetime)->format('d-m-Y H:i') : '--' }}
                                </td>
                                <td>{{ $guest->purposeofvisit ?? '--' }}</td>
                                <td>{{ $guest->depaturedate ? Carbon\Carbon::parse($guest->depaturedate)->format('d-m-Y') : '--' }}
                                </td>
                                <td>{{ $guest->proceedingto ?? '--' }}</td>
                                <td>{{ $guest->email ?? '--' }}</td>
                                <td>{{ $guest->phone ?? '--' }}</td>
                                <td>{{ $guest->nationality ?? '--' }}</td>
                                <td>
                                    <div class="dropdown pop_Up dropdown_bg">
                                        <div class="dropdown-toggle" id="dropdownMenuButton-{{ $guest->id }}"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            Action
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(-95px, -25.4219px);"
                                            data-popper-placement="top-end">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.guest.details', $guest->id) }}">
                                                    <i class=" bx bx-link-external"></i> View
                                                </a>

                                                <a class="dropdown-item"
                                                    href="{{ route('admin.guest.edit', $guest->id) }}">
                                                    <i class='bx bx-edit-alt'></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item"
                                                    onclick="return confirm('Are you sure to delete this?')"
                                                    href="{{ route('guest.delete', $guest->id) }}">
                                                    <i class='bx bx-trash-alt'></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-start">
                {{ $guests->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function fetchFilteredGuests(filters = {}) {
                const params = new URLSearchParams();

                if (filters.days !== undefined) params.append('days', filters.days);
                if (filters.nationality) params.append('nationality', filters.nationality);
                if (filters.is_vip !== undefined) params.append('isvip', filters.is_vip ? '1' : '0');

                const queryString = params.toString();
                const url = `{{ route('admin.filter.guests') }}?${queryString}`;

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        const tableBody = document.querySelector('table tbody');
                        tableBody.innerHTML = '';

                        response.forEach((guest, index) => {
                            const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${guest.firstname || '--'}</td>
                        <td>${guest.lastname || '--'}</td>
                        <td>${guest.dob ? new Date(guest.dob).toLocaleDateString('en-GB') : '--'}</td>
                        <td>${guest.address || '--'}</td>
                        <td>${guest.arrivingfrom || '--'}</td>
                        <td>${guest.datetime ? new Date(guest.datetime).toLocaleString('en-GB') : '--'}</td>
                        <td>${guest.purposeofvisit || '--'}</td>
                        <td>${guest.depaturedate ? new Date(guest.depaturedate).toLocaleDateString('en-GB') : '--'}</td>
                        <td>${guest.proceedingto || '--'}</td>
                        <td>${guest.email || '--'}</td>
                        <td>${guest.phone || '--'}</td>
                        <td>${guest.nationality || '--'}</td>
                        <td>
                            <div class="dropdown pop_Up dropdown_bg">
                                <div class="dropdown-toggle" id="dropdownMenuButton-${guest.id}" data-bs-toggle="dropdown" aria-expanded="true">
                                    Action
                                </div>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="/admin/guest/${guest.id}/details">
                                            <i class=" bx bx-link-external"></i> View
                                        </a>
                                        <a class="dropdown-item" href="/admin/guest/${guest.id}/edit">
                                            <i class='bx bx-edit-alt'></i> Edit
                                        </a>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure to delete this?')" href="/guest/${guest.id}/delete">
                                            <i class='bx bx-trash-alt'></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    },
                    error: function() {
                        alert('Failed to load guests. Please try again.');
                    }
                });
            }

            let currentFilters = {
                days: 0,
                nationality: "All",
                is_vip: false
            }; // Initial default filters

            function filterByDays(days, element) {
                applyActiveClass(element);
                currentFilters.days = days;
                fetchFilteredGuests(currentFilters);
            }

            function filterByNationality(nationality, element) {
                applyActiveClass(element);
                currentFilters.is_vip = false;
                currentFilters.nationality = nationality;
                fetchFilteredGuests(currentFilters);
            }

            function filterByVIP(element) {
                applyActiveClass(element);
                const isVIP = element.classList.contains('active') ? '1' : '0';
                currentFilters.is_vip = isVIP;
                fetchFilteredGuests(currentFilters);
            }

            function filterByAll(element) {
                applyActiveClass(element);
                currentFilters = {
                    days: 0,
                    nationality: "All",
                    is_vip: false
                };
                fetchFilteredGuests(currentFilters);
            }

            function applyActiveClass(element) {
                const filterGroup = element.closest('ul');
                filterGroup.querySelectorAll('.filter-button').forEach(btn => {
                    btn.classList.remove('active');
                });

                element.classList.add('active');
            }
        </script>
    @endpush
    <style>
        .table-scroll {
            position: relative;
            max-width: 1280px;
            margin: auto;
            overflow: hidden;

        }

        .table-wrap {
            width: 100%;
            overflow-y: hidden;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-scroll table {
            width: 1500px;
            margin: auto;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 0;
            max-width: none;
        }

        .table-scroll table::-webkit-scrollbar {
            width: 1px;
            height: 3px;
        }

        .table-scroll table::-webkit-scrollbar-track {
            background: inherit;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        .table-scroll table::-webkit-scrollbar-thumb {
            background-color: var(--theme-blue);
            border-radius: 20px;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            -ms-border-radius: 20px;
            -o-border-radius: 20px;
        }

        .table-scroll table::-webkit-scrollbar-corner {
            background: inherit;
        }
    </style>
</x-app-layout>
