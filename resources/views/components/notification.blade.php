<li class="nav-item dropdown">
        <a class="nav-link position-relative" href="#" id="notificationsDropdown" role="button" 
           data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bell fa-xl"></i>
            @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                      style="font-size: 11px; padding: 4px 6px;">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="notificationsDropdown" style="width: 320px;">
            <li class="dropdown-header fw-bold">
                 لديك {{ auth()->user()->unreadNotifications->count() }} إشعار جديد
            </li>
            <div class="dropdown-divider"></div>
            @forelse (auth()->user()->unreadNotifications as $notification)
                <li>
                    <a href="{{ route('notifications.read', $notification->id) }}" 
                       class="dropdown-item d-flex align-items-start @if(is_null($notification->read_at)) fw-bold @endif">
                        <i class="{{ $notification->data['icon'] ?? 'fa-solid fa-bag-shopping' }} text-primary me-2"></i>
                        <div class="flex-grow-1">
                            <span class="d-block">{{ $notification->data['body'] ?? 'اوردر جديد' }}</span>
                            <small class="text-muted">
                                {{ $notification->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
            @empty
                <li class="p-2 text-center text-muted">لا توجد إشعارات جديدة</li>
            @endforelse
            <li>
                <a class="dropdown-item text-center text-primary fw-bold" href="{{ route('dashboard.orders.index') }}">
                    عرض كل الإشعارات
                </a>
            </li>
        </ul>
    </li>