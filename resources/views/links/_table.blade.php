<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>{{ __('links.table.url') }}</th>
        <th>{{ __('links.table.token') }}</th>
        <th>{{ __('links.table.max_count') }}</th>
        <th>{{ __('links.table.redirect_count') }}</th>
        <th>{{ __('links.table.time') }}</th>
        <th>{{ __('links.actions.title') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($links as $link)
        <tr>
            <td>{{ $link->id }}</td>
            <td>{{ $link->original_url }}</td>
            <td>
                <a href="{{ route('links.redirect', $link->token) }}" target="_blank">{{ $link->token }}</a>
            </td>
            <td>{{ $link->max_count }}</td>
            <td>{{ $link->redirect_count }}</td>
            <td>{{ $link->expiration_time }}</td>
            <td>
                <form method="post" action="{{ route('links.destroy', $link->id) }}" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-btn">{{ __('links.actions.delete') }}</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $links->links() }}
