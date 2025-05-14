Echo.channel(`group-chat.${groupId}`)
    .listen('GroupMessageSent', (event) => {
        console.log('Message Sent To Groupe:', event.message);
    })
    .listen('GroupMessageUpdated', (event) => {
        console.log('Groupe Message Updated:', event.message);
    })
    
    .listen('GroupMessageDeleted', (event) => {
        console.log('Group Message Deleted:', event.message);
    });

    

