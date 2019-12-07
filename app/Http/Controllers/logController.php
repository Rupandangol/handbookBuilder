<?php

namespace App\Http\Controllers;

use App\Model\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class logController extends Controller
{
    public function viewLog()
    {
        $data['log'] = Log::orderBy('id', 'DESC')->get();
        return view('Backend.pages.log.viewLog', $data, compact('search'));
    }

    public function searchLog(Request $request)
    {
        $query = $request->myQuery;

        if ($query) {
            $data = Log::where('admin_name', 'like', '%' . $query . '%')
                ->orWhere('activity','like','%'.$query.'%')
                ->orWhere('category_name','like','%'.$query.'%')
                ->get();
        } else {
            $data = Log::orderBy('id', 'DESC')->get();
        }
        $totalData = $data->count();
        if ($totalData > 0) {
            foreach ($data as $value) {
                if($value->activity==='Created'){
                    $activity="<i class=\"fa fa-plus-square\" style=\"color: green\"></i>";
                }elseif($value->activity==='Deleted'){
                    $activity="<i class=\"fa fa-trash-alt\" style=\"color: red\"></i>";
                }
                $output[] = "<tr>
                    <td width=\"100px\">" . \Carbon\Carbon::parse($value->created_at)->setTimezone('Asia/Kathmandu')->format('h:i') . "</td>
                    <td>
                        <b><span class=\"badge badge-primary\">" . ucfirst($value->admin_name) . "</span> </b><br>                        
                            ".$activity."&nbsp;&nbsp; Category &nbsp;&nbsp;". $value->category_name . "&nbsp;&nbsp;" . $value->activity . "
                    </td>
                    <td style=\"text-align: right\">" . \Carbon\Carbon::parse($value->created_at)->format('l, M d Y') . "</td>
                </tr>";

            }

        } else {
            $output = "<tr>
                            <td colspan='3' style='text-align: center'><code>No Data Found</code></td>
                       </tr> ";
        }
        $data = [
            'table_data' => $output,
            'total_data' => $totalData
        ];
        return response()->json($data);
    }
}
