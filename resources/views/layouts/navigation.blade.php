<nav>

    <a href="{{ route('dashboard') }}" class="logo " >
        <x-application-logo   />
    </a>

    <a class="@if (request()->routeIs('books.index')) active @endif" href="{{ route('books.index') }}">
        <svg viewBox="0 0 100 100">
            <g transform="translate(10 5) scale(0.8 0.9)">
                <path d="M 0 30 v 70 h 100 v -70 l -50 -30 z" stroke="currentColor" stroke-width="10" fill="none"
                    stroke-linejoin="round" stroke-linecap="round" />
            </g>
        </svg>
        <span>
            Home
        </span>
    </a>

    <a class="@if (request()->routeIs('books.create')) active @endif" id="mylink" href="{{ route('books.create') }}">
        <svg viewBox="0 0 24 24">
            <path
                d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm0 22a10 10 0 1 1 10-10 10.011 10.011 0 0 1 -10 10zm5-10a1 1 0 0 1 -1 1h-3v3a1 1 0 0 1 -2 0v-3h-3a1 1 0 0 1 0-2h3v-3a1 1 0 0 1 2 0v3h3a1 1 0 0 1 1 1z" />

        </svg>
        <span>
            add
        </span>
    </a>
    <a class="@if (request()->routeIs('profile.index')) active @endif" href="{{ route('profile.index') }}">
        <svg viewBox="0 0 100 100">
            <g transform="translate(5 5) scale(0.9 0.9)">
                <circle cx="50" cy="35" r="18" stroke="currentColor" stroke-width="10" fill="none" />
                <rect x="15" y="75" width="70" height="50" rx="25" stroke="currentColor" stroke-width="10"
                    fill="none" />
            </g>
        </svg>
        <span>
            Profile
        </span>
    </a>
    @if (Auth::user()->can('supervisor'))
        <a class="@if (request()->routeIs('supervisor.index')) active @endif" href="{{ route('supervisor.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path
                    d="M680-360q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM480-160v-56q0-24 12.5-44.5T528-290q36-15 74.5-22.5T680-320q39 0 77.5 7.5T832-290q23 9 35.5 29.5T880-216v56H480Zm-80-320q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-160ZM80-160v-112q0-34 17-62.5t47-43.5q60-30 124.5-46T400-440q35 0 70 6t70 14l-34 34-34 34q-18-5-36-6.5t-36-1.5q-58 0-113.5 14T180-306q-10 5-15 14t-5 20v32h240v80H80Zm320-80Zm0-320q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Z" />
            </svg>
            <span>
                supervise
            </span>
        </a>
    @endif
    @if (Auth::user()->can('admin'))
        <a class="@if (request()->routeIs('supervisor.index')) active @endif" href="{{ route('supervisor.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path
                    d="M680-360q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM480-160v-56q0-24 12.5-44.5T528-290q36-15 74.5-22.5T680-320q39 0 77.5 7.5T832-290q23 9 35.5 29.5T880-216v56H480Zm-80-320q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-160ZM80-160v-112q0-34 17-62.5t47-43.5q60-30 124.5-46T400-440q35 0 70 6t70 14l-34 34-34 34q-18-5-36-6.5t-36-1.5q-58 0-113.5 14T180-306q-10 5-15 14t-5 20v32h240v80H80Zm320-80Zm0-320q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Z" />
            </svg>
            <span>
                supervise
            </span>
        </a>
        <a class="@if (request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path
                    d="M680-280q25 0 42.5-17.5T740-340q0-25-17.5-42.5T680-400q-25 0-42.5 17.5T620-340q0 25 17.5 42.5T680-280Zm0 120q31 0 57-14.5t42-38.5q-22-13-47-20t-52-7q-27 0-52 7t-47 20q16 24 42 38.5t57 14.5ZM480-80q-139-35-229.5-159.5T160-516v-244l320-120 320 120v227q-19-8-39-14.5t-41-9.5v-147l-240-90-240 90v188q0 47 12.5 94t35 89.5Q310-290 342-254t71 60q11 32 29 61t41 52q-1 0-1.5.5t-1.5.5Zm200 0q-83 0-141.5-58.5T480-280q0-83 58.5-141.5T680-480q83 0 141.5 58.5T880-280q0 83-58.5 141.5T680-80ZM480-494Z" />
            </svg>
            <span>
                Admin
            </span>
        </a>
    @endif
    <a class="@if (request()->routeIs('books.law')) active @endif" href="{{ route('books.law') }}">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path
                d="M480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-200v-80h320v80H320Zm10-120q-69-41-109.5-110T180-580q0-125 87.5-212.5T480-880q125 0 212.5 87.5T780-580q0 81-40.5 150T630-320H330Zm24-80h252q45-32 69.5-79T700-580q0-92-64-156t-156-64q-92 0-156 64t-64 156q0 54 24.5 101t69.5 79Zm126 0Z" />
        </svg>
        <span>
            info
        </span>
    </a>

</nav>
