Echo.channel('posts')
    .listen('PostCreated', event => {
      console.log(event.post);
    });