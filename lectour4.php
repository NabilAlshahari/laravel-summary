<?php include ('header.php'); ?>
<?php include ('footer.php'); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفصل الرابع: النماذج وقواعد البيانات في Laravel</title>
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
            white-space: pre-wrap;
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
        <h1>الفصل الرابع: النماذج وقواعد البيانات في Laravel</h1>

        <div class="section">
            <h2>1. مقدمة عن النماذج وقواعد البيانات</h2>
            <p>في Laravel، تعد النماذج (Models) وقواعد البيانات (Databases) جزءًا أساسيًا من كيفية إدارة البيانات والتفاعل معها. النماذج هي الكائنات التي تمثل جداول قواعد البيانات، بينما تساعد قواعد البيانات في تخزين واسترجاع البيانات. يتيح لك Laravel التعامل مع قواعد البيانات بكفاءة عبر استخدام النماذج واستعلامات Eloquent ORM.</p>
        </div>

        <div class="section">
            <h2>2. إعداد قاعدة البيانات</h2>
            <p>قبل البدء في العمل مع النماذج، يجب عليك إعداد قاعدة البيانات الخاصة بك. تتضمن الخطوات الرئيسية:</p>
            <ol>
                <li>
                    <strong>تكوين إعدادات قاعدة البيانات:</strong> يتم ذلك في ملف <code>.env</code> في جذر مشروع Laravel. يجب ضبط إعدادات الاتصال بقاعدة البيانات، مثل اسم المستخدم، كلمة المرور، واسم قاعدة البيانات:
                    <pre class="example"><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
                    </code></pre>
                </li>
                <li>
                    <strong>تحديث إعدادات قاعدة البيانات:</strong> تأكد من تحديث ملف <code>config/database.php</code> لضبط إعدادات الاتصال بقاعدة البيانات.
                </li>
            </ol>
        </div>

        <div class="section">
            <h2>3. إنشاء نموذج (Model)</h2>
            <p>يمكنك إنشاء نموذج باستخدام سطر الأوامر (Artisan CLI). على سبيل المثال، لإنشاء نموذج يمثل جدول "المستخدمين":</p>
            <pre class="example"><code>php artisan make:model User
            </code></pre>
            <p>سيقوم هذا الأمر بإنشاء ملف نموذج جديد في مجلد <code>app/Models</code> باسم <code>User.php</code>.</p>
        </div>

        <div class="section">
            <h2>4. هيكل نموذج (Model)</h2>
            <p>عند إنشاء نموذج، سيكون هيكله الأساسي كما يلي:</p>
            <pre class="example"><code>&lt;?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // يمكن تخصيص هذا النموذج هنا
}
            </code></pre>
            <ul>
                <li><code>namespace App\Models;</code>: يحدد مساحة الأسماء للنموذج.</li>
                <li><code>use Illuminate\Database\Eloquent\Model;</code>: يستخدم الفئة الأساسية <code>Model</code> من Eloquent.</li>
                <li><code>class User extends Model</code>: يحدد أن هذا النموذج يمثل جدول "المستخدمين".</li>
            </ul>
        </div>
        <div class="section">
            <h2>5. العمل مع قواعد البيانات باستخدام Eloquent ORM</h2>
            <p>Eloquent هو ORM (Object-Relational Mapping) في Laravel الذي يوفر واجهة بسيطة للعمل مع قواعد البيانات. بعض الميزات الرئيسية تشمل:</p>
            <ol>
                <li>
                    <strong>استرجاع البيانات:</strong> يمكنك استرجاع البيانات من قاعدة البيانات باستخدام أساليب Eloquent.
                    <pre class="example"><code>$users = User::all();
                    </code></pre>
                    <p><code>User::all()</code>: يسترجع جميع السجلات من جدول "المستخدمين".</p>
                </li>
                <li>
                    <strong>إضافة بيانات جديدة:</strong> يمكنك إضافة سجلات جديدة إلى قاعدة البيانات.
                    <pre class="example"><code>$user = new User;
$user->name = 'John Doe';
$user->email = 'john@example.com';
$user->save();
                    </code></pre>
                    <p><code>$user->save()</code>: يحفظ السجل الجديد في قاعدة البيانات.</p>
                </li>
                <li>
                    <strong>تحديث بيانات موجودة:</strong> يمكنك تحديث السجلات الموجودة.
                    <pre class="example"><code>$user = User::find(1);
$user->name = 'Jane Doe';
$user->save();
                    </code></pre>
                    <p><code>User::find(1)</code>: يعثر على السجل الذي يحمل المعرف 1.</p>
                </li>
                <li>
                    <strong>حذف بيانات:</strong> يمكنك حذف السجلات من قاعدة البيانات.
                    <pre class="example"><code>$user = User::find(1);
$user->delete();
                    </code></pre>
                    <p><code>$user->delete()</code>: يحذف السجل المحدد.</p>
                </li>
            </ol>
        </div>

        <div class="section">
            <h2>6. تخصيص نموذج (Model)</h2>
            <p>يمكنك تخصيص نموذج ليطابق احتياجاتك الخاصة، مثل:</p>
            <ol>
                <li>
                    <strong>تحديد اسم الجدول:</strong> إذا كان اسم الجدول لا يتوافق مع الاسم الافتراضي للنموذج.
                    <pre class="example"><code>protected $table = 'custom_users';
                    </code></pre>
                </li>
                <li>
                    <strong>تحديد مفاتيح أساسية غير الافتراضية:</strong> إذا كان الجدول يستخدم مفتاح أساسي غير <code>id</code>.
                    <pre class="example"><code>protected $primaryKey = 'user_id';
                    </code></pre>
                </li>
                <li>
                    <strong>تحديد الحقول القابلة للتعبئة:</strong> يمكنك تحديد الحقول التي يمكن تعيينها عبر عمليات الإضافة والتحديث.
                    <pre class="example"><code>protected $fillable = ['name', 'email'];
                    </code></pre>
                </li>
                <li>
                    <strong>تحديد الحقول المحمية:</strong> يمكنك تحديد الحقول التي يجب عدم تعيينها بشكل جماعي.
                    <pre class="example"><code>protected $guarded = ['admin'];
                    </code></pre>
                </li>
            </ol>
        </div>

        <div class="section">
            <h2>7. الاستعلامات المعقدة باستخدام Eloquent</h2>
            <p>يمكنك إجراء استعلامات أكثر تعقيدًا باستخدام Eloquent. على سبيل المثال:</p>
            <ol>
                <li>
                    <strong>الاستعلامات المشروطة:</strong>
                    <pre class="example"><code>$users = User::where('status', 'active')->get();
                    </code></pre>
                    <p><code>User::where('status', 'active')->get()</code>: يسترجع جميع المستخدمين الذين لديهم حالة "نشط".</p>
                </li>
                <li>
                    <strong>الاستعلامات مع الربط (Joins):</strong>
                    <pre class="example"><code>$users = User::join('posts', 'users.id', '=', 'posts.user_id')
                        ->select('users.name', 'posts.title')
                ->get();
                    </code></pre>
                    <p><code>User::join('posts', ...)</code>: يجمع بيانات المستخدمين مع بيانات المقالات باستخدام الربط بين الجداول.</p>
                </li>
            </ol>
        </div>

        <div class="section">
            <h2>8. الهجرات (Migrations)</h2>
            <p>الهجرات هي طريقة لإدارة هيكل قاعدة البيانات في Laravel. يمكن إنشاؤها باستخدام الأمر:</p>
            <pre class="example"><code>php artisan make:migration create_users_table
            </code></pre>
            <p>سيقوم هذا الأمر بإنشاء ملف هجرة جديد في مجلد <code>database/migrations</code>.</p>
            <ol>
                <li>
                    <strong>إنشاء جداول:</strong>
                    <pre class="example"><code>public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();
    });
}
                    </code></pre>
                </li>
                <li>
                    <strong>تعديل جداول:</strong>
                    <pre class="example"><code>public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone_number')->nullable();
    });
}
                    </code></pre>
                </li>
                <li>
                    <strong>تشغيل الهجرات:</strong>
                    <pre class="example"><code>php artisan migrate
                    </code></pre>
                    <p>يقوم بتشغيل جميع الهجرات غير المنفذة.</p>
                </li>
            </ol>
            <p>يمكنك إعادة ضبط قاعدة البيانات وتشغيل جميع الهجرات من جديد باستخدام:</p>
            <pre class="example"><code>php artisan migrate:refresh
            </code></pre>
        </div>

        <div class="section">
            <h2>9. اختبار الهجرات</h2>
            <p>يمكنك اختبار الهجرات بطرق مختلفة لضمان أن جميع التعديلات في قاعدة البيانات قد تمت بنجاح.</p>
        </div>

        <footer>
            <p>&copy; 2024 Laravel Course</p>
        </footer>
    </div>
</body>
</html>
