<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Faq;
use App\Models\Policy;
use App\Models\Project;
use App\Models\ProjectChallengeSolution;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            [
            'description_en' => 'Welcome to Optop Terms & Conditions
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Product Optop Privacy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Services Optop Conditions
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.',

            'description_ar' => 'Welcome to Optop Privacy Policy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Product Optop Privacy Policy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Services Optop Privacy Policy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
    
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.',

            'type'    => 'privacy',
            ],
            [
                'description_en' => 'Welcome to Optop Terms & Conditions
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Product Optop Privacy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Services Optop Conditions
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.',

                'description_ar' => 'Welcome to Optop Privacy Policy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Product Optop Privacy Policy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
            
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.
            
            Welcome to Services Optop Privacy Policy
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis purus arcu. Sed vitae porttitor lectus. Aenean ac odio quis est suscipit vehicula nec eget arcu. Mauris malesuada libero eu ex pharetra, ac aliquam justo vestibulum. Fusce vulputate est sed orci cursus efficitur. Sed volutpat sit amet mauris eget posuere. Donec a mi eu dolor tincidunt pulvinar quis eleifend diam. Vestibulum diam diam, ultricies id cursus ac, bibendum ac quam.Donec posuere diam eget consequat facilisis. Vestibulum turpis mauris, hendrerit ut risus euismod, maximus iaculis nulla. Quisque tincidunt augue nunc, non pretium nibh consequat vel. Morbi ornare quam neque, nec pharetra magna dapibus quis. Curabitur vehicula ultricies faucibus.
    
            Integer mattis magna at nibh semper vulputate. Nunc eu gravida risus, at lobortis ipsum. Suspendisse tempus metus vitae interdum luctus. Pellentesque lectus lorem, laoreet in semper vitae, pellentesque sit amet sapien. Morbi ut nibh a massa suscipit posuere. Nam venenatis eget justo id pulvinar. Quisque dignissim eget turpis nec pulvinar. Vestibulum fermentum lacus sed dignissim mattis. Aenean porttitor vitae lacus nec pellentesque. Nulla sodales vehicula scelerisque. Vestibulum sed auctor arcu, vitae finibus dolor. Nam ultrices consequat odio at gravida.',

                'type'    => 'terms',
            ],

        ];

        foreach ($policies as $policiy) {
            $model = Policy::create([
                'description_en' => $policiy['description_en'],
                'description_ar' => $policiy['description_ar'],
                'type' => $policiy['type'],

            ]);


        }


    }

}