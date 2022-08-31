<?php

namespace Database\Factories;

use App\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'app_form' => $this->faker->randomDigit,
        'kyc_form' => $this->faker->randomDigit,
        'enrollment_list' => $this->faker->randomDigit,
        'signed_proposal' => $this->faker->randomDigit,
        'sec_reg' => $this->faker->randomDigit,
        'articles_incorp' => $this->faker->randomDigit,
        'by_laws' => $this->faker->randomDigit,
        'corp_sec' => $this->faker->randomDigit,
        'cert_list' => $this->faker->randomDigit,
        'valid_id' => $this->faker->randomDigit,
        'statement' => $this->faker->randomDigit,
        'policy' => $this->faker->text(),
        'sub_group' => $this->faker->text(),        
        'top_req' => $this->faker->text(),
        'broker' => $this->faker->text(),
        'sales_group' => $this->faker->text(),
        'etcv' => $this->faker->randomNumber($nbDigits = NULL, $strict = false) ,
        'category' => $this->faker->text(),
        'status' => $this->faker->text(),
        'd_sub' => $this->faker->text(),
        'lsub_doc' => $this->faker->text(),
        'pol_incept' => $this->faker->text(),
        'ef_date' => $this->faker->text(),
        'exp_date' => $this->faker->text(),
        'prog_type' => $this->faker->text(),
        'month' => $this->faker->text(),
        'modal_billing' => $this->faker->text(),        
        'ar_officer' => $this->faker->text(),
        'remarks' => $this->faker->text(),
        'sale_g' => $this->faker->text(),
        'branch' => $this->faker->text(),
        'reg_date' => $this->faker->text(),
        'place_reg' => $this->faker->text(),
        'id_sub' => $this->faker->text(),
        'id_num' => $this->faker->text(),
        'tel_no' => $this->faker->text(),
        'n_business' => $this->faker->text(),
        'place' => $this->faker->text(),
        'district' => $this->faker->text(),
        'prov' => $this->faker->text(),
        'rem' => $this->faker->text(),
        
        ];
    }
}


