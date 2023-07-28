<header class="py-5">
    <div class="d-flex container">
        <ul class="d-flex list-unstyled m-auto">
            <li class="mx-3">
                <a href="{{ route("admin.beaches.index") }}">
                    Admin Home
                </a>
            </li>
            <li class="mx-3">
                <a href="{{ route("guest.home") }}">
                    Guest Home
                </a>
            </li>
            <li class="mx-3">
                <a href="{{ route("admin.beaches.create") }}">
                    Create New Element
                </a>
            </li>
            <li class="mx-3">
                <a href="{{ route("admin.beaches.trashed") }}">
                    View Deleted Elements
                </a>
            </li>
        </ul>
    </div>
</header>
