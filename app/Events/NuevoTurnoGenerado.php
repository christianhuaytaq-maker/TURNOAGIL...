<?php

namespace App\Events;

use App\Models\Turno;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NuevoTurnoGenerado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $turno;

    public function __construct(Turno $turno)
    {
        $this->turno = $turno;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('pantalla-publica'),
        ];
    }
}
