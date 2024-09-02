<?php include ('header.php'); ?>
<?php include ('footer.php'); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفصل الخامس: الهجرات وإدارة قواعد البيانات في Laravel</title>
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
        <h1>الفصل الخامس: الهجرات وإدارة قواعد البيانات في Laravel</h1>

        <div class="section">
            <h2>1. مقدمة عن الهجرات (Migrations)</h2>
            <p>الهجرات هي ميزة قوية في Laravel تُستخدم لإدارة هيكل قاعدة البيانات بطريقة منظمة وقابلة للتكرار. تتيح لك الهجرات تتبع التغييرات التي تجريها على قاعدة البيانات وتنفيذها بشكل مبرمج، مما يجعل إدارة الجداول والأعمدة أكثر سهولة.</p>
        </div>

        <div class="section">
            <h2>2. إنشاء هجرة جديدة</h2>
            <p>لإنشاء هجرة جديدة، استخدم الأمر التالي في سطر الأوامر:</p>
            <pre class="example"><code>php artisan make:migration create_users_table
            </code></pre>
            <p>سيقوم هذا الأمر بإنشاء ملف هجرة جديد في مجلد <code>database/migrations</code>، وسيكون له اسم يبدأ بتاريخ ووقت إنشاء الهجرة لتجنب التكرار.</p>
        </div>

        <div class="section">
            <h2>3. هيكل ملف الهجرة</h2>
            <p>يحتوي ملف الهجرة على دالتين رئيسيتين: <code>up()</code> و <code>down()</code>.</p>
            <ul>
                <li><strong>up()</strong>: تُستخدم لتحديد التعديلات التي سيتم تطبيقها على قاعدة البيانات (مثل إنشاء جداول جديدة، إضافة أعمدة، إلخ).</li>
                <li><strong>down()</strong>: تُستخدم لتحديد كيفية التراجع عن التعديلات التي تمت في <code>up()</code>.</li>
            </ul>
            <p>مثال على ملف هجرة لإنشاء جدول "المستخدمين":</p>
            <pre class="example"><code>&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
            </code></pre>
        </div>

        <div class="section">
            <h2>4. تشغيل الهجرات</h2>
            <p>لتنفيذ الهجرات وتطبيق التعديلات على قاعدة البيانات، استخدم الأمر:</p>
            <pre class="example"><code>php artisan migrate
            </code></pre>
            <p>يقوم هذا الأمر بتشغيل جميع الهجرات التي لم يتم تشغيلها بعد.</p>
        </div>
        <div class="section">
            <h2>5. إعادة تعيين قاعدة البيانات باستخدام الهجرات</h2>
            <p>يمكنك إعادة تعيين قاعدة البيانات بشكل كامل وإعادة تطبيق جميع الهجرات باستخدام:</p>
            <pre class="example"><code>php artisan migrate:refresh
            </code></pre>
            <p><code>migrate:refresh</code>: يُعيد ضبط قاعدة البيانات عن طريق التراجع عن جميع الهجرات ثم إعادة تطبيقها.</p>
        </div>

        <div class="section">
            <h2>6. تعديل الهجرات</h2>
            <p>إذا كنت بحاجة إلى تعديل هيكل قاعدة البيانات بعد إنشائها، يمكنك إنشاء هجرة جديدة للتعامل مع التغييرات بدلاً من تعديل الهجرات القديمة.</p>
            <p>مثال على هجرة لتعديل جدول "المستخدمين" بإضافة عمود "phone_number":</p>
            <pre class="example"><code>&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneNumberToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
        });
    }
}
            </code></pre>
        </div>

        <div class="section">
            <h2>7. العمل مع الجداول الموجودة</h2>
            <p>يمكنك أيضًا تعديل الجداول الموجودة باستخدام الهجرات، مثل إضافة أو حذف أعمدة، أو تعديل الأعمدة الحالية.</p>
            <p>مثال على تعديل عمود موجود:</p>
            <pre class="example"><code>&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNameColumnInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 100)->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->change();
        });
    }
}
            </code></pre>
        </div>

        <div class="section">
            <h2>8. الهجرات المتقدمة</h2>
            <p>تدعم Laravel أنواعًا مختلفة من التعديلات المتقدمة على قاعدة البيانات، مثل:</p>
            <ul>
                <li><strong>التحكم في الفهارس (Indexes):</strong></li>
                <pre class="example"><code>$table->index('email');
$table->dropIndex(['email']);
                </code></pre>
                <li><strong>إنشاء فهارس فريدة (Unique Indexes):</strong></li>
                <pre class="example"><code>$table->unique('email');
                </code></pre>
                <li><strong>إضافة مفاتيح خارجية (Foreign Keys):</strong></li>
                <pre class="example"><code>$table->foreignId('role_id')->constrained();
                </code></pre>
            </ul>
        </div>

        <div class="section">
            <h2>9. اختبار الهجرات</h2>
            <p>بعد تطبيق الهجرات، تأكد من اختبار قاعدة البيانات للتأكد من أن جميع التعديلات قد تمت بنجاح وأن التطبيق يتعامل معها بشكل صحيح.</p>
        </div>

        <footer>
            <p>&copy; 2024 Laravel Course</p>
        </footer>
    </div>
</body>
</html>