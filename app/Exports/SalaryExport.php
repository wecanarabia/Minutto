<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Branch;
use App\Models\Salary;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalaryExport implements FromCollection,WithHeadings,WithMapping
{
    public $month;
    public $year;
    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $branches = Branch::where('company_id', Auth::user()->company_id)->get();
        $employees = User::active()->hasSalary()->whereBelongsTo($branches)->with(['branch','shift'])->get();
        $salaries = Salary::where('month', $this->month)->where('year', $this->year)->whereBelongsTo($employees)->orderByDesc('year')->orderByDesc('month')->get();

        return $salaries;
    }

    public function headings(): array
    {
        return [
            'Employee',
            'Year',
            'Month',
            'Actual Salary',
            'Net Salary',
        ];
    }

    public function map($salary): array
    {
        return [
            $salary->user->name." ".$salary->user->last_name,
            $salary->year,
            $salary->month,
            $salary->actual_salary,
            $salary->net_salary,
        ];
    }
}
