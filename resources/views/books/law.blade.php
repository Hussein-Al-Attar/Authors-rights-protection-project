<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Five Lowest University Books') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 inline-block">
                <h2 class="text-lg font-semibold mb-2">قانون الخدمة الجامعية</h2>
                <a href="https://uobaghdad.edu.iq/wp-content/uploads/2019/05/%D9%82%D8%A7%D9%86%D9%88%D9%86_%D8%A7%D9%84%D8%AE%D8%AF%D9%85%D8%A9_%D8%A7%D9%84%D8%AC%D8%A7%D9%85%D8%B9%D9%8A%D8%A91.pdf" class="text-blue-600 hover:underline mt-2 inline-block">Read</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 inline-block">
                <h2 class="text-lg font-semibold mb-2">تعليمات انضباط الطلبة في مؤسسات وزارة التعليم العالي والبحث العلمي</h2>
                <a href="http://cloud.uobasrah.edu.iq/uploads/2021/08/31/33692111.pdf" class="text-blue-600 hover:underline mt-2 inline-block">Read</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 inline-block">
                <h2 class="text-lg font-semibold mb-2">أنضباط موظفي الدولة والقطاع العام</h2>
                <a href="https://www.uoanbar.edu.iq/DentistryCollege/catalog/state%20employee(1).pdf" class="text-blue-600 hover:underline mt-2 inline-block">Read</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 inline-block">
                <h2 class="text-lg font-semibold mb-2">تعليمات الدراسات العليا</h2>
                <a href="https://uobaghdad.edu.iq/wp-content/uploads/2019/05/%D8%AA%D8%B9%D9%84%D9%8A%D9%85%D8%A7%D8%AA-%D8%A7%D9%84%D8%AF%D8%B1%D8%A7%D8%B3%D8%A7%D8%AA-%D8%A7%D9%84%D8%B9%D9%84%D9%8A%D8%A7-%D8%B1%D9%82%D9%85-26.pdf" class="text-blue-600 hover:underline mt-2 inline-block">Read</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 inline-block">
                <h2 class="text-lg font-semibold mb-2">قانون الوقائع العراقيه</h2>
                <a href="https://www.moj.gov.iq/uploaded/4133.pdf" class="text-blue-600 hover:underline mt-2 inline-block">Read</a>
            </div>
        </div>
    </div>
</x-app-layout>
