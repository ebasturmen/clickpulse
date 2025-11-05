<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Features first if they don't exist
        $adClicks = Feature::firstOrCreate(
            ['name' => 'ad-clicks'],
            [
                'display_name' => 'Ad Clicks',
                'description' => 'Maximum number of ad clicks allowed',
            ]
        );

        $domains = Feature::firstOrCreate(
            ['name' => 'domains'],
            [
                'display_name' => 'Domains',
                'description' => 'Number of domains/websites allowed',
            ]
        );

        //plans
        $basicMonthly = Plan::create([
            'title' => 'Basic',
            'name' => 'basic',
            'stripe_price' => 'price_1P3jrUJG6umFts3tejiBrElH',
            'price' => 29,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'month',
        ]);

        $basicYearly = Plan::create([
            'title' => 'Basic',
            'name' => 'basic',
            'stripe_price' => 'price_1P3jsfJG6umFts3tanA3iBKK',
            'price' => 290,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'year',
        ]);

        $pro10Monthly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro10',
            'stripe_price' => 'price_1P3juiJG6umFts3tz544V8oE',
            'price' => 39,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'month',
        ]);

        $pro10Yearly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro10',
            'stripe_price' => 'price_1P3jv3JG6umFts3tJ3h2sbK7',
            'price' => 390,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'year',
        ]);

        $pro25Monthly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro25',
            'stripe_price' => 'price_1P3jvnJG6umFts3tafm8EHfw',
            'price' => 59,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'month',
        ]);

        $pro25Yearly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro25',
            'stripe_price' => 'price_1P3jwGJG6umFts3towOxJuDl',
            'price' => 590,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'year',
        ]);

        $pro50Monthly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro50',
            'stripe_price' => 'price_1P3jx2JG6umFts3tl3sQE5CC',
            'price' => 109,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'month',
        ]);

        $pro50Yearly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro50',
            'stripe_price' => 'price_1P3jxbJG6umFts3tD5ljGquP',
            'price' => 1090,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'year',
        ]);

        $pro75Monthly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro75',
            'stripe_price' => 'price_1P3jy8JG6umFts3tbwkHiXR0',
            'price' => 139,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'month',
        ]);

        $pro75Yearly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro75',
            'stripe_price' => 'price_1P3jyRJG6umFts3tYxJIFmPW',
            'price' => 1390,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'year',
        ]);

        $pro100Monthly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro100',
            'stripe_price' => 'price_1P3jz3JG6umFts3tZxfCorwS',
            'price' => 179,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'month',
        ]);

        $pro100Yearly = Plan::create([
            'title' => 'Professional',
            'name' => 'pro100',
            'stripe_price' => 'price_1P3jzOJG6umFts3tGzx1ZAz3',
            'price' => 1790,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'year',
        ]);

        $enterpriseMonthly = Plan::create([
            'title' => 'Enterprise',
            'name' => 'enterprise',
            'stripe_price' => 'price_1P3k0MJG6umFts3tvxFKaxEK',
            'price' => 499,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'month',
        ]);

        $enterpriseYearly = Plan::create([
            'title' => 'Enterprise',
            'name' => 'enterprise',
            'stripe_price' => 'price_1P3k0hJG6umFts3tWKYrvTHt',
            'price' => 4990,
            'currency' => 'eur',
            'periodicity' => 1,
            'periodicity_type' => 'year',
        ]);

        //plans
        $basicMonthly->features()->attach($adClicks, ['charges' => 5000]);
        $basicMonthly->features()->attach($domains, ['charges' => 1]);
        $basicYearly->features()->attach($adClicks, ['charges' => 5000]);
        $basicYearly->features()->attach($domains, ['charges' => 1]);

        $pro10Monthly->features()->attach($adClicks, ['charges' => 10000]);
        $pro10Monthly->features()->attach($domains, ['charges' => 5]);
        $pro10Yearly->features()->attach($adClicks, ['charges' => 10000]);
        $pro10Yearly->features()->attach($domains, ['charges' => 5]);

        $pro25Monthly->features()->attach($adClicks, ['charges' => 25000]);
        $pro25Monthly->features()->attach($domains, ['charges' => 10]);
        $pro25Yearly->features()->attach($adClicks, ['charges' => 25000]);
        $pro25Yearly->features()->attach($domains, ['charges' => 10]);

        $pro50Monthly->features()->attach($adClicks, ['charges' => 50000]);
        $pro50Monthly->features()->attach($domains, ['charges' => 15]);
        $pro50Yearly->features()->attach($adClicks, ['charges' => 50000]);
        $pro50Yearly->features()->attach($domains, ['charges' => 15]);

        $pro75Monthly->features()->attach($adClicks, ['charges' => 75000]);
        $pro75Monthly->features()->attach($domains, ['charges' => 20]);
        $pro75Yearly->features()->attach($adClicks, ['charges' => 75000]);
        $pro75Yearly->features()->attach($domains, ['charges' => 20]);

        $pro100Monthly->features()->attach($adClicks, ['charges' => 100000]);
        $pro100Monthly->features()->attach($domains, ['charges' => 25]);
        $pro100Yearly->features()->attach($adClicks, ['charges' => 100000]);
        $pro100Yearly->features()->attach($domains, ['charges' => 25]);

        $enterpriseMonthly->features()->attach($adClicks, ['charges' => 200000]);
        $enterpriseMonthly->features()->attach($domains, ['charges' => 30]);
        $enterpriseYearly->features()->attach($adClicks, ['charges' => 200000]);
        $enterpriseYearly->features()->attach($domains, ['charges' => 30]);
    }
}
