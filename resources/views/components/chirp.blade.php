@props(['chirp'])

<div class="card bg-base-100 shadow-sm border border-base-200 transition-all hover:shadow-md mb-4 group">
    <div class="card-body p-4">
        <div class="flex gap-4">
            {{-- Avatar --}}
            @if ($chirp->user && $chirp->user->email)
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content rounded-full w-10 h-10">
                        <span class="text-xs">{{ strtoupper(substr($chirp->user->name, 0, 1)) }}</span>
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content rounded-full w-10 h-10">
                        <span class="text-xs">?</span>
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                         @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span class="text-base-content/60">·</span>
                            <span class="text-sm text-base-content/60 italic">edited</span>
                        @endif
                    </div>
                    
                    <div class="flex gap-1">
                        @can('update', $chirp)
                            <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
                                Edit
                            </a>
                        @endcan
                        
                        @can('delete', $chirp)
                            <form method="POST" action="/chirps/{{ $chirp->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this chirp?')"
                                    class="btn btn-ghost btn-xs text-error">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>

                {{-- Message --}}
                <div class="mt-2 text-base text-base-content whitespace-pre-wrap break-words leading-relaxed">
                    {{ $chirp->message }}
                </div>
            </div>
        </div>
    </div>
</div>