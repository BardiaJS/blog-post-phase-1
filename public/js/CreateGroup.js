Echo.channel(`CreateGroup.${ownerId}`)
    .listen('GroupCreated', (event) => {
        console.log('New group:', event.group);
    });
    


