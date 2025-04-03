<?php

namespace App\Helpers;

class SlotHelper
{
    public static function generateTimeSlots($start = '08:00', $end = '17:00', $duration = 30)
    {
        $slots = [];
        $startTime = strtotime($start);
        $endTime = strtotime($end);

        while ($startTime + ($duration * 60) <= $endTime) {
            $slotStart = date("H:i", $startTime);
            $slotEnd = date("H:i", $startTime + ($duration * 60));
            $slots[] = ['start' => $slotStart, 'end' => $slotEnd];
            $startTime += $duration * 60;
        }

        return $slots;
    }

    public static function getAvailableSlots($modalityId, $date)
    {
        $allSlots = self::generateTimeSlots();
        $booked = \App\Models\Appointment::where('modality_id', $modalityId)
            ->where('tarikh_temujanji', $date)
            ->pluck('masa_mula')
            ->toArray();

        return array_filter($allSlots, function ($slot) use ($booked) {
            return !in_array($slot['start'], $booked);
        });
    }
}
