Echo.channel(`DeleteGroup.${groupId}`)
    .listen('GroupDeleted', (event) => {
        console.log('New group:', event.group);
    });
    



