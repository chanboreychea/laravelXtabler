<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\ConfirmationLetter;
use App\Models\RequestConfirmationLetter;
use App\Util\Utils;
use Carbon\Carbon;

class RequestConfirmationLetterController extends Controller
{
    public function index(Request $request)
    {
        $query = RequestConfirmationLetter::query();

        if ($request->period) {
            $dates = Utils::getInstance()->getDatesByPeriodName($request->period, now());
            $query->whereBetween('created_at', [$dates[0] . ' 00:00:00', $dates[1] . ' 23:59:59']);
        }

        if ($request->type_of_letter) {
            $query->where('type_of_letter', $request->type_of_letter);
        }

        if ($request->created_at) {
            $date = Carbon::parse($request->created_at)->format('Y-m-d');
            $query->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59']);
        }

        if ($request->search) {
            $query->where('employee_name_kh', 'like', '%' . $request->search . '%');
        }

        $confirmationLetters = $query->whereNot('status', ConfirmationLetter::DELETED)->paginate(10);

        return view('admin.confirmationLetter.index', compact('confirmationLetters'));
    }

    public function create()
    {
        $letters = ConfirmationLetter::getAllTypes(); // Debugging line to check the letter types
        return view('admin.confirmationLetter.create', compact('letters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_of_letter' => 'required|in:' . implode(',', ConfirmationLetter::getAllTypes()),
            'reference' => 'required|string|max:255',
            'employee_name_kh' => 'required|string|max:255',
            'day_of_birth' => 'required|integer|min:1|max:31',
            'month_of_birth' => 'required|integer|min:1|max:12',
            'year_of_birth' => 'required|integer|min:1900|max:' . date('Y'),
            'type_of_employee' => 'required|string|max:255',
            'employee_position' => 'required|string|max:255',
            'department_name' => 'required|string|max:255',
            'purpose' => 'required|string|max:500',
        ]);


        RequestConfirmationLetter::create([
            'id' => Utils::getInstance()->generateUuId(),
            'type_of_letter' => $request->type_of_letter,
            'reference' => $request->reference,
            'employee_name_kh' => $request->employee_name_kh,
            'day_of_birth' => $request->day_of_birth,
            'month_of_birth' => $request->month_of_birth,
            'year_of_birth' => $request->year_of_birth,
            'type_of_employee' => $request->type_of_employee,
            'employee_position' => $request->employee_position,
            'department_name' => $request->department_name,
            'purpose' => $request->purpose,
            'status' => ConfirmationLetter::APPROVED,
        ]);

        return redirect()->back()->with('success', 'ការធ្វើរក្សាទុកបានជោគជ័យ។');
    }

    public function show($id)
    {
        $confirmationLetter = RequestConfirmationLetter::findOrFail($id); // Fetch the confirmation letter by ID
        return view('admin.confirmationLetter.show', compact('confirmationLetter'));
    }

    public function edit($id)
    {
        $confirmationLetter = RequestConfirmationLetter::findOrFail($id); // Fetch the confirmation letter by ID
        $letters = ConfirmationLetter::getAllTypes(); // Fetch all letter types for the form
        return view('admin.confirmationLetter.edit', compact('confirmationLetter', 'letters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_of_letter' => 'required|in:' . implode(',', ConfirmationLetter::getAllTypes()),
            'reference' => 'required|string|max:255',
            'employee_name_kh' => 'required|string|max:255',
            'day_of_birth' => 'required|integer|min:1|max:31',
            'month_of_birth' => 'required|integer|min:1|max:12',
            'year_of_birth' => 'required|integer|min:1900|max:' . date('Y'),
            'type_of_employee' => 'required|string|max:255',
            'employee_position' => 'required|string|max:255',
            'department_name' => 'required|string|max:255',
            'purpose' => 'required|string|max:500',
        ]);

        $confirmationLetter = RequestConfirmationLetter::findOrFail($id);

        $confirmationLetter->update($request->only([
            'type_of_letter',
            'reference',
            'employee_name_kh',
            'day_of_birth',
            'month_of_birth',
            'year_of_birth',
            'type_of_employee',
            'employee_position',
            'department_name',
            'purpose'
        ]));

        return redirect('/confirmation-letters/index')->with('success', 'ការធ្វើបច្ចុប្បន្នភាពបានជោគជ័យ។');
    }

    public function destroy($id)
    {
        $confirmationLetter = RequestConfirmationLetter::findOrFail($id);
        $confirmationLetter->update(['status' => ConfirmationLetter::DELETED]);
        return redirect()->route('request-confirmation-letter')->with('success', 'ការលុបបានជោគជ័យ។');
    }
}
