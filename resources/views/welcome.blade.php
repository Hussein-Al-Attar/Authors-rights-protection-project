<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:700");

        * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
          font-family: "Open Sans", sans-serif;
          --text-color-primary: #5B37B7;
          --primary-color:#5B37B7;
          --hover-color-text:#ffffff;
        }

        /* by default include the background of the option for the home navigation */
        body {
          color: #010101;
          /* center in the viewport */
          min-height: 100vh;
          font-family: "Open Sans", sans-serif;
          /* transition for the change in bg color */
          transition: background 0.2s ease-out;
          padding: 1rem;
        }
        .nav {
        display: flex;
        justify-content: flex-end;
        padding: 10px;
      }

      .item {
        margin-right: 10px;
        text-decoration: none;
        color: var(--text-color-primary);
        padding: 5px;
        border-radius: 5px;
      }

      .item:hover {
        background-color: var(--primary-color);
        color: var(--hover-color-text);
      }
      /* Custom styles for the welcome heading */
      .welcome-heading {
                color: #5B37B7;
                /* Dark gray color */
                font-size: 2rem;
                /* 32px font size */
                font-weight: bold;
                /* Bold font weight */
                margin-bottom: 1rem;
                /* Bottom margin of 1rem */
            }

            /* Custom styles for the user count paragraph */
            .user-count {
                color: #666;
                /* Medium gray color */
                margin-bottom: 2rem;
                /* Bottom margin of 2rem */
            }

            /* Custom styles for the bold user count span */
            .user-count span {
                font-weight: bold;
                /* Bold font weight */
            }

            .container-text {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 50vh;
                /* Make the container full height of the viewport */
            }
            .container {
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .title {
            color: #5B37B7;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            text-align: right;
        }

        .content {
            color: #333;
            font-size: 1rem;
            text-align: right;
        }
      </style>

    <!-- Custom CSS -->

</head>

<body>
    <div>
        @if (Route::has('login'))
            <div class="nav">


                @auth
                    <a class="item" href="{{ url('/dashboard') }}" style="alt; text-align: right;">لوحة القيادة</a>
                @else
                    <a class="item" href="{{ route('login') }}" style="alt; text-align: right;">تسجيل الدخول</a>

                    @if (Route::has('register'))
                        <a class="item" href="{{ route('register') }}" style="alt; text-align: right;">انشاء حساب
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="container-text">
        <!-- Welcome heading -->
        <h1 class="welcome-heading" style="alt; text-align: right;">أهلا في موقعنا!</h1>
        <p class="user-count" style="alt; text-align: right;">موقع حماية حقوق المؤلف هو منصة إلكترونية تهدف إلى تقديم خدمات ومصادر متعددة للمؤلفين وحماية حقوقهم في الأعمال الأدبية والأكاديمية. يتيح الموقع للمؤلفين تسجيل أعمالهم وتوثيق حقوقهم ونشرها.</p>
        <!-- User count paragraph -->
        <p class="user-count" style="alt; text-align: right;">عدد المستخدمين المسجلين: <span>{{ $userCount }}</span></p>
        <x-application-logo />

    </div>



    <div class="grid grid-cols-1 gap-4">
        <div class="container">
            <div class="title">تعريف المؤلف</div>
            <div class="content">
                يعتبر مؤلفها الشخص الذي نشر المصنف منسوباً اليه سواء كان ذلك بذكر اسمه على المصنف او بأية طريقة اخرى الا اذا قام الدليل على عكس ذلك ويسري هذا الحكم على الاسم المستعار بشرط الا يقوم ادنى شك في حقيقة شخصية المؤلف
                قانون حماية حق المؤلف رقم 3لسنة 1971المعدل
            </div>
        </div>

        <div class="container">
            <div class="title">المادة الخامسة والعشرون</div>
            <div class="content">
                اذا شترك عدة اشخاص في تأليف مصنف بحيث لايمكن فصل كل منهم في العمل المشترك يعتبرون جميعاً اصحاب المصنف بالتساوي فيما بينهم الا اذا اتفق على غير ذلك وفي هذه الحالة لٱ تمكن مباشرة الحقوق المترتبة على حق المؤلف الا باتفاق جميع
                قانون حماية حق المؤلف رقم 3لسنة 1971المعدل
            </div>
        </div>

        <div class="container">
            <div class="title">المادة السادسة والعشرون</div>
            <div class="content">
                اذا اشترك عدة اشخاص في تأليف مصنف بحيث يمكن فصل دور كل منهم في العمل المشترك كان لكل منهم الحق في الانتفاع بالجزء الذي ساهم به على حدة بشرط ان لا يضر ذلك باستغلال المصنف المشترك ما لم يتفق على غير ذلك
                قانون حماية حق المؤلف رقم 3لسنة 1971المعدل
            </div>
        </div>

        <div class="container">
            <div class="title">المادة السابعة والعشرون</div>
            <div class="content">
                المصنف الجماعي هو المصنف الذي يشترك في وضعه جماعة بإرادتهم وبتوجيه م̷ـــِْن شخص طبيعي او معنوي ويندمج عمل المشتركين فيه في الفكرة العامة الموجهة ممن هذا الشخص الطبيعي او المعنوي بحيث يكون من غير الممكن فصل عمل كل من المشتركين وتمييزه على حدة ويعتبر الشخص الطبيعي او المعنوي الذي وجه ونظم ابتكار هذا المصنف مؤلفاً ويكون له وحده الحق في مباشرة حقوق المؤلف
                قانون حماية حق المؤلف رقم 3لسنة 1971المعدل
            </div>
        </div>
    </div>

</body>

</html>
