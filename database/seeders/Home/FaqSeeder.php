<?php

namespace Database\Seeders\Home;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $faqs = [
                [
                    'title_ar' => 'س: ما هي عملية شراء منزل؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: What is the Process of Buying a Home?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: ما هو معدل أسعار منتجاتكم؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: What is Your Product Price Rate?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: كم المبلغ اللازم لشراء منزل؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: How Much Money Needs to Buy a Home?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: ما هي عملية نظام الدفع؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: What is the Process of a Payment System?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: كم المبلغ الذي أحتاجه كدفعة أولى؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: How Much Do I Need for a Down Payment?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: هل المنزل القديم ذو قيمة جيدة مثل المنزل الجديد؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: an Older Home as Good a Value as a New Home?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: كيف هي المدارس؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "How Are the Schools?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: هل يوجد ملعب متاح؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: Is there is an available in the Playground?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                               [
                    'title_ar' => 'س: ما هي عملية شراء منزل؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: What is the Process of Buying a Home?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: ما هو معدل أسعار منتجاتكم؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: What is Your Product Price Rate?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: كم المبلغ اللازم لشراء منزل؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: How Much Money Needs to Buy a Home?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: ما هي عملية نظام الدفع؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: What is the Process of a Payment System?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: كم المبلغ الذي أحتاجه كدفعة أولى؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: How Much Do I Need for a Down Payment?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: هل المنزل القديم ذو قيمة جيدة مثل المنزل الجديد؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: an Older Home as Good a Value as a New Home?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: كيف هي المدارس؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "How Are the Schools?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
                [
                    'title_ar' => 'س: هل يوجد ملعب متاح؟',
                    'description_ar' => 'هذا نص تجريبي يستخدم كعنصر نائب لوصف. يمكن استبداله بنص فعلي لاحقًا لشرح التفاصيل المتعلقة بالسؤال والإجابة.',
                    'title_en' => "Q: Is there is an available in the Playground?",
                    'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat, metus ut tincidunt vestibulum, nunc tellus fringilla lorem, ut auctor metus felis vel est. Mauris tristique leo nulla, id blandit sem malesuada ac. Orci varius natoque penatibus et magnis dis parturient montes.',
                ],
            ];

            foreach ($faqs as $faq) {
                $model = Faq::create([
                    'title_ar' => $faq['title_ar'],
                    'description_ar' => $faq['description_ar'],
                    'title_en' => $faq['title_en'],
                    'description_en' => $faq['description_en'],
                    'status' => true
                ]);
            }
        }
}