<?php
/**
 * @author Jeroen Maassen van den Brink
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Vehicle;
use Illuminate\Queue\RedisQueue;

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
        if (isset($request->vehicles)) {
            foreach ($request->vehicles as $vehicle) {

                foreach ($vehicleModel as $vehicleModelItem) {
                    if ($vehicleModelItem->vehicle_id . "_" . $vehicleModelItem->number === $vehicle) {
//                        echo "<pre>";
//                        var_dump($vehicle);
//                        echo "</pre>";
                        for ($inputField = 1; $inputField <= $vehicleModelItem->passengers; $inputField++) {
                            $vechilesArray[$vehicleModelItem->number][] = $request["inputField_" . $vehicle . "_" . "$inputField"];
                        }
                    }
                }

            }

        } else {
            return redirect("/dashboard")->with("error", "Selecteer een voertuig!");
        }

        $vechilesJson = json_encode($vechilesArray, true);

        $extraPeopleArray = [];
        if (isset($request->field_name)) {
            foreach ($request->field_name as $people) {
                $extraPeopleArray[] = $people;
            }
        }
        $extraPeopleJson = json_encode($extraPeopleArray, true);

        if (!isset($request->report)) {
            return redirect("dashboard")
                ->with("error", "Er is iets fout gegaan")
                ->with("locatie", $request->locatie);
        }

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

    // log part of the reports

    public function getLog(Request $request)
    {
//        dd($request);
        return view("log",
            [
                "testing" => Vehicle::all(),
                "Reportlog" => Report::all()->sortDesc(),
            ]);
    }

    public function postLog(Request $request)
    {

        if (!isset($request->prio)) {
            $report = Report::all();
        } else {
            $report = Report::all()
                ->whereIn("prio", $request->prio)
                ->where(function ($query) use ($request) {
                    foreach ($request->vehicle as $key => $value) {
                        $query->orWhereJsonContains('vehicles', 'like', '%"' . $value . '"%');
                    }
                });

            dd($report);
//            $report = Report::where(function ($query) use ($request) {
//                foreach ($request->vehicle as $key => $value) {
//                    $query->orWhereJsonContains('vehicles->'.$key, 'like', '%"2330"%' );
//                }
//            });


        }


        return view("log",
            [
                "testing" => Vehicle::all(),
                "Reportlog" => $report,
            ]);
    }
}
