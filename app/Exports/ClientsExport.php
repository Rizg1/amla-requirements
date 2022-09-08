<?php

namespace App\Exports;

use App\Client;
use App\Media;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection, WithMapping, WithHeadings
{
    protected $from_date;

    protected $end_date;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($from_date, $end_date) {
        $this->from_date = $from_date;
        $this->end_date = $end_date;
    }   

    public function collection()
    {
        return Client::query()->whereDate('created_at','>=',$this->from_date)->whereDate('created_at','<=',$this->end_date)
                ->select('folder_id','app_form', 'kyc_form', 'enrollment_list', 'signed_proposal', 'sec_reg', 'articles_incorp', 'by_laws', 'gis','corp_sec', 'cert_list', 'valid_id', 'statement','policy','sub_group','broker','sales_group','etcv','pol_incept','ef_date','exp_date','prog_type','modal_billing','ar_officer','remarks','branch','reg_date','place_reg','id_sub','id_num','tel_no','n_business','place','district','prov','rem','created_at')
                ->with('folder','appForm', 'kycForm', 'enrollList', 'signedProposal', 'secReg', 'articlesIncorp', 'byLaws', 'giS', 'corpSec', 'certList', 'validId', 'stateMent')
                ->orderBy('id', 'asc')
                ->get();
    }

    public function map($client) : array
    {
        return [
            $client->folder->name,
            $client->appForm->file_name ?? "",
            $client->kycForm->file_name ?? "",
            $client->enrollList->file_name ?? "",
            $client->signedProposal->file_name ?? "",
            $client->secReg->file_name ?? "",
            $client->articlesIncorp->file_name ?? "",
            $client->byLaws->file_name ?? "",
            $client->giS->file_name ?? "",
            $client->corpSec->file_name ?? "",
            $client->certList->file_name ?? "",
            $client->validId->file_name ?? "",
            $client->stateMent->file_name ?? "",
            $client->policy ?? "",
            $client->sub_group ?? "",
            $client->broker ?? "",
            $client->sales_group ?? "",
            $client->etcv ?? "",
            $client->pol_incept ?? "",
            $client->ef_date ?? "",
            $client->exp_date ?? "",
            $client->prog_type ?? "",
            $client->modal_billing ?? "",
            $client->ar_officer ?? "",
            $client->remarks ?? "",
            $client->branch ?? "",
            $client->reg_date ?? "",
            $client->place_reg ?? "",
            $client->id_sub ?? "",
            $client->id_num ?? "",
            $client->tel_no ?? "",
            $client->n_business ?? "",
            $client->place ?? "",
            $client->district ?? "",
            $client->prov ?? "",
            $client->rem ?? "",
            $client->created_at->format('d-M-Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'Company',
            'Application Form',
            'KYC Form',
            'Member Enrollmentlist',
            'Signed Proposal',
            'Sec Registration',
            'Articles Of Incorporation', 
            'Copies of By-Laws',
            'GIS',
            'Corporate Secretary Certificate',
            'Certified List Under Oath',
            'Copy of Valid IDs', 
            'Certificate of Beneficial Owner',
            'Policy Number', 
            'Subgroup',
            'Sales/Agent/Broker',
            'Sales Group',
            'ETCV',
            'Policy Inception',
            'Policy Effective Date',
            'Policy Expiry Date',
            'Program Type',
            'Modal Billing',
            'AR Officer',
            'Remarks',
            'Branch',
            'Reg Date',
            'Place Registration',
            'ID Type Submitted',
            'ID Number',
            'Tel No.',
            'Nature of Business',
            'Room/Street/Bldg/Brgy',
            'District Town City',
            'Province Country Zip',
            'Remarks',
            'Created at'
        ];
    }
}
