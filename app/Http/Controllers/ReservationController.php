<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ReservationController extends Controller
{
    public function index()
    {
        return view("pages.reservation");
    }

    public function bookTable(Request $request)
    {
        $date = $request->input("date");
        $people = $request->input("people");
        $phone = $request->input("phone");
        $email = $request->input("email");
        $name = explode(" ",$request->input("name"));
        $firstName = $name[0];
        $lastName = $name[1];
        $time = $request->input("time").":00";
        $btn = $request->input("btn");

        try {
            $table = Table::where("capacity",">=",$people)
                ->orderBy("capacity")->first();
            $reservationCheck = Reservation::where([
                                                ["table_id", $table->id],
                                                ["date", $date],
                                                ])
                                        ->whereBetween('time', [
                                            Carbon::parse($time)->subHour(),
                                            Carbon::parse($time)->addHour(),

                                        ])
                                        ->get();
            if(count($reservationCheck)>0){
                // Get all reservations for the specified table and date
                $reservations = Reservation::where('table_id', $table->id)
                    ->where('date', $date)
                    ->orderBy('time')
                    ->get();

                // Define the start and end of the time range for booking
                $bookingStartTime = Carbon::parse('10:00:00');
                $bookingEndTime = Carbon::parse('20:00:00');

                // Initialize an array to store available time slots
                $availableTimeSlots = [];

                // Check availability based on existing reservations
                $currentEndTime = $bookingStartTime->copy(); // Initialize current end time as booking start time
                foreach ($reservations as $reservation) {
                    // Check if there is a gap between the current reservation and the previous one
                    if (Carbon::parse($reservation->time)->gt($currentEndTime->addHour())) {
                        // Add the gap as an available time slot
                        $availableTimeSlots[] = [
                            'start_time' => $currentEndTime->subHour()->copy()->format('H:i:s'),
                            'end_time' => Carbon::parse($reservation->time)->copy()->subHours(2)->format('H:i:s'),
                        ];
                    }

                    // Update the current end time to the end time of the current reservation
                    $currentEndTime = Carbon::parse($reservation->time)->copy()->addHours(2);
                }
                // Check if there's a gap between the last reservation and the end of the booking period
                if ($currentEndTime->lt($bookingEndTime)) {
                    // Add the remaining time as an available time slot
                    $availableTimeSlots[] = [
                        'start_time' => $currentEndTime->copy()->format('H:i:s'),
                        'end_time' => $bookingEndTime->copy()->format('H:i:s'),
                    ];
                }
                // Now $availableTimeSlots contains all available time slots for booking
                $message = "We are sorry, but this table is booked for this date and time. This table is free from ".$availableTimeSlots[0]["start_time"]." o'clock until ".$availableTimeSlots[0]["end_time"]." o'clock";
                if(count($availableTimeSlots) > 1){
                    $message.=", and from ". $availableTimeSlots[1]["start_time"]." o'clock until ".$availableTimeSlots[1]["end_time"]." o'clock";
                }
                $data=[
                    "message"=>$message,
                    "booking"=>false
                ];
                return Json::encode($data);
            }
            else{

                if ($btn == "false"){
                    Reservation::create([
                        "name"=>$firstName,
                        "surname"=>$lastName,
                        "email"=>$email,
                        "phone"=>$phone,
                        "date"=>$date,
                        "time"=>$time,
                        "people"=>$people,
                        "table_id"=>$table->id
                    ]);

                    Log::create([
                        "message" => $email." booked the table ".$table->name,
                        "log_type_id" => 4,
                        "date" => date("Y-m-d h:i:s")
                    ]);

                    $data=[
                        "message"=>"Your table for ".$people." people is booked for the ".$date." in "."$time"." o'clock on the name ".$firstName." ".$lastName.". See you soon!",
                        "booking"=>false
                    ];
                }
                else{
                    $data=[
                        "message"=>"We have the table ". $table->name. " who can store ". $table->capacity. " people. Do you want to book it?",
                        "booking"=>true
                    ];
                }

                return Json::encode($data);
            }


        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $reservation = Reservation::where("id",$id)->first();
        $reservation->delete();
        Log::create([
            "message" => $reservation->email." cancelled a reservation for ". $reservation->date . " in ".$reservation->time,
            "log_type_id" => 5,
            "date" => date("Y-m-d h:i:s")
        ]);
        return Json::encode("You have successfully cancelled a reservation.");
    }
}
