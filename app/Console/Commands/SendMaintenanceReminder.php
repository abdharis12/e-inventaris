<?php

namespace App\Console\Commands;

use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendMaintenanceReminder extends Command
{
 protected $signature = 'maintenance:reminder';
    protected $description = 'Kirim reminder service berkala (H-7 dan H-3)';

    public function handle()
    {
        $today = Carbon::today();

        // 🔹 Reminder H-7
        $remindersH7 = Maintenance::whereDate('next_service', $today->copy()->addDays(7))
            ->where('reminder_h7_sent', false)
            ->get();

        foreach ($remindersH7 as $maintenance) {
            $this->sendReminder($maintenance, 'H-7');
            $maintenance->update(['reminder_h7_sent' => true]);
        }

        // 🔹 Reminder H-3
        $remindersH3 = Maintenance::whereDate('next_service', $today->copy()->addDays(3))
            ->where('reminder_h3_sent', false)
            ->get();

        foreach ($remindersH3 as $maintenance) {
            $this->sendReminder($maintenance, 'H-3');
            $maintenance->update(['reminder_h3_sent' => true]);
        }

        return Command::SUCCESS;
    }

    private function sendReminder($maintenance, $type)
    {
        $item = $maintenance->item;
        $pesan = "Reminder ($type): Item {$item->nama_barang} perlu servis pada {$maintenance->next_service->format('d-m-Y')}.";

        // Kalau pakai Laravel Notification (Email)
        // $item->user->notify(new MaintenanceReminderNotification($maintenance, $type));

        // Kalau pakai Fonnte (WhatsApp API)
        // Fonnte::send($item->user->phone, $pesan);

        $this->info($pesan);
    }
}
