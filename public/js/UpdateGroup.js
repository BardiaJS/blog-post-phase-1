Echo.channel(`UpdateGroup.${groupId}`)
    .listen('GroupUpdated', (event) => {
        console.log('New group:', event.group);
    });
    