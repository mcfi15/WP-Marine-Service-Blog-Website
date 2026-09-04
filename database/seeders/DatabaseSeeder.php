<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Service;
use App\Models\EmailTemplate;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@wpmarinelimited.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'status' => 'active',
            ]
        );
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        // Create pages with rich content
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'hero_heading' => 'Western Partners Marine Services',
                'hero_subheading' => 'We are ship chandlery and marine servicing company, operating through a large range of network, with reliable partners across multiple continents.',
                'content' => '<p>Western Partners Marine Services has established itself as a leading provider of comprehensive marine services. With years of experience and a vast network of trusted partners, we deliver exceptional quality and reliability to every client we serve.</p>',
                'excerpt' => 'Your trusted partner in ship chandlery and marine services since 2015.',
                'featured_image' => null,
                'hero_image' => null,
                'sections' => [
                    'about_title' => 'Who We Are',
                ],
                'status' => 'published',
                'order' => 1,
            ],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'hero_heading' => 'About Western Partners Marine Services',
                'hero_subheading' => 'Your trusted partner in ship chandlery and marine servicing',
                'content' => '<p>Western Partners Marine Services was established in 2015 with a vision to become the leading ship chandlery and marine servicing company across Africa, the Middle East, and Asia. What started as a small operation has grown into a comprehensive network of reliable partners serving vessels at ports and anchorages throughout these regions.</p><p>Our commitment to quality, reliability, and customer satisfaction has earned us the trust of ship owners, operators, and charterers worldwide. We understand the unique challenges of maritime operations and have built our services around meeting those needs efficiently and professionally.</p>',
                'excerpt' => 'Learn about our history, mission, and commitment to marine services.',
                'featured_image' => null,
                'hero_image' => null,
                'sections' => [
                    'mission' => 'To provide exceptional ship chandlery and marine services that exceed our clients\' expectations. We are committed to delivering reliable, efficient, and cost-effective solutions while maintaining the highest standards of quality and safety.',
                    'vision' => 'To be the most trusted and preferred marine services partner across Africa, Middle East, and Asia, recognized for our commitment to excellence, innovation, and sustainable practices in the maritime industry.',
                    'stat_years' => '10+',
                    'stat_countries' => '20+',
                    'stat_ports' => '500+',
                    'stat_clients' => '1000+',
                ],
                'status' => 'published',
                'order' => 2,
            ],
            [
                'title' => 'Our Range',
                'slug' => 'our-range',
                'hero_heading' => 'Our Range',
                'hero_subheading' => 'Comprehensive marine services to meet all your shipping needs',
                'content' => '<div class="row g-4"><div class="col-lg-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><div class="service-icon mb-4"><i class="fas fa-utensils"></i></div><h4>Food &amp; Provisions</h4><ul class="list-unstyled text-muted"><li><i class="fas fa-check text-primary mr-2"></i>Fresh vegetables (large &amp; small quantities)</li><li><i class="fas fa-check text-primary mr-2"></i>Dry provisions</li><li><i class="fas fa-check text-primary mr-2"></i>Frozen foods</li><li><i class="fas fa-check text-primary mr-2"></i>Beverages &amp; supplies</li><li><i class="fas fa-check text-primary mr-2"></i>Bonded stores</li></ul></div></div></div><div class="col-lg-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><div class="service-icon mb-4"><i class="fas fa-truck-loading"></i></div><h4>Supply Chain &amp; Logistics</h4><ul class="list-unstyled text-muted"><li><i class="fas fa-check text-primary mr-2"></i>Fresh water supply</li><li><i class="fas fa-check text-primary mr-2"></i>Bunker delivery</li><li><i class="fas fa-check text-primary mr-2"></i>Port agency services</li><li><i class="fas fa-check text-primary mr-2"></i>Crew change assistance</li><li><i class="fas fa-check text-primary mr-2"></i>Customs clearance</li></ul></div></div></div><div class="col-lg-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><div class="service-icon mb-4"><i class="fas fa-wrench"></i></div><h4>Technical Services</h4><ul class="list-unstyled text-muted"><li><i class="fas fa-check text-primary mr-2"></i>Lubricants &amp; greases</li><li><i class="fas fa-check text-primary mr-2"></i>Paints &amp; coatings</li><li><i class="fas fa-check text-primary mr-2"></i>Engine room supplies</li><li><i class="fas fa-check text-primary mr-2"></i>Navigation equipment</li><li><i class="fas fa-check text-primary mr-2"></i>Safety equipment</li></ul></div></div></div></div>',
                'excerpt' => 'From provisions to technical supplies, we provide a complete range of marine services.',
                'featured_image' => null,
                'hero_image' => null,
                'sections' => [
                    'services_title' => 'What We Offer',
                    'services_subtitle' => 'From provisions to technical supplies, we provide a complete range of marine services',
                    'value_title' => 'Our Added Value',
                    'value_subtitle' => 'We provide comprehensive solutions that add value to your operations.',
                    'values' => [
                        ['icon' => 'fa-clock', 'title' => '24/7 Availability', 'description' => 'Round-the-clock support for emergency requirements and urgent requests.'],
                        ['icon' => 'fa-dollar-sign', 'title' => 'Competitive Pricing', 'description' => 'Best-in-market prices without compromising on quality or service.'],
                        ['icon' => 'fa-certificate', 'title' => 'Quality Assurance', 'description' => 'All products meet international quality standards and certifications.'],
                        ['icon' => 'fa-headset', 'title' => 'Dedicated Support', 'description' => 'Personal account managers for personalized service and quick response.'],
                    ],
                    'products_title' => 'Our Products',
                    'products_subtitle' => 'Quality products from trusted brands for all your marine needs',
                    'products' => [
                        ['icon' => 'fa-oil-can', 'name' => 'Lubricating Oils', 'brands' => 'Shell, Mobil, Total, Chevron'],
                        ['icon' => 'fa-paint-roller', 'name' => 'Paints & Coatings', 'brands' => 'International, Hempel, Jotun'],
                        ['icon' => 'fa-ship', 'name' => 'Ship Stores', 'brands' => 'Engine & deck stores'],
                        ['icon' => 'fa-life-ring', 'name' => 'Safety Equipment', 'brands' => 'Firefighting, life-saving'],
                    ],
                    'cta_title' => 'Need a Custom Quote?',
                    'cta_text' => 'Contact us today with your requirements and we\'ll provide a competitive quote.',
                    'cta_btn' => 'Request Quote',
                ],
                'status' => 'published',
                'order' => 3,
            ],
            [
                'title' => 'Our Customers',
                'slug' => 'our-customers',
                'hero_heading' => 'Our Customers',
                'hero_subheading' => 'Trusted by ship owners, operators, and charterers worldwide',
                'content' => '',
                'excerpt' => 'See what our clients say about Western Partners Marine Services.',
                'featured_image' => null,
                'hero_image' => null,
                'sections' => [
                    'references_title' => 'Our References',
                    'references_subtitle' => 'We\'ve had the privilege of serving clients across various sectors of the maritime industry',
                    'references' => [
                        ['icon' => 'fa-ship', 'title' => 'Ship Owners', 'description' => 'Container ships, tankers, bulk carriers'],
                        ['icon' => 'fa-anchor', 'title' => 'Ship Operators', 'description' => 'Commercial & passenger vessels'],
                        ['icon' => 'fa-handshake', 'title' => 'Charterers', 'description' => 'Time & voyage charters'],
                        ['icon' => 'fa-industry', 'title' => 'Industrial Clients', 'description' => 'Offshore & port operations'],
                    ],
                    'testimonials_title' => 'What Our Clients Say',
                    'testimonials_subtitle' => 'Don\'t just take our word for it - hear from our satisfied clients',
                    'testimonials' => [
                        ['rating' => 5, 'quote' => 'Western Partners Marine Services has been our trusted partner for supplies across West Africa. Their reliability and competitive pricing make them our first choice for all chandlery needs.', 'name' => 'Captain M. Okonkwo', 'position' => 'MV Atlantic Pride'],
                        ['rating' => 5, 'quote' => 'Exceptional service and always available when we need them. Their network coverage in the Middle East has been invaluable for our operations.', 'name' => 'Ahmed Hassan', 'position' => 'Operations Manager, Sea Logistics'],
                        ['rating' => 5, 'quote' => 'Professional, responsive, and always deliver on time. Western Partners Marine Services understands the unique demands of maritime operations and exceeds expectations.', 'name' => 'John Smith', 'position' => 'Fleet Manager, Global Shipping'],
                    ],
                    'why_title' => 'Why Choose Us',
                    'why_subtitle' => 'Reasons to partner with Western Partners Marine Services',
                    'reasons' => [
                        ['icon' => 'fa-globe-africa', 'title' => 'Global Coverage', 'description' => '20+ countries across Africa, Middle East, and Asia'],
                        ['icon' => 'fa-clock', 'title' => '24/7 Support', 'description' => 'Round-the-clock assistance for urgent needs'],
                        ['icon' => 'fa-tags', 'title' => 'Best Pricing', 'description' => 'Competitive rates without compromising quality'],
                        ['icon' => 'fa-handshake', 'title' => 'Trusted Partner', 'description' => '10+ years of reliable service'],
                    ],
                ],
                'status' => 'published',
                'order' => 4,
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'hero_heading' => 'Contact Us',
                'hero_subheading' => 'We\'d love to hear from you. Get in touch with us for inquiries or quotes.',
                'content' => '<p>Whether you need a quote, have questions about our services, or want to discuss a partnership, we\'re here to help. Reach out to us through any of the channels below.</p>',
                'excerpt' => 'Get in touch with us for inquiries or quotes.',
                'featured_image' => null,
                'hero_image' => null,
                'sections' => null,
                'status' => 'published',
                'order' => 5,
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                array_merge($pageData, [
                    'created_by' => $admin->id,
                    'updated_by' => $admin->id,
                ])
            );
        }

        // Create services
        $services = [
            [
                'title' => 'Fresh Water Supply',
                'slug' => 'fresh-water-supply',
                'short_description' => 'Reliable fresh water delivery to vessels at all ports and anchorage locations across Africa, Middle East, and Asia.',
                'description' => '<p>Western Partners Marine Services provides reliable fresh water supply services to vessels at all ports and anchorage locations across our network. We understand the critical importance of clean, fresh water for crew welfare and vessel operations.</p><p>Our water supply meets international quality standards and is delivered promptly to your schedule. Whether you need large quantities for extended voyages or smaller top-ups between ports, we have you covered.</p><h5>Key Features:</h5><ul><li>Certified clean water meeting WHO standards</li><li>Flexible delivery schedules (24/7)</li><li>Competitive bulk pricing</li><li>Coverage across 20+ countries</li><li>Emergency supply available</li></ul>',
                'icon' => 'fa-ship',
                'sort_order' => 1,
                'status' => 'published',
            ],
            [
                'title' => 'Fresh Provisions',
                'slug' => 'fresh-provisions',
                'short_description' => 'Quality fresh vegetables, dry provisions, frozen foods, beverages, and bonded stores for crew and passengers.',
                'description' => '<p>We supply a comprehensive range of fresh provisions including vegetables (large and small quantities), dry provisions, frozen foods, beverages, and bonded stores. Our supply chain ensures freshness and quality at competitive prices.</p><p>Our team works closely with reputable suppliers and farmers to source the freshest produce, ensuring your crew receives nutritious and high-quality food supplies at every port of call.</p><h5>Key Products:</h5><ul><li>Fresh vegetables &amp; fruits</li><li>Dry provisions &amp; canned goods</li><li>Frozen meat, fish &amp; poultry</li><li>Beverages &amp; bottled water</li><li>Bonded stores &amp; duty-free items</li></ul>',
                'icon' => 'fa-utensils',
                'sort_order' => 2,
                'status' => 'published',
            ],
            [
                'title' => 'Bunker Delivery',
                'slug' => 'bunker-delivery',
                'short_description' => 'Efficient fuel and bunker delivery services to keep your vessels powered and on schedule.',
                'description' => '<p>Our bunker delivery service ensures your vessels receive high-quality fuel on time, every time. We work with trusted suppliers to provide various fuel grades at competitive prices across all major ports in our network.</p><p>With our extensive network and logistical expertise, we coordinate seamless bunker deliveries that minimize vessel downtime and keep your operations running smoothly.</p><h5>Fuel Grades:</h5><ul><li>IFO 380 / IFO 180</li><li>MGO / MDO</li><li>LSFO / VLSFO</li><li>Marine Gas Oil</li></ul>',
                'icon' => 'fa-oil-can',
                'sort_order' => 3,
                'status' => 'published',
            ],
            [
                'title' => 'Lubricants & Greases',
                'slug' => 'lubricants-greases',
                'short_description' => 'High-quality lubricating oils and greases from leading brands for optimal engine and machinery performance.',
                'description' => '<p>We supply a complete range of marine lubricants and greases from world-leading brands including Shell, Mobil, Total, and Chevron. Our products ensure optimal performance and longevity for your vessel\'s engines and machinery.</p><p>Our technical team can help you select the right lubricants for your specific requirements, ensuring compliance with manufacturer specifications and environmental regulations.</p><h5>Product Range:</h5><ul><li>Cylinder oils</li><li>System oils</li><li>Trunk piston engine oils</li><li>Greases &amp; specialty lubricants</li><li>Hydraulic oils</li></ul>',
                'icon' => 'fa-cogs',
                'sort_order' => 4,
                'status' => 'published',
            ],
            [
                'title' => 'Waste Management',
                'slug' => 'waste-management',
                'short_description' => 'Professional garbage disposal, oily waste management, and environmental compliance services.',
                'description' => '<p>Western Partners Marine Services offers comprehensive waste management services for vessels, helping you maintain environmental compliance while ensuring proper disposal of all waste types. We follow MARPOL regulations and local port requirements.</p><p>Our waste management services cover all categories of ship-generated waste, from garbage to oily residues, ensuring environmentally responsible disposal.</p><h5>Services:</h5><ul><li>Garbage collection &amp; disposal</li><li>Oily waste management</li><li>Sewage disposal</li><li>Recycling services</li><li>Environmental compliance documentation</li></ul>',
                'icon' => 'fa-trash-alt',
                'sort_order' => 5,
                'status' => 'published',
            ],
            [
                'title' => 'Tank Cleaning',
                'slug' => 'tank-cleaning',
                'short_description' => 'Expert tank cleaning services to maintain vessel hygiene, safety, and operational standards.',
                'description' => '<p>Our professional tank cleaning services ensure your vessel\'s tanks meet the highest standards of cleanliness and safety. We use advanced equipment and environmentally friendly cleaning agents to deliver superior results.</p><p>Whether you need cargo tank cleaning between grades, freshwater tank sanitation, or fuel tank maintenance, our experienced team delivers efficient and thorough service.</p><h5>Services:</h5><ul><li>Cargo tank cleaning</li><li>Fresh water tank sanitation</li><li>Fuel tank cleaning &amp; sludge removal</li><li>Ballast tank cleaning</li><li>Slop tank cleaning</li></ul>',
                'icon' => 'fa-broom',
                'sort_order' => 6,
                'status' => 'published',
            ],
        ];

        foreach ($services as $serviceData) {
            Service::updateOrCreate(
                ['slug' => $serviceData['slug']],
                array_merge($serviceData, ['created_by' => $admin->id])
            );
        }

        // Create settings
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Western Partners Marine Services', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Ship Chandlery & Marine Services', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Professional ship chandlery and marine servicing company', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'site_dark_logo', 'value' => null, 'type' => 'image', 'group' => 'general'],
            ['key' => 'site_light_logo', 'value' => null, 'type' => 'image', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => null, 'type' => 'image', 'group' => 'general'],
            
            // Contact
            ['key' => 'contact_email', 'value' => 'info@wpmarinelimited.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+233 262 772 397', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Contact us for our office address', 'type' => 'textarea', 'group' => 'contact'],
            
            // Email
            ['key' => 'mail_mailer', 'value' => 'smtp', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_host', 'value' => 'smtp.mailtrap.io', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_port', 'value' => '2525', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_username', 'value' => null, 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_password', 'value' => null, 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_encryption', 'value' => null, 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_from_address', 'value' => 'noreply@wpmarinelimited.com', 'type' => 'text', 'group' => 'email'],
            ['key' => 'mail_from_name', 'value' => 'Western Partners Marine Services', 'type' => 'text', 'group' => 'email'],
            
            // Integrations
            ['key' => 'google_analytics_id', 'value' => null, 'type' => 'text', 'group' => 'integrations'],
            ['key' => 'google_tag_manager_id', 'value' => null, 'type' => 'text', 'group' => 'integrations'],
            ['key' => 'analytics_enabled', 'value' => false, 'type' => 'boolean', 'group' => 'integrations'],
            ['key' => 'recaptcha_site_key', 'value' => null, 'type' => 'text', 'group' => 'integrations'],
            ['key' => 'recaptcha_secret_key', 'value' => null, 'type' => 'text', 'group' => 'integrations'],
            ['key' => 'recaptcha_enabled', 'value' => false, 'type' => 'boolean', 'group' => 'integrations'],
            ['key' => 'live_chat_enabled', 'value' => false, 'type' => 'boolean', 'group' => 'integrations'],
            ['key' => 'live_chat_script', 'value' => null, 'type' => 'textarea', 'group' => 'integrations'],
            
            // SEO
            ['key' => 'seo_home_title', 'value' => 'Western Partners Marine Services - Ship Chandlery & Marine Services', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'seo_home_description', 'value' => 'Professional ship chandlery and marine servicing company', 'type' => 'textarea', 'group' => 'seo'],
            
            // Social
            ['key' => 'social_facebook', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            
            // Additional SEO
            ['key' => 'seo_about_title', 'value' => 'About Us - Western Partners Marine Services', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'seo_about_description', 'value' => 'Learn about Western Partners Marine Services, our history, mission, and commitment to marine services.', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'seo_offer_title', 'value' => 'Our Services - Western Partners Marine Services', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'seo_offer_description', 'value' => 'Discover our comprehensive range of marine services including fresh water supply, bunker delivery, provisions, lubricants, and waste management.', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'seo_clients_title', 'value' => 'Our Customers - Western Partners Marine Services', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'seo_clients_description', 'value' => 'See what our clients say about Western Partners Marine Services. Trusted by ship owners, operators, and charterers worldwide.', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'seo_contact_title', 'value' => 'Contact Us - Western Partners Marine Services', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'seo_contact_description', 'value' => 'Get in touch with Western Partners Marine Services for inquiries about our marine services, quotes, or partnership opportunities.', 'type' => 'textarea', 'group' => 'seo'],
            
            // GDPR
            ['key' => 'gdpr_enabled', 'value' => true, 'type' => 'boolean', 'group' => 'gdpr'],
            ['key' => 'gdpr_cookie_banner', 'value' => true, 'type' => 'boolean', 'group' => 'gdpr'],
        ];

        foreach ($settings as $setting) {
            // Preserve existing image settings (logo, favicon) so uploaded files aren't lost on re-seed
            if (in_array($setting['key'], ['site_dark_logo', 'site_light_logo', 'site_favicon']) && Setting::where('key', $setting['key'])->whereNotNull('value')->exists()) {
                continue;
            }
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // Create email templates
        $templates = [
            [
                'name' => 'Contact Form',
                'subject' => 'New Contact Form Submission - {{site_name}}',
                'body' => '<h2>New Contact Form Submission</h2>
<p>You have received a new contact form submission:</p>
<ul>
<li><strong>Name:</strong> {{name}}</li>
<li><strong>Email:</strong> {{email}}</li>
<li><strong>Phone:</strong> {{phone}}</li>
<li><strong>Subject:</strong> {{subject}}</li>
<li><strong>Message:</strong></li>
</ul>
<p>{{message}}</p>
<p><em>Sent on: {{date}}</em></p>',
                'variables' => json_encode(['name', 'email', 'phone', 'subject', 'message', 'site_name', 'date']),
                'type' => 'contact',
                'status' => 'active',
            ],
            [
                'name' => 'Welcome Email',
                'subject' => 'Welcome to {{site_name}}',
                'body' => '<h2>Welcome to {{site_name}}!</h2>
<p>Dear {{name}},</p>
<p>Thank you for your interest in our marine services. We look forward to serving you.</p>
<p>Best regards,<br>{{site_name}} Team</p>',
                'variables' => json_encode(['name', 'site_name', 'site_url']),
                'type' => 'welcome',
                'status' => 'active',
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::updateOrCreate(
                ['type' => $template['type']],
                array_merge($template, [
                    'created_by' => $admin->id,
                    'updated_by' => $admin->id,
                ])
            );
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin login: admin@wpmarinelimited.com / password');
    }
}
