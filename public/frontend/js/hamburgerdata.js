document.addEventListener("DOMContentLoaded", function () {
    let currentDays = 0;
    let currentNationality = null;
    let isVIPFilterActive = false;

    const editUrlBase = "{{ url('guest') }}";

    fetchFilteredResults();

    window.filterByDays = function (days, element) {
        currentDays = days;
        updateActiveClass(element);
        fetchFilteredResults();
    };

    window.filterByNationality = function (nationality, element) {
        currentNationality = nationality;
        isVIPFilterActive = false;
        updateActiveClass(element);
        fetchFilteredResults();
    };

    window.filterByVIP = function (element) {
        isVIPFilterActive = true;
        currentNationality = null;
        updateActiveClass(element);
        fetchFilteredResults();
    };

    window.filterByAll = function (element) {
        currentDays = 0;
        currentNationality = null;
        isVIPFilterActive = false;
        updateActiveClass(element);
        fetchFilteredResults();
    };

    function updateActiveClass(clickedElement) {
        const allFilterButtons = clickedElement.closest("ul").querySelectorAll(".filter-button");
        allFilterButtons.forEach(button => {
            button.classList.remove("active");
        });
        clickedElement.classList.add("active");
    }

    function fetchFilteredResults() {
        let fetchUrl = window.location.origin + window.location.pathname;
        fetchUrl += `?`;
        if (currentDays !== null) fetchUrl += `days=${currentDays}&`;
        if (currentNationality) fetchUrl += `nationality=${currentNationality}&`;
        if (isVIPFilterActive) fetchUrl += `isvip=1&`;
        fetchUrl = fetchUrl.replace(/&$/, '');

        fetch(fetchUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) throw new Error("Network response was not ok");
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data)) {
                    renderTable(data);
                } else {
                    console.error("Expected an array but received:", data);
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function renderTable(data) {
        const tableBody = document.querySelector('.table_content tbody');
        tableBody.innerHTML = "";

        if (data.length === 0) {
            tableBody.innerHTML = "<tr><td colspan='9'>No records found</td></tr>";
            return;
        }

        data.forEach((registration, index) => {
            const editUrl = `guests/${registration.id}/edit`; // Construct the edit URL

            const row = `
                <tr>
                 <td>${index + 1}</td>
                 <td>${registration.firstname ?? '--'}</td>
                 <td>${registration.dob ?? '--'}</td>
                 <td>${registration.address ?? '--'}</td>
                 <td>${registration.arrivingfrom ?? '--'}</td>
                 <td>${registration.email ?? '--'}</td>
                 <td>${registration.phone ?? '--'}</td>
                 <td>${registration.nationality ?? '--'}</td>
                <td>
                     <a href="${editUrl}">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                    </a>
                 </td>
            </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row);
        });
    }
});
