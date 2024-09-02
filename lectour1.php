<?php include ('header.php'); ?>
<?php include ('footer.php'); ?>
<!-- محتوى الصفحة هنا -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفصل الأول: مقدمة عن Laravel</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            line-height: 1.8;
            background-color: #f9f9f9;
        }
        h1, h2, h3, h4, h5 {
            color: #2c3e50;
        }
        code {
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            padding: 5px;
            display: block;
            margin: 10px 0;
            direction: ltr;
            text-align: left;
        }
        .code-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 20px 0;
        }
        ul {
            list-style-type: square;
            margin-left: 20px;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        .section {
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
 
    
    <!-- محتوى الصفحة هنا -->
    <h1>الفصل الأول: مقدمة عن Laravel</h1>

   <div class="section"> <h2>1. تعريف بـ Laravel</h2>
    <p>
        <strong>Laravel</strong> هو إطار عمل مفتوح المصدر لتطوير تطبيقات الويب مبني على لغة البرمجة <strong>PHP</strong>. تم إطلاقه لأول مرة في عام 2011 على يد <strong>Taylor Otwell</strong> <br>بهدف تبسيط عملية تطوير التطبيقات وإضافة سهولة إلى بناء هياكل متكاملة. يعد Laravel من بين أكثر الأطر شيوعًا بفضل بنيته الموجهة للتطبيقات الحديثة التي تعتمد على مبدأ <strong>MVC (Model-View-Controller)</strong>.
    </p>
   </div>
   <div class="section">
   <h3>ما هو MVC؟</h3>
    <p>
        <strong>MVC</strong> هو نمط معماري يُستخدم في تطوير البرمجيات. يتم فصل منطق التطبيق إلى ثلاثة مكونات رئيسية:
    </p>
    <ul>
        <li><strong>Model:</strong> الجزء المسؤول عن إدارة البيانات وقاعدة البيانات. يمثل الجداول والعلاقات في قاعدة البيانات.</li>
        <li><strong>View:</strong> الواجهة التي يتم عرضها للمستخدم (التصميم والهيكل).</li>
        <li><strong>Controller:</strong> المعالج الذي يتلقى الطلبات من <strong>View</strong> ويقوم بتنفيذ العمليات المطلوبة باستخدام <strong>Model</strong>.</li>
    </ul>
   </div>
   <div class="section">
    <p>هذا الفصل بين الأجزاء يسهل عملية الصيانة ويوفر القدرة على تطوير التطبيق بشكل منظم.</p>
   </div>
   <div class="section">
    <h2>2. لماذا استخدام Laravel؟</h2>
    <p>من أهم أسباب اختيار المطورين لـ Laravel:</p>
    <ul>
        <li><strong>بساطة الكود:</strong> Laravel يستخدم لغة برمجية واضحة ومعبرة، مما يسهل كتابة الكود وقراءته.</li>
        <li><strong>أدوات جاهزة:</strong> يأتي Laravel مزودًا بأدوات مدمجة مثل <strong>Artisan</strong> لإدارة المهام البرمجية بشكل تلقائي.</li>
        <li><strong>توسعية كبيرة:</strong> يوفر إطار العمل الكثير من الإمكانيات مثل التعامل مع قواعد البيانات، المصادقة، إرسال البريد الإلكتروني، والعديد من الميزات الأخرى بشكل مدمج.</li>
        <li><strong>الأمان:</strong> يتضمن <strong>Laravel</strong> ميزات مثل حماية ضد هجمات <strong>CSRF</strong> و<strong>SQL Injection</strong>، وهو ما يضيف طبقات حماية إضافية لتطبيقات الويب.</li>
        <li><strong>الدعم المجتمعي الواسع:</strong> نظراً لشعبية Laravel، هناك مجتمع ضخم من المطورين والمصادر التعليمية والمكتبات المجانية التي يمكن استخدامها لتسريع عملية التطوير.</li>
    </ul>
   </div>
   <div class="section">
    <h2>3. تثبيت Laravel</h2>
    <p>لتثبيت Laravel على جهازك، ستحتاج إلى بعض المتطلبات الأساسية:</p>
    <ul>
        <li><strong>PHP:</strong> يجب أن يكون الإصدار المستخدم من PHP >= 8.1. تحتاج إلى التأكد من تفعيل بعض الامتدادات مثل:
            <ul>
                <li><strong>OpenSSL</strong></li>
                <li><strong>PDO</strong></li>
                <li><strong>Mbstring</strong></li>
                <li><strong>Tokenizer</strong></li>
                <li><strong>XML</strong></li>
                <li><strong>Ctype</strong></li>
                <li><strong>JSON</strong></li>
                <li><strong>BCMath</strong></li>
                <li><strong>Fileinfo</strong></li>
            </ul>
        </li>
    </div>
    <div class="section">
        <li><strong>Composer:</strong> هو مدير حزم <strong>PHP</strong>، يستخدم لتحميل وتثبيت المكتبات الضرورية. Laravel يعتمد بشكل رئيسي على <strong>Composer</strong> <br>لتنزيل الاعتماديات. يمكن تنزيل <strong>Composer</strong> من الموقع الرسمي:
            <a href="https://getcomposer.org/download/" target="_blank">https://getcomposer.org/download/</a>.
        </li>
        <li><strong>خادم الويب:</strong> يمكنك استخدام أدوات مثل <strong>XAMPP</strong> أو <strong>Laragon</strong> لإنشاء بيئة خادم محلي. يجب عليك التأكد من أن الخادم الخاص بك يدعم PHP 8.1 أو أعلى.</li>
    </ul>
   </div>
   <div class="section">
    <h2>4. خطوات تثبيت Laravel باستخدام Composer</h2>
    <p>لتثبيت Laravel، اتبع الخطوات التالية:</p>
    <div class="code-box">
        <p>1. افتح الطرفية (Terminal أو CMD) على جهازك.</p>
        <p>2. توجه إلى مجلد العمل الخاص بك. إذا كنت تستخدم <strong>XAMPP</strong>، فإن المسار يكون عادةً:</p>
        <code>C:/xampp/htdocs/</code>
        <p>3. قم بتنفيذ الأمر التالي لتنزيل Laravel:</p>
        <code>composer create-project --prefer-dist laravel/laravel my_project_name</code>
        <p>هنا، <code>my_project_name</code> هو اسم المشروع الخاص بك.</p>
        <p>4. بعد الانتهاء من التثبيت، يمكنك الدخول إلى مجلد المشروع وتشغيل الخادم المحلي باستخدام:</p>
        <code>php artisan serve</code>
        <p>سيكون الخادم قيد التشغيل على العنوان: <a href="http://localhost:8000" target="_blank">http://localhost:8000</a>.</p>
    </div>
   </div>
   <div class="section">
    <h2>5. بيئة التطوير - ضبط ملف .env</h2>
    <p><strong>.env</strong> هو ملف يحتوي على متغيرات البيئة الخاصة بالمشروع، مثل إعدادات قاعدة البيانات ومفاتيح الأمان. يجب ضبطه لضمان عمل المشروع بشكل صحيح.</p>
    <div class="code-box">
        <h4>مثال على محتويات ملف .env:</h4>
        <code>
            APP_NAME=Laravel<br>
            APP_ENV=local<br>
            APP_KEY=base64:...<br>
            APP_DEBUG=true<br>
            APP_URL=http://localhost<br><br>

            DB_CONNECTION=mysql<br>
            DB_HOST=127.0.0.1<br>
            DB_PORT=3306<br>
            DB_DATABASE=my_database<br>
            DB_USERNAME=root<br>
            DB_PASSWORD=
        </code>
    </div>
   </div>

   <div class="section">
    <h2>تخصيص إعدادات قاعدة البيانات</h2>
    <ul>
        <li><strong>DB_CONNECTION:</strong> نوع قاعدة البيانات (مثلاً MySQL، SQLite).</li>
        <li><strong>DB_HOST:</strong> عنوان الخادم الخاص بقاعدة البيانات.</li>
        <li><strong>DB_PORT:</strong> المنفذ الذي تستخدمه قاعدة البيانات (عادة 3306 لـ MySQL).</li>
        <li><strong>DB_DATABASE:</strong> اسم قاعدة البيانات.</li>
        <li><strong>DB_USERNAME</strong> و <strong>DB_PASSWORD:</strong> اسم المستخدم وكلمة المرور لقاعدة البيانات.</li>
    </ul>
   </div>
   <div class="section">
    <h2>6. استخدام Artisan</h2>
    <p><strong>Artisan</strong> هي أداة سطر أوامر مدمجة في Laravel تساعد على إدارة المهام البرمجية مثل إنشاء <strong>Controllers</strong>، <strong>Models</strong>، تشغيل الهجرات، واختبار الكود. بعض الأوامر الأساسية:</p>
    <div class="code-box">
        <p>إنشاء Controller:</p>
        <code>php artisan make:controller ControllerName</code>
        <p>تشغيل الهجرات (لإعداد قاعدة البيانات):</p>
        <code>php artisan migrate</code>
    </div>
   </div>
   <div class="section">
    <h2>7. هيكل المشروع</h2>
    <p>بعد التثبيت، ستلاحظ أن Laravel ينشئ عدة مجلدات وملفات:</p>
    <ul>
        <li><strong>app/</strong>: يحتوي على جميع ملفات الكود الخاصة بالتطبيق (Controllers، Models، وغيرها).</li>
        <li><strong>config/</strong>: يحتوي على ملفات إعدادات التطبيق.</li>
        <li><strong>resources/</strong>: يحتوي على ملفات <strong>Blade</strong> (القوالب) والملفات الأمامية مثل CSS وJavaScript.</li>
        <li><strong>routes/</strong>: يحتوي على ملفات التوجيه.</li>
        <li><strong>database/</strong>: يحتوي على ملفات الهجرة والنماذج.</li>
    </ul>
   </div>
   <div class="section">
    <h2>8. بداية المشروع</h2>
    <p>بمجرد تثبيت <strong>Laravel</strong> وتشغيل الخادم المحلي، يمكنك البدء في تطوير تطبيق الويب الخاص بك. يمكنك البدء بتعريف الموجهات الأساسية في ملف <code>routes/web.php</code>، ثم إنشاء <strong>Controllers</strong> و<strong>Models</strong> وتطوير قاعدة البيانات باستخدام <strong>Eloquent ORM</strong>.</p>
   </div>
    
</body>
</html>
