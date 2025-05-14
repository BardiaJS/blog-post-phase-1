Echo.private(`chat.${messageId}`)
    .listen('PrivateMessageSent', (event) => {
        console.log('New message:', event.message);
    })
    .listen('PrivateMessageUpdated', (event) => {
        console.log('Updated message:', event.message);
    })
    .listen('PrivateMessageDeleted', (event) => {
        console.log('Deleted message:', event.message);
    });