<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order TA</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gradient-to-b from-[#a7d308] via-[#9e790b] to-[#C2B280] min-h-screen text-amber-950">
    @include('components.navbar')

    <section class="pt-28 pb-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10 text-center">
                <p class="text-sm uppercase tracking-[0.3em] text-amber-700">Form Order Rutin</p>
                <h1 class="mt-2 text-3xl sm:text-4xl font-semibold text-amber-950 drop-shadow">Pengeluaran Material</h1>
                <p class="mt-3 text-amber-800 text-sm sm:text-base">Isi detail permintaan sesuai data SAP agar proses berjalan lancar.</p>
            </div>

            <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-amber-100/30">
                <div class="px-6 sm:px-10 py-8">
                    <form action="#" method="POST" class="space-y-6 text-slate-800">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="tanggal" class="text-sm font-semibold text-amber-900 tracking-wide">TANGGAL *</label>
                                <div class="relative">
                                    <input type="datetime-local" id="tanggal" name="tanggal"
                                        class="w-full rounded-xl border border-amber-100/70 px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner"
                                        required>
                                    <span class="absolute inset-y-0 right-4 flex items-center text-amber-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 9h18M4.5 7.5h15a1.5 1.5 0 0 1 1.5 1.5v11.25A1.5 1.5 0 0 1 19.5 21H4.5A1.5 1.5 0 0 1 3 19.5V9A1.5 1.5 0 0 1 4.5 7.5Z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="material_code" class="text-sm font-semibold text-amber-900 tracking-wide">MATERIAL CODE SAP *</label>
                                <div class="relative">
                                    <!-- Hidden input for form submission -->
                                    <input type="hidden" id="material_code_hidden" name="material_code" required>

                                    <!-- Custom dropdown container -->
                                    <div class="filament-dropdown">
                                        <!-- Search input -->
                                        <div class="relative">
                                            <input type="text" id="material_code_search"
                                                placeholder="Cari material code..."
                                                class="w-full rounded-t-xl border border-amber-100/70 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <svg class="h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Dropdown button -->
                                        <button type="button" id="material_code_toggle"
                                            class="w-full rounded-b-xl border border-t-0 border-amber-100/70 px-4 py-3 text-sm bg-white hover:bg-amber-50 focus:ring-2 focus:ring-amber-400 focus:border-transparent shadow-inner text-left flex items-center justify-between">
                                            <span id="material_code_selected" class="text-amber-700">Pilih Material Code</span>
                                            <svg class="h-5 w-5 text-amber-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <!-- Dropdown options -->
                                        <div id="material_code_dropdown" class="absolute z-50 w-full mt-1 bg-white border border-amber-100/70 rounded-xl shadow-lg max-h-60 overflow-y-auto hidden">
                                            <div id="material_code_options" class="py-1">
                                                @foreach($materials as $m)
                                                    <div class="px-4 py-2 hover:bg-amber-50 cursor-pointer transition-colors material-option"
                                                         data-value="{{ $m->material_code }}"
                                                         data-text="{{ $m->material_code }} - {{ $m->description }}">
                                                        <div class="font-medium text-amber-900">{{ $m->material_code }}</div>
                                                        <div class="text-sm text-amber-700">{{ $m->description }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="npk" class="text-sm font-semibold text-amber-900 tracking-wide">NPK SAP *</label>
                                <div class="relative">
                                    <!-- Hidden input for form submission -->
                                    <input type="hidden" id="npk_hidden" name="npk" required>

                                    <!-- Custom dropdown container -->
                                    <div class="filament-dropdown">
                                        <!-- Search input -->
                                        <div class="relative">
                                            <input type="text" id="npk_search"
                                                placeholder="Cari NPK..."
                                                class="w-full rounded-t-xl border border-amber-100/70 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <svg class="h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Dropdown button -->
                                        <button type="button" id="npk_toggle"
                                            class="w-full rounded-b-xl border border-t-0 border-amber-100/70 px-4 py-3 text-sm bg-white hover:bg-amber-50 focus:ring-2 focus:ring-amber-400 focus:border-transparent shadow-inner text-left flex items-center justify-between">
                                            <span id="npk_selected" class="text-amber-700">Pilih NPK SAP</span>
                                            <svg class="h-5 w-5 text-amber-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <!-- Dropdown options -->
                                        <div id="npk_dropdown" class="absolute z-50 w-full mt-1 bg-white border border-amber-100/70 rounded-xl shadow-lg max-h-60 overflow-y-auto hidden">
                                            <div id="npk_options" class="py-1">
                                                @foreach($pelanggans as $pel)
                                                    <div class="px-4 py-2 hover:bg-amber-50 cursor-pointer transition-colors pelanggan-option"
                                                         data-value="{{ $pel->npk }}"
                                                         data-text="{{ $pel->npk }} @if($pel->nama) - {{ $pel->nama }}@endif">
                                                        <div class="font-medium text-amber-900">{{ $pel->npk }}</div>
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

                            <div class="flex flex-col gap-2">
                                <label for="qty" class="text-sm font-semibold text-amber-900 tracking-wide">QTY DIAMBIL *</label>
                                <div class="flex rounded-xl border border-amber-100/70 bg-white shadow-inner overflow-hidden">
                                    <button type="button" id="qtyMinus" class="flex items-center justify-center w-12 text-amber-700 hover:bg-amber-50 transition">−</button>
                                    <input type="number" id="qty" name="qty" value="0" min="0"
                                        class="w-full text-center border-x border-amber-50/70 focus:ring-0 focus:border-transparent text-lg font-semibold text-amber-900">
                                    <button type="button" id="qtyPlus" class="flex items-center justify-center w-12 text-amber-700 hover:bg-amber-50 transition">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="no_equip" class="text-sm font-semibold text-amber-900 tracking-wide">NO. EQUIP / NO. WO / RESERVASI *</label>
                                <input type="text" id="no_equip" name="no_equip" placeholder="Contoh: EQ-23001 / WO-7788 / RSV-9900"
                                    class="w-full rounded-xl border border-amber-100/70 px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner" required>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="planner" class="text-sm font-semibold text-amber-900 tracking-wide">PLANNER *</label>
                                <div class="relative">
                                    <!-- Hidden input for form submission -->
                                    <input type="hidden" id="planner_hidden" name="planner" required>

                                    <!-- Custom dropdown container -->
                                    <div class="filament-dropdown">
                                        <!-- Search input -->
                                        <div class="relative">
                                            <input type="text" id="planner_search"
                                                placeholder="Cari planner..."
                                                class="w-full rounded-t-xl border border-amber-100/70 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <svg class="h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Dropdown button -->
                                        <button type="button" id="planner_toggle"
                                            class="w-full rounded-b-xl border border-t-0 border-amber-100/70 px-4 py-3 text-sm bg-white hover:bg-amber-50 focus:ring-2 focus:ring-amber-400 focus:border-transparent shadow-inner text-left flex items-center justify-between">
                                            <span id="planner_selected" class="text-amber-700">Pilih Planner</span>
                                            <svg class="h-5 w-5 text-amber-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <!-- Dropdown options -->
                                        <div id="planner_dropdown" class="absolute z-50 w-full mt-1 bg-white border border-amber-100/70 rounded-xl shadow-lg max-h-60 overflow-y-auto hidden">
                                            <div id="planner_options" class="py-1">
                                                @foreach($planners as $pl)
                                                    <div class="px-4 py-2 hover:bg-amber-50 cursor-pointer transition-colors planner-option"
                                                         data-value="{{ $pl->id }}"
                                                         data-text="{{ $pl->name }} @if($pl->phone) - {{ $pl->phone }}@endif">
                                                        <div class="font-medium text-amber-900">{{ $pl->name }}</div>
                                                        @if($pl->phone)
                                                            <div class="text-sm text-amber-700">{{ $pl->phone }}</div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="pabrik" class="text-sm font-semibold text-amber-900 tracking-wide">PABRIK *</label>
                                <div class="relative">
                                    <!-- Hidden input for form submission -->
                                    <input type="hidden" id="pabrik_hidden" name="pabrik" required>

                                    <!-- Custom dropdown container -->
                                    <div class="filament-dropdown">
                                        <!-- Search input -->
                                        <div class="relative">
                                            <input type="text" id="pabrik_search"
                                                placeholder="Cari pabrik..."
                                                class="w-full rounded-t-xl border border-amber-100/70 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <svg class="h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Dropdown button -->
                                        <button type="button" id="pabrik_toggle"
                                            class="w-full rounded-b-xl border border-t-0 border-amber-100/70 px-4 py-3 text-sm bg-white hover:bg-amber-50 focus:ring-2 focus:ring-amber-400 focus:border-transparent shadow-inner text-left flex items-center justify-between">
                                            <span id="pabrik_selected" class="text-amber-700">Pilih Pabrik</span>
                                            <svg class="h-5 w-5 text-amber-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <!-- Dropdown options -->
                                        <div id="pabrik_dropdown" class="absolute z-50 w-full mt-1 bg-white border border-amber-100/70 rounded-xl shadow-lg max-h-60 overflow-y-auto hidden">
                                            <div id="pabrik_options" class="py-1">
                                                @foreach($pabriks as $pb)
                                                    <div class="px-4 py-2 hover:bg-amber-50 cursor-pointer transition-colors pabrik-option"
                                                         data-value="{{ $pb->id }}"
                                                         data-text="{{ $pb->nama_pabrik }}">
                                                        <div class="font-medium text-amber-900">{{ $pb->nama_pabrik }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="area" class="text-sm font-semibold text-amber-900 tracking-wide">AREA *</label>
                                <div class="relative">
                                    <!-- Hidden input for form submission -->
                                    <input type="hidden" id="area_hidden" name="area" required>

                                    <!-- Custom dropdown container -->
                                    <div class="filament-dropdown">
                                        <!-- Search input -->
                                        <div class="relative">
                                            <input type="text" id="area_search"
                                                placeholder="Cari area..."
                                                class="w-full rounded-t-xl border border-amber-100/70 px-4 py-3 pr-10 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white shadow-inner">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <svg class="h-5 w-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Dropdown button -->
                                        <button type="button" id="area_toggle"
                                            class="w-full rounded-b-xl border border-t-0 border-amber-100/70 px-4 py-3 text-sm bg-white hover:bg-amber-50 focus:ring-2 focus:ring-amber-400 focus:border-transparent shadow-inner text-left flex items-center justify-between">
                                            <span id="area_selected" class="text-amber-700">Pilih Area</span>
                                            <svg class="h-5 w-5 text-amber-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <!-- Dropdown options -->
                                        <div id="area_dropdown" class="absolute z-50 w-full mt-1 bg-white border border-amber-100/70 rounded-xl shadow-lg max-h-60 overflow-y-auto hidden">
                                            <div id="area_options" class="py-1">
                                                @foreach($areas as $a)
                                                    <div class="px-4 py-2 hover:bg-amber-50 cursor-pointer transition-colors area-option"
                                                         data-value="{{ $a->id }}"
                                                         data-text="{{ $a->nama_area }}">
                                                        <div class="font-medium text-amber-900">{{ $a->nama_area }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="inline-flex items-center gap-2 bg-amber-600 text-white font-semibold px-6 sm:px-8 py-3 rounded-xl shadow-lg hover:bg-amber-500 transition focus:ring-4 focus:ring-amber-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v2.25a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25v-2.25m0-4.5V7.5A2.25 2.25 0 0 1 6.75 5.25h10.5A2.25 2.25 0 0 1 19.5 7.5v2.25m-6 3 3-3m-3 3-3-3" />
                                </svg>
                                Submit Permintaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
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
                this.toggleButton = document.getElementById(`${dropdownId}_toggle`);
                this.dropdown = document.getElementById(`${dropdownId}_dropdown`);
                this.optionsContainer = document.getElementById(`${dropdownId}_options`);
                this.selectedSpan = document.getElementById(`${dropdownId}_selected`);
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
                // Toggle dropdown on button click
                this.toggleButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.toggle();
                });

                // Real-time search with debouncing
                this.searchInput.addEventListener('input', () => {
                    this.debouncedFilter();
                });

                // Close on outside click
                document.addEventListener('click', (e) => {
                    if (!this.toggleButton.contains(e.target) &&
                        !this.dropdown.contains(e.target) &&
                        !this.searchInput.contains(e.target)) {
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

                // Keyboard navigation
                this.searchInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
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
                        this.close();
                        this.searchInput.focus();
                    }
                });
            }

            toggle() {
                if (this.isOpen) {
                    this.close();
                } else {
                    this.open();
                }
            }

            open() {
                this.dropdown.classList.remove('hidden');
                this.isOpen = true;
                this.updateArrowRotation();
                // Focus search input when opening
                setTimeout(() => this.searchInput.focus(), 10);
            }

            close() {
                this.dropdown.classList.add('hidden');
                this.isOpen = false;
                this.updateArrowRotation();
            }

            updateArrowRotation() {
                const arrow = this.toggleButton.querySelector('svg');
                if (this.isOpen) {
                    arrow.style.transform = 'rotate(180deg)';
                } else {
                    arrow.style.transform = 'rotate(0deg)';
                }
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
                        option.className = `${this.optionClass} px-4 py-2 hover:bg-amber-50 cursor-pointer transition-colors`;
                        option.setAttribute('tabindex', '0');

                        if (this.dropdownId === 'material_code') {
                            option.setAttribute('data-value', item.material_code);
                            option.setAttribute('data-text', `${item.material_code} - ${item.description}`);
                            option.innerHTML = `
                                <div class="font-medium text-amber-900">${item.material_code}</div>
                                <div class="text-sm text-amber-700">${item.description}</div>
                            `;
                        } else if (this.dropdownId === 'npk') {
                            option.setAttribute('data-value', item.npk);
                            option.setAttribute('data-text', `${item.npk}${item.nama ? ' - ' + item.nama : ''}`);
                            option.innerHTML = `
                                <div class="font-medium text-amber-900">${item.npk}</div>
                                ${item.nama ? `<div class="text-sm text-amber-700">${item.nama}</div>` : ''}
                            `;
                        } else if (this.dropdownId === 'planner') {
                            option.setAttribute('data-value', item.id);
                            option.setAttribute('data-text', `${item.name}${item.phone ? ' - ' + item.phone : ''}`);
                            option.innerHTML = `
                                <div class="font-medium text-amber-900">${item.name}</div>
                                ${item.phone ? `<div class="text-sm text-amber-700">${item.phone}</div>` : ''}
                            `;
                        } else if (this.dropdownId === 'pabrik') {
                            option.setAttribute('data-value', item.id);
                            option.setAttribute('data-text', item.nama_pabrik);
                            option.innerHTML = `
                                <div class="font-medium text-amber-900">${item.nama_pabrik}</div>
                            `;
                        } else if (this.dropdownId === 'area') {
                            option.setAttribute('data-value', item.id);
                            option.setAttribute('data-text', item.nama_area);
                            option.innerHTML = `
                                <div class="font-medium text-amber-900">${item.nama_area}</div>
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
                    option.className = `${this.optionClass} px-4 py-2 hover:bg-amber-50 cursor-pointer transition-colors`;
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

                // Update display text
                this.selectedSpan.textContent = text;
                this.selectedSpan.classList.remove('text-amber-700');
                this.selectedSpan.classList.add('text-amber-900');

                // Clear search and show all options
                this.searchInput.value = '';
                this.showAllOptions();

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
            const dropdowns = [
                new FilamentDropdown('material_code'),
                new FilamentDropdown('npk'),
                new FilamentDropdown('planner'),
                new FilamentDropdown('pabrik'),
                new FilamentDropdown('area')
            ];

            // Store dropdown instances globally for debugging
            window.filamentDropdowns = dropdowns;
        });
    </script>
</body>

</html>
