<?php
/**
 * @author Jeroen Maassen van den Brink
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Vehicle;

class ReportController extends Controller
{
    public function index()
    {
        return view("dashboard");
    }

    public function reportsave(Request $request)
    {
        $vehicleModel = Vehicle::all();


        /** @var  $vechilesArray */
        $vechilesArray = [];
        if (isset($request->checkboxname)) {
            foreach ($request->checkboxname as $_vehicleNumber) {

                foreach ($vehicleModel as $vehicleModelPart) {
                    if ($vehicleModelPart->number == $_vehicleNumber) {
                        for ($inputField = 1; $inputField <= $vehicleModelPart->passengers; $inputField++) {
                            $vechilesArray[$_vehicleNumber][] = $request["inputField" . $_vehicleNumber . "_" . "$inputField"];
                        }
                    }
                }
            }
        }
        $vechilesJson = json_encode($vechilesArray, true);


        $extraPeopleArray = [];
        if (isset($request->field_name)) {
            foreach ($request->field_name as $people) {
                $extraPeopleArray[] = $people;
            }
        }
        $extraPeopleJson = json_encode($extraPeopleArray, true);

        $report = new Report;
        $report->report = $request->report;
        $report->locatie = $request->locatie;
        $report->begintime = $request->begintime;
        $report->endtime = $request->endtime;
        $report->ovd = $request->ovd;
        $report->type = $request->type;
        $report->prio = $request->prio;
        $report->vehicles = $vechilesJson;
        $report->comments = $request->comments;
        $report->people_on_station = $extraPeopleJson;
        $report->save();
        return redirect("dashboard")->with("status", "Melding toegevoegd");
    }
}
