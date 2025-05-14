Echo.channel(`AddUser.${groupId}`)
    .listen('UserAdded', (event) => {
        console.log('New group:', event.group);
    });
    



