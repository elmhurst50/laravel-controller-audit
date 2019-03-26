<?php namespace SamJoyce777\LaravelControllerAudit\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SamJoyce777\LaravelControllerAudit\Models\ConsoleAudit;
use SamJoyce777\LaravelControllerAudit\Models\ControllerAudit;


class StatisticsController extends Controller
{
    public function index()
    {
        $start_date = Carbon::today()->startOfDay();

        $end_date = Carbon::today()->endOfDay();

        $audit_controllers = ControllerAudit::whereBetween('created_at', [$start_date->toDateTimeString(), $end_date->toDateTimeString()])->paginate(100);

        return view('laravel-controller-audit::statistics.index')
            ->with('audit_controllers', $audit_controllers)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date);
    }

    public function indexPost(Request $request)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $request->get('start_date'))->startOfDay();

        $end_date = Carbon::createFromFormat('Y-m-d', $request->get('end_date'))->endOfDay();

        $audit_controllers = ControllerAudit::whereBetween('created_at', [$start_date->toDateTimeString(), $end_date->toDateTimeString()])
            ->when($request->get('user_id') != 0, function($query) use ($request){
                return $query->where('user_id', $request->get('user_id'));
            })
            ->paginate(100);

        return view('laravel-controller-audit::statistics.index')->with('audit_controllers', $audit_controllers)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date)
            ->with('user_id', $request->get('user_id'));
    }

    public function consoleIndex()
    {
        $start_date = Carbon::today()->startOfDay();

        $end_date = Carbon::today()->endOfDay();

        $audit_consoles = ConsoleAudit::whereBetween('created_at', [$start_date->toDateTimeString(), $end_date->toDateTimeString()])->paginate(100);

        return view('laravel-controller-audit::statistics.console-index')
            ->with('audit_consoles', $audit_consoles)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date);
    }

    public function consoleIndexPost(Request $request)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $request->get('start_date'))->startOfDay();

        $end_date = Carbon::createFromFormat('Y-m-d', $request->get('end_date'))->endOfDay();

        $audit_consoles = ConsoleAudit::whereBetween('created_at', [$start_date->toDateTimeString(), $end_date->toDateTimeString()])
            ->paginate(100);

        return view('laravel-controller-audit::statistics.console-index')->with('audit_consoles', $audit_consoles)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date)
            ->with('user_id', $request->get('user_id'));
    }
}
