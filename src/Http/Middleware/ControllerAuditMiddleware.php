<?php

namespace SamJoyce777\LaravelControllerAudit\Http\Middleware;

use Closure;
use Global4Communications\CrmCore\Models\API\APIKey;
use Illuminate\Http\Request;
use SamJoyce777\LaravelControllerAudit\Models\ControllerAudit;

class ControllerAuditMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        ControllerAudit::create([
            'controller' => (\Route::currentRouteAction()) ? \Route::currentRouteAction() : '',
            'url' => $request->getUri(),
            'request_object' => $this->redactData($request),
            'ip_address' => $request->getClientIp(),
            'method' => $request->getMethod(),
            'user_id' => (\Auth::check()) ? \Auth::user()->id : 0
        ]);

        return $next($request);
    }

    /**
     * Hide the data for GDPR purposes
     * @param Request $request
     * @return string
     */
    protected function redactData(Request $request){
        $data = $request->all();

        $log_data = [];

        $redactable = ['name', 'firstname', 'first_name', 'surname', 'mobile', 'mob', 'phone', 'telephone', 'phone_number', 'telephone_number', 'mob_number', 'email', 'email_address', 'account_number', 'sort_code', 'address_1', 'address_2', 'address_3'];

        foreach($data as $key => $value){
            if(!$request->hasFile($key)) {
                if(in_array($key, $redactable)) $log_data[$key] = '*****';
            }else{
                $log_data[$key] = 'Uploaded file';
            }
        }

        return serialize($log_data);
    }
}
