<div class="h-16 flex items-center px-4 border-b border-gray-200">
    <span class="text-xl font-bold text-amber-600">Bulk Material</span>
  </div>
  <nav class="flex-1 overflow-y-auto py-4">
    <ul class="space-y-1 px-2">
      <li>
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-3 py-2 rounded hover:bg-gray-100 text-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-medium' : '' }}">
          <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('materials.index') }}"
           class="flex items-center px-3 py-2 rounded hover:bg-gray-100 text-gray-700 {{ request()->routeIs('materials.*') ? 'bg-gray-100 font-medium' : '' }}">
          <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4" />
          </svg>
          Materials
        </a>
      </li>
      <li>
        <a href="{{ url('/manpower') }}"
           class="flex items-center px-3 py-2 rounded hover:bg-gray-100 text-gray-700 {{ request()->is('manpower') ? 'bg-gray-100 font-medium' : '' }}">
          <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
          </svg>
          Manpower
        </a>
      </li>
      <li>
        <a href="{{ url('/orderrutin') }}"
           class="flex items-center px-3 py-2 rounded hover:bg-gray-100 text-gray-700 {{ request()->is('orderrutin') ? 'bg-gray-100 font-medium' : '' }}">
          <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
          </svg>
          Order Rutin
        </a>
      </li>
      <li>
        <a href="{{ url('/about') }}"
           class="flex items-center px-3 py-2 rounded hover:bg-gray-100 text-gray-700 {{ request()->is('about') ? 'bg-gray-100 font-medium' : '' }}">
          <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          About
        </a>
      </li>
      <li>
        <a href="{{ url('/contact') }}"
           class="flex items-center px-3 py-2 rounded hover:bg-gray-100 text-gray-700 {{ request()->is('contact') ? 'bg-gray-100 font-medium' : '' }}">
          <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 16.5a4.5 4.5 0 01-6.364 4.095l-1.084-.452a2 2 0 00-1.516 0l-1.084.452A4.5 4.5 0 013 16.5V6a2 2 0 012-2h14a2 2 0 012 2v10.5z" />
          </svg>
          Contact
        </a>
      </li>
    </ul>
  </nav>
