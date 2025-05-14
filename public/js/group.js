Echo.channel(`group.${groupId}`)
    .listen('GroupUpdated', (event) => {
        console.log('Group Updated:', event.group);
    })
    .listen('GroupDeleted', (event) => {
        console.log('Group Deleted:', event.group);
    })
    
    .listen('UserAdded', (event) => {
        console.log('User Added To Group:', event.group);
    });
Echo.channel(`group-creation.${ownerId}`)
    .listen('GroupCreated', (event) => {
        console.log('Group Created:', event.group);
    });
    




