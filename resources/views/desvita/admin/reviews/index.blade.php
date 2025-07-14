@extends('layouts.admin')

@section('title', 'Kelola Review')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Review</h2>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Wisatawan</th>
                        <th>Destinasi</th>
                        <th>Rating</th>
                        <th>Komentar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $index => $review)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $review->tourist->name }}</td>
                        <td>{{ $review->destination->name }}</td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star text-warning"></i>
                                @endif
                            @endfor
                        </td>
                        <td>{{ Str::limit($review->comment, 50) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.reviews.show', $review) }}" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.reviews.edit', $review) }}" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.reviews.destroy', $review) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus review ini?')" 
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-star fa-2x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada data review</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 