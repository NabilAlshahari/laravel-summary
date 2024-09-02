<?php include ('header.php'); ?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفصل السادس: Blade - نظام قوالب Laravel</title>
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
        <h1>الفصل السادس: Blade - نظام قوالب Laravel</h1>

        <div class="section">
            <h2>1. مقدمة عن Blade</h2>
            <p>Blade هو محرك القوالب الخاص بـ Laravel، وهو أداة قوية تساعدك على فصل منطق العرض عن منطق التطبيق. يوفر Blade طريقة مرنة وسهلة لإنشاء قوالب HTML مع دعم ميزات مثل التكرار الشرطي والتمرير للبيانات، مما يجعل بناء واجهات المستخدم أكثر تنظيماً وسلاسة.</p>
        </div>

        <div class="section">
            <h2>2. إنشاء قوالب Blade</h2>
            <p>تُخزن قوالب Blade في مجلد <code>resources/views</code>. يمكنك إنشاء قوالب جديدة باستخدام امتداد <code>.blade.php</code>.</p>
            <p>مثال على إنشاء قالب Blade لصفحة رئيسية:</p>
            <pre class="example"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;صفحة رئيسية&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;مرحبا، {{ $name }}!&lt;/h1&gt;
&lt;/body&gt;
&lt;/html&gt;
            </code></pre>
        </div>

        <div class="section">
            <h2>3. تمرير البيانات إلى القوالب</h2>
            <p>يمكنك تمرير البيانات إلى قوالب Blade من خلال الدالة <code>view()</code> في الـ Controller.</p>
            <p>مثال على كيفية تمرير البيانات:</p>
            <pre class="example"><code>// في ملف Controller
public function index()
{
    $name = 'علي';
    return view('home', ['name' => $name]);
}
            </code></pre>
            <p>في هذا المثال، يتم تمرير متغير <code>$name</code> إلى القالب <code>home</code>.</p>
        </div>

        <div class="section">
            <h2>4. الـ Blade Directives</h2>
            <p>Blade يقدم مجموعة من الإرشادات (directives) التي تبسط الكتابة، مثل <code>@if</code>, <code>@foreach</code>, و <code>@extends</code>.</p>

            <h3>التكرار الشرطي:</h3>
            <pre class="example"><code>&lt;!-- مثال على استخدام @if --&gt;
@if ($user)
    &lt;p&gt;مرحبا، {{ $user->name }}!&lt;/p&gt;
@else
    &lt;p&gt;مرحباً زائر!&lt;/p&gt;
@endif
            </code></pre>

            <h3>التكرار (Loops):</h3>
            <pre class="example"><code>&lt;!-- مثال على استخدام @foreach --&gt;
@foreach ($users as $user)
    &lt;p&gt;{{ $user->name }}&lt;/p&gt;
@endforeach
            </code></pre>
        </div>

        <div class="section">
            <h2>5. استخدام Layouts</h2>
            <p>يمكنك استخدام ملفات Layouts لتجنب تكرار الكود في قوالب مختلفة. تحتوي ملفات Layouts على الهيكل الأساسي للتطبيق، ويمكنك تمديدها في قوالب أخرى.</p>
            <h3>ملف Layout:</h3>
            <pre class="example"><code>&lt;!-- resources/views/layouts/app.blade.php --&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;تطبيقي&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    @yield('content')
&lt;/body&gt;
&lt;/html&gt;
            </code></pre>

            <h3>ملف محتوى يمدد الـ Layout:</h3>
            <pre class="example"><code>&lt;!-- resources/views/home.blade.php --&gt;
@extends('layouts.app')

@section('content')
    &lt;h1&gt;مرحبا، {{ $name }}!&lt;/h1&gt;
@endsection
            </code></pre>
        </div>

        <div class="section">
            <h2>6. المكونات (Components)</h2>
            <p>المكونات هي عناصر قابلة لإعادة الاستخدام تساعدك في تنظيم الواجهة. يمكنك إنشاء مكونات Blade لتمثيل أجزاء من واجهتك.</p>

            <h3>إنشاء مكون:</h3>
            <pre class="example"><code>php artisan make:component Alert
            </code></pre>

            <h3>ملف Blade الخاص بالمكون:</h3>
            <pre class="example"><code>&lt;!-- resources/views/components/alert.blade.php --&gt;
&lt;div class="alert alert-{{ $type }}"&gt;
    {{ $slot }}
&lt;/div&gt;
            </code></pre>

            <h3>استخدام المكون في قالب:</h3>
            <pre class="example"><code>&lt;x-alert type="success"&gt;
    عملية ناجحة!
&lt;/x-alert&gt;
            </code></pre>
        </div>

        <div class="section">
            <h2>7. التحكم في البيانات المدخلة</h2>
            <p>يمكنك أيضًا استخدام Blade للتحكم في البيانات المدخلة والتعامل مع الرسائل.</p>

            <h3>عرض الرسائل:</h3>
            <pre class="example"><code>@if (session('status'))
    &lt;div class="alert alert-success"&gt;
        {{ session('status') }}
    &lt;/div&gt;
@endif
            </code></pre>
        </div>

        <div class="section">
            <h2>8. الأساليب المدمجة</h2>
            <p>Blade يدعم أيضًا الأساليب المدمجة مثل <code>@include</code>, <code>@section</code>, و <code>@yield</code> لتكرار أجزاء من القوالب.</p>

            <h3>تضمين ملفات:</h3>
            <pre class="example"><code>@include('partials.nav')
            </code></pre>

            <h3>تعريف وتطبيق أقسام:</h3>
            <pre class="example"><code>&lt;!-- تعريف قسم في layout --&gt;
@section('sidebar')
    &lt;p&gt;هذا هو الشريط الجانبي.&lt;/p&gt;
@endsection

&lt;!-- تطبيق القسم في القالب --&gt;
@yield('sidebar')
            </code></pre>
        </div>

        
    </div>
</body>
</html>
<?php include ('footer.php'); ?>