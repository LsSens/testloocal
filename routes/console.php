<?php

use App\Jobs\SendProductInfoJob;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new SendProductInfoJob)->daily();