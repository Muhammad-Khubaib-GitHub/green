<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class countriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'Afghanistan', 'iso_code' => 'AF', 'iso_code_3' => 'AFG', 'phone_code' => '93'],
            ['name' => 'Albania', 'iso_code' => 'AL', 'iso_code_3' => 'ALB', 'phone_code' => '355'],
            ['name' => 'Algeria', 'iso_code' => 'DZ', 'iso_code_3' => 'DZA', 'phone_code' => '213'],
            ['name' => 'Andorra', 'iso_code' => 'AD', 'iso_code_3' => 'AND', 'phone_code' => '376'],
            ['name' => 'Angola', 'iso_code' => 'AO', 'iso_code_3' => 'AGO', 'phone_code' => '244'],
            ['name' => 'Antigua and Barbuda', 'iso_code' => 'AG', 'iso_code_3' => 'ATG', 'phone_code' => '1268'],
            ['name' => 'Argentina', 'iso_code' => 'AR', 'iso_code_3' => 'ARG', 'phone_code' => '54'],
            ['name' => 'Armenia', 'iso_code' => 'AM', 'iso_code_3' => 'ARM', 'phone_code' => '374'],
            ['name' => 'Australia', 'iso_code' => 'AU', 'iso_code_3' => 'AUS', 'phone_code' => '61'],
            ['name' => 'Austria', 'iso_code' => 'AT', 'iso_code_3' => 'AUT', 'phone_code' => '43'],
            ['name' => 'Azerbaijan', 'iso_code' => 'AZ', 'iso_code_3' => 'AZE', 'phone_code' => '994'],
            ['name' => 'Bahamas', 'iso_code' => 'BS', 'iso_code_3' => 'BHS', 'phone_code' => '1242'],
            ['name' => 'Bahrain', 'iso_code' => 'BH', 'iso_code_3' => 'BHR', 'phone_code' => '973'],
            ['name' => 'Bangladesh', 'iso_code' => 'BD', 'iso_code_3' => 'BGD', 'phone_code' => '880'],
            ['name' => 'Barbados', 'iso_code' => 'BB', 'iso_code_3' => 'BRB', 'phone_code' => '1246'],
            ['name' => 'Belarus', 'iso_code' => 'BY', 'iso_code_3' => 'BLR', 'phone_code' => '375'],
            ['name' => 'Belgium', 'iso_code' => 'BE', 'iso_code_3' => 'BEL', 'phone_code' => '32'],
            ['name' => 'Belize', 'iso_code' => 'BZ', 'iso_code_3' => 'BLZ', 'phone_code' => '501'],
            ['name' => 'Benin', 'iso_code' => 'BJ', 'iso_code_3' => 'BEN', 'phone_code' => '229'],
            ['name' => 'Bhutan', 'iso_code' => 'BT', 'iso_code_3' => 'BTN', 'phone_code' => '975'],
            ['name' => 'Bolivia', 'iso_code' => 'BO', 'iso_code_3' => 'BOL', 'phone_code' => '591'],
            ['name' => 'Bosnia and Herzegovina', 'iso_code' => 'BA', 'iso_code_3' => 'BIH', 'phone_code' => '387'],
            ['name' => 'Botswana', 'iso_code' => 'BW', 'iso_code_3' => 'BWA', 'phone_code' => '267'],
            ['name' => 'Brazil', 'iso_code' => 'BR', 'iso_code_3' => 'BRA', 'phone_code' => '55'],
            ['name' => 'Brunei', 'iso_code' => 'BN', 'iso_code_3' => 'BRN', 'phone_code' => '673'],
            ['name' => 'Bulgaria', 'iso_code' => 'BG', 'iso_code_3' => 'BGR', 'phone_code' => '359'],
            ['name' => 'Burkina Faso', 'iso_code' => 'BF', 'iso_code_3' => 'BFA', 'phone_code' => '226'],
            ['name' => 'Burundi', 'iso_code' => 'BI', 'iso_code_3' => 'BDI', 'phone_code' => '257'],
            ['name' => 'Cabo Verde', 'iso_code' => 'CV', 'iso_code_3' => 'CPV', 'phone_code' => '238'],
            ['name' => 'Cambodia', 'iso_code' => 'KH', 'iso_code_3' => 'KHM', 'phone_code' => '855'],
            ['name' => 'Cameroon', 'iso_code' => 'CM', 'iso_code_3' => 'CMR', 'phone_code' => '237'],
            ['name' => 'Canada', 'iso_code' => 'CA', 'iso_code_3' => 'CAN', 'phone_code' => '1'],
            ['name' => 'Central African Republic', 'iso_code' => 'CF', 'iso_code_3' => 'CAF', 'phone_code' => '236'],
            ['name' => 'Chad', 'iso_code' => 'TD', 'iso_code_3' => 'TCD', 'phone_code' => '235'],
            ['name' => 'Chile', 'iso_code' => 'CL', 'iso_code_3' => 'CHL', 'phone_code' => '56'],
            ['name' => 'China', 'iso_code' => 'CN', 'iso_code_3' => 'CHN', 'phone_code' => '86'],
            ['name' => 'Colombia', 'iso_code' => 'CO', 'iso_code_3' => 'COL', 'phone_code' => '57'],
            ['name' => 'Comoros', 'iso_code' => 'KM', 'iso_code_3' => 'COM', 'phone_code' => '269'],
            ['name' => 'Congo, Democratic Republic of the', 'iso_code' => 'CD', 'iso_code_3' => 'COD', 'phone_code' => '243'],
            ['name' => 'Congo, Republic of the', 'iso_code' => 'CG', 'iso_code_3' => 'COG', 'phone_code' => '242'],
            ['name' => 'Costa Rica', 'iso_code' => 'CR', 'iso_code_3' => 'CRI', 'phone_code' => '506'],
            ['name' => 'Croatia', 'iso_code' => 'HR', 'iso_code_3' => 'HRV', 'phone_code' => '385'],
            ['name' => 'Cuba', 'iso_code' => 'CU', 'iso_code_3' => 'CUB', 'phone_code' => '53'],
            ['name' => 'Cyprus', 'iso_code' => 'CY', 'iso_code_3' => 'CYP', 'phone_code' => '357'],
            ['name' => 'Czechia', 'iso_code' => 'CZ', 'iso_code_3' => 'CZE', 'phone_code' => '420'],
            ['name' => 'Denmark', 'iso_code' => 'DK', 'iso_code_3' => 'DNK', 'phone_code' => '45'],
            ['name' => 'Djibouti', 'iso_code' => 'DJ', 'iso_code_3' => 'DJI', 'phone_code' => '253'],
            ['name' => 'Dominica', 'iso_code' => 'DM', 'iso_code_3' => 'DMA', 'phone_code' => '1767'],
            ['name' => 'Dominican Republic', 'iso_code' => 'DO', 'iso_code_3' => 'DOM', 'phone_code' => '1809'],
            ['name' => 'Ecuador', 'iso_code' => 'EC', 'iso_code_3' => 'ECU', 'phone_code' => '593'],
            ['name' => 'Egypt', 'iso_code' => 'EG', 'iso_code_3' => 'EGY', 'phone_code' => '20'],
            ['name' => 'El Salvador', 'iso_code' => 'SV', 'iso_code_3' => 'SLV', 'phone_code' => '503'],
            ['name' => 'Equatorial Guinea', 'iso_code' => 'GQ', 'iso_code_3' => 'GNQ', 'phone_code' => '240'],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Country::truncate();

        Country::insert($countries);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
