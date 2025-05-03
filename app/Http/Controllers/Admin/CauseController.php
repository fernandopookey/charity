<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CauseStoreRequest;
use App\Http\Requests\CauseUpdateRequest;
use App\Models\Cause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CauseController extends Controller
{
    // public function index()
    // {
    //     $status = Request()->input('status');

    //     $causes = Cause::filterByStatus($status)->get();
    //     // dd($causes);

    //     $causes = Cause::getCauseListActive();

    //     $data = [
    //         'title'             => 'Cause',
    //         'causes'            => $causes,
    //         'content'           => 'admin/cause/index'
    //     ];

    //     return view('admin.layout.wrapper', $data);
    // }

    // public function index(Request $request)
    // {
    //     $status = $request->input('status');
    //     $visibility = $request->input('visibility');
    //     dd($status);

    //     $causes = Cause::getCauseListActive();

    //     $filteredCauses = collect($causes)->filter(function ($cause) use ($status, $visibility) {
    //         $statusMatch = $status ? $cause->active_status === $status : true;
    //         $visibilityMatch = $visibility !== null && $visibility !== ''
    //             ? $cause->visibility_status == $visibility
    //             : true;

    //         return $statusMatch && $visibilityMatch;
    //     });

    //     return view('admin.layout.wrapper', [
    //         'title'   => 'Cause',
    //         'causes'  => $filteredCauses,
    //         'content' => 'admin/cause/index'
    //     ]);
    // }

    public function index()
    {
        $status = Request()->input('status');      // Running / over / Not Started
        $visibility = Request()->input('visibility');  // 1 / 0

        $query = DB::table('causes')
            ->select(
                'causes.id',
                'causes.title',
                'causes.goal',
                'causes.slug',
                'causes.detail_donation',
                'causes.description',
                'causes.status as visibility_status',
                'causes.days',
                'causes.created_at',
                DB::raw('DATE_ADD(causes.created_at, INTERVAL causes.days DAY) AS expired_date'),
                DB::raw("CASE 
                            WHEN NOW() > DATE_ADD(causes.created_at, INTERVAL causes.days DAY) THEN 'over'
                            WHEN NOW() BETWEEN causes.created_at AND DATE_ADD(causes.created_at, INTERVAL causes.days DAY) THEN 'Running'
                            ELSE 'Not Started'
                        END AS active_status"),
                DB::raw('GREATEST(DATEDIFF(DATE_ADD(causes.created_at, INTERVAL causes.days DAY), CURDATE()), 0) AS left_days'),
                DB::raw("(SELECT SUM(price) FROM payments WHERE payments.cause_id = causes.id AND (payments.status = 'capture' OR payments.status = 'settlement')) AS raised"),
                DB::raw("(SELECT image FROM cause_images WHERE cause_images.cause_id = causes.id AND 
                    (image LIKE '%.jpg%' OR image LIKE '%.jpeg%' OR image LIKE '%.png%') LIMIT 1) AS cause_image")
            );

        // Filter visibility (publish / non-publish)
        if (!is_null($visibility)) {
            $query->where('causes.status', $visibility);
        }

        // Filter status (Running / over / Not Started)
        if ($status) {
            $query->having('active_status', '=', $status);
        }

        $causes = $query->get();

        return view('admin.layout.wrapper', [
            'title'   => 'Cause',
            'causes'  => $causes,
            'content' => 'admin/cause/index',
        ]);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create Cause',
            'content'   => 'admin/cause/create'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function store(CauseStoreRequest $request)
    {
        $data = $request->all();
        // $data['user_id'] = Auth::user()->id;
        $cause = Cause::create($data);
        // dd($cause);
        Alert::success('Success!', 'Cause Created Successfully, please add image');
        return redirect()->route('cause-image-upload', $cause->id);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Cause',
            'causes'    => Cause::find($id),
            'content'   => 'admin/cause/edit',
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function update(CauseUpdateRequest $request, string $id)
    {
        $item = Cause::find($id);
        $data = $request->all();
        $item->update($data);
        Alert::success('Success!', 'Cause Updated Successfully');
        return redirect()->route('cause.index');
    }

    public function show($id)
    {
        $causeById = Cause::getCauseListById($id);

        $data = [
            'title'         => 'Cause Detail',
            'cause'         => $causeById[0],
            'content'       => 'admin/cause/show'
        ];

        return view('admin.layout.wrapper', $data);
    }

    public function destroy($id)
    {
        $item = Cause::find($id);
        try {
            $item->delete();
            Alert::success('Success!', 'Cause Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            dd("Hallo");
            dd($th);
            Alert::error('Error!', 'Cause Deleted Failed');
            return redirect()->back();
        }
    }
}
