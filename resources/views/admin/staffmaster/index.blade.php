<x-app-layout>
    <div class="container-fluid">
        <div class="row pt-3 pb-2 border-bottom">
            <div class="col-lg-4">
                <h3>Staff Lists</h3>
            </div>
            <div class="col-lg-8 text-end">
                <a href="{{ route('staffmaster.create') }}" class="add-btn bg-success text-white">Add
                </a>
            </div>
        </div>
        <div class="row pt-3 pb-2 ">
            <div class="col-lg-9 text-end ms-auto">
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
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>

                </form>

            </div>
        </div>
        <div id="table-scroll" class="table-scroll">
            <div class="table-wrap custom_table">
                <table class="table main-table product-table table-nowrap table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no</th>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="dropdown pop_Up dropdown_bg">
                                        <div class="dropdown-toggle" id="dropdownMenuButton-{{ $item->id }}"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            Action
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(-95px, -25.4219px);"
                                            data-popper-placement="top-end">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.staffmaster.edit', $item->id) }}">
                                                    <i class=" bx bx-edit-alt"></i> Edit
                                                </a>

                                                <a class="dropdown-item"
                                                   onclick="return confirm('Are You Sure to delete ?')" href="{{ route('admin.staffmaster.delete', $item->id) }}">
                                                    <i class='bx bx-trash'></i>
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
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>

</x-app-layout>
