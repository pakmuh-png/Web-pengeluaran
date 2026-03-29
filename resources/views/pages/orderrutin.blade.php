<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order TA</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 min-h-screen text-slate-800 antialiased font-sans">
    <div class="absolute top-0 left-0 right-0 h-[460px] bg-gradient-to-br from-[#362f1a] via-[#6d4c11] to-[#9e790b] z-0 shadow-2xl overflow-hidden rounded-b-[2rem]">
        <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
    </div>
    @include('components.navbar')

    <section class="relative z-10 pt-32 pb-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10 text-center">
                <span class="inline-block py-1.5 px-5 rounded-full bg-white/10 backdrop-blur-md text-amber-50 text-xs font-bold tracking-[0.2em] mb-5 uppercase shadow-sm border border-white/20">FORM ORDER RUTIN</span>
                <h1 class="mt-2 text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight drop-shadow-xl">Pengeluaran Material</h1>
                <p class="mt-4 text-amber-100/90 text-sm sm:text-base max-w-2xl mx-auto font-medium leading-relaxed">Isi detail permintaan material berdasarkan data SAP dengan benar agar proses berjalan lancar dan efisien.</p>
            </div>

            <div class="bg-white rounded-3xl shadow-[0_20px_50px_rgba(8,_112,_184,_0.07)] border border-slate-100 relative">
                <div class="absolute top-0 left-0 w-full h-2 rounded-t-3xl bg-gradient-to-r from-amber-400 to-orange-500"></div>
                <div class="px-6 py-10 sm:px-12 sm:py-12">
                    <form action="#" method="POST" class="space-y-6 text-slate-800">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="material_code" class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5">MATERIAL CODE SAP <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="hidden" id="material_code_hidden" name="material_code" required>

                                    <input type="text" id="material_code_search" placeholder="Cari Material Code..."
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-slate-50 hover:bg-slate-100 focus:bg-white transition-all shadow-sm"
                                        autocomplete="off">
                                    <span class="absolute inset-y-0 right-3 flex items-center text-amber-500 pointer-events-none">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </span>

                                    <div id="material_code_dropdown" class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden ring-1 ring-black ring-opacity-5">
                                        <div id="material_code_options" class="py-1">
                                            @foreach($materials as $m)
                                                <div class="px-4 py-2 hover:bg-slate-50 cursor-pointer transition-colors border-b border-slate-50 last:border-0 material-option"
                                                     data-value="{{ $m->material_code }}"
                                                     data-text="{{ $m->material_code }} - {{ $m->description }}">
                                                    <div class="font-semibold text-slate-800">{{ $m->material_code }}</div>
                                                    <div class="text-sm text-amber-700">{{ $m->description }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="npk" class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5">NPK SAP <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="hidden" id="npk_hidden" name="npk" required>

                                    <input type="text" id="npk_search" placeholder="Cari NPK..."
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-slate-50 hover:bg-slate-100 focus:bg-white transition-all shadow-sm"
                                        autocomplete="off">
                                    <span class="absolute inset-y-0 right-3 flex items-center text-amber-500 pointer-events-none">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </span>

                                    <div id="npk_dropdown" class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden ring-1 ring-black ring-opacity-5">
                                        <div id="npk_options" class="py-1">
                                            @foreach($pelanggans as $pel)
                                                <div class="px-4 py-2 hover:bg-slate-50 cursor-pointer transition-colors border-b border-slate-50 last:border-0 npk-option"
                                                     data-value="{{ $pel->npk }}"
                                                     data-text="{{ $pel->npk }} @if($pel->nama) - {{ $pel->nama }}@endif">
                                                    <div class="font-semibold text-slate-800">{{ $pel->npk }}</div>
                                                    @if($pel->nama)
                                                        <div class="text-sm text-amber-700">{{ $pel->nama }}</div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="qty" class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5">QTY DIAMBIL <span class="text-red-500">*</span></label>
                                <div class="flex rounded-xl border border-amber-100/70 bg-white shadow-inner overflow-hidden">
                                    <button type="button" id="qtyMinus" class="flex items-center justify-center w-12 text-red-600 hover:bg-red-50 transition">−</button>
                                    <input type="number" id="qty" name="qty" value="0" min="0"
                                        class="w-full text-center border-x border-amber-50/70 focus:ring-0 focus:border-transparent text-lg font-semibold text-amber-900">
                                    <button type="button" id="qtyPlus" class="flex items-center justify-center w-12 text-red-600 hover:bg-red-50 transition">+</button>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="no_equip" class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5">NO. EQUIP / NO. WO / RESERVASI <span class="text-red-500">*</span></label>
                                <input type="text" id="no_equip" name="no_reservation" placeholder="Contoh: EQ-23001 / WO-7788 / RSV-9900"
                                    class="w-full rounded-xl border border-amber-100/70 px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="planner" class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5">PLANNER <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="hidden" id="planner_hidden" name="planner_id" required>

                                    <input type="text" id="planner_search" placeholder="Cari Planner..."
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-slate-50 hover:bg-slate-100 focus:bg-white transition-all shadow-sm"
                                        autocomplete="off">
                                    <span class="absolute inset-y-0 right-3 flex items-center text-amber-500 pointer-events-none">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </span>

                                    <div id="planner_dropdown" class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden ring-1 ring-black ring-opacity-5">
                                        <div id="planner_options" class="py-1">
                                            @foreach($planners as $pl)
                                                <div class="px-4 py-2 hover:bg-slate-50 cursor-pointer transition-colors border-b border-slate-50 last:border-0 planner-option"
                                                     data-value="{{ $pl->id }}"
                                                     data-text="{{ $pl->name }} @if($pl->phone) - {{ $pl->phone }}@endif">
                                                    <div class="font-semibold text-slate-800">{{ $pl->name }}</div>
                                                    @if($pl->phone)
                                                        <div class="text-sm text-amber-700">{{ $pl->phone }}</div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="pabrik" class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5">PABRIK <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="hidden" id="pabrik_hidden" name="pabrik_id" required>

                                    <input type="text" id="pabrik_search" placeholder="Cari Pabrik..."
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-slate-50 hover:bg-slate-100 focus:bg-white transition-all shadow-sm"
                                        autocomplete="off">
                                    <span class="absolute inset-y-0 right-3 flex items-center text-amber-500 pointer-events-none">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </span>

                                    <div id="pabrik_dropdown" class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden ring-1 ring-black ring-opacity-5">
                                        <div id="pabrik_options" class="py-1">
                                            @foreach($pabriks as $pb)
                                                <div class="px-4 py-2 hover:bg-slate-50 cursor-pointer transition-colors border-b border-slate-50 last:border-0 pabrik-option"
                                                     data-value="{{ $pb->id }}"
                                                     data-text="{{ $pb->nama_pabrik }}">
                                                    <div class="font-semibold text-slate-800">{{ $pb->nama_pabrik }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="area" class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5">AREA <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="hidden" id="area_hidden" name="area_id" required>

                                    <input type="text" id="area_search" placeholder="Cari Area..."
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-slate-50 hover:bg-slate-100 focus:bg-white transition-all shadow-sm"
                                        autocomplete="off">
                                    <span class="absolute inset-y-0 right-3 flex items-center text-amber-500 pointer-events-none">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </span>

                                    <div id="area_dropdown" class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-xl shadow-xl max-h-60 overflow-y-auto hidden ring-1 ring-black ring-opacity-5">
                                        <div id="area_options" class="py-1">
                                            @foreach($areas as $a)
                                                <div class="px-4 py-2 hover:bg-slate-50 cursor-pointer transition-colors border-b border-slate-50 last:border-0 area-option"
                                                     data-value="{{ $a->id }}"
                                                     data-text="{{ $a->nama_area }}">
                                                    <div class="font-semibold text-slate-800">{{ $a->nama_area }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-end pt-2">
                                <button type="submit" class="inline-flex justify-center items-center gap-2 bg-gradient-to-r from-orange-600 to-amber-600 text-white font-bold px-6 sm:px-8 py-3.5 rounded-xl shadow-lg shadow-orange-600/30 hover:shadow-orange-600/50 hover:from-orange-500 hover:to-amber-500 transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-4 focus:ring-orange-500/50 w-full mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5L12 3m0 0l9 7.5m-9-7.5v18" />
                                    </svg>
                                    Submit Permintaan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // --- Geolocation Check Config ---
        @php
            $setting = \App\Models\Setting::first() ?? new \App\Models\Setting([
                'company_lat' => -6.200000,
                'company_lng' => 106.816666,
                'max_distance' => 500,
            ]);
        @endphp
        const COMPANY_LAT = {{ $setting->company_lat }}; // Ganti dengan latitude perusahaan Anda
        const COMPANY_LNG = {{ $setting->company_lng }}; // Ganti dengan longitude perusahaan Anda
        const MAX_DISTANCE_METERS = {{ $setting->max_distance }}; // Jarak maksimal yang diperbolehkan (dalam meter)

        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371e3; // Radius bumi dalam meter
            const p1 = lat1 * Math.PI / 180;
            const p2 = lat2 * Math.PI / 180;
            const dp = (lat2 - lat1) * Math.PI / 180;
            const dl = (lon2 - lon1) * Math.PI / 180;

            const a = Math.sin(dp / 2) * Math.sin(dp / 2) +
                Math.cos(p1) * Math.cos(p2) *
                Math.sin(dl / 2) * Math.sin(dl / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            return R * c;
        }

        function verifyLocation() {
            const submitBtn = document.querySelector('button[type="submit"]');
            if (submitBtn) {
                if (!submitBtn.hasAttribute('data-original-text')) {
                    submitBtn.setAttribute('data-original-text', submitBtn.innerHTML);
                }
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Memeriksa Lokasi...';
            }

            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    const distance = calculateDistance(COMPANY_LAT, COMPANY_LNG, userLat, userLng);

                    if (distance <= MAX_DISTANCE_METERS) {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = submitBtn.getAttribute('data-original-text');
                        }
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Di Luar Area',
                            text: `Anda berada di luar area perusahaan. Jarak anda: ${Math.round(distance)} meter. Form ini hanya dapat diakses di dalam area perusahaan.`,
                            confirmButtonColor: '#ea580c',
                        });
                        if (submitBtn) {
                            submitBtn.innerHTML = 'Di Luar Area Perusahaan';
                        }
                    }
                }, function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Akses Lokasi Ditolak',
                        text: 'Mohon izinkan akses lokasi pada browser Anda agar bisa mengisi form ini.',
                        confirmButtonColor: '#ea580c',
                    });
                    if (submitBtn) {
                        submitBtn.innerHTML = 'Lokasi Ditolak';
                    }
                }, {
                    enableHighAccuracy: true
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak Didukung',
                    text: 'Browser anda tidak mendukung fitur geolokasi (GPS).',
                    confirmButtonColor: '#ea580c',
                });
                if (submitBtn) {
                    submitBtn.innerHTML = 'Fitur Lokasi Tidak Didukung';
                }
            }
        }
        // ---------------------------------

        const qtyInput = document.getElementById('qty');
        const qtyMinus = document.getElementById('qtyMinus');
        const qtyPlus = document.getElementById('qtyPlus');

        qtyMinus?.addEventListener('click', () => {
            const current = parseInt(qtyInput.value || '0', 10);
            qtyInput.value = Math.max(0, current - 1);
        });

        qtyPlus?.addEventListener('click', () => {
            const current = parseInt(qtyInput.value || '0', 10);
            qtyInput.value = current + 1;
        });

        // Debounce function to limit API calls
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Filament-style dropdown functionality
        class FilamentDropdown {
            constructor(dropdownId) {
                this.dropdownId = dropdownId;
                this.searchInput = document.getElementById(`${dropdownId}_search`);
                this.dropdown = document.getElementById(`${dropdownId}_dropdown`);
                this.optionsContainer = document.getElementById(`${dropdownId}_options`);
                this.hiddenInput = document.getElementById(`${dropdownId}_hidden`);
                this.optionClass = `${dropdownId.split('_')[0]}-option`; // material-option, npk-option, etc.
                this.isOpen = false;
                this.originalOptions = []; // Store original options

                this.storeOriginalOptions();
                // Create debounced filter function
                this.debouncedFilter = debounce(this.filterOptions.bind(this), 300);
                this.init();
            }

            init() {
                // Open on focus or click
                this.searchInput.addEventListener('focus', () => this.open());
                this.searchInput.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.open();
                });

                // Real-time search with debouncing
                this.searchInput.addEventListener('input', () => {
                    this.debouncedFilter();
                });

                // Close on outside click
                document.addEventListener('click', (e) => {
                    if (!this.dropdown.contains(e.target) && !this.searchInput.contains(e.target)) {
                        this.close();
                    }
                });

                // Handle option selection
                this.optionsContainer.addEventListener('click', (e) => {
                    const option = e.target.closest(`.${this.optionClass}`);
                    if (option) {
                        this.selectOption(option);
                    }
                });

                // Keyboard navigation on input
                this.searchInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        e.preventDefault();
                        this.close();
                    } else if (e.key === 'Enter') {
                        e.preventDefault();
                        const visibleOptions = this.getVisibleOptions();
                        if (visibleOptions.length > 0) {
                            this.selectOption(visibleOptions[0]);
                        }
                    } else if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        this.open();
                        this.focusNextOption();
                    }
                });

                // Keyboard navigation on dropdown
                this.dropdown.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        this.focusNextOption();
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        this.focusPreviousOption();
                    } else if (e.key === 'Enter') {
                        e.preventDefault();
                        const focusedOption = this.dropdown.querySelector(`.${this.optionClass}:focus`);
                        if (focusedOption) {
                            this.selectOption(focusedOption);
                        }
                    } else if (e.key === 'Escape') {
                        e.preventDefault();
                        this.close();
                        this.searchInput.focus();
                    }
                });
            }

            open() {
                this.dropdown.classList.remove('hidden');
                this.isOpen = true;
                // Focus search input when opening
                setTimeout(() => this.searchInput.focus(), 10);
            }

            close() {
                this.dropdown.classList.add('hidden');
                this.isOpen = false;
            }

            filterOptions() {
                const searchTerm = this.searchInput.value.toLowerCase().trim();

                if (searchTerm.length === 0) {
                    // If search is empty, show all original options
                    this.showAllOptions();
                    return;
                }

                // Use API for real-time server-side filtering
                this.filterWithAPI(searchTerm);

                // Auto-open dropdown if typing and not already open
                if (!this.isOpen) {
                    this.open();
                }
            }

            async filterWithAPI(searchTerm) {
                const apiEndpoints = {
                    'material_code': '/api/filter/materials',
                    'npk': '/api/filter/pelanggans',
                    'planner': '/api/filter/planners',
                    'pabrik': '/api/filter/pabriks',
                    'area': '/api/filter/areas'
                };

                const apiUrl = apiEndpoints[this.dropdownId];

                try {
                    const response = await fetch(`${apiUrl}?search=${encodeURIComponent(searchTerm)}`);
                    const data = await response.json();

                    // Clear current options
                    this.optionsContainer.innerHTML = '';

                    // Add filtered options from API
                    data.forEach(item => {
                        const option = document.createElement('div');
                        option.className = `${this.optionClass} px-4 py-2 hover:bg-slate-50 cursor-pointer transition-colors border-b border-slate-50 last:border-0`;
                        option.setAttribute('tabindex', '0');

                        if (this.dropdownId === 'material_code') {
                            option.setAttribute('data-value', item.material_code);
                            option.setAttribute('data-text', `${item.material_code} - ${item.description}`);
                            option.innerHTML = `
                                <div class="font-semibold text-slate-800">${item.material_code}</div>
                                <div class="text-sm text-amber-700">${item.description}</div>
                            `;
                        } else if (this.dropdownId === 'npk') {
                            option.setAttribute('data-value', item.npk);
                            option.setAttribute('data-text', `${item.npk}${item.nama ? ' - ' + item.nama : ''}`);
                            option.innerHTML = `
                                <div class="font-semibold text-slate-800">${item.npk}</div>
                                ${item.nama ? `<div class="text-sm text-amber-700">${item.nama}</div>` : ''}
                            `;
                        } else if (this.dropdownId === 'planner') {
                            option.setAttribute('data-value', item.id);
                            option.setAttribute('data-text', `${item.name}${item.phone ? ' - ' + item.phone : ''}`);
                            option.innerHTML = `
                                <div class="font-semibold text-slate-800">${item.name}</div>
                                ${item.phone ? `<div class="text-sm text-amber-700">${item.phone}</div>` : ''}
                            `;
                        } else if (this.dropdownId === 'pabrik') {
                            option.setAttribute('data-value', item.id);
                            option.setAttribute('data-text', item.nama_pabrik);
                            option.innerHTML = `
                                <div class="font-semibold text-slate-800">${item.nama_pabrik}</div>
                            `;
                        } else if (this.dropdownId === 'area') {
                            option.setAttribute('data-value', item.id);
                            option.setAttribute('data-text', item.nama_area);
                            option.innerHTML = `
                                <div class="font-semibold text-slate-800">${item.nama_area}</div>
                            `;
                        }

                        this.optionsContainer.appendChild(option);
                    });

                    // If no results, show "no results" message
                    if (data.length === 0) {
                        const noResults = document.createElement('div');
                        noResults.className = 'px-4 py-2 text-amber-600 text-center';
                        noResults.innerHTML = '<em>Tidak ada hasil ditemukan</em>';
                        this.optionsContainer.appendChild(noResults);
                    }

                } catch (error) {
                    console.error('Error filtering with API:', error);
                    this.showAllOptions();
                }
            }

            showAllOptions() {
                // Clear current options
                this.optionsContainer.innerHTML = '';

                // Show original options (fallback to client-side data)
                const originalOptions = this.getOriginalOptions();
                originalOptions.forEach(optionData => {
                    const option = document.createElement('div');
                    option.className = `${this.optionClass} px-4 py-2 hover:bg-slate-50 cursor-pointer transition-colors border-b border-slate-50 last:border-0`;
                    option.setAttribute('tabindex', '0');
                    option.setAttribute('data-value', optionData.value);
                    option.setAttribute('data-text', optionData.text);
                    option.innerHTML = optionData.html;
                    this.optionsContainer.appendChild(option);
                });
            }

            storeOriginalOptions() {
                // Store original options from the HTML
                const options = this.optionsContainer.querySelectorAll(`.${this.optionClass}`);
                this.originalOptions = Array.from(options).map(option => ({
                    value: option.dataset.value,
                    text: option.dataset.text,
                    html: option.innerHTML
                }));
            }

            getOriginalOptions() {
                return this.originalOptions;
            }

            selectOption(option) {
                const value = option.dataset.value;
                const text = option.dataset.text;

                // Update hidden input
                this.hiddenInput.value = value;

                // Update display value
                this.searchInput.value = text;

                // Close dropdown
                this.close();

                // Trigger change event for validation
                this.hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));
            }

            getVisibleOptions() {
                return Array.from(this.optionsContainer.querySelectorAll(`.${this.optionClass}`))
                    .filter(option => option.style.display !== 'none');
            }

            focusNextOption() {
                const visibleOptions = this.getVisibleOptions();
                const focusedIndex = visibleOptions.findIndex(opt => opt === document.activeElement);

                if (focusedIndex < visibleOptions.length - 1) {
                    visibleOptions[focusedIndex + 1].focus();
                }
            }

            focusPreviousOption() {
                const visibleOptions = this.getVisibleOptions();
                const focusedIndex = visibleOptions.findIndex(opt => opt === document.activeElement);

                if (focusedIndex > 0) {
                    visibleOptions[focusedIndex - 1].focus();
                } else {
                    this.searchInput.focus();
                }
            }
        }

        // Initialize all filament dropdowns
        document.addEventListener('DOMContentLoaded', function() {
            // Verifikasi lokasi pengguna saat halaman dimuat
            verifyLocation();

            const dropdowns = [
                new FilamentDropdown('material_code'),
                new FilamentDropdown('npk'),
                new FilamentDropdown('planner'),
                new FilamentDropdown('pabrik'),
                new FilamentDropdown('area')
            ];

            // Store dropdown instances globally for debugging
            window.filamentDropdowns = dropdowns;

            // Handle form submission
            const form = document.querySelector('form');
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const submitBtn = form.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;

                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Memproses...
                `;

                try {
                    const formData = new FormData(form);
                    formData.set('quantity', formData.get('qty'));

                    const response = await fetch('/api/orders', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message || 'Permintaan material berhasil disubmit.',
                            confirmButtonColor: '#ea580c',
                            background: '#ffedd5',
                            color: '#78350f'
                        }).then(() => {
                            // Reset form and UI
                            form.reset();
                            document.querySelectorAll('[id$="_search"]').forEach(input => input.value = '');
                            document.querySelectorAll('[id$="_hidden"]').forEach(input => input.value = '');
                        });
                    } else {
                        // Handle validation errors
                        let errorMessage = data.message || 'Terjadi kesalahan saat memproses permintaan.';
                        if (data.errors) {
                            errorMessage = Object.values(data.errors).flat().join('\n');
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: errorMessage,
                            confirmButtonColor: '#ea580c',
                            background: '#fee2e2',
                            color: '#991b1b'
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        text: 'Tidak dapat terhubung ke server. Silakan coba beberapa saat lagi.',
                        confirmButtonColor: '#ea580c',
                        background: '#fee2e2',
                        color: '#991b1b'
                    });
                } finally {
                    // Restore button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        });
    </script>
</body>

</html>
