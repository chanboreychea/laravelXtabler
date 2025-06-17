<?php

namespace App\Http\Controllers;

use App\Enum\SalaryCertificateStatus;
use App\Util\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Models\SalaryCertificate;
use Illuminate\Support\Facades\DB;

class SalaryCertificateController extends Controller
{
    public function index(Request $request)
    {
        $salaryCertificate = SalaryCertificate::paginate(10);
        return view('admin.salaryCertificate.index', compact('salaryCertificate'));
    }

    public function show(Request $request, string $id)
    {
        $salaryCertificate = SalaryCertificate::find($id);
        return view('admin.salaryCertificate.show', compact('salaryCertificate'));
    }

    public function create()
    {
        return view('admin.salaryCertificate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_name_kh' => 'required|string|max:255',
            'employee_name_en' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'date_of_birth' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')
            ],
            'nationality' => 'required|string|max:50',
            'ethnicity' => 'required|string|max:50',
            'place_of_birth' => 'required|string|max:255',
            'type_of_employee' => 'required|string|max:50',
            'employee_position' => 'required|string|max:50',
            'employee_serve' => 'required|string|max:50',
            'employee_salary' => 'required',
        ], [
            'employee_name_kh.required' => 'សូមបំពេញឈ្មោះបុគ្គលិកជាភាសាខ្មែរ។',
            'employee_name_en.required' => 'សូមបំពេញឈ្មោះបុគ្គលិកជាភាសាអង់គ្លេស។',
            'gender.required' => 'សូមជ្រើសរើសភេទ។',
            'date_of_birth.required' => 'សូមបំពេញថ្ងៃខែឆ្នាំកំណើត។',
            'date_of_birth.before_or_equal' => 'ថ្ងៃខែឆ្នាំកំណើតត្រូវតែធំជាង ១៨ ឆ្នាំ។',
            'nationality.required' => 'សូមបំពេញសញ្ជាតិ។',
            'ethnicity.required' => 'សូមបំពេញជនជាតិ។',
            'place_of_birth.required' => 'សូមបំពេញកន្លែងកំណើត។',
            'type_of_employee.required' => 'សូមបំពេញប្រភេទបុគ្គលិក។',
            'employee_position.required' => 'សូមបំពេញមុខតំណែង។',
            'employee_serve.required' => 'សូមបំពេញការបម្រើធ្វើការ។',
            'employee_salary.required' => 'សូមបំពេញប្រាក់បៀវត្ស។',
        ]);

        DB::beginTransaction();

        try {

            SalaryCertificate::create([
                'id' => Utils::getInstance()->generateUuId(),
                'employee_name_kh' => $request->employee_name_kh,
                'employee_name_en' => $request->employee_name_en,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'nationality' => $request->nationality,
                'ethnicity' => $request->ethnicity,
                'place_of_birth' => $request->place_of_birth,
                'type_of_employee' => $request->type_of_employee,
                'employee_position' => $request->employee_position,
                'employee_serve' => $request->employee_serve,
                'employee_salary' => Utils::getInstance()->getNumByCurrency($request->employee_salary),
                'status' => SalaryCertificateStatus::SUBMITTED,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'ការបញ្ជាក់ប្រាក់បៀវត្សបានបង្កើតដោយជោគជ័យ។');
        } catch (\Exception $e) {
            DB::rollBack();
            // return redirect()->back()->with('error', 'Error occurred while creating the salary certificate: ' . $e->getMessage());
            return redirect()->back()->with('error', 'ការបង្កើតការបញ្ជាក់ប្រាក់បៀវត្សមិនត្រឹមត្រូវ។');
        }
    }

    public function edit(Request $request, string $id)
    {
        $salaryCertificate = SalaryCertificate::find($id);
        return view('admin.salaryCertificate.edit', compact('salaryCertificate'));
    }

    // public function show(Request $request, string $id)
    // {
    //     $salaryCertificate = SalaryCertificate::find($id);
    //     return view('admin.salaryCertificate.show', compact('salaryCertificate'));
    // }

    public function exportCustomWord()
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Khmer OS Muol Light title style
        $titleStyle = [
            'name' => 'Khmer OS Muol Light',
            'size' => 14,
            'bold' => true,
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
        ];

        // Normal content style
        $contentStyle = [
            'name' => 'Khmer MEF1',
            'size' => 16,
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
            'spaceAfter' => 200,
        ];

        // Add logo
        $section->addImage(public_path('src/dist/img/icons/brands/logo2.png'), [
            'width' => 120,
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
        ]);

        // Add titles
        $section->addText('អាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ', $titleStyle);
        $section->addText('អង្គភាពសវនកម្មផ្ទៃក្នុង', $titleStyle);

        // Add main title
        $section->addTextBreak(1);
        $section->addText('លិខិតបញ្ជាក់ប្រាក់បៀវត្ស', $titleStyle);
        $section->addText('អង្គភាពសវនកម្មផ្ទៃក្នុងនៃអាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ', $titleStyle);
        $section->addText('សូមបញ្ជាក់ថា៖', $titleStyle);

        // Body content
        $bodyText = "តបតាមកម្មវត្ថុខាងលើ ខ្ញុំសូមគោរពជម្រាបជូន លោកប្រធាននាយកដ្ឋាន មេត្តាជ្រាបដ៏ខ្ពង់ខ្ពស់ថា៖ខ្ញុំបាទ/ នាងខ្ញុំឈ្មោះ កើតថ្ងៃទី ដូចមូលហេតុ និងកាលបរិច្ឆេទក្នុងកម្មវត្ថុខាងលើ។";
        $section->addText($bodyText, $contentStyle);

        $bodyText2 = "សេចក្តីដូចបានជម្រាបជូនខាងលើ សូម លោកប្រធាននាយកដ្ឋាន មេត្តាពិនិត្យ និងសម្រេចអនុញ្ញាតច្បាប់ដោយក្តីអនុគ្រោះ។";
        $section->addText($bodyText2, $contentStyle);

        $bodyText3 = "សូម លោកប្រធាននាយកដ្ឋាន មេត្តាទទួលនូវការគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំ ។";
        $section->addText($bodyText3, $contentStyle);

        // Signature
        $section->addTextBreak(2);
        $section->addText('រាជធានីភ្នំពេញ ថ្ងៃទី ១៥ ខែ ឧសភា ឆ្នាំ ២០២៥', $contentStyle);
        $section->addText('មន្ត្រីជំនាញ', $titleStyle);

        // Save to file
        $fileName = 'salary_cert.docx';
        $filePath = storage_path($fileName);
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
