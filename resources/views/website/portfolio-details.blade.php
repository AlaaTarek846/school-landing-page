@extends('layout.website.master')

@section('title', __('website.contact'))

@section('content')
    <div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>مؤسسة غير ربحية موثوقة</h2>
                        <h3><span>صفحة</span> تفاصيل التبرع</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape">
            <svg width="128" height="357" viewBox="0 0 128 357" fill="none">
                <path
                    d="M-9.73063 357C-11.832 304.262 -1.65343 268.562 21.3305 247.878C27.4705 242.355 34.4642 238.095 41.2608 233.944C44.6099 231.887 48.0903 229.757 51.4066 227.519C63.6866 219.217 71.3041 210.301 74.5875 200.338C75.1457 198.713 75.5397 196.981 75.7695 195.212C68.2505 198.569 62.1762 199.688 56.5944 198.749C50.5201 197.703 43.5592 193.19 41.6548 185.43C40.3086 179.871 42.2787 173.987 46.974 169.691C52.5229 164.601 60.1405 163.23 65.8865 166.262C74.686 170.882 78.4948 181.639 78.0679 191.783C98.3923 181.603 114.58 162.002 121.77 138.72C129.289 114.318 126.695 86.4868 114.809 64.2508C110.048 55.3348 103.711 46.9963 97.6043 38.9466C86.375 24.1467 74.7845 8.87758 72.6831 -10.3623C70.8116 -28.1583 78.0679 -46.4596 91.2016 -57L92.3508 -55.2312C79.7753 -45.124 72.8473 -27.6529 74.686 -10.6511C76.6889 7.93905 87.6227 22.3419 99.1475 37.5388C105.32 45.6607 111.69 54.0714 116.55 63.1318C128.698 85.8731 131.358 114.39 123.675 139.369C116.221 163.591 99.2131 183.913 77.9366 194.201C77.6739 196.584 77.1814 198.894 76.4591 201.06C72.9786 211.528 65.1313 220.769 52.4573 229.36C49.1082 231.634 45.5949 233.764 42.213 235.821C35.5148 239.9 28.5868 244.16 22.5782 249.538C0.0867844 269.753 -9.82913 304.839 -7.76058 356.856L-9.73063 357ZM59.3525 166.767C55.1825 166.767 51.1111 168.716 48.2873 171.315C44.2159 175.033 42.4757 180.087 43.6249 184.816C45.2994 191.638 51.5379 195.645 56.9556 196.584C62.1762 197.486 67.955 196.367 75.1457 193.154C75.4412 193.01 75.7695 192.866 76.065 192.721C76.7217 182.975 73.1756 172.398 65.0656 168.139C63.2269 167.2 61.2568 166.767 59.3525 166.767Z"
                    fill="white" fill-opacity="0.18" />
            </svg>
        </div>
        <div class="shape-s2">
            <img src="{{ asset('website/images/slider/shape-2.svg') }}" alt="">
        </div>
        <div class="shape-s3">
            <img src="{{ asset('website/images/donate-2.svg') }}" alt="">
        </div>

    </div>


    <section class="project-single-page section-padding">
        <div class="container">
        <div class="project-wrap">
            <div class="project-top-info">
            <div class="row align-items-center">
                <div class="col-lg-8 col-12">
                <div class="section-title">
                    <h2>نحن دائمًا منفتحون للأطفال</h2>
                    <h3>نظرة أعمق على روائعنا في تصميم المنتجات الرقمية</h3>
                    <p>نسعى لتقديم أفضل الدعم والرعاية للأطفال المحتاجين، ونلتزم بالشفافية والاحترافية في جميع مشاريعنا. نعمل على تمكين الأسر وتحسين جودة الحياة من خلال برامج مستدامة ومبادرات تعليمية وصحية.</p>
                    <a href="{{ asset('website/service.html') }}" class="theme-btn">جميع الخدمات</a>
                </div>
                </div>
                <div class="col-lg-4 col-12">
                <div class="project-info">
                    <ul>
                    <li>
                        <h3>العملاء</h3>
                        <span>استوديو تصميم في الولايات المتحدة</span>
                    </li>
                    <li>
                        <h3>نوع المشروع</h3>
                        <span>تصميم منتج رقمي</span>
                    </li>
                    <li>
                        <h3>التاريخ</h3>
                        <span>٢٥ أكتوبر ٢٠٢٤</span>
                    </li>
                    <li>
                        <h3>الموقع</h3>
                        <span> <a href="#" rel="noopener">wiatech.com</a></span>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="image-gallery">
                <ul>
                <li><img src="{{ asset('website/images/project-details/1.jpg') }}" alt=""></li>
                <li><img src="{{ asset('website/images/project-details/2.jpg') }}" alt=""></li>
                </ul>
            </div>
            <div class="info-content">
                <div class="info-item">
                <div class="left">
                    <h2>حقائق مهمة في التطوير</h2>
                </div>
                <div class="right">
                    <p>نشارك تجاربنا في تطوير المنتجات الرقمية وكيفية تحقيق نتائج ملموسة من خلال التخطيط الصحيح والعمل التعاوني والتركيز على احتياجات المستفيدين.</p>
                    <div class="item">
                    <ul>
                        <li>تخطيط سبرنت فعّال</li>
                        <li>اجتماعات يومية وعروض</li>
                    </ul>
                    <ul>
                        <li>منهجية التسليم التكراري</li>
                        <li>حل المشكلات</li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="info-item">
                <div class="left">
                    <h2>نتائج مشروعنا</h2>
                </div>
                <div class="right s2">
                    <p>حققنا تحسينات واضحة في تجربة المستخدم وزيادة في كفاءة العمليات، مع نتائج قابلة للقياس تعود بالنفع على الأطفال والأسر المستهدفة.</p>
                    <div class="item">
                    <ul>
                        <li>
                        <h3><i class="flaticon-check"></i>دعم العملاء</h3>
                        <span>نقدم دعماً مستمراً وشاملاً للمستفيدين لضمان استمرارية الأثر وتحسين النتائج.</span>
                        </li>
                        <li>
                        <h3><i class="flaticon-check"></i>حل المشكلات</h3>
                        <span>نعمل على تحديد التحديات وإيجاد حلول عملية ومستدامة من خلال فرق متخصصة.</span>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="p-img">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="{{ asset('website/images/project-details/3.jpg') }}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="{{ asset('website/images/project-details/4.jpg') }}" alt="">
                </div>
                </div>
            </div>
            <div class="page-chang">
                <div class="previous-post post">
                <a href="#">تصميم موقع تجاري</a>
                </div>
                <button class="post-btn">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.68457 0.444336H7.0903V6.88878H0.68457V0.444336ZM0.68457 13.3333H7.0903V19.7777H0.68457V13.3333ZM7.0903 26.2221H0.68457V32.6665H7.0903V26.2221ZM13.4959 0.444336H19.9016V6.88878H13.4959V0.444336ZM19.9016 13.3333H13.4959V19.7777H19.9016V13.3333ZM13.4959 26.2221H19.9016V32.6665H13.4959V26.2221ZM32.7133 0.444336H26.3076V6.88878H32.7133V0.444336ZM26.3076 13.3333H32.7133V19.7777H26.3076V13.3333ZM32.7133 26.2221H26.3076V32.6665H32.7133V26.2221Z"
                    fill="#FF7236" />
                </svg>
                </button>
                <div class="next-post post">
                <a href="#" class="next">التالي <i class="ti-angle-right"></i></a>
                <a href="#">تصميم تطبيق جوال</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection
