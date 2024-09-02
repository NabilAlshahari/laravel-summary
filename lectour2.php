<?php include ('header.php'); ?>
<?php include ('footer.php'); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفصل الثاني: الموجهات (Routing) في Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h1, h2, h3 {
            color: #333;
        }
        code {
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 3px;
        }
        pre {
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 3px;
            overflow-x: auto;
        }
        .section {
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .example {
            background-color: #eef;
            border: 1px solid #bbd;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>الفصل الثاني: الموجهات (Routing) في Laravel</h1>

        <div class="section">
            <h2>1. مقدمة عن الموجهات</h2>
            <p>الموجهات (Routing) هي جزء أساسي في إطار عمل <strong>Laravel</strong>. تعتبر الموجهات الجسر بين الطلبات الواردة إلى التطبيق والردود التي يتم إرسالها للمستخدم. ببساطة، عندما يقوم المستخدم بإرسال طلب عبر المتصفح، يقوم إطار عمل Laravel باستخدام نظام الموجهات لتحديد الوجهة الصحيحة التي ستتعامل مع هذا الطلب، سواء كان عرض صفحة، تنفيذ عملية على الخادم، أو استرجاع بيانات.</p>
        </div>

        <div class="section">
            <h2>2. كيفية عمل الموجهات في Laravel</h2>
            <h3>2.1 الموجهات الأساسية</h3>
            <p>لتعريف موجهة بسيطة، يمكنك استخدام <code>Route::get()</code> في ملف <code>web.php</code>. هذا التعريف يقوم بتحديد المسار الذي يتوجب استقباله وتنفيذ رد معين بناءً على ذلك الطلب.</p>
            <pre class="example"><code>Route::get('/home', function () {
    return 'Welcome to Home Page!';
});
            </code></pre>
            <p>في هذا المثال، عندما يقوم المستخدم بزيارة الصفحة عبر المسار <code>/home</code>، ستقوم الموجهة بإرجاع النص 'Welcome to Home Page!'.</p>
        </div>

        <div class="section">
            <h2>3. أنواع الطلبات (HTTP Methods)</h2>
            <p>يستخدم Laravel جميع أنواع الطلبات الأساسية في HTTP، بما في ذلك:</p>
            <ul>
                <li><strong>GET</strong>: لاسترجاع البيانات (عرض صفحة أو معلومات).</li>
                <li><strong>POST</strong>: لإرسال البيانات (إضافة أو تعديل بيانات).</li>
                <li><strong>PUT</strong>: لتحديث البيانات.</li>
                <li><strong>DELETE</strong>: لحذف البيانات.</li>
            </ul>
            <pre class="example"><code>Route::post('/submit', function () {
    // التعامل مع البيانات المرسلة من نموذج
});

Route::put('/update/{id}', function ($id) {
    // تحديث البيانات بناءً على معرف (ID)
});

Route::delete('/delete/{id}', function ($id) {
    // حذف البيانات بناءً على معرف (ID)
});
            </code></pre>
        </div>

        <div class="section">
            <h2>4. الموجهات الديناميكية</h2>
            <p>تسمح الموجهات الديناميكية في Laravel بتمرير متغيرات ضمن الموجهة. مثلاً، يمكنك تحديد معرف مستخدم أو مقال في عنوان URL، وسيقوم Laravel بتمرير هذا المتغير إلى المعالجة المطلوبة.</p>
            <pre class="example"><code>Route::get('/user/{id}', function ($id) {
    return "User ID is: " . $id;
});
            </code></pre>
            <p>في هذا المثال، يتم تمرير المعرف كمتغير <code>$id</code>، وسيتم عرض قيمة المعرف في الصفحة.</p>
        </div>
        <div class="section">
            <h2>5. تسمية الموجهات (Route Names)</h2>
            <p>يمكنك تسمية الموجهات في Laravel لتسهيل الإشارة إليها في أي جزء من التطبيق مثل الروابط في الواجهات. يساعد ذلك في ضمان استمرارية عمل الروابط حتى عند تغيير مسار الموجهة لاحقًا.</p>
            <pre class="example"><code>Route::get('/profile', function () {
    return view('profile');
})->name('profile');
            </code></pre>
            <p>يمكن الآن استخدام اسم الموجهة <code>profile</code> عند إنشاء روابط:</p>
            <pre class="example"><code>&lt;a href="{{ route('profile') }}"&gt;Profile&lt;/a&gt;
            </code></pre>
        </div>

        <div class="section">
            <h2>6. استخدام Controllers مع الموجهات</h2>
            <p>بدلًا من كتابة الكود مباشرة في الموجهة، يُفضل استخدام <strong>Controllers</strong> لتنظيم الكود. يتم إرسال الطلب إلى الموجهة، ثم يتم توجيهه إلى الدالة المناسبة داخل <strong>Controller</strong>.</p>
            <pre class="example"><code>Route::get('/users', [UserController::class, 'index']);
            </code></pre>
            <p>هنا، الطلب الذي يصل إلى المسار <code>/users</code> يتم إرساله إلى دالة <code>index</code> داخل <code>UserController</code>.</p>
        </div>

        <div class="section">
            <h2>7. Middleware في الموجهات</h2>
            <p>يمكن استخدام <strong>Middleware</strong> لتحديد سلوك معين يتم تنفيذه قبل أو بعد معالجة الطلب. مثلاً، يمكن استخدام Middleware للتحقق من أن المستخدم مسجل الدخول قبل السماح له بالوصول إلى مسار معين.</p>
            <pre class="example"><code>Route::get('/dashboard', function () {
    return 'Dashboard';
})->middleware('auth');
            </code></pre>
            <p>هنا، يتم التحقق من أن المستخدم مسجل الدخول قبل عرض صفحة الـ Dashboard.</p>
        </div>

        <div class="section">
            <h2>8. التحقق من البيانات باستخدام Route Parameters</h2>
            <p>يتيح لك Laravel التحقق من صحة المعطيات التي تمر عبر الموجهات. يمكنك تحديد قواعد للمعطيات باستخدام التعبيرات العادية (Regular Expressions) أو القيود المدمجة.</p>
            <pre class="example"><code>Route::get('/user/{id}', function ($id) {
    return 'User ID is: ' . $id;
})->where('id', '[0-9]+');
            </code></pre>
            <p>هنا، يتم قبول فقط المعرفات التي تتكون من أرقام.</p>
        </div>

        <div class="section">
            <h2>9. التجميع (Route Groups)</h2>
            <p>يمكن تجميع الموجهات معًا لتطبيق إعدادات مشتركة مثل Middleware أو مساحة الأسماء (namespace).</p>
            <pre class="example"><code>Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard';
    });

    Route::get('/settings', function () {
        return 'Settings';
    });
});
            </code></pre>
            <p>جميع الموجهات داخل هذا التجميع تخضع لشرط أن يكون المستخدم مسجل الدخول (auth middleware).</p>
        </div>
    </div>
</body>
</html>