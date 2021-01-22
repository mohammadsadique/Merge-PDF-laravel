<?php

namespace fireproof\Http\Controllers\pdf;

use Illuminate\Http\Request;
use fireproof\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use PDF;
use PdfMerger;
use fireproof\Item;
use fireproof\SettingPDF1;
use fireproof\SettingPDF2;
use fireproof\SettingPDFfooter;
use fireproof\SettingPDFDocument;

class PdfC extends Controller
{
    public function index()
    {
        $id = Auth::user()->CompanyId;    

        $pdf1 = SettingPDF1::where('CompanyId',$id)->first();
        $pdf2 = SettingPDF2::where('CompanyId',$id)->first();
        $pdf_footer = SettingPDFfooter::where('CompanyId',$id)->first();
        $pdf_document = SettingPDFDocument::where('CompanyId',$id)->first();
        $a = '';
        $shows = Item::orderBy('itemId','DESC')->get();
        $i = 1;
        foreach($shows as $show)
        {
            $sum = $show->DoorsetPrice + $show->IronmongaryPrice;
            $a .= 
            '<tr>
                <td>'.$show->DoorNumber.'</td>
                <td>Apartment  Bathroom Door</td>
                <td>'.$show->DoorType.'</td>
                <td>'.$show->DoorsetPrice.'</td>
                <td>'.$show->IronmongaryPrice.'</td>
                <td>'.$sum.'</td>
            </tr>';
            $i++;
        }

         
        $pdf = PDF::loadView('Company.mbk.pdf',compact('a','pdf1','pdf2','pdf_footer','pdf_document'));    
        return $pdf->download('file.pdf');

        // return view('Company.mbk.pdf',compact('a','pdf1','pdf2','pdf_footer','pdf_document'));
        
    }

    public function pdf2()
    {
       

        $a = '';
        $shows = Item::orderBy('itemId','DESC')->get();
        $i = 1;
        foreach($shows as $show)
        {
            $sum = $show->DoorsetPrice + $show->IronmongaryPrice;
            $a .= 
            '<tr>
                <td>'.$show->DoorNumber.'</td>
                <td>Apartment  Bathroom Door</td>
                <td>'.$show->DoorType.'</td>
                <td>'.$show->DoorsetPrice.'</td>
                <td>'.$show->IronmongaryPrice.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>


                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>

                <td>'.$sum.'</td>
                <td>'.$sum.'</td>


                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>

                <td>'.$sum.'</td>

                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>

                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td>'.$sum.'</td>
                <td class="tbl_last">'.$sum.'</td>
                <td class="tbl_last">'.$sum.'</td>
                <td class="tbl_last">'.$sum.'</td>
            </tr>';
            $i++;
        }

        // $customPaper = array(0,0,360,360);
        // $pdf = PDF::loadView('Company.mbk.pdf2',compact('a'))->setPaper($customPaper, 'portrait');    
        $pdf = PDF::loadView('Company.mbk.pdf2',compact('a'));    
        return $pdf->download('2file.pdf');

        // return view('Company.mbk.pdf2',compact('a'));
    }

    public function pdf3()
    {
        $a1 = public_path().'\images\pdf\31.pdf';
        $a2 = public_path().'\images\pdf\21.pdf';
        
        $pdfMerger = PDFMerger::init();
        $pdfMerger->addPDF($a1, 'all'); 
        $pdfMerger->addPDF($a2, 'all');
        $pdfMerger->merge();        
        $pdfMerger->save("mergeFile.pdf",'download');
        
        // $pdf = PDF::loadView('Company.mbk.table');    
        // return $pdf->download('3file.pdf');

        // return view('Company.mbk.pdf3');
    }
}
