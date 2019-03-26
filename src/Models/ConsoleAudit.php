<?php namespace SamJoyce777\LaravelControllerAudit\Models;

use Global4Communications\CrmCore\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ConsoleAudit extends Model
{
    protected $table = 'audit_consoles';

    protected $guarded = ['id'];
}
