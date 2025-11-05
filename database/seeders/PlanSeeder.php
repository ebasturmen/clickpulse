<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data (delete in correct order due to foreign keys)
        DB::table('plan_feature')->delete();
        DB::table('plans')->delete();
        DB::table('features')->delete();

        // Create Features
        $features = [
            [
                'name' => 'ad-clicks',
                'display_name' => 'Ad Clicks',
                'description' => 'Maximum number of ad clicks allowed',
            ],
            [
                'name' => 'domains',
                'display_name' => 'Domains',
                'description' => 'Number of domains/websites allowed',
            ],
        ];

        foreach ($features as $feature) {
            DB::table('features')->insert([
                'name' => $feature['name'],
                'display_name' => $feature['display_name'],
                'description' => $feature['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Get feature IDs
        $adClicksFeatureId = DB::table('features')->where('name', 'ad-clicks')->first()->id;
        $domainsFeatureId = DB::table('features')->where('name', 'domains')->first()->id;

        // Create Plans
        $plans = [
            [
                'title' => 'Basic',
                'price' => 29.99,
                'is_active' => true,
                'stripe_price_id' => env('STRIPE_BASIC_PRICE_ID', null),
                'description' => 'Perfect for small businesses getting started',
                'features' => [
                    ['feature_id' => $adClicksFeatureId, 'charges' => 10000],
                    ['feature_id' => $domainsFeatureId, 'charges' => 1],
                ],
            ],
            [
                'title' => 'Professional',
                'price' => 79.99,
                'is_active' => true,
                'stripe_price_id' => env('STRIPE_PROFESSIONAL_PRICE_ID', null),
                'description' => 'Ideal for growing businesses with higher traffic',
                'features' => [
                    ['feature_id' => $adClicksFeatureId, 'charges' => 100000],
                    ['feature_id' => $domainsFeatureId, 'charges' => 5],
                ],
            ],
            [
                'title' => 'Enterprise',
                'price' => 199.99,
                'is_active' => true,
                'stripe_price_id' => env('STRIPE_ENTERPRISE_PRICE_ID', null),
                'description' => 'For large enterprises with unlimited needs',
                'features' => [
                    ['feature_id' => $adClicksFeatureId, 'charges' => 1000000],
                    ['feature_id' => $domainsFeatureId, 'charges' => 999],
                ],
            ],
        ];

        foreach ($plans as $planData) {
            $features = $planData['features'];
            unset($planData['features']);

            // Insert plan
            $planId = DB::table('plans')->insertGetId([
                'title' => $planData['title'],
                'price' => $planData['price'],
                'is_active' => $planData['is_active'],
                'stripe_price_id' => $planData['stripe_price_id'],
                'description' => $planData['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert plan features
            foreach ($features as $feature) {
                DB::table('plan_feature')->insert([
                    'plan_id' => $planId,
                    'feature_id' => $feature['feature_id'],
                    'charges' => $feature['charges'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Plans and features seeded successfully!');
        $this->command->info('Created 3 plans: Basic, Professional, Enterprise');
    }
}
