<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\models\Order;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class ExcelController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        $month=Carbon::now()->format('m');
       
        $orders = Order::where('state',1)->get();
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->code,
                '2' => $row->user_info->fullname,
                '3' => $row->phone,
                '4' => $row->address,  
                '5' => $row->total,
                '6' => $row->updated_at              
            );
        }

        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'id',
            'Mã đơn hàng',           
            'Tên khách hàng',
            'Sđt',
            'Địa chỉ',
            'Tổng tiền',
            'Ngày đặt hàng',            
        ];
    }

    public function export(){
        return Excel::download(new ExcelController(), 'Doanh thu.xlsx');
   }
}
