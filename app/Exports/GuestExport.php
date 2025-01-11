<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestExport implements FromCollection, WithHeadings
{
    protected $customers;

    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->customers->map(function ($customer) {
            return [
                $customer->firstname,
                $customer->lastname,
                $customer->dob,
                $customer->address,
                $customer->arrivingfrom,
                $customer->datetime,
                $customer->purposeofvisit,
                $customer->depaturedate,
                $customer->proceedingto,
                $customer->email,
                $customer->phone,
                $customer->nationality,
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Date of Birth',
            'Address',
            'Arriving From',
            'Arrival Date & Time',
            'Purpose of Visit',
            'Departure Date',
            'Proceeding To',
            'Email',
            'Phone',
            'Nationality',
        ];
    }
}
