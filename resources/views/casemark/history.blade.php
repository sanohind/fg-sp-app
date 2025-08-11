@extends('layouts.app')

@section('title', 'Content List History - Case Mark System')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">CONTENT-LIST HISTORY</h1>

        <!-- Search -->
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search..." id="searchInput"
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="mb-6 flex space-x-4">
        <div class="relative">
            <select id="caseNoFilter"
                class="appearance-none bg-blue-900 text-white px-4 py-2 pr-8 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Case No</option>
                @foreach($cases->unique('case_no') as $case)
                <option value="{{ $case->case_no }}">{{ $case->case_no }}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>

        <div class="relative">
            <select id="prodMonthFilter"
                class="appearance-none bg-blue-900 text-white px-4 py-2 pr-8 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Prod. Month</option>
                @foreach($cases->unique('prod_month') as $case)
                <option value="{{ $case->prod_month }}">{{ $case->prod_month }}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>

    <!-- Cases Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Case No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Destination</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Prod. Month</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Total Boxes</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Progress</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Packing Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($cases as $index => $case)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}"
                    data-case-no="{{ $case->case_no }}"
                    data-prod-month="{{ $case->prod_month }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $cases->firstItem() + $index }}.
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $case->case_no }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $case->destination }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $case->prod_month }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $case->contentLists->count() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $case->progress }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $case->packing_date ? $case->packing_date->format('d/m/Y H:i') : '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            Packed
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('casemark.history.detail', $case->case_no) }}"
                            class="text-blue-600 hover:text-blue-900">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                        <div class="py-8">
                            <i class="fas fa-history text-4xl text-gray-300 mb-4"></i>
                            <p class="text-lg">No packed cases found</p>
                            <p class="text-sm">Cases will appear here after they are marked as packed</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($cases->hasPages())
    <div class="mt-6 flex items-center justify-between">
        <div class="text-sm text-gray-700">
            Showing {{ $cases->firstItem() }} to {{ $cases->lastItem() }} of {{ $cases->total() }} results
        </div>

        <div class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($cases->onFirstPage())
            <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                <i class="fas fa-chevron-left"></i>
            </span>
            @else
            <a href="{{ $cases->previousPageUrl() }}" class="px-3 py-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-chevron-left"></i>
            </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($cases->getUrlRange(1, $cases->lastPage()) as $page => $url)
            @if ($page == $cases->currentPage())
            <span class="px-3 py-2 bg-blue-600 text-white rounded">{{ $page }}</span>
            @elseif($page == 1 || $page == $cases->lastPage() || abs($page - $cases->currentPage()) <= 2)
                <a href="{{ $url }}" class="px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded">{{ $page }}</a>
                @elseif(abs($page - $cases->currentPage()) == 3)
                <span class="px-3 py-2 text-gray-400">...</span>
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($cases->hasMorePages())
                <a href="{{ $cases->nextPageUrl() }}" class="px-3 py-2 text-gray-600 hover:text-gray-900">
                    <i class="fas fa-chevron-right"></i>
                </a>
                @else
                <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
                @endif
        </div>
    </div>
    @endif

    <!-- Summary Statistics -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-green-600">{{ $cases->count() }}</div>
            <div class="text-sm text-green-800">Packed Cases</div>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-blue-600">{{ $cases->sum(function($case) { return $case->contentLists->count(); }) }}</div>
            <div class="text-sm text-blue-800">Total Boxes</div>
        </div>

        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-purple-600">{{ $cases->sum(function($case) { return $case->contentLists->sum('quantity'); }) }}</div>
            <div class="text-sm text-purple-800">Total Quantity</div>
        </div>

        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-gray-600">{{ $cases->unique('prod_month')->count() }}</div>
            <div class="text-sm text-gray-800">Production Months</div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const caseNoFilter = document.getElementById('caseNoFilter');
        const prodMonthFilter = document.getElementById('prodMonthFilter');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedCaseNo = caseNoFilter.value;
            const selectedProdMonth = prodMonthFilter.value;
            const rows = document.querySelectorAll('tbody tr[data-case-no]');

            rows.forEach(row => {
                const caseNo = row.getAttribute('data-case-no');
                const prodMonth = row.getAttribute('data-prod-month');
                const text = row.textContent.toLowerCase();

                const matchesSearch = searchTerm === '' || text.includes(searchTerm);
                const matchesCaseNo = selectedCaseNo === '' || caseNo === selectedCaseNo;
                const matchesProdMonth = selectedProdMonth === '' || prodMonth === selectedProdMonth;

                if (matchesSearch && matchesCaseNo && matchesProdMonth) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterTable);
        caseNoFilter.addEventListener('change', filterTable);
        prodMonthFilter.addEventListener('change', filterTable);

        // Auto-refresh every 60 seconds
        setInterval(function() {
            if (!document.hidden) {
                location.reload();
            }
        }, 60000);
    });
</script>
@endsection