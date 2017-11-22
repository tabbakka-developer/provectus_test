<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 14.11.2017
 * Time: 21:05
 */

/**
 * Class timeConverter
 */
class timeConverter {

    private $years;         //int
    private $months;        //int
    private $days;          //int
    private $total_days;    //int
    private $invert;        //boolean

    private $data_start;
    private $data_end;

    /**
     * timeConverter constructor.
     * @param $data_start string
     * @param $data_end string
     */
    public function __construct($data_start, $data_end) {
        $this->data_start = $data_start;
        $this->data_end = $data_end;
    }

    public function Calc(){
        $dataStart_arr = explode("-", $this->data_start);
        $dataEnd_arr = explode("-", $this->data_end);

        $yearStart = $dataStart_arr[0];
        $monthStart = $dataStart_arr[1];
        $dayStart = $dataStart_arr[2];

        $yearEnd = $dataEnd_arr[0];
        $monthEnd = $dataEnd_arr[1];
        $dayEnd = $dataEnd_arr[2];

        $totalDaysToStart = $yearStart*12*30 + $monthStart*30 + $dayStart;
        $totalDaysToEnd = $yearEnd*12*30 + $monthEnd*30 + $dayEnd;

//        echo "Total days to start: ".$totalDaysToStart."\n";
//        echo "Total days to end: ".$totalDaysToEnd."\n";

        $totalDaysDiff = $totalDaysToStart - $totalDaysToEnd;

//        echo "Total days diff: ".$totalDaysDiff."\n\n";

        if($totalDaysDiff < 0){
            $this->invert = false;

            $dayDiff =  $dayEnd - $dayStart;
            if($dayDiff < 0){
                $dayDiff+=30;
                $monthEnd--;
            }

            $monthDiff = $monthEnd - $monthStart;
            if($monthDiff < 0){
                $monthDiff+=12;
                $yearEnd--;
            }
            $yearDiff = $yearEnd - $yearStart;

            $this->months = $monthDiff;
            $this->years = $yearDiff;
            $this->days = $dayDiff;

            $this->total_days = abs($totalDaysDiff);
        }
        else {
            $dayDiff = $dayStart - $dayEnd;
            if($dayDiff < 0){
                $dayDiff+=30;
                $monthStart--;
            }

            $monthDiff = $monthStart - $monthEnd;
            if($monthDiff < 0){
                $monthDiff+=12;
                $yearStart--;
            }
            $yearDiff = $yearStart - $yearEnd;

            $this->months = $monthDiff;
            $this->years = $yearDiff;
            $this->days = $dayDiff;

            $this->total_days = $totalDaysDiff;
            $this->invert = true;
        }

        $this->showResult();
    }

    private function showResult(){
        echo "Days: ".$this->days."\n";
        echo "Months: ".$this->months."\n";
        echo "Years: ".$this->years."\n";
        echo "Total days: ".$this->total_days."\n";
        if($this->invert){
            echo "Invert: true\n";
        }
        else {
            echo "Invert: false\n";
        }
    }
}