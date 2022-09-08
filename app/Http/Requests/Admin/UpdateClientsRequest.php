<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'folder_id' => 'nullable',
            'app_form' => 'nullable',
            'kyc_form' => 'nullable',
            'enrollment_list' => 'nullable',
            'signed_proposal' => 'nullable',
            'sec_reg' => 'nullable',
            'articles_incorp'=> 'nullable',
            'by_laws'=> 'nullable',
            'gis'=> 'nullable',
            'corp_sec'=> 'nullable',
            'cert_list'=> 'nullable',
            'valid_id'=> 'nullable',
            'statement'=> 'nullable',
            'policy'=> 'nullable',
            'sub_group'=> 'nullable',
            'top_req'=> 'nullable',
            'broker'=> 'nullable',
            'sales_group'=> 'nullable',
            'etcv'=> 'nullable',
            'category'=> 'nullable',
            'status'=> 'nullable',
            'd_sub'=> 'nullable',
            'lsub_doc'=> 'nullable',
            'pol_incept'=> 'nullable',
            'ef_date'=> 'nullable',
            'exp_date'=> 'nullable',
            'prog_type'=> 'nullable',
            'month'=> 'nullable',
            'modal_billing'=> 'nullable',
            'ar_officer'=> 'nullable',
            'remarks'=> 'nullable',
            'sale_g'=> 'nullable',
            'branch'=> 'nullable',
            'reg_date'=> 'nullable',
            'place_reg'=> 'nullable',
            'id_sub'=> 'nullable',
            'id_num'=> 'nullable',
            'tel_no'=> 'nullable',
            'n_business'=> 'nullable',
            'place'=> 'nullable',
            'district'=> 'nullable',
            'prov'=> 'nullable',
            'rem'=> 'nullable',


        ];
    }
}
