<?php include ('header.php'); ?>
<?php include ('footer.php'); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفصل الثالث: Controllers في Laravel</title>
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
            display: block;
            margin: 10px 0;
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
            overflow-x: auto;
        }
        .code-block {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>الفصل الثالث: Controllers في Laravel</h1>

        <div class="section">
            <h2>1. مقدمة عن Controllers</h2>
            <p>في إطار عمل Laravel، يعتبر <strong>Controller</strong> أحد المكونات الأساسية التي تساعد في تنظيم الكود وجعل التطبيق أكثر هيكلية. يهدف الـ Controller إلى فصل منطق العمل عن منطق العرض في التطبيق. بدلاً من وضع منطق التعامل مع البيانات مباشرة في ملفات الموجهات (Routes)، يقوم الـ Controller بتجميع هذا المنطق في فئة واحدة، مما يسهل إدارة وصيانة الكود.</p>
        </div>

        <div class="section">
            <h2>2. إنشاء Controller</h2>
            <p>يمكنك إنشاء <strong>Controller</strong> باستخدام سطر الأوامر (Artisan CLI) عبر الأمر التالي:</p>
            <pre class="example"><code>php artisan make:controller UserController
            </code></pre>
            <p>سيقوم هذا الأمر بإنشاء ملف <code>UserController.php</code> في مجلد <code>app/Http/Controllers</code>.</p>
        </div>

        <div class="section">
            <h2>3. هيكل Controller</h2>
            <p>عند إنشاء Controller، ستبدو بنية الملف كما يلي:</p>
            <pre class="example"><code>&lt;?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Methods go here
}
            </code></pre>
            <ul>
                <li><code>namespace App\Http\Controllers;</code>: يحدد مساحة الأسماء للـ Controller.</li>
                <li><code>use Illuminate\Http\Request;</code>: يستخدم لجلب فئة Request من Laravel، والتي تتعامل مع البيانات المرسلة من العميل.</li>
                <li><code>class UserController extends Controller</code>: يحدد فئة الـ Controller التي يمكن أن تحتوي على أساليب (methods) مختلفة.</li>
            </ul>
        </div>

        <div class="section">
            <h2>4. إضافة Methods إلى Controller</h2>
            <p>يمكنك إضافة طرق (methods) إلى الـ Controller للتعامل مع الطلبات المختلفة. على سبيل المثال:</p>
            <pre class="example"><code>public function index()
{
    return view('users.index');
}

public function show($id)
{
    $user = User::find($id);
    return view('users.show', ['user' => $user]);
}
            </code></pre>
            <ul>
                <li><code>index</code>: طريقة تعرض قائمة بجميع المستخدمين.</li>
                <li><code>show</code>: طريقة تعرض تفاصيل مستخدم معين بناءً على المعرف (ID).</li>
            </ul>
        </div>
        <div class="section">
            <h2>5. استخدام Controller في الموجهات</h2>
            <p>يمكنك توجيه الطلبات إلى الـ Controller عبر تعريف الموجهات في ملف <code>web.php</code>:</p>
            <pre class="example"><code>Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
            </code></pre>
            <ul>
                <li><code>[UserController::class, 'index']</code>: يحدد أن الطلب إلى <code>/users</code> سيتم معالجته بواسطة دالة <code>index</code> في <code>UserController</code>.</li>
                <li><code>[UserController::class, 'show']</code>: يحدد أن الطلب إلى <code>/users/{id}</code> سيتم معالجته بواسطة دالة <code>show</code> في <code>UserController</code>.</li>
            </ul>
        </div>

        <div class="section">
            <h2>6. التحكم في الطلبات (Request)</h2>
            <p>يمكنك استخدام فئة <code>Request</code> داخل الـ Controller للوصول إلى البيانات المرسلة من العميل:</p>
            <pre class="example"><code>public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
    ]);

    User::create($validated);

    return redirect('/users');
}
            </code></pre>
            <p><code>$request->validate([...])</code>: يتحقق من صحة البيانات الواردة وفقًا للقواعد المحددة.</p>
        </div>

        <div class="section">
            <h2>7. استخدام Controllers مع Middleware</h2>
            <p>يمكن تطبيق <strong>Middleware</strong> على الـ Controller لتحديد سلوك معين قبل أو بعد معالجة الطلبات. مثال على استخدام Middleware مع Controller:</p>
            <pre class="example"><code>public function __construct()
{
    $this->middleware('auth');
}
            </code></pre>
            <p>يتم استدعاء هذا الـ Middleware لجميع الأساليب داخل الـ Controller، مما يعني أن المستخدم يجب أن يكون مسجلاً الدخول للوصول إلى أي من الأساليب.</p>
        </div>

        <div class="section">
            <h2>8. Resource Controllers</h2>
            <p>لإنشاء Controller يتعامل مع CRUD (إنشاء، قراءة، تحديث، حذف) يمكنك استخدام <strong>Resource Controllers</strong>. لإنشاء Resource Controller، استخدم الأمر:</p>
            <pre class="example"><code>php artisan make:controller PostController --resource
            </code></pre>
            <p>سيقوم هذا الأمر بإنشاء Controller مع طرق محددة لعمليات CRUD. يمكنك تسجيل Resource Controller في <code>web.php</code> كالتالي:</p>
            <pre class="example"><code>Route::resource('posts', PostController::class);
            </code></pre>
            <p><code>Route::resource</code>: يحدد مجموعة من الموجهات التي تتوافق مع العمليات الأساسية CRUD في الـ Controller.</p>
        </div>

        <div class="section">
            <h2>9. التحكم في التوجيهات (Routing) داخل Resource Controllers</h2>
            <p>يمكنك تخصيص طرق الـ Resource Controller لتتناسب مع احتياجاتك:</p>
            <pre class="example"><code>public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
}
            </code></pre>
            <p>هنا، يتم تطبيق Middleware على جميع الأساليب ماعدا <code>index</code> و <code>show</code>.</p>
        </div>
    </div>
</body>
</html>