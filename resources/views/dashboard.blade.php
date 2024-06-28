<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="#" class="flex ms-2 md:me-24">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Sistem Informasi Bengkel Motor</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <span class="mr-4">Hello, {{ Auth::user()->name }}!</span>
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M3 3.5A2.5 2.5 0 015.5 1h9A2.5 2.5 0 0117 3.5v13a.5.5 0 01-.5.5H3.5a.5.5 0 01-.5-.5v-13zm12 0A1.5 1.5 0 0014 2H6a1.5 1.5 0 00-1.5 1.5v12.5H5v-12a1 1 0 011-1h8a1 1 0 011 1v12h1.5V3.5z" clip-rule="evenodd" />
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('users.index')}}"class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2a5 5 0 100 10 5 5 0 000-10zm0 11a7 7 0 00-7 7v1a1 1 0 001 1h12a1 1 0 001-1v-1a7 7 0 00-7-7z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Data User</span>
            </a>
         </li>
         <li>
         <li>
            <a href="{{ route('karyawan.index')}}"class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2a5 5 0 100 10 5 5 0 000-10zm0 11a7 7 0 00-7 7v1a1 1 0 001 1h12a1 1 0 001-1v-1a7 7 0 00-7-7z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Karyawan</span>
            </a>
         </li>
            <a href="{{ route('kategori.index')}}"class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M2 4a2 2 0 012-2h4a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V4zm10 0a2 2 0 012-2h4a2 2 0 012 2v10a2 2 0 01-2 2h-4a2 2 0 01-2-2V4z" clip-rule="evenodd" />
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Kategori</span>
            </a>
         </li>
         <li>
            <a href="{{ route('produk.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5.05 9.293a1 1 0 01.976-.083l1.928.714a1 1 0 00.584 0l3.71-1.417a1 1 0 01.635 0l1.977.735a1 1 0 011.251-1.546L19 8.11V4a2 2 0 00-2-2H3a2 2 0 00-2 2v4.107l.88-.327a1 1 0 011.056.204l.864.86z"/>
                  <path fill-rule="evenodd" d="M2 12.752l2-.752 2 .752v2.698l-2 .752-2-.752v-2.698zm8 0l2-.752 2 .752v2.698l-2 .752-2-.752v-2.698zM4.5 18H15a2 2 0 001.995-1.85L17 16v-1.682l-1.1-.413-2.9 1.106a3 3 0 01-1.708 0l-3.92-1.466a3 3 0 01-1.708 0L2 14.318V16c0 .728.387 1.364.995 1.72L4.5 18z" clip-rule="evenodd" />
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Produk</span>
            </a>
         </li>
         <li>
            <a href="{{ route('supplier.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M6.09 7.91l-.09-.09-.707-.707-.707.707-.09.09A1.517 1.517 0 013 6.5c0-.388.147-.74.393-1.007l.032-.032.083-.08L6.5 2.707 6.57 2.64 8 1.21V1h4v.21l1.43 1.43.07.068 3.002 3.002.032.032A1.517 1.517 0 0117 6.5c0 .387-.147.74-.393 1.007l-.032.032-.083.08-3.002 3.002-.07.068-3.004 3.004-.032.032A1.517 1.517 0 019 13.5c0-.387.147-.74.393-1.007l.032-.032.083-.08 3.002-3.002.07-.068.646-.646L15.21 8h.707v.293L16.2 8.8 17 9.6 15.6 11 11.8 14.8l-.707.707-.707-.707L9.6 13.2 7.91 11.51l-.09-.09a1.517 1.517 0 01-1.005.393A1.517 1.517 0 015.4 10.8l-.032-.032-.083-.08-3.002-3.002-.07-.068-.09-.09A1.517 1.517 0 011 6.5c0-.388.147-.74.393-1.007L3.6 2.707 5 1.3 5.707 2H5.3L7.91 4.61l.09.09-.09.09L5.707 7H6v-.707l.09-.09 1.515-1.516 1.41-1.41L9.89 3.9z" clip-rule="evenodd"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Supplier</span>
            </a>
         </li>
         <li>
         <li>
            <a href="{{ route('pembelian.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5.05 9.293a1 1 0 01.976-.083l1.928.714a1 1 0 00.584 0l3.71-1.417a1 1 0 01.635 0l1.977.735a1 1 0 011.251-1.546L19 8.11V4a2 2 0 00-2-2H3a2 2 0 00-2 2v4.107l.88-.327a1 1 0 011.056.204l.864.86z"/>
                  <path fill-rule="evenodd" d="M2 12.752l2-.752 2 .752v2.698l-2 .752-2-.752v-2.698zm8 0l2-.752 2 .752v2.698l-2 .752-2-.752v-2.698zM4.5 18H15a2 2 0 001.995-1.85L17 16v-1.682l-1.1-.413-2.9 1.106a3 3 0 01-1.708 0l-3.92-1.466a3 3 0 01-1.708 0L2 14.318V16c0 .728.387 1.364.995 1.72L4.5 18z" clip-rule="evenodd" />
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Data Pembelian</span>
            </a>
         </li>
            <a href="{{ route('laporan') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1H2a2 2 0 00-2 2v2a2 2 0 002 2h2v1a2 2 0 002 2v1a2 2 0 002 2h4a2 2 0 002-2v-1a2 2 0 002-2v-1h2a2 2 0 002-2V7a2 2 0 00-2-2h-2V4a2 2 0 00-2-2H6z" clip-rule="evenodd"/>
                  <path fill-rule="evenodd" d="M3 6a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V6zm0 6a1 1 0 011-1h6a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z" clip-rule="evenodd"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Laporan Transaksi</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
