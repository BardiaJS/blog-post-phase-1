import Echo from 'laravel-echo';

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your_key',
    cluster: 'mt1',
    forceTLS: true
});

window.Echo.channel('chat')
    .listen('MessageSent', (e) => {
        console.log('پیام جدید:', e.message);
    });