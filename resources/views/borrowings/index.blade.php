@extends('layouts.app')

@section('title', 'Borrowings')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">Borrowings</h1>
        <button class="bg-gray-700 text-gray-400 font-medium py-2 px-4 rounded-lg cursor-not-allowed">New Borrowing (Coming
            Soon)</button>
    </div>

    <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-900/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Member
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Books
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Borrow
                            Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @forelse($borrowings as $borrowing)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                {{ $borrowing->member->name ?? 'Unknown' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                <ul class="list-disc list-inside">
                                    @foreach($borrowing->details as $detail)
                                        <li>{{ $detail->book->title ?? 'Unknown Book' }} ({{ $detail->quantity }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $borrowing->borrow_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $borrowing->status === 'borrowed' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($borrowing->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                No borrowings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection